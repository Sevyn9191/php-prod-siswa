<?php

class Admin extends MX_Controller
{

    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('status') != 'login') {
            redirect(base_url('auth'));
        }

        // load model
        $this->load->model('Admin_model');
        $this->load->library('form_validation');
    }

    function index()
    {

        $data['cups'] = $this->Admin_model->getData()->result_array();
        $this->load->view('header');
        $this->load->view('index',$data);
        $this->load->view('footer');
    }

    function tambah()
    {
        $this->form_validation->set_rules('nama', 'Your Information','required');
        $this->form_validation->set_rules('alamat', 'Your Address Value','required');
        $this->form_validation->set_rules('no_hp', 'Your Number Phone','required');
        $this->form_validation->set_rules('username', 'Username Value','required');
        $this->form_validation->set_rules('password', 'Your password value','required');
        $this->form_validation->set_rules('status', 'Your status value','required');
    
            if ($this->form_validation->run()==false) {
                $data = array(
                    'tittle' => 'admin'
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

        $nik = $this->Admin_model->nikGet();
        $kd_k = $this->Admin_model->kdGet();

        $username = $this->input->post('username');
        $nama = $this->input->post('nama');
        $hp = $this->input->post('no_hp');
        $alamat = $this->input->post('alamat');
        $password = $this->input->post('password');
        $status = $this->input->post('status');

        $karyawan_data = array(
            'Kd_Karyawan' => $kd_k,
            'NIK'=>$nik,
            'Nama'=>$nama,
            'Alamat'=>$alamat,
            'No_HP'=>$hp,
            'Status'=>$status
        );

        $user_data = array(
            'User_id'=>$username,
            'Password'=>md5($password),
            'NIK'=>$nik
        );

        $data_cek = $this->Admin_model->cekUser($username,$nama)->num_rows();
        // print_r($data_cek);
        if ($data_cek > 0) {
            $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Username Or Name Already, Please Use Another Name</div>');
        }else{
            

            $insert_user = $this->Admin_model->insert_user('user',$user_data);
            if ($insert_user) {
                $insert_karyawan = $this->Admin_model->insert_kar('karyawan',$karyawan_data);
            }

            $this->session->set_flashdata('success','<div class="alert alert-success" role="alert">Successfully Entered Data</div>');
            redirect('admin');
            
        }
    
    }

    function edit()
    {
        $id = htmlspecialchars($this->input->get('id'));

        $data_id = array(
            'Kd_Karyawan' => $id
        );
        
       

        $data['lumia'] = $this->Admin_model->getKaryawan('karyawan',$data_id);
        $this->load->view('header');
        $this->load->view('edit',$data);
        $this->load->view('footer');

        $this->form_validation->set_rules('nama', 'Your Information','required');
        $this->form_validation->set_rules('alamat', 'Your Address Value','required');
        $this->form_validation->set_rules('no_hp', 'Your Number Phone','required');
        $this->form_validation->set_rules('status', 'Your Status Phone','required');
    
            if ($this->form_validation->run()==false) {
                $data = array(
                    'tittle' => 'admin'
                );
               
            }else{
                 $this->edit_proses();
                
            }
    

    }

    function edit_proses()
    {
        $id = $this->input->post('id');
        $nik = $this->input->post('nik');
        $nama = $this->input->post('nama');
        $hp = $this->input->post('no_hp');
        $alamat = $this->input->post('alamat');
        $status = $this->input->post('status');
   
        // print_r($id);
        $karyawan_data = array(
            'Kd_Karyawan'=>$id,
            'Nama'=>$nama,
            'Alamat'=>$alamat,
            'No_HP'=>$hp,
            'Status'=>$status
        );
 
         $where = array(
            'NIK' => $nik
         );
         
         $data_ins = $this->Admin_model->update_admin($where,$karyawan_data,'karyawan');
        $this->session->set_flashdata('success','<div class="alert alert-success" role="alert">Successfully Update Data</div>');
         redirect('admin');
    }

    function delete()
    {
        $id = htmlspecialchars($this->input->get('id'));

        $where = array(
            'Kd_Karyawan' => $id
        );

        $data = $this->Admin_model->delete_admin($where,'admin');
        $this->session->set_flashdata('success','<div class="alert alert-success" role="alert">Successfully Delete Data</div>');
        redirect('admin');
    }
}