<?php

class Pendaftaran extends MX_Controller
{

    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('status') != 'login') {
            redirect(base_url('auth'));
        }

        // load model
        $this->load->model('Pendaftaran_model');
        $this->load->library('form_validation');
    }


    function index()
    {

        $data['cups'] = $this->Pendaftaran_model->getData()->result_array();
        // return $this->load->view('index',$data);
        $this->load->view('template/header');
        $this->load->view('index',$data);
        $this->load->view('template/footer');
    
    }

   function add()
   {

        $this->form_validation->set_rules('nama', 'Your Name','required');
        $this->form_validation->set_rules('asal_sekolah', 'Your School','required');
        $this->form_validation->set_rules('tgl_daftar', 'Your date','required');
        $this->form_validation->set_rules('tmpt_lahir', 'Isi Cuy','required');
        $this->form_validation->set_rules('tgl_lahir', 'Your Born','required');
        $this->form_validation->set_rules('gender', 'Your gender','required');
        $this->form_validation->set_rules('alamat', 'Your Born','required');
        $this->form_validation->set_rules('father_name', 'Your Born','required');
        $this->form_validation->set_rules('mother_name', 'Your Born','required');
        $this->form_validation->set_rules('alamat_ortu', 'Your Born','required');
        $this->form_validation->set_rules('stud_phon', 'Your Born','required');
        // $this->form_validation->set_rules('wali', 'Your Born','required');
        // $this->form_validation->set_rules('alamat_wali', 'Your Born','required');

        if ($this->form_validation->run()==false) {
            $data = array(
                'tittle' => 'pendaftaran'
            );

            $this->load->view('template/header');
            $this->load->view('add',$data);
            $this->load->view('template/footer');



        }else{
             $this->add_proses();
        }
   }

   function add_proses()
   {

        $nama = $this->input->post('nama');
        $tgl_daftar = $this->input->post('tgl_daftar');
        $asal_sekolah = $this->input->post('asal_sekolah');
        $tmpt_lahir = $this->input->post('tmpt_lahir');
        $tgl_lahir = $this->input->post('tgl_lahir');
        $gender = $this->input->post('gender');
        $alamat = $this->input->post('alamat');
        $father_name = $this->input->post('father_name');
        $mother_name = $this->input->post('mother_name');
        $alamat_ortu = $this->input->post('alamat_ortu');
        $stud_phon = $this->input->post('stud_phon');
        $agama = $this->input->post('religion');
        $wali = $this->input->post('wali');
        $alamat_wali = $this->input->post('alamat_wali');

        $sess = $this->session->userdata('username');
        $sess_dt = array(
            'Nama' => $sess
        );
        $cek_kd = $this->Pendaftaran_model->getIdK('karyawan',$sess_dt);

        $kd_kar = $cek_kd[0]['Kd_Karyawan'];

        $idOto = $this->Pendaftaran_model->autoId();

        $data = array(
            'No_Daftar'=>$idOto,
            'Tgl_Daftar'=>$tgl_daftar,
            'Nm_CaSis' => $nama,
            'As_Sek' => $asal_sekolah,
            'Tmpt_Lahir' => $tmpt_lahir,
            'Tgl_Lahir '=>$tgl_lahir,
            'Jen_Kel' => $gender,
            'Agama_Sis' =>$agama,
            'Almt_Sis' => $alamat,
            'Nm_Ayah_Sis' => $father_name,
            'Nm_Ibu_Sis' => $mother_name,
            'Al_Ortu_Sis' => $alamat_ortu,
            'No_HP_Sis' => $stud_phon,
            'Nm_Wali'=>$wali,
            'Al_Wali'=>$alamat_wali,
            'Kd_Karyawan' =>$kd_kar
        );

        
        $insert_yo = $this->Pendaftaran_model->insert_sis('pendaftaran',$data);

        if ($insert_yo) {
            $this->session->set_flashdata('success','<div class="alert alert-warning" role="alert">Succesfully Insert Data</div>');
            redirect('pendaftaran');
        }

   }

   function edit()
    {
        $id = htmlspecialchars($this->input->get('id'));

    
        $this->form_validation->set_rules('nama', 'Your Name','required');
        $this->form_validation->set_rules('asal_sekolah', 'Your School','required');
        $this->form_validation->set_rules('tgl_daftar', 'Your date','required');
        $this->form_validation->set_rules('tmpt_lahir', 'Isi Cuy','required');
        $this->form_validation->set_rules('tgl_lahir', 'Your Born','required');
        $this->form_validation->set_rules('gender', 'Your gender','required');
        $this->form_validation->set_rules('alamat', 'Your Born','required');
        $this->form_validation->set_rules('father_name', 'Your Born','required');
        $this->form_validation->set_rules('mother_name', 'Your Born','required');
        $this->form_validation->set_rules('alamat_ortu', 'Your Born','required');
        $this->form_validation->set_rules('stud_phon', 'Your Born','required');
    
            if ($this->form_validation->run()==false) {
                $data = array(
                    'tittle' => 'pendaftaran'
                );

                $data_id = array(
                    'No_Daftar' => $id
                );
        
                $data['lumia'] = $this->Pendaftaran_model->getSiswa('pendaftaran',$data_id);
                $this->load->view('template/header');
                $this->load->view('edit',$data);
                $this->load->view('template/footer');
                
            }else{
                 $this->edit_proses();
                
            }

    }

    function edit_proses()
    {
        $no_daftar = $this->input->post('no_daftar');
        $nama = $this->input->post('nama');
        $tgl_daftar = $this->input->post('tgl_daftar');
        $asal_sekolah = $this->input->post('asal_sekolah');
        $tmpt_lahir = $this->input->post('tmpt_lahir');
        $tgl_lahir = $this->input->post('tgl_lahir');
        $gender = $this->input->post('gender');
        $alamat = $this->input->post('alamat');
        $father_name = $this->input->post('father_name');
        $mother_name = $this->input->post('mother_name');
        $alamat_ortu = $this->input->post('alamat_ortu');
        $stud_phon = $this->input->post('stud_phon');
        $agama = $this->input->post('religion');
        $wali = $this->input->post('wali');
        $alamat_wali = $this->input->post('alamat_wali');
        $kd_kar = $this->input->post('kd_karyawan');

        $data = array(
             'No_Daftar'=>$no_daftar,
                'Tgl_Daftar'=>$tgl_daftar,
                'Nm_CaSis' => $nama,
                'As_Sek' => $asal_sekolah,
                'Tmpt_Lahir' => $tmpt_lahir,
                'Tgl_Lahir '=>$tgl_lahir,
                'Jen_Kel' => $gender,
                'Agama_Sis' =>$agama,
                'Almt_Sis' => $alamat,
                'Nm_Ayah_Sis' => $father_name,
                'Nm_Ibu_Sis' => $mother_name,
                'Al_Ortu_Sis' => $alamat_ortu,
                'No_HP_Sis' => $stud_phon,
                'Nm_Wali'=>$wali,
                'Al_Wali'=>$alamat_wali,
                'Kd_Karyawan' =>$kd_kar
        );
         
        $where = array(
            'No_Daftar' => $no_daftar
        );
         $data_ins = $this->Pendaftaran_model->update_siswa($where,$data,'pendaftaran');
         $this->session->set_flashdata('success','<div class="alert alert-warning" role="alert">Succesfully Edit Data</div>');
         redirect('pendaftaran');
    }

    function delete()
    {
        $id = htmlspecialchars($this->input->get('id'));

        $where = array(
            'No_Daftar' => $id
        );

        $this->Pendaftaran_model->delete_siswa($where,'pendaftaran');
       
            $this->session->set_flashdata('success','<div class="alert alert-warning" role="alert">Succesfully delete Data</div>');
            redirect('pendaftaran');
      
    }


    function print()
    {
        $id = $this->input->get('id');


        $data['lumia'] = $this->Pendaftaran_model->print($id);
        $this->load->view('template/header');
        $this->load->view('print_out',$data);
        // $this->load->view('footer');
    }

    function print_lap()
    {
        // $id = $this->input->get('id');


        $data['lumia'] = $this->Pendaftaran_model->print_lap();
        $this->load->view('template/header');
        $this->load->view('print_kw',$data);
    }

    public function export_xls(){
        // Load plugin PHPExcel nya
        include APPPATH.'third_party/PHPExcel.php';
        
        $query = 'SELECT * FROM pendaftaran ORDER BY No_Daftar DESC';

        $resultData = $this->db->query($query)->result_array();
        
        
        $date = date('Ymd');
        // Panggil class PHPExcel nya
        $excel = new PHPExcel();
        // Settingan awal fil excel
        $excel->getProperties()->setCreator('SMK SUMPAH PEMUDA')
                     ->setLastModifiedBy('SMK SUMPAH PEMUDA')
                     ->setTitle("Data Calon Siswa")
                     ->setSubject("Siswa")
                     ->setDescription("Laporan Semua Data Calon Siswa")
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
        $excel->setActiveSheetIndex(0)->setCellValue('A1', "DATA CALON SISWA"); // Set kolom A1 dengan tulisan "DATA SISWA"
        $excel->getActiveSheet()->mergeCells('A1:Q1'); // Set Merge Cell pada kolom A1 sampai E1
        $excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
        $excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15); // Set font size 15 untuk kolom A1
        $excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1
        // Buat header tabel nya pada baris ke 3
        $excel->setActiveSheetIndex(0)->setCellValue('A3', "NO"); // Set kolom A3 dengan tulisan "NO"
        $excel->setActiveSheetIndex(0)->setCellValue('B3', "NO DAFTAR"); // Set kolom B3 dengan tulisan "NIS"
        $excel->setActiveSheetIndex(0)->setCellValue('C3', "NAMA"); // Set kolom C3 dengan tulisan "NAMA"
        $excel->setActiveSheetIndex(0)->setCellValue('D3', "TANGGAL DAFTAR"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
        $excel->setActiveSheetIndex(0)->setCellValue('E3', "ASAL SEKOLAH"); // Set kolom E3 dengan tulisan "ALAMAT"
        $excel->setActiveSheetIndex(0)->setCellValue('F3', "TEMPAT LAHIR"); // Set kolom E3 dengan tulisan "ALAMAT"
        $excel->setActiveSheetIndex(0)->setCellValue('G3', "TANGGAL LAHIR"); // Set kolom E3 dengan tulisan "ALAMAT"
        $excel->setActiveSheetIndex(0)->setCellValue('H3', "JENIS KELAMIN"); // Set kolom E3 dengan tulisan "ALAMAT"
        $excel->setActiveSheetIndex(0)->setCellValue('I3', "AGAMA"); // Set kolom E3 dengan tulisan "ALAMAT"
        $excel->setActiveSheetIndex(0)->setCellValue('J3', "ALAMAT"); // Set kolom E3 dengan tulisan "ALAMAT"
        $excel->setActiveSheetIndex(0)->setCellValue('K3', "NAMA AYAH"); // Set kolom E3 dengan tulisan "ALAMAT"
        $excel->setActiveSheetIndex(0)->setCellValue('L3', "NAMA IBU"); // Set kolom E3 dengan tulisan "ALAMAT"
        $excel->setActiveSheetIndex(0)->setCellValue('M3', "ALAMAT ORTU"); // Set kolom E3 dengan tulisan "ALAMAT"
        $excel->setActiveSheetIndex(0)->setCellValue('N3', "NO HANDPHONE"); // Set kolom E3 dengan tulisan "ALAMAT"
        $excel->setActiveSheetIndex(0)->setCellValue('O3', "NAMA WALI"); // Set kolom E3 dengan tulisan "ALAMAT"
        $excel->setActiveSheetIndex(0)->setCellValue('P3', "ALAMAT WALI"); // Set kolom E3 dengan tulisan "ALAMAT"
        $excel->setActiveSheetIndex(0)->setCellValue('Q3', "KODE KARYAWAN"); // Set kolom E3 dengan tulisan "ALAMAT"

        $no = 1; // Untuk penomoran tabel, di awal set dengan 1
        $numrow = 4; // Set baris pertama untuk isi tabel adalah baris ke 4
        foreach($resultData as $data){ // Lakukan looping pada variabel siswa
          $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
          $excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data['No_Daftar']);
          $excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $data['Tgl_Daftar']);
          $excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $data['Nm_CaSis']);
          $excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $data['As_Sek']);
          $excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $data['Tmpt_Lahir']);
          $excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $data['Tgl_Lahir']);
          $excel->setActiveSheetIndex(0)->setCellValue('H'.$numrow, $data['Jen_Kel']);
          $excel->setActiveSheetIndex(0)->setCellValue('I'.$numrow, $data['Agama_Sis']);
          $excel->setActiveSheetIndex(0)->setCellValue('J'.$numrow, $data['Almt_Sis']);
          $excel->setActiveSheetIndex(0)->setCellValue('K'.$numrow, $data['Nm_Ayah_Sis']);
          $excel->setActiveSheetIndex(0)->setCellValue('L'.$numrow, $data['Nm_Ibu_Sis']);
          $excel->setActiveSheetIndex(0)->setCellValue('M'.$numrow, $data['Al_Ortu_Sis']);
          $excel->setActiveSheetIndex(0)->setCellValue('N'.$numrow, $data['No_HP_Sis']);
          $excel->setActiveSheetIndex(0)->setCellValue('O'.$numrow, $data['Nm_Wali']);
          $excel->setActiveSheetIndex(0)->setCellValue('P'.$numrow, $data['Al_Wali']);
          $excel->setActiveSheetIndex(0)->setCellValue('Q'.$numrow, $data['Kd_Karyawan']);
         
          
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
          $excel->getActiveSheet()->getStyle('J'.$numrow)->applyFromArray($style_row);
          $excel->getActiveSheet()->getStyle('K'.$numrow)->applyFromArray($style_row);
          $excel->getActiveSheet()->getStyle('L'.$numrow)->applyFromArray($style_row);
          $excel->getActiveSheet()->getStyle('M'.$numrow)->applyFromArray($style_row);
          $excel->getActiveSheet()->getStyle('N'.$numrow)->applyFromArray($style_row);
          $excel->getActiveSheet()->getStyle('O'.$numrow)->applyFromArray($style_row);
          $excel->getActiveSheet()->getStyle('P'.$numrow)->applyFromArray($style_row);
          $excel->getActiveSheet()->getStyle('Q'.$numrow)->applyFromArray($style_row);
          
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
        $excel->getActiveSheet()->getStyle('J3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('K3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('L3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('M3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('N3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('O3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('P3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('Q3')->applyFromArray($style_col);
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
        $excel->getActiveSheet()->getColumnDimension('J')->setWidth(30); // Set width kolom E
        $excel->getActiveSheet()->getColumnDimension('K')->setWidth(30); // Set width kolom E
        $excel->getActiveSheet()->getColumnDimension('L')->setWidth(30); // Set width kolom E
        $excel->getActiveSheet()->getColumnDimension('M')->setWidth(30); // Set width kolom E
        $excel->getActiveSheet()->getColumnDimension('N')->setWidth(30); // Set width kolom E
        $excel->getActiveSheet()->getColumnDimension('O')->setWidth(30); // Set width kolom E
        $excel->getActiveSheet()->getColumnDimension('P')->setWidth(30); // Set width kolom E
        $excel->getActiveSheet()->getColumnDimension('Q')->setWidth(30); // Set width kolom E
        
        // Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
        $excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
        // Set orientasi kertas jadi LANDSCAPE
        $excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
        // Set judul file excel nya
        $excel->getActiveSheet(0)->setTitle("Laporan Data Calon Siswa");
        $excel->setActiveSheetIndex(0);
        // Proses file excel
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="Data Calon Siswa"'.$date.'".xlsx"'); // Set nama file excel nya
        header('Cache-Control: max-age=0');
        $write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
        $write->save('php://output');
      }
    
}