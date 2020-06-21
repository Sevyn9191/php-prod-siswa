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
}