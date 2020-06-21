<?php

class Auth_model extends CI_Model
{
    function getLogin($table,$data)
    {
        return $this->db->get_where($table,$data);
        // data yang di kirim dari form login di cek disini
        // var table adalah nama table di db
        // var data adalah data yang di kirim dari dash login
    }

    function getLogSe($user)
    {
        return $this->db->query("SELECT * FROM user JOIN karyawan ON user.NIK = karyawan.NIK WHERE User_id = '$user' ")->result_array();
    }

}