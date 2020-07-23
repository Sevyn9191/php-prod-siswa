<?php

class Kwitansi_model extends CI_Model
{
    function getData()
    {
        return $this->db->query("SELECT * FROM kwitansi JOIN karyawan ON kwitansi.Kd_Karyawan = karyawan.Kd_Karyawan JOIN pendaftaran ON karyawan.Kd_Karyawan = pendaftaran.Kd_Karyawan JOIN biaya ON pendaftaran.Kd_karyawan = biaya.Kd_Karyawan JOIN isi ON biaya.Kd_Biaya = isi.Kd_Biaya ");
    }
    function getDataK($kd)
    {
        return $this->db->query("SELECT Kd_Karyawan FROM karyawan WHERE Nama='$kd' ")->result_array();
    }

    function cek_san($id)
    {
        return $this->db->query("SELECT * FROM siswa WHERE Nis = '$id' ")->result_array();
    }

    function getAdmin($table,$id)
    {
        return $this->db->get_where($table,$id)->result_array();
    }

    public function idOk()
   {
       $sql = $this->db->query("SELECT MAX(RIGHT(No_Kwitansi,4)) as id FROM kwitansi");
       $kd = "";   
      if ($sql->num_rows() > 0) {
          foreach ($sql->result() as $key) {
              $tmp = ((int) $key->id)+1;
              $kd = sprintf("%04s", $tmp);
              $yo = 'KI-'.$kd;
          }
      }else{
          $yo="KI-0001";
      }
  
      return $yo;
   }

   function insert_isi($table,$data)
   {
       return $this->db->insert($table,$data);
   }
   function insert_kwi($table,$data)
   {
       return $this->db->insert($table,$data);
   }

   function cek_by()
   {
       return $this->db->query("SELECT * FROM biaya");
   }
   function getBiaya($table,$data)
   {
       return $this->db->get_where($table,$data)->result_array();
   }
   function getBy($table,$data)
   {
       return $this->db->get_where($table,$data)->result_array();
   }

   function update_biaya($where,$data,$table)
   {
      $this->db->where($where);
      $this->db->update($table,$data);
   }

   function delete_biaya($where,$table)
   {
       $this->db->where($where);
       $this->db->delete($table);
   }

   function getTes($id)
   {
       return $this->db->get_where('siswa',$id)->result_array();
   }

   function print_kw($id)
   {
       return $this->db->query("SELECT * FROM siswa JOIN kwitansi ON siswa.Nis = Kwitansi.Nis JOIN isi ON kwitansi.No_Kwitansi = isi.No_Kwitansi JOIN biaya ON isi.kd_biaya=biaya.kd_biaya WHERE kwitansi.No_Kwitansi = '$id' ")->result_array();
   }

   function print_daftar($id)
   {
       return $this->db->query("SELECT * FROM pendaftaran WHERE No_daftar = '$id' ")->result_array();
   }

   function print_siswa($id)
   {
       return $this->db->query("SELECT * FROM siswa WHERE Nis = '$id' ")->result_array();
   }


}