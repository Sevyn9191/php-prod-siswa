<?php

class Daftar_model extends CI_Model
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
              $yo = 'CS-'.$kd;
          }
      }else{
          $yo="CS-0001";
      }
  
      return $yo;
   }

   function insert_daftar($table,$data)
   {
       return $this->db->insert($table,$data);
   }

   function getPendaftar($table,$data)
   {
       return $this->db->get_where($table,$data)->result_array();
   }

   function update_daftar($where,$data,$table)
   {
      $this->db->where($where);
      $this->db->update($table,$data);
   }

   function delete_daftar($where,$table)
   {
       $this->db->where($where);
       $this->db->delete($table);
   }



}