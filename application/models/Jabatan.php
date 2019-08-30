<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Jabatan extends CI_Model{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function getJabatan()
    {
        $this->db->select('*');
        $this->db->from('simpeg_jabatan');
        $this->db->order_by('jabatan_nama','ASC');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function getJabatanById($id)
    {
        $this->db->where('jabatan_id',$id);
        $this->db->select('*');
        $this->db->from('simpeg_jabatan');
        $query = $this->db->get();
        return $query->row_array();
    }
        
    function post($data){
        return $this->db->insert('simpeg_jabatan',$data);
    }
    function delete($id){
        $this->db->where('jabatan_id',$id);
        return $this->db->delete('simpeg_jabatan');
    }
    
    function edit($id,$data){
        $this->db->where('jabatan_id', $id);
        return $this->db->update('simpeg_jabatan', $data);
    }

}


