<?php

class Auth extends MX_Controller
{

    function __construct()
    {
        parent::__construct();

        // load model
        $this->load->model('Auth_model');
        $this->load->library('form_validation');
    }

    function index()
    {
        // cek session
        if (!empty($this->session->userdata('status') =='login' )) {
            redirect('dashboard');
        }
         // cek username jika field tidak di isi muncul alert
        $this->form_validation->set_rules('username', 'Your User ID','required');
        // cek password jika field tidak di isi muncul alert
        $this->form_validation->set_rules('password', 'Your Password','required');

        // validasi 0 or 1
        if ($this->form_validation->run()==false) {
            $data = array(
                'tittle' => 'login'
            );
             // panggil form login

            return $this->load->view('view_login');
        }else{
            // jika form == 1, lanjut ke proses login
            // untuk di cek username dan passowrdnya true or false
            $this->login_proses();
        }
    }

    function login_proses()
    {
        // ini menerima data yang di kirim dari form login
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        // data yang di dapatkan di atas akan di olah dalam bentuk array,
        // nantinya data akan otomatis di cocokan dengan column di db 
        $data = array(
            // sesuaikan column di db
            'User_id' => $username,
            'Password' => md5($password)
        );

        // disini di cek data yang di inputkan user sesuai atau tidak
        // jika sesuai atau ada maka nanti akan sukses login
        $cek_data = $this->Auth_model->getLogin('user',$data)->num_rows();

        if ($cek_data > 0) {
            // data yang berhasil login akan di ambil untuk session
            // jadi setiap user akan di tampilkan namanya di dashboard
            $cek_data = $this->Auth_model->getLogSe($username);
            $cek_ar = $cek_data[0]['Nama'];
            // print_r($cek_ar);
            // $cek_sess = $this->Auth_model->getName('karyawan',$cek_ar)->result_array();
            // $data_arr = $cek_sess[0]['Nama'];
            $sess_data = array(
                'username' => $cek_ar,
                'status' => 'login'
            );

            // for session sending
            $this->session->set_userdata($sess_data);
            redirect('dashboard');

        }else{
            // jika username/pass salah / tidak sesuai
            // muncull flash message berikut
            $this->session->set_flashdata('message','<div class="alert alert-warning" role="alert">Name or Password Wrong, Please Try Again</div>');
            redirect('auth');
        }
    }

    function logout()
    {
        $this->session->sess_destroy();
        redirect('auth');
    }
}