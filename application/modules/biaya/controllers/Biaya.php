<?php

class Biaya extends MX_Controller
{

    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('status') != 'login') {
            redirect(base_url('auth'));
        }

        // load model
        $this->load->model('Biaya_model');
        $this->load->library('form_validation');
        
    }

    function index()
    {

        $data['cups'] = $this->Biaya_model->getData()->result_array();
        $this->load->view('header');
        $this->load->view('index',$data);
        $this->load->view('footer');
    }

    function tambah()
    {
        $this->form_validation->set_rules('nama', 'Your Information','required');
        $this->form_validation->set_rules('harga', 'Your Value','required');
    
            if ($this->form_validation->run()==false) {
                $data = array(
                    'tittle' => 'biaya'
                );
                $this->load->view('header');
                // $this->load->view('index',$data);
                $this->load->view('add');
                $this->load->view('footer');
               
    
            }else{
                 $this->tambah_proses();
            }
       
    }
    function tambah_proses()
    {

        $id = $this->Biaya_model->autoId();

        $harga = $this->input->post('harga');
        $nama = $this->input->post('nama');
        $user = $this->session->userdata('username');

        $user_sess = array(
            'Nama' => $user
        );

        $cek_id = $this->Biaya_model->getAdmin('karyawan',$user_sess);

        $find = $cek_id[0]['Kd_Karyawan'];
        
        $data = array(
            'Kd_Biaya' => $id,
            'Nm_Biaya' => $nama,
            'Besar_Biaya' => $harga,
            'Kd_Karyawan' => $find
        );

        $data_ins = $this->Biaya_model->insert_biaya('biaya',$data);

        if ($data_ins) {
            $this->session->set_flashdata('success','<div class="alert alert-success" role="alert">Successfully Entered Data</div>');
            redirect('biaya');
           
        }
    
    }

    function edit()
    {
        $id = htmlspecialchars($this->input->get('id'));

        $data_id = array(
            'Kd_Biaya' => $id
        );

        $data['lumia'] = $this->Biaya_model->getBiaya('biaya',$data_id);
        
        $this->load->view('header');
        $this->load->view('edit',$data);
        $this->load->view('footer');

        $this->form_validation->set_rules('nama', 'Your Date','required');
            $this->form_validation->set_rules('harga', 'Your Name','required');
    
            if ($this->form_validation->run()==false) {
                $data = array(
                    'tittle' => 'biaya'
                );

                return $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Please Complete The fields</div>');
            }else{
                 $this->edit_proses();
                
            }
    

    }

    function edit_proses()
    {
           $id = $this->input->post('id');
           $harga = $this->input->post('harga');
           $nama = $this->input->post('nama');
           $user = $this->session->userdata('username');
   
           $user_sess = array(
            'Nama' => $user
        );

        $cek_id = $this->Biaya_model->getAdmin('karyawan',$user_sess);

        $find = $cek_id[0]['Kd_Karyawan'];
         
           $data = array(
            'Nm_Biaya' => $nama,
            'Besar_Biaya' => $harga,
            'Kd_Karyawan' => $find
        );
 
         $where = array(
            'Kd_Biaya' => $id
         );
         
         $data_ins = $this->Biaya_model->update_biaya($where,$data,'biaya');
        
            $this->session->set_flashdata('success','<div class="alert alert-success" role="alert">Successfully Update Data</div>');
            redirect('biaya'); 
         
    }

    function delete()
    {
        $id = htmlspecialchars($this->input->get('id'));

        $where = array(
            'Kd_Biaya' => $id
        );

        $data = $this->Biaya_model->delete_biaya($where,'biaya');
        $this->session->set_flashdata('success','<div class="alert alert-success" role="alert">Successfully Delete Data</div>');
        redirect('biaya');
    }

    public function export_xls(){
        // Load plugin PHPExcel nya
        include APPPATH.'third_party/PHPExcel.php';
        
        $query = 'SELECT * FROM biaya ORDER BY Kd_Biaya DESC';

        $resultData = $this->db->query($query)->result_array();
        
        
        $date = date('Ymd');
        // Panggil class PHPExcel nya
        $excel = new PHPExcel();
        // Settingan awal fil excel
        $excel->getProperties()->setCreator('SMK SUMPAH PEMUDA')
                     ->setLastModifiedBy('SMK SUMPAH PEMUDA')
                     ->setTitle("Data Biaya")
                     ->setSubject("Biaya")
                     ->setDescription("Laporan Semua Data Biaya")
                     ->setKeywords("Data Biaya");
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
        $excel->setActiveSheetIndex(0)->setCellValue('A1', "DATA BIAYA"); // Set kolom A1 dengan tulisan "DATA SISWA"
        $excel->getActiveSheet()->mergeCells('A1:E1'); // Set Merge Cell pada kolom A1 sampai E1
        $excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
        $excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15); // Set font size 15 untuk kolom A1
        $excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1
        // Buat header tabel nya pada baris ke 3
        $excel->setActiveSheetIndex(0)->setCellValue('A3', "NO"); // Set kolom A3 dengan tulisan "NO"
        $excel->setActiveSheetIndex(0)->setCellValue('B3', "KODE BIAYA"); // Set kolom B3 dengan tulisan "NIS"
        $excel->setActiveSheetIndex(0)->setCellValue('C3', "NAMA BIAYA"); // Set kolom C3 dengan tulisan "NAMA"
        $excel->setActiveSheetIndex(0)->setCellValue('D3', "BESAR BIAYA"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
        $excel->setActiveSheetIndex(0)->setCellValue('E3', "KODE KARYAWAN"); // Set kolom E3 dengan tulisan "ALAMAT"

        $no = 1; // Untuk penomoran tabel, di awal set dengan 1
        $numrow = 4; // Set baris pertama untuk isi tabel adalah baris ke 4
        foreach($resultData as $data){ // Lakukan looping pada variabel siswa
          $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
          $excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data['Kd_Biaya']);
          $excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $data['Nm_Biaya']);
          $excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $data['Besar_Biaya']);
          $excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $data['Kd_Karyawan']);
         
          
          // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
          $excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
          $excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
          $excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
          $excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
          $excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);

          
          $no++; // Tambah 1 setiap kali looping
          $numrow++; // Tambah 1 setiap kali looping
        }
    
        // Apply style header yang telah kita buat tadi ke masing-masing kolom header
        $excel->getActiveSheet()->getStyle('A3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('B3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('C3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('D3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('E3')->applyFromArray($style_col);
      
        // Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
    
        // Set width kolom
        $excel->getActiveSheet()->getColumnDimension('A')->setWidth(5); // Set width kolom A
        $excel->getActiveSheet()->getColumnDimension('B')->setWidth(15); // Set width kolom B
        $excel->getActiveSheet()->getColumnDimension('C')->setWidth(25); // Set width kolom C
        $excel->getActiveSheet()->getColumnDimension('D')->setWidth(20); // Set width kolom D
        $excel->getActiveSheet()->getColumnDimension('E')->setWidth(30); // Set width kolom E
     
        
        // Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
        $excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
        // Set orientasi kertas jadi LANDSCAPE
        $excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
        // Set judul file excel nya
        $excel->getActiveSheet(0)->setTitle("Laporan Data Biaya");
        $excel->setActiveSheetIndex(0);
        // Proses file excel
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="Data Biaya"'.$date.'".xlsx"'); // Set nama file excel nya
        header('Cache-Control: max-age=0');
        $write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
        $write->save('php://output');
      }
}