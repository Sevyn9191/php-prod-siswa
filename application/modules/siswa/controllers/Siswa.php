<?php

class Siswa extends MX_Controller
{

    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('status') != 'login') {
            redirect(base_url('auth'));
        }

        // load model
        $this->load->model('Siswa_model');
        $this->load->library('form_validation');
    }

    function index()
    {

        $data['cups'] = $this->Siswa_model->getData()->result_array();
        // return $this->load->view('index',$data);
        $this->load->view('header');
        $this->load->view('index',$data);
        $this->load->view('footer');
    
    }

    function edit()
    {
        

       

        $this->form_validation->set_rules('no_daftar', 'Your Date','required');
        $this->form_validation->set_rules('nama', 'Your Name','required');
        $this->form_validation->set_rules('jurusan', 'Your jurusan','required');
    
            if ($this->form_validation->run()==false) {
                $data = array(
                    'tittle' => 'siswa'
                );
            
                $id = $this->input->get('id');
                $data['fifi'] = $id;
                $data['lumia'] = $this->Siswa_model->getSiswa($id);
                // $lumia = json_encode($data);
                $this->load->view('header');
                $this->load->view('edit',$data);
                $this->load->view('footer');
                
            }else{
                 $this->edit_proses();
                
            }

    }

    function edit_proses()
    {
        $no_daftar = $this->input->post('no_daftar');
        $nis = $this->input->post('nis');
        $kd_kar = $this->input->post('kd_karyawan');
        $nama = $this->input->post('nama');
        $jurusan = $this->input->post('jurusan');
         
        $data = array(
            'Jurusan' => $jurusan
        );
 
         $where = array(
            'Nis' => $nis
         );
        //  print_r($data);
         
         $data_ins = $this->Siswa_model->update_siswa($where,$data,'siswa');
         $this->session->set_flashdata('success','<div class="alert alert-warning" role="alert">Succesfully Edit Data</div>');
         redirect('siswa');
    }

    function delete()
    {
        $id = htmlspecialchars($this->input->get('id'));

        $where = array(
            'Nis' => $id
        );

        $this->Siswa_model->delete_siswa($where,'siswa');
        
            $this->session->set_flashdata('success','<div class="alert alert-warning" role="alert">Succesfully delete Data</div>');
            redirect('siswa');
        
    }

    function add()
    {
    
        // $id = $this->input->get('id');

        $this->form_validation->set_rules('no_daftar', 'Your Date','required');
        $this->form_validation->set_rules('nama', 'Your Name','required');
        $this->form_validation->set_rules('jurusan', 'Your jurusan','required');

        if ($this->form_validation->run()==false) {
            $data = array(
                'tittle' => 'siswa'
            );
            $id = $this->input->get('id');

            $this->Siswa_model->update_pen($id);
            $id_d = array(
                'No_Daftar'=>$id
            );
            
            $data['lumia'] = $this->Siswa_model->getDaftar('pendaftaran',$id_d);
            $this->load->view('header');
            $this->load->view('add',$data);
            $this->load->view('footer');



        }else{
             $this->add_proses();
        }
        
    }
    
    function add_proses()
    {

        $no_daftar = $this->input->post('no_daftar');
        $nama = $this->input->post('nama');
        $jurusan = $this->input->post('jurusan');

        $sess = $this->session->userdata('username');
        $sess_dt = array(
            'Nama' => $sess
        );
        $cek_kd = $this->Siswa_model->getIdK('karyawan',$sess_dt);

        $kd_kar = $cek_kd[0]['Kd_Karyawan'];

        $idOto = $this->Siswa_model->autoId('siswa',$sess_dt);
     
        $data = array(
            'Nis'=>$idOto,
            'No_Daftar'=>$no_daftar,
            'Jurusan' => $jurusan,
            'Kd_Karyawan' =>$kd_kar
        );

        // $where = array(
        //     'No_Daftar' => $no_daftar
        // );
        
        $insert_yo = $this->Siswa_model->insert_sis('siswa',$data);

        if ($insert_yo) {
            // $delte_master  = $this->Siswa_model->delete_mas($where,'pendaftaran');
            $this->session->set_flashdata('success','<div class="alert alert-warning" role="alert">Succesfully Insert Data</div>');
            redirect('siswa');
        }

    }

    function print_siswa()
    {
        $nis = $this->input->get('id');
        $data['lumia'] = $this->Siswa_model->print_lap($nis);
        $this->load->view('template/header');
        $this->load->view('print_out',$data);
    }
    public function export_xls(){
        // Load plugin PHPExcel nya
        include APPPATH.'third_party/PHPExcel.php';
        
        // $query = 'SELECT * FROM siswa ORDER BY Nis DESC';
        $query = 'SELECT * FROM siswa JOIN pendaftaran ON siswa.Kd_Karyawan=pendaftaran.Kd_Karyawan ORDER BY siswa.Nis DESC';

        $resultData = $this->db->query($query)->result_array();
        
        
        $date = date('Ymd');
        // Panggil class PHPExcel nya
        $excel = new PHPExcel();
        // Settingan awal fil excel
        $excel->getProperties()->setCreator('SMK SUMPAH PEMUDA')
                     ->setLastModifiedBy('SMK SUMPAH PEMUDA')
                     ->setTitle("Data Siswa")
                     ->setSubject("Siswa")
                     ->setDescription("Laporan Semua Data Siswa")
                     ->setKeywords("Data Siswa");
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
        $excel->setActiveSheetIndex(0)->setCellValue('A1', "DATA SISWA"); // Set kolom A1 dengan tulisan "DATA SISWA"
        $excel->getActiveSheet()->mergeCells('A1:F1'); // Set Merge Cell pada kolom A1 sampai E1
        $excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
        $excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15); // Set font size 15 untuk kolom A1
        $excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1
        // Buat header tabel nya pada baris ke 3
        $excel->setActiveSheetIndex(0)->setCellValue('A3', "NO"); // Set kolom A3 dengan tulisan "NO"
        $excel->setActiveSheetIndex(0)->setCellValue('B3', "NIS"); // Set kolom B3 dengan tulisan "NIS"
        $excel->setActiveSheetIndex(0)->setCellValue('C3', "NAMA"); // Set kolom C3 dengan tulisan "NAMA"
        $excel->setActiveSheetIndex(0)->setCellValue('D3', "JURUSAN"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
        $excel->setActiveSheetIndex(0)->setCellValue('E3', "NO DAFTAR"); // Set kolom E3 dengan tulisan "ALAMAT"
        $excel->setActiveSheetIndex(0)->setCellValue('F3', "KD KARYAWAN"); // Set kolom E3 dengan tulisan "ALAMAT"
    

        $no = 1; // Untuk penomoran tabel, di awal set dengan 1
        $numrow = 4; // Set baris pertama untuk isi tabel adalah baris ke 4
        foreach($resultData as $data){ // Lakukan looping pada variabel siswa
          $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
          $excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data['Nis']);
          $excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $data['Nm_CaSis']);
          $excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $data['Jurusan']);
          $excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $data['No_Daftar']);
          $excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $data['Kd_Karyawan']);
         
          
          // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
          $excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
          $excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
          $excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
          $excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
          $excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
          $excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row);
         
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
       
        // Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
    
        // Set width kolom
        $excel->getActiveSheet()->getColumnDimension('A')->setWidth(5); // Set width kolom A
        $excel->getActiveSheet()->getColumnDimension('B')->setWidth(15); // Set width kolom B
        $excel->getActiveSheet()->getColumnDimension('C')->setWidth(25); // Set width kolom C
        $excel->getActiveSheet()->getColumnDimension('D')->setWidth(20); // Set width kolom D
        $excel->getActiveSheet()->getColumnDimension('E')->setWidth(30); // Set width kolom E
        $excel->getActiveSheet()->getColumnDimension('F')->setWidth(30); // Set width kolom E
   
        
        // Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
        $excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
        // Set orientasi kertas jadi LANDSCAPE
        $excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
        // Set judul file excel nya
        $excel->getActiveSheet(0)->setTitle("Laporan Data Siswa");
        $excel->setActiveSheetIndex(0);
        // Proses file excel
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="Data Siswa"'.$date.'".xlsx"'); // Set nama file excel nya
        header('Cache-Control: max-age=0');
        $write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
        $write->save('php://output');
      }
}