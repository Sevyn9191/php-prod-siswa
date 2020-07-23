<?php

class Pembayaran_model extends CI_Model
{
    function getData()
    {
        return $this->db->query("SELECT * FROM kwitansi JOIN karyawan ON kwitansi.Kd_Karyawan = karyawan.Kd_Karyawan ");
    }
    function getDataK($kd)
    {
        return $this->db->query("SELECT Kd_Karyawan FROM karyawan WHERE Nama='$kd' ")->result_array();
    }

    function getNis($data)
    {
        return $this->db->query("SELECT * FROM pendaftaran JOIN siswa ON pendaftaran.No_Daftar = siswa.No_Daftar WHERE pendaftaran.No_Daftar = '$data'  or siswa.Nis = '$data' ");
    }

    function getNd($data)
    {
        return $this->db->query("SELECT * FROM pendaftaran WHERE No_Daftar = '$data' ");
    }
    function getNdi($data)
    {
        return $this->db->query("SELECT * FROM pendaftaran JOIN siswa ON pendaftaran.No_Daftar = siswa.No_Daftar WHERE pendaftaran.No_Daftar = '$data'  or siswa.Nis = '$data' ");
    }

    function getNoD($data)
    {
        return $this->db->query("SELECT * FROM pendaftaran JOIN siswa ON pendaftaran.No_Daftar = siswa.No_Daftar WHERE pendaftaran.No_Daftar = '$data'  or siswa.Nis = '$data' ");
    }

    function getIdKar($table,$data)
    {
        return $this->db->get_where($table,$data)->result_array();
    }

    function getIdK($id)
    {
        return $this->db->query('SELECT * FROM kwitansi WHERE No_Kwitansi = "'.$id.'" ');
    }
    function insertKwit($table,$data)
    {
        return $this->db->insert($table,$data);
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
          foreach ($sql->result_array() as $key) {
              $tmp = ((int) $key['id'])+1;
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
//    function getBiaya($table,$data)
//    {
//        return $this->db->get_where($table,$data)->result_array();
//    }
   function getBiaya($table)
   {
       return $this->db->get($table);
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

   function get_amo($by,$amo)
   {
       return $this->db->query("SELECT '$amo' * Besar_Biaya as yo FROM Biaya WHERE  Kd_Biaya = '$by' ");
   }
   function insert_byr($kwit,$by,$amo)
   {
       return $this->db->query("INSERT INTO isi VALUES ('$kwit','$by','$amo')");
   }

   function sele_byr($kwit)
   {
    return $this->db->query("SELECT* FROM isi WHERE  No_Kwitansi = '$kwit' ");
   }

   function sele_nm($kwit)
   {
       return $this->db->query("SELECT * FROM kwitansi JOIN siswa ON kwitansi.No_Daftar = siswa.No_Daftar JOIN pendaftaran ON siswa.No_Daftar = pendaftaran.No_Daftar WHERE kwitansi.No_Kwitansi = '$kwit' ");
   }

   function print_yuk($kd)
   {
    return $this->db->query("SELECT * FROM kwitansi JOIN isi ON  kwitansi.No_Kwitansi = isi.No_Kwitansi JOIN biaya ON isi.Kd_Biaya = biaya.Kd_Biaya WHERE isi.No_Kwitansi= '$kd' ")->result_array();
   }

   function data_amo($kwit)
   {
    return $this->db->query("SELECT SUM(Jumlah) as yo FROM isi WHERE  No_Kwitansi = '$kwit' ")->result_array();
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