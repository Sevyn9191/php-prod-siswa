<?php

class Kwitansi extends MX_Controller
{

    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('status') != 'login') {
            redirect(base_url('auth'));
        }

        // load model
        $this->load->model('Kwitansi_model');
        $this->load->library('form_validation');
        
    }

    function index()
    {

        $data['cups'] = $this->Kwitansi_model->getData()->result_array();
        $this->load->view('header');
        $this->load->view('index',$data);
        $this->load->view('footer');
    }

    function delete()
    {
        $id = htmlspecialchars($this->input->get('id'));

        $where = array(
            'Kd_Biaya' => $id
        );

        $data = $this->Kwitansi_model->delete_biaya($where,'biaya');
        $this->session->set_flashdata('success','<div class="alert alert-success" role="alert">Successfully Delete Data</div>');
        redirect('biaya');
    }

    function print()
    {
            $nis = $this->input->get('id');

            $this->form_validation->set_rules('username', 'Your Date','required');
            $this->form_validation->set_rules('password', 'Your Name','required');

            if ($this->form_validation->run()==false) {
                $data = array(
                    'tittle' => 'kwitansi'
                );

                $cek['lumia'] = $this->Kwitansi_model->cek_by()->result_array();
                $cek['samsan'] = $this->Kwitansi_model->cek_san($nis);
                $this->load->view('header');
                $this->load->view('add_view',$cek);
                $this->load->view('footer');
            }else{
                 $this->proses_kui($nis);
                
            }
    
    }

    function proses_kui()
    {
        $idOto = $this->Kwitansi_model->idOk();

        $kd_k = $this->session->userdata('username');
        // $nis_o = $this->input->get($nis);

        $get_k = $this->Kwitansi_model->getDataK($kd_k);
        $cek_k = $get_k[0]['Kd_Karyawan'];
        $date = $this->input->post('date');
        $nis = $this->input->post('nis');
        $kd_by =  $this->input->post('biaya');

        $data_kwi = array(
            'No_Kwitansi' => $idOto,
            'Tgl_Kwitansi' => $date,
            'Nis'=> $nis,
            'Kd_Karyawan'=>$cek_k
        );

        $kd_by_ss = array(
            'Kd_Biaya' => $kd_by
        );

        $kd_by_cek = $this->Kwitansi_model->getBy('biaya',$kd_by_ss);

        $jumlah = $kd_by_cek[0]['Besar_Biaya'];
        $data_isi = array(
            'No_Kwitansi' => $idOto,
            'Kd_Biaya' => $kd_by,
            'Jumlah' => $jumlah
        );

        $data_kwit = $this->Kwitansi_model->insert_kwi('kwitansi',$data_kwi);
        if ($data_kwit) {
            $this->Kwitansi_model->insert_isi('isi',$data_isi);
            $this->session->set_flashdata('success','<div class="alert alert-success" role="alert">Successfully Added Data</div>');
            // redirect('kwitansi/print_proses',$data);
            $this->print_proses($data_isi);
            // $this->print_proses($data_isi);
        }
        

    }

    function print_proses($data_isi)
    {

        $data_x = $data_isi['No_Kwitansi'];
        // print_r($data);
        $data['lumia'] = $this->Kwitansi_model->print_kw($data_x);
        $this->load->view('header');
        $this->load->view('print_kw',$data);
        $this->load->view('footer');
    }
    function print_ok()
    {
        $id = $this->input->get('id');


        $data['lumia'] = $this->Kwitansi_model->print_kw($id);
        $this->load->view('header');
        $this->load->view('print_out',$data);
        // $this->load->view('footer');
    }

    function print_daftar()
    {
        $id = $this->input->get('id');

        $data['lumia'] = $this->Kwitansi_model->print_daftar($id);
        $this->load->view('header');
        // print_r($data);
        $this->load->view('print_daftar',$data);
    }

    function print_siswa()
    {
        $id = $this->input->get('id');

        $data['lumia'] = $this->Kwitansi_model->print_siswa($id);
        $this->load->view('header');
        // print_r($data);
        $this->load->view('print_siswa',$data);

    }

    public function export_xls(){
        // Load plugin PHPExcel nya
        include APPPATH.'third_party/PHPExcel.php';
        
        $query = 'SELECT * FROM kwitansi JOIN karyawan ON kwitansi.Kd_Karyawan = karyawan.Kd_Karyawan JOIN pendaftaran ON karyawan.Kd_Karyawan = pendaftaran.Kd_Karyawan JOIN biaya ON pendaftaran.Kd_karyawan = biaya.Kd_Karyawan JOIN isi ON biaya.Kd_Biaya = isi.Kd_Biaya ORDER BY kwitansi.No_Kwitansi DESC';

        $resultData = $this->db->query($query)->result_array();
        
        
        $date = date('Ymd');
        // Panggil class PHPExcel nya
        $excel = new PHPExcel();
        // Settingan awal fil excel
        $excel->getProperties()->setCreator('SMK SUMPAH PEMUDA')
                     ->setLastModifiedBy('SMK SUMPAH PEMUDA')
                     ->setTitle("Data Kwitansi")
                     ->setSubject("Kwitansi")
                     ->setDescription("Laporan Semua Data Kwitansi")
                     ->setKeywords("Data Kwitansi");
        // Buat sebuah variabel untuk menampung pengaturan style dari header tabel
        $style_col = array(
          'font' => array('bold' => true), // Set font nya jadi bold
          'alignment' => array(
            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
            'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
          ),
          'borders' => array(
            'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
            'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
            'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
            'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
          )
        );
        // Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
        $style_row = array(
          'alignment' => array(
            'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
          ),
          'borders' => array(
            'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
            'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
            'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
            'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
          )
        );
        $excel->setActiveSheetIndex(0)->setCellValue('A1', "DATA KWITANSI"); // Set kolom A1 dengan tulisan "DATA SISWA"
        $excel->getActiveSheet()->mergeCells('A1:Q1'); // Set Merge Cell pada kolom A1 sampai E1
        $excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
        $excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15); // Set font size 15 untuk kolom A1
        $excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1
        // Buat header tabel nya pada baris ke 3
        $excel->setActiveSheetIndex(0)->setCellValue('A3', "NO"); // Set kolom A3 dengan tulisan "NO"
        $excel->setActiveSheetIndex(0)->setCellValue('B3', "NO  KWITANSI"); // Set kolom B3 dengan tulisan "NIS"
        $excel->setActiveSheetIndex(0)->setCellValue('C3', "TGL KWITANSI"); // Set kolom C3 dengan tulisan "NAMA"
        $excel->setActiveSheetIndex(0)->setCellValue('D3', "NIS"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
        $excel->setActiveSheetIndex(0)->setCellValue('E3', "NO DAFTAR"); // Set kolom E3 dengan tulisan "ALAMAT"
        $excel->setActiveSheetIndex(0)->setCellValue('F3', "NAMA CALON/SISWA"); // Set kolom E3 dengan tulisan "ALAMAT"
        $excel->setActiveSheetIndex(0)->setCellValue('G3', "KETERANGAN"); // Set kolom E3 dengan tulisan "ALAMAT"
        $excel->setActiveSheetIndex(0)->setCellValue('H3', "JUMLAH"); // Set kolom E3 dengan \
        $excel->setActiveSheetIndex(0)->setCellValue('I3', "CREATED BY"); // Set kolom E3 dengan \

        $no = 1; // Untuk penomoran tabel, di awal set dengan 1
        $numrow = 4; // Set baris pertama untuk isi tabel adalah baris ke 4
        foreach($resultData as $data){ // Lakukan looping pada variabel siswa
          $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
          $excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data['No_Kwitansi']);
          $excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $data['Tgl_Kwitansi']);
          $excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $data['Nis']);
          $excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $data['No_Daftar']);
          $excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $data['Nm_CaSis']);
          $excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $data['Nm_Biaya']);
          $excel->setActiveSheetIndex(0)->setCellValue('H'.$numrow, $data['Jumlah']);
          $excel->setActiveSheetIndex(0)->setCellValue('I'.$numrow, $data['Nama']);

         
          
          // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
          $excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
          $excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
          $excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
          $excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
          $excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
          $excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row);
          $excel->getActiveSheet()->getStyle('G'.$numrow)->applyFromArray($style_row);
          $excel->getActiveSheet()->getStyle('H'.$numrow)->applyFromArray($style_row);
          $excel->getActiveSheet()->getStyle('I'.$numrow)->applyFromArray($style_row);
          
          
          $no++; // Tambah 1 setiap kali looping
          $numrow++; // Tambah 1 setiap kali looping
        }
    
        // Apply style header yang telah kita buat tadi ke masing-masing kolom header
        $excel->getActiveSheet()->getStyle('A3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('B3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('C3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('D3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('E3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('F3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('G3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('H3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('I3')->applyFromArray($style_col);
      
        // Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
    
        // Set width kolom
        $excel->getActiveSheet()->getColumnDimension('A')->setWidth(5); // Set width kolom A
        $excel->getActiveSheet()->getColumnDimension('B')->setWidth(15); // Set width kolom B
        $excel->getActiveSheet()->getColumnDimension('C')->setWidth(25); // Set width kolom C
        $excel->getActiveSheet()->getColumnDimension('D')->setWidth(20); // Set width kolom D
        $excel->getActiveSheet()->getColumnDimension('E')->setWidth(30); // Set width kolom E
        $excel->getActiveSheet()->getColumnDimension('F')->setWidth(30); // Set width kolom E
        $excel->getActiveSheet()->getColumnDimension('G')->setWidth(30); // Set width kolom E
        $excel->getActiveSheet()->getColumnDimension('H')->setWidth(30); // Set width kolom E
        $excel->getActiveSheet()->getColumnDimension('I')->setWidth(30); // Set width kolom E
      
        // Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
        $excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
        // Set orientasi kertas jadi LANDSCAPE
        $excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
        // Set judul file excel nya
        $excel->getActiveSheet(0)->setTitle("Laporan Data Kwitansi");
        $excel->setActiveSheetIndex(0);
        // Proses file excel
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="Data Kwitansi"'.$date.'".xlsx"'); // Set nama file excel nya
        header('Cache-Control: max-age=0');
        $write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
        $write->save('php://output');
      }
    

}