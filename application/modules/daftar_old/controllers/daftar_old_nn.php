<?php

class Daftar extends MX_Controller
{

    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('status') != 'login') {
            redirect(base_url('auth'));
        }

        // load model
        $this->load->model('Daftar_model');
        $this->load->library('form_validation');
    }

    function index()
    {

        $data['cups'] = $this->Daftar_model->getData()->result_array();
        // $data['count'] = $this->Daftar_model->getCount()->result_array();
        $this->load->view('header');
        // $this->load->view('index',$data);
        $this->load->view('index_v',$data);
        $this->load->view('footer');
    }

    function tambah()
    {
        
        // return $this->load->view('add',$cekId);
      
            $this->form_validation->set_rules('date_daftar', 'Your Date','required');
            $this->form_validation->set_rules('nama', 'Your Name','required');
            $this->form_validation->set_rules('asal_sekolah', 'Your School','required');
            $this->form_validation->set_rules('tempat_lahir', 'Place of Birth','required');
            $this->form_validation->set_rules('tgl_lahir', 'Date of Birth','required');
    
            if ($this->form_validation->run()==false) {
                $data = array(
                    'tittle' => 'daftar'
                );
                // $cekol['data'] = $this->Daftar_model->autoId();
     
                // return $this->tambah();
                $this->load->view('header');
                // $this->load->view('index',$data);
                $this->load->view('add_siswa');
                $this->load->view('footer');
    
            }else{
                 $this->tambah_proses();
            }
       
    }
    function tambah_proses()
    {

         $id = $this->Daftar_model->autoId();
       
        // $cekId = $this->Register_model->autoId();
        // $id = $this->input->post('id');
        $date_daftar = $this->input->post('date_daftar');
        $nama = $this->input->post('nama');
        $asal_sekolah = $this->input->post('asal_sekolah');
        $tempat_lahir = $this->input->post('tempat_lahir');
        $tgl_lahir = $this->input->post('tgl_lahir');
        $kelamin = $this->input->post('kelamin');
        $agama = $this->input->post('agama');
        
        $data = array(
            'No_Daftar' => $id,
            'Tgl_Daftar' => $date_daftar,
            'Nm_CaSis' => $nama,
            'As_Sek' => $asal_sekolah,
            'Tmpt_Lahir' => $tempat_lahir,
            'Tgl_Lahir' => $tgl_lahir,
            'Jen_Kel' => $kelamin,
            'Agama' => $agama
        );

        $data_ins = $this->Daftar_model->insert_daftar('pendaftaran',$data);

        if ($data_ins) {
            $this->session->set_flashdata('success','<div class="alert alert-success" role="alert">Successfully added data</div>');
            redirect('daftar');
        }else{
            echo "gagal";
        }
    
    }

    function edit()
    {
        $id = htmlspecialchars($this->input->get('id'));

        $data_id = array(
            'No_Daftar' => $id
        );

        $data['lumia'] = $this->Daftar_model->getPendaftar('pendaftaran',$data_id);
        // $lumia = json_encode($data);
        $this->load->view('header');
        $this->load->view('edit',$data);
        $this->load->view('footer');

        $this->form_validation->set_rules('date_daftar', 'Your Date','required');
        $this->form_validation->set_rules('nama', 'Your Name','required');
        $this->form_validation->set_rules('asal_sekolah', 'Your School','required');
        $this->form_validation->set_rules('tempat_lahir', 'Place of Birth','required');
        $this->form_validation->set_rules('tgl_lahir', 'Date of Birth','required');
    
            if ($this->form_validation->run()==false) {
                $data = array(
                    'tittle' => 'daftar'
                );
            
                return $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Please Complete The Fields</div>');
            }else{
                 $this->edit_proses();
                
            }

    }

    function edit_proses()
    {
         $id = $this->input->post('id');
         $date_daftar = $this->input->post('date_daftar');
         $nama = $this->input->post('nama');
         $asal_sekolah = $this->input->post('asal_sekolah');
         $tempat_lahir = $this->input->post('tempat_lahir');
         $tgl_lahir = $this->input->post('tgl_lahir');
         $kelamin = $this->input->post('kelamin');
         $agama = $this->input->post('agama');
         
         $data = array(
             'Tgl_Daftar' => $date_daftar,
             'Nm_CaSis' => $nama,
             'As_Sek' => $asal_sekolah,
             'Tmpt_Lahir' => $tempat_lahir,
            'Tgl_Lahir' => $tgl_lahir,
             'Jen_Kel' => $kelamin,
             'Agama' => $agama
         );
 
         $where = array(
            'No_Daftar' => $id
         );
        //  print_r($data);
         
         $data_ins = $this->Daftar_model->update_daftar($where,$data,'pendaftaran');
         $this->session->set_flashdata('success','<div class="alert alert-success" role="alert">Successfully Edit data</div>');
         redirect('daftar');
    }

    function delete()
    {
        $id = htmlspecialchars($this->input->get('id'));

        $where = array(
            'No_Daftar' => $id
        );

        $data = $this->Daftar_model->delete_daftar($where,'pendaftaran');
        $this->session->set_flashdata('success','<div class="alert alert-success" role="alert">Successfully delete data</div>');
        redirect('daftar');
    }

    function search()
    {
        $keyword = $this->input->post('keyword');
        $siswa['cups'] = $this->Daftar_model->search($keyword);


        $hasil = $this->load->view('index', $siswa);

        $callback = array(
            'hasil' => $hasil, // Set array hasil dengan isi dari view.php yang diload tadi
          );
          echo json_encode($callback); // konversi varibael $callback menjadi JSON
    
    }
}