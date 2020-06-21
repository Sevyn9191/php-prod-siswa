<?php

class Biaya_model extends CI_Model
{
    function getData()
    {
        return $this->db->query("SELECT * FROM biaya JOIN karyawan ON biaya.Kd_Karyawan = karyawan.Kd_Karyawan ");
    }

    function getAdmin($table,$id)
    {
        return $this->db->get_where($table,$id)->result_array();
    }

    public function autoId()
   {
       $sql = $this->db->query("SELECT MAX(RIGHT(Kd_Biaya,4)) as id FROM biaya");
       $kd = "";   
      if ($sql->num_rows() > 0) {
          foreach ($sql->result() as $key) {
              $tmp = ((int) $key->id)+1;
              $kd = sprintf("%04s", $tmp);
              $yo = 'HR-'.$kd;
          }
      }else{
          $yo="HR-0001";
      }
  
      return $yo;
   }

   function insert_biaya($table,$data)
   {
       return $this->db->insert($table,$data);
   }

   function getBiaya($table,$data)
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

}