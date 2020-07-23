function edit()
    {
        $id = htmlspecialchars($this->input->get('id'));

       

        // $this->form_validation->set_rules('no_daftar', 'Your Date','required');
        // $this->form_validation->set_rules('kd_karyawan', 'Your Date','required');
        $this->form_validation->set_rules('nama', 'Your Name','required');
        $this->form_validation->set_rules('asal_sekolah', 'Your School','required');
        $this->form_validation->set_rules('tmpt_lahir', 'Isi Cuy','required');
        $this->form_validation->set_rules('tgl_lahir', 'Your Born','required');
        $this->form_validation->set_rules('gender', 'Your gender','required');
        $this->form_validation->set_rules('alamat', 'Your Born','required');
        $this->form_validation->set_rules('father_name', 'Your Born','required');
        $this->form_validation->set_rules('mother_name', 'Your Born','required');
        $this->form_validation->set_rules('alamat_ortu', 'Your Born','required');
        $this->form_validation->set_rules('stud_phon', 'Your Born','required');
        // $this->form_validation->set_rules('wali', 'Your Born','required');
        // $this->form_validation->set_rules('alamat_wali', 'Your Born','required');
    
            if ($this->form_validation->run()==false) {
                $data = array(
                    'tittle' => 'pendaftaran'
                );
            
                $data_id = array(
                    'Nis' => $id
                );
        
                $data['lumia'] = $this->Pendaftaran_model->getSiswa('siswa',$data_id);
                // $lumia = json_encode($data);
                $this->load->view('header');
                $this->load->view('edit',$data);
                $this->load->view('footer');
                
            }else{
                 $this->edit_proses();
                
            }

    }

    function edit_proses()
    {
        $no_daftar = $this->input->post('no_daftar');
        $nis = $this->input->post('nis');
        $kd_kar = $this->input->post('kd_karyawan');
        $nama = $this->input->post('nama');
        $asal_sekolah = $this->input->post('asal_sekolah');
        $tmpt_lahir = $this->input->post('tmpt_lahir');
        $tgl_lahir = $this->input->post('tgl_lahir');
        $gender = $this->input->post('gender');
        $alamat = $this->input->post('alamat');
        $father_name = $this->input->post('father_name');
        $mother_name = $this->input->post('mother_name');
        $alamat_ortu = $this->input->post('alamat_ortu');
        $stud_phon = $this->input->post('stud_phon');
        $agama = $this->input->post('religion');
        $wali = $this->input->post('wali');
        $alamat_wali = $this->input->post('alamat_wali');
         
        $data = array(
            'Nm_Sis' => $nama,
            'As_Sek' => $asal_sekolah,
            'Tmpt_Lahir' => $tmpt_lahir,
            'Tgl_Lhr_Sis '=>$tgl_lahir,
            'Jen_Kel' => $gender,
            'Agama_Sis' =>$agama,
            'Almt_Sis' => $alamat,
            'Nm_Ayah_Sis' => $father_name,
            'Nm_Ibu_Sis' => $mother_name,
            'Al_Ortu_Sis' => $alamat_ortu,
            'No_HP_Sis' => $stud_phon,
            'Nm_Wali'=>$wali,
            'Al_Wali'=>$alamat_wali,
            'No_Daftar'=>$no_daftar,
            'Kd_Karyawan' =>$kd_kar
        );
 
         $where = array(
            'Nis' => $nis
         );
        //  print_r($data);
         
         $data_ins = $this->Pendaftaran_model->update_siswa($where,$data,'siswa');
         $this->session->set_flashdata('success','<div class="alert alert-warning" role="alert">Succesfully Edit Data</div>');
         redirect('siswa');
    }

    function delete()
    {
        $id = htmlspecialchars($this->input->get('id'));

        $where = array(
            'Nis' => $id
        );

        $data = $this->Pendaftaran_model->delete_siswa($where,'siswa');
        if ($data) {
            $this->session->set_flashdata('success','<div class="alert alert-warning" role="alert">Succesfully delete Data</div>');
            redirect('siswa');
        }
    }

    function add()
    {

        $this->load->view('header');
        $this->load->view('add');
        $this->load->view('footer');

        $this->form_validation->set_rules('no_daftar', 'Your Date','required');
        // $this->form_validation->set_rules('kd_karyawan', 'Your Date','required');
        $this->form_validation->set_rules('nama', 'Your Name','required');
        $this->form_validation->set_rules('asal_sekolah', 'Your School','required');
        $this->form_validation->set_rules('tmpt_lahir', 'Isi Cuy','required');
        $this->form_validation->set_rules('tgl_lahir', 'Your Born','required');
        $this->form_validation->set_rules('gender', 'Your gender','required');
        $this->form_validation->set_rules('alamat', 'Your Born','required');
        $this->form_validation->set_rules('father_name', 'Your Born','required');
        $this->form_validation->set_rules('mother_name', 'Your Born','required');
        $this->form_validation->set_rules('alamat_ortu', 'Your Born','required');
        $this->form_validation->set_rules('stud_phon', 'Your Born','required');
        // $this->form_validation->set_rules('wali', 'Your Born','required');
        // $this->form_validation->set_rules('alamat_wali', 'Your Born','required');

        if ($this->form_validation->run()==false) {
            $data = array(
                'tittle' => 'pendaftaran'
            );
            // $id = $this->input->get('id');

            // $id_d = array(
            //     'No_Daftar'=>$id
            // );
            
            // $data['lumia'] = $this->Pendaftaran_model->getDaftar('pendaftaran'S);
            // $this->load->view('header');
            // $this->load->view('add',$data);
            // $this->load->view('footer');



        }else{
             $this->add_proses();
        }
        
    }
    
    function add_proses()
    {

        $no_daftar = $this->input->post('no_daftar');
        $nama = $this->input->post('nama');
        $asal_sekolah = $this->input->post('asal_sekolah');
        $tmpt_lahir = $this->input->post('tmpt_lahir');
        $tgl_lahir = $this->input->post('tgl_lahir');
        $gender = $this->input->post('gender');
        $alamat = $this->input->post('alamat');
        $father_name = $this->input->post('father_name');
        $mother_name = $this->input->post('mother_name');
        $alamat_ortu = $this->input->post('alamat_ortu');
        $stud_phon = $this->input->post('stud_phon');
        $agama = $this->input->post('religion');
        $wali = $this->input->post('wali');
        $alamat_wali = $this->input->post('alamat_wali');

        $sess = $this->session->userdata('username');
        $sess_dt = array(
            'Nama' => $sess
        );
        $cek_kd = $this->Pendaftaran_model->getIdK('karyawan',$sess_dt);

        $kd_kar = $cek_kd[0]['Kd_Karyawan'];

        $idOto = $this->Pendaftaran_model->autoId('siswa',$sess_dt);
     
        $data = array(
            'Nis'=>$idOto,
            'Nm_Sis' => $nama,
            'As_Sek' => $asal_sekolah,
            'Tmpt_Lahir' => $tmpt_lahir,
            'Tgl_Lhr_Sis '=>$tgl_lahir,
            'Jen_Kel' => $gender,
            'Agama_Sis' =>$agama,
            'Almt_Sis' => $alamat,
            'Nm_Ayah_Sis' => $father_name,
            'Nm_Ibu_Sis' => $mother_name,
            'Al_Ortu_Sis' => $alamat_ortu,
            'No_HP_Sis' => $stud_phon,
            'Nm_Wali'=>$wali,
            'Al_Wali'=>$alamat_wali,
            'No_Daftar'=>$no_daftar,
            'Kd_Karyawan' =>$kd_kar
        );

        $where = array(
            'No_Daftar' => $no_daftar
        );
        
        $insert_yo = $this->Pendaftaran_model->insert_sis('siswa',$data);

        if ($insert_yo) {
            // $delte_master  = $this->Pendaftaran_model->delete_mas($where,'pendaftaran');
            $this->session->set_flashdata('success','<div class="alert alert-warning" role="alert">Succesfully Insert Data</div>');
            redirect('siswa');
        }

    }