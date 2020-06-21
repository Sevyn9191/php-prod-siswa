<?php

class Register_model extends CI_Model
{
   function cekData($data)
   {
       return $this->db->query("SELECT * FROM admin WHERE NmAdmin = '$data' ");
   }

   function insertData($table,$data)
   {
       return $this->db->insert($table,$data);
   }

   public function autoId()
   {
       $sql = $this->db->query("SELECT MAX(RIGHT(KdAdmin,4)) as id FROM admin");
       $kd = "";   
      if ($sql->num_rows() > 0) {
          foreach ($sql->result() as $key) {
              $tmp = ((int) $key->id)+1;
              $kd = sprintf("%04s", $tmp);
              $yo = 'RG-'.$kd;
          }
      }else{
          $yo="RG-0001";
      }
  
      return $yo;
   }


}