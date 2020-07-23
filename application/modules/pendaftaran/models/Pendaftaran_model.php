<?php

class Pendaftaran_model extends CI_Model
{
    function getData()
    {
        return $this->db->get('pendaftaran');
    }

    public function autoId()
   {
       $sql = $this->db->query("SELECT MAX(RIGHT(No_Daftar,4)) as id FROM pendaftaran");
       $kd = "";   
      if ($sql->num_rows() > 0) {
          foreach ($sql->result() as $key) {
              $tmp = ((int) $key->id)+1;
              $kd = sprintf("%04s", $tmp);
              $yo = 'DF-'.$kd;
          }
      }else{
          $yo="DF-0001";
      }
  
      return $yo;
   }

   function insert_sis($table,$data)
   {
       return $this->db->insert($table,$data);
   }

   function getDaftar($table,$data)
   {
       return $this->db->get_where($table,$data)->result_array();
   }
   function getSiswa($table,$data)
   {
       return $this->db->get_where($table,$data)->result_array();
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

   function print($id)
   {
    return $this->db->query('SELECT * FROM pendaftaran WHERE No_Daftar = "'.$id.'" ')->result_array();
   }

   function print_lap()
   {
    return $this->db->query('SELECT * FROM pendaftaran')->result_array();
   }

}