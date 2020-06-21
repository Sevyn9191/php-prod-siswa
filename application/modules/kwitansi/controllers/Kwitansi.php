<?php

class Kwitansi extends MX_Controller
{

    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('status') != 'login') {
            redirect(base_url('auth'));
        }

        // load model
        $this->load->model('Kwitansi_model');
        $this->load->library('form_validation');
        
    }

    function index()
    {

        $data['cups'] = $this->Kwitansi_model->getData()->result_array();
        $this->load->view('header');
        $this->load->view('index',$data);
        $this->load->view('footer');
    }

    function delete()
    {
        $id = htmlspecialchars($this->input->get('id'));

        $where = array(
            'Kd_Biaya' => $id
        );

        $data = $this->Kwitansi_model->delete_biaya($where,'biaya');
        $this->session->set_flashdata('success','<div class="alert alert-success" role="alert">Successfully Delete Data</div>');
        redirect('biaya');
    }

    function print()
    {
            $nis = $this->input->get('id');

            $this->form_validation->set_rules('date', 'Your Date','required');
            $this->form_validation->set_rules('biaya', 'Your Name','required');

            if ($this->form_validation->run()==false) {
                $data = array(
                    'tittle' => 'kwitansi'
                );

                $cek['lumia'] = $this->Kwitansi_model->cek_by()->result_array();
                $cek['samsan'] = $this->Kwitansi_model->cek_san($nis);
                $this->load->view('header');
                $this->load->view('add_view',$cek);
                $this->load->view('footer');
            }else{
                 $this->proses_kui($nis);
                
            }
    
    }

    function proses_kui()
    {
        $idOto = $this->Kwitansi_model->idOk();

        $kd_k = $this->session->userdata('username');
        // $nis_o = $this->input->get($nis);

        $get_k = $this->Kwitansi_model->getDataK($kd_k);
        $cek_k = $get_k[0]['Kd_Karyawan'];
        $date = $this->input->post('date');
        $nis = $this->input->post('nis');
        $kd_by =  $this->input->post('biaya');

        $data_kwi = array(
            'No_Kwitansi' => $idOto,
            'Tgl_Kwitansi' => $date,
            'Nis'=> $nis,
            'Kd_Karyawan'=>$cek_k
        );

        $kd_by_ss = array(
            'Kd_Biaya' => $kd_by
        );

        $kd_by_cek = $this->Kwitansi_model->getBy('biaya',$kd_by_ss);

        $jumlah = $kd_by_cek[0]['Besar_Biaya'];
        $data_isi = array(
            'No_Kwitansi' => $idOto,
            'Kd_Biaya' => $kd_by,
            'Jumlah' => $jumlah
        );

        $data_kwit = $this->Kwitansi_model->insert_kwi('kwitansi',$data_kwi);
        if ($data_kwit) {
            $this->Kwitansi_model->insert_isi('isi',$data_isi);
            $this->session->set_flashdata('success','<div class="alert alert-success" role="alert">Successfully Added Data</div>');
            // redirect('kwitansi/print_proses',$data);
            $this->print_proses($data_isi);
            // $this->print_proses($data_isi);
        }
        

    }

    function print_proses($data_isi)
    {

        $data_x = $data_isi['No_Kwitansi'];
        // print_r($data);
        $data['lumia'] = $this->Kwitansi_model->print_kw($data_x);
        $this->load->view('header');
        $this->load->view('print_kw',$data);
        $this->load->view('footer');
    }
    function print_ok()
    {
        $id = $this->input->get('id');


        $data['lumia'] = $this->Kwitansi_model->print_kw($id);
        $this->load->view('header');
        $this->load->view('print_out',$data);
        $this->load->view('footer');
    }

    

}