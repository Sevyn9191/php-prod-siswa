<?php

class Daftar extends MX_Controller
{
    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('status')!='login') {
            redirect('auth');
        }
        $this->load->library('form_validation');
        $this->load->model('Df_model');
    }

    function index()
    {
        $data['cups'] = $this->Df_model->getData()->result_array();
            $this->load->view('header');
            $this->load->view('index',$data);
            $this->load->view('footer');
            
    }

    function tambah()
    
    {
     
        $this->form_validation->set_rules('nama', 'Your Date','required');
        $this->form_validation->set_rules('tgl_daftar', 'Your Date','required');
            $this->form_validation->set_rules('asal_sekolah', 'Your School','required');
            $this->form_validation->set_rules('tmpt_lahir', 'Place of Birth','required');
            $this->form_validation->set_rules('born', 'Date of Birth','required');
            $this->form_validation->set_rules('gender', 'Date of Birth','required');
            $this->form_validation->set_rules('religion', 'Date of Birth','required');
    

        if ($this->form_validation->run()==false) {
                $data = array(
                    'tittle' => 'daftar'
                );
                $this->load->view('header');
                $this->load->view('add');
                $this->load->view('footer');
    
            }else{
                $this->tambah_proses();
            }
    }

    function tambah_proses()
    {
       
        $id = $this->Df_model->autoId();

        $nama = $this->input->post('nama');
        $tgl_daftar = $this->input->post('tgl_daftar');
        $asal_sekolah = $this->input->post('asal_sekolah');
        $tmpt_lahir = $this->input->post('tmpt_lahir');
        $born = $this->input->post('born');
        $gender = $this->input->post('gender');
        $religion = $this->input->post('religion');

        $data = array(
            'No_Daftar' => $id,
            'Tgl_Daftar' => $tgl_daftar,
            'Nm_CaSis' => $nama,
            'As_Sek' => $asal_sekolah,
            'Tmpt_Lahir' => $tmpt_lahir,
            'Tgl_Lahir' => $born,
            'Jen_Kel' => $gender,
            'Agama' => $religion
        );

        $data_ins = $this->Df_model->insert_daftar('pendaftaran',$data);

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

        $data['lumia'] = $this->Df_model->getPendaftar('pendaftaran',$data_id);
        // $lumia = json_encode($data);
        $this->load->view('header');
        $this->load->view('edit_view',$data);
        $this->load->view('footer');

        $this->form_validation->set_rules('nama', 'Your Date','required');
        $this->form_validation->set_rules('tgl_daftar', 'Your Name','required');
        $this->form_validation->set_rules('asal_sekolah', 'Your School','required');
        $this->form_validation->set_rules('tmpt_lahir', 'Place of Birth','required');
        $this->form_validation->set_rules('born', 'Date of Birth','required');
        $this->form_validation->set_rules('gender', 'Date of Birth','required');
        $this->form_validation->set_rules('religion', 'Date of Birth','required');
    
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
        $nama = $this->input->post('nama');
        $tgl_daftar = $this->input->post('tgl_daftar');
        $asal_sekolah = $this->input->post('asal_sekolah');
        $tmpt_lahir = $this->input->post('tmpt_lahir');
        $born = $this->input->post('born');
        $gender = $this->input->post('gender');
        $religion = $this->input->post('religion');

        $data = array(
            'Tgl_Daftar' => $tgl_daftar,
            'Nm_CaSis' => $nama,
            'As_Sek' => $asal_sekolah,
            'Tmpt_Lahir' => $tmpt_lahir,
            'Tgl_Lahir' => $born,
            'Jen_Kel' => $gender,
            'Agama' => $religion
        );
 
         $where = array(
            'No_Daftar' => $id
         );
        //  print_r($data);
         
         $data_ins = $this->Df_model->update_daftar($where,$data,'pendaftaran');
         $this->session->set_flashdata('success','<div class="alert alert-success" role="alert">Successfully Edit data</div>');
         redirect('daftar');
    }

    function delete()
    {
        $id = htmlspecialchars($this->input->get('id'));

        $where = array(
            'No_Daftar' => $id
        );

        $data = $this->Df_model->delete_daftar($where,'pendaftaran');
        $this->session->set_flashdata('success','<div class="alert alert-success" role="alert">Successfully delete data</div>');
        redirect('daftar');
    }


}