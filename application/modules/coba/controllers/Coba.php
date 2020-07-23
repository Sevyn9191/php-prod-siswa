<?php

class Coba extends MX_Controller
{
    function __construct()
    {
        parent::__construct();
        // if ($this->session->userdata('status')!='login') {
        //     redirect('auth');
        // }
        $this->load->library('form_validation');
        $this->load->model('Df_model');
    }

    function index()
    {
        $data['cups'] = $this->Df_model->getData()->result_array();
            // $this->load->view('header');
            $this->load->view('index');
            // $this->load->view('footer');
            
    }

    function goal()
    {
        $tgl = $this->input->post('tgl');

        // print_r($tgl);
        $jim = explode(" ",$tgl);
        // print_r($jim);
        $jam = $jim[0];
        $jam1 = $jim[2];
        print_r($jam);
        echo "<br>";
        print_r($jam1);
    }


}