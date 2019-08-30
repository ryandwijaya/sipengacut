<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai extends CI_Model{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function getPegawai()
    {
        $this->db->select('*');
        $this->db->order_by('date_created','DESC');
        $this->db->from('simpeg_pegawai');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getPegawaiByStatus($key)
    {
        $this->db->select('*');
        $this->db->where('pegawai_status',$key);
        $this->db->order_by('date_created','DESC');
        $this->db->from('simpeg_pegawai');
        $query = $this->db->get();
        return $query->result_array();
    }
    function getJabatanById($id){
        $this->db->select('*');
        $this->db->from('simpeg_jabatan');
        $this->db->where('jabatan_id',$id);
        $query = $this->db->get();
        return $query->row_array();
    }
    public function getPegawaiById($id)
    {
        $this->db->select('*');
        $this->db->from('simpeg_pegawai');
        $this->db->join('simpeg_jabatan', 'simpeg_jabatan.jabatan_id = simpeg_pegawai.pegawai_jabatan');
        $this->db->where('simpeg_pegawai.pegawai_id',$id);
        $query = $this->db->get();
        return $query->row_array();
    }
    public function get_one($id)
    {
        $this->db->select('*');
        $this->db->from('simpeg_pegawai');
        $this->db->where('pegawai_id',$id);
        $query = $this->db->get();
        return $query->row_array();
    }
   
    function getJabatan(){
        $query = $this->db->get('simpeg_jabatan');
        return $query->result_array();
    }

    
    
    function post($data){
        return $this->db->insert('simpeg_pegawai',$data);
    }
    function delete($id){
        $this->db->where('pegawai_id',$id);
        return $this->db->delete('simpeg_pegawai');
    }
    
    function edit($id,$data){
        $this->db->where('pegawai_id', $id);
        return $this->db->update('simpeg_pegawai', $data);
    }

}


