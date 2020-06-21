<?php

class Register extends MX_Controller
{

    function __construct()
    {
        parent::__construct();
        // cek session
        if (!empty($this->session->userdata('status') =='login' )) {
            redirect('dashboard');
        }
        // load model
        $this->load->model('Register_model');
        $this->load->library('form_validation');
    }

    function index()
    {
        
         // cek username jika field tidak di isi muncul alert
        $this->form_validation->set_rules('username', 'Your Username','required');
        // cek password jika field tidak di isi muncul alert
        $this->form_validation->set_rules('password', 'Your Password','required');

        // validasi 0 or 1
        if ($this->form_validation->run()==false) {
            $data = array(
                'tittle' => 'register'
            );
             // panggil form login
            return $this->load->view('index');
        }else{
            // jika form == 1, lanjut ke proses login
            // untuk di cek username dan passowrdnya true or false
            $this->register_proses();
        }
    }

    function register_proses()
    {
         // ini menerima data yang di kirim dari form login
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        // data yang di dapatkan di atas akan di olah dalam bentuk array,
        // nantinya data akan otomatis di cocokan dengan column di db 

        $cekId = $this->Register_model->autoId();

        $data = array(
            // sesuaikan column di db
            'KdAdmin' => $cekId,
            'NmAdmin' => $username,
            'Password' => md5($password)
        );

       
        // cek username udah ada apa belum
        $data_cek  = $this->Register_model->cekData($username)->num_rows();
        if ($data_cek > 0) {
            $this->session->set_flashdata('message','<div class="alert alert-warning" role="alert">Username Is Already, Please Use Another Name</div>');
            redirect('register');
        }else{

            $data_in = $this->Register_model->insertData('admin',$data);

            if ($data_in) {
                $this->session->set_flashdata('regis_suc','<div class="alert alert-warning" role="alert">Register is Success</div>');
                redirect('auth');
            }
        }
 
    }

    

    
}