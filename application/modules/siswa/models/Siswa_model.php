<?php

class Siswa_model extends CI_Model
{
    function getData()
    {
        return $this->db->query('SELECT * FROM siswa JOIN pendaftaran ON siswa.No_Daftar = pendaftaran.No_Daftar');
    }

    public function autoId()
   {
       $sql = $this->db->query("SELECT MAX(RIGHT(Nis,4)) as id FROM siswa");
       $kd = "";   
      if ($sql->num_rows() > 0) {
          foreach ($sql->result() as $key) {
              $tmp = ((int) $key->id)+1;
              $kd = sprintf("%04s", $tmp);
              $yo = 'SW-'.$kd;
          }
      }else{
          $yo="SW-0001";
      }
  
      return $yo;
   }

   function print_lap($nis)
   {
       return $this->db->query("SELECT * FROM siswa JOIN pendaftaran ON siswa.No_Daftar = pendaftaran.No_Daftar WHERE Siswa.Nis = '$nis' ")->result_array();
   }
   function insert_sis($table,$data)
   {
       return $this->db->insert($table,$data);
   }

   function getDaftar($table,$data)
   {
       return $this->db->get_where($table,$data)->result_array();
   }
   function getSiswa($id)
   {
       return $this->db->query("SELECT * FROM siswa JOIN pendaftaran ON siswa.No_Daftar=pendaftaran.No_Daftar WHERE siswa.Nis = '$id' ")->result_array();
   }
   function getIdK($table,$data)
   {
       return $this->db->get_where($table,$data)->result_array();
   }

   function update_siswa($where,$data,$table)
   {
      $this->db->where($where);
      $this->db->update($table,$data);
   }

   function delete_daftar($where,$table)
   {
       $this->db->where($where);
       $this->db->delete($table);
   }
   function delete_siswa($where,$table)
   {
       $this->db->where($where);
       $this->db->delete($table);
   }

   function getOk($table,$id)
   {
       return $this->db->get_where($table,$id)->result_array();
   }

   function update_pen($id)
   {
       return $this->db->query('UPDATE pendaftaran SET status =1 WHERE No_Daftar = "'.$id.'" ');
   }

}