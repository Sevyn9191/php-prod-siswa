<?php

class Dashboard extends MX_Controller
{

    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('status') != 'login') {
            redirect(base_url('auth'));
        }
        // load model
        
        $this->load->model('Dash_model');
    }

    function index()
    {
        $data= $this->Dash_model->getCount();
        $data_ex['count'] = $data[0]['QTY'];

        $data= $this->Dash_model->getCount2();
        $data_ex['count2'] = $data[0]['QTY'];

        $data= $this->Dash_model->getCount3();
        $data_ex['count3'] = $data[0]['QTY'];

        // $data= $this->Dash_model->getCount4();
        // $data_ex['count4'] = $data[0]['QTY'];

        $sess = $this->session->userdata('username');

        $this->load->view('header');
        $this->load->view('index',$data_ex);
        $this->load->view('footer');
    }

    function kontak()
    {
        $this->load->view('header');
        $this->load->view('view_kontak');
        $this->load->view('footer');
    }
}