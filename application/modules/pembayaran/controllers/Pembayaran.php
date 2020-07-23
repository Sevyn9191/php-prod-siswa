<?php

class Pembayaran extends MX_Controller
{

    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('status') != 'login') {
            redirect(base_url('auth'));
        }

        // load model
        $this->load->model('Pembayaran_model');
        $this->load->library('form_validation');
        
    }

    function index()
    {

        
        $this->load->view('header');
        $this->load->view('add');
        $this->load->view('footer');
        // print_r($data);
    }

    function bayar()
    {
        $nis = $this->input->post('nis');
        $tgl = date('Y-m-d');
        $karyawan = $this->input->post('karyawan');
        // $nis_arr = array(
        //     'Nis'=>$nis
        // );
        $data ='';
        $cek_nis = $this->Pembayaran_model->getNis($nis)->num_rows();
        $cek_nd = $this->Pembayaran_model->getNd($nis)->num_rows();
        $sess_dt = array(
            'Nama' => $karyawan
        );
        $cek_kd = $this->Pembayaran_model->getIdKar('karyawan',$sess_dt);

        $kd_kar = $cek_kd[0]['Kd_Karyawan'];
        $id  = $this->Pembayaran_model->idOk();
        if ($cek_nis > 0 || $cek_nd > 0) {
            $grab = $this->Pembayaran_model->getNdi($nis)->num_rows();
            if ($grab > 0) {
                $get_no = $this->Pembayaran_model->getNoD($nis)->result_array();
                $cek_no = $get_no[0]['No_Daftar'];
                $data = array(
                    'No_Kwitansi'=>$id,
                    'Tgl_Kwitansi'=>$tgl,
                    'Nis'=>$nis,
                    'Kd_Karyawan'=>$kd_kar,
                    'No_Daftar'=>$cek_no
                );
            }else{
                $data = array(
                    'No_Kwitansi'=>$id,
                    'Tgl_Kwitansi'=>$tgl,
                    'Nis'=>$nis,
                    'Kd_Karyawan'=>$kd_kar,
                    'No_Daftar'=>$nis
                );
    
            }
            // $get_no = $this->Pembayaran_model->getNoD($nis)->result_array();
            // $$cek_no = $get_no[0]['No_Daftar'];
            // if ($get_no != 0) {
            //     $data = array(
            //         'No_Kwitansi'=>$id,
            //         'Tgl_Kwitansi'=>$tgl,
            //         'Nis'=>$nis,
            //         'Kd_Karyawan'=>$kd_kar,
            //         'No_Daftar'=>$nis
            //     );
    
            // }else{
               
            // }
          
            
            $kwitansi_run =$this->Pembayaran_model->insertKwit('kwitansi',$data);

            if ($kwitansi_run) {
                redirect('pembayaran/proses_byr/'.$id);
            }
            
            
            

        }else{
            $this->session->set_flashdata('fail','<div class="alert alert-warning" role="alert">Nis / No Daftar Not Valid</div>');
            redirect('pembayaran');
        }
    }
    function proses_byr()
    {
        $id_s['cc'] = $this->uri->segment('3');
        $id_s['by'] = $this->Pembayaran_model->getBiaya('biaya')->result_array();
        $this->load->view('header');
        $this->load->view('add_bayar',$id_s);
        $this->load->view('footer');
    }

    function byr_pros()
    {
        $kwit = $this->input->post('kwit');
        $by = $this->input->post('by');
        $amo = $this->input->post('amo');

        // $data = '';/
         
        // if (($kwit == 0) || ($by == 0) || ($amo == 0)){
        //     $data = array('fail'=>'failure');
        // }else{

            $amo_jum = $this->Pembayaran_model->get_amo($by,$amo)->result_array();
            $get_amj = $amo_jum[0]['yo'];
           $this->Pembayaran_model->insert_byr($kwit,$by,$get_amj);
           
                // $sel_byr = $this->Pembayaran_model->sele_byr($kwit)->result_array();
                // $get_byr = $sel_byr[0]['Jumlah'];
                $sel_nm = $this->Pembayaran_model->sele_nm($kwit)->result_array();
                $get_nm = $sel_nm[0]['Nm_CaSis'];

                $data = array(
                    'Nama'=>$get_nm,
                    'Jumlah'=>$get_amj
                );
            
            // }
       
        echo json_encode($data);
        // echo $data;
    }

    function print_yuk()
    {
        $kd = $this->uri->segment('3');
        $data['kd'] = $kd;
        $data['lumia'] = $this->Pembayaran_model->print_yuk($kd);
        $x = $this->Pembayaran_model->data_amo($kd);
        $data['lamia'] = $x[0]['yo'];
        $this->load->view('header');
        $this->load->view('print_out',$data);
        // print_r($data);
    }

    function delete()
    {
        $id = htmlspecialchars($this->input->get('id'));

        $where = array(
            'Kd_Biaya' => $id
        );

        $data = $this->Pembayaran_model->delete_biaya($where,'biaya');
        $this->session->set_flashdata('success','<div class="alert alert-success" role="alert">Successfully Delete Data</div>');
        redirect('biaya');
    }

    function print()
    {
            $nis = $this->input->get('id');

            $this->form_validation->set_rules('username', 'Your Date','required');
            $this->form_validation->set_rules('password', 'Your Name','required');

            if ($this->form_validation->run()==false) {
                $data = array(
                    'tittle' => 'kwitansi'
                );

                $cek['lumia'] = $this->Pembayaran_model->cek_by()->result_array();
                $cek['samsan'] = $this->Pembayaran_model->cek_san($nis);
                $this->load->view('header');
                $this->load->view('add_view',$cek);
                $this->load->view('footer');
            }else{
                 $this->proses_kui($nis);
                
            }
    
    }

    function proses_kui()
    {
        $idOto = $this->Pembayaran_model->idOk();

        $kd_k = $this->session->userdata('username');
        // $nis_o = $this->input->get($nis);

        $get_k = $this->Pembayaran_model->getDataK($kd_k);
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

        $kd_by_cek = $this->Pembayaran_model->getBy('biaya',$kd_by_ss);

        $jumlah = $kd_by_cek[0]['Besar_Biaya'];
        $data_isi = array(
            'No_Kwitansi' => $idOto,
            'Kd_Biaya' => $kd_by,
            'Jumlah' => $jumlah
        );

        $data_kwit = $this->Pembayaran_model->insert_kwi('kwitansi',$data_kwi);
        if ($data_kwit) {
            $this->Pembayaran_model->insert_isi('isi',$data_isi);
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
        $data['lumia'] = $this->Pembayaran_model->print_kw($data_x);
        $this->load->view('header');
        $this->load->view('print_kw',$data);
        $this->load->view('footer');
    }
    function print_ok()
    {
        $id = $this->input->get('id');


        $data['lumia'] = $this->Pembayaran_model->print_kw($id);
        $this->load->view('header');
        $this->load->view('print_out',$data);
        // $this->load->view('footer');
    }

    function print_daftar()
    {
        $id = $this->input->get('id');

        $data['lumia'] = $this->Pembayaran_model->print_daftar($id);
        $this->load->view('header');
        // print_r($data);
        $this->load->view('print_daftar',$data);
    }

    function print_siswa()
    {
        $id = $this->input->get('id');

        $data['lumia'] = $this->Pembayaran_model->print_siswa($id);
        $this->load->view('header');
        // print_r($data);
        $this->load->view('print_siswa',$data);

    }

    

}