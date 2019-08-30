<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Model{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function getUser()
    {
        $this->db->select('*');
        $this->db->from('simpeg_user');
        $this->db->order_by('user_nama','ASC');
        $query = $this->db->get();
        return $query->result_array();
    }
        
    function post($data){
        return $this->db->insert('simpeg_user',$data);
    }
    function delete($id){
        $this->db->where('user_id',$id);
        return $this->db->delete('simpeg_user');
    }
    
    function edit($id,$data){
        $this->db->where('user_id', $id);
        return $this->db->update('simpeg_user', $data);
    }

}


