<?php

class Admin_model extends CI_Model
{
    function getData()
    {
        return $this->db->get('karyawan');
    }

    function getAdmin($table,$id)
    {
        return $this->db->get_where($table,$id)->result_array();
    }

    public function nikGet()
   {
       $sql = $this->db->query("SELECT MAX(RIGHT(NIK,4)) as id FROM user");
       $kd = "";   
      if ($sql->num_rows() > 0) {
          foreach ($sql->result() as $key) {
              $tmp = ((int) $key->id)+1;
              $kd = sprintf("%04s", $tmp);
              $yo = 'US-'.$kd;
          }
      }else{
          $yo="US-0001";
      }
  
      return $yo;
   }
    public function kdGet()
   {
       $sql = $this->db->query("SELECT MAX(RIGHT(Kd_Karyawan,4)) as id FROM karyawan");
       $kd = "";   
      if ($sql->num_rows() > 0) {
          foreach ($sql->result() as $key) {
              $tmp = ((int) $key->id)+1;
              $kd = sprintf("%04s", $tmp);
              $yo = 'KR-'.$kd;
          }
      }else{
          $yo="KR-0001";
      }
  
      return $yo;
   }

   function cekUser($username,$nama)
   {
       return $this->db->query("SELECT * FROM user JOIN karyawan ON user.NIK = karyawan.NIK WHERE User_id = '$username' OR Nama='$nama' ");
   }

   function insert_kar($table,$data)
   {
       return $this->db->insert($table,$data);
   }
   function insert_user($table,$data)
   {
       return $this->db->insert($table,$data);
   }

   function getKaryawan($table,$data)
   {
       return $this->db->get_where($table,$data)->result_array();
   }

   function update_admin($where,$data,$table)
   {
      $this->db->where($where);
      $this->db->update($table,$data);
   }

   function delete_admin($where)
   {
        return $this->db->query("DELETE FROM user WHERE NIK = '$where' ");
   }

}