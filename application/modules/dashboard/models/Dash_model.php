<?php

class Dash_model extends CI_Model
{
    function getCount()
    {
        return $this->db->query("SELECT COUNT(*) QTY FROM pendaftaran")->result_array();
    }
    function getCount2()
    {
        return $this->db->query("SELECT COUNT(*) QTY FROM siswa")->result_array();
    }
    function getCount3()
    {
        return $this->db->query("SELECT COUNT(*) QTY FROM biaya")->result_array();
    }
    function getCount4()
    {
        return $this->db->query("SELECT COUNT(*) QTY FROM kwitansi")->result_array();
    }
}