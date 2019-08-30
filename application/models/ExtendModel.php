<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ExtendModel extends CI_Model{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function getHubunganByPegawai($id_pegawai){
        $this->db->where('hubungan_pegawai_id',$id_pegawai);
        $query = $this->db->get('simpeg_hubungan');
        return $query->result_array();
    }
    function getPendidikanByPegawai($id_pegawai){
        $this->db->where('pendidikan_pegawai_id',$id_pegawai);
        $query = $this->db->get('simpeg_pendidikan');
        return $query->result_array();
    }
    function getPenghargaanByPegawai($id_pegawai){
        $this->db->where('penghargaan_pegawai_id',$id_pegawai);
        $query = $this->db->get('simpeg_penghargaan');
        return $query->result_array();
    }
    function getPelatihanByPegawai($id_pegawai){
        $this->db->where('pelatihan_pegawai_id',$id_pegawai);
        $query = $this->db->get('simpeg_pelatihan');
        return $query->result_array();
    }
    function getSeminarByPegawai($id_pegawai){
        $this->db->where('seminar_pegawai_id',$id_pegawai);
        $query = $this->db->get('simpeg_seminar');
        return $query->result_array();
    }
    function post($table,$data){
        return $this->db->insert($table,$data);
    }
    function delete($key,$id,$table){
        $this->db->where($key,$id);
        return $this->db->delete($table);
    }

   
}


