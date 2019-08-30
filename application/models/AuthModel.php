<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class AuthModel extends CI_Model{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    function getUser(){
        $this->db->order_by('user_date_created','DESC');
        $query = $this->db->get('simpeg_user');
        return $query->result_array();
    }
    function getUsers($user){
        return $this->db->get_where('simpeg_user',$user);
    }
    function getPegawai($user){
        return $this->db->get_where('simpeg_pegawai',$user);
    }

    
    function getUserAccount($user){
        $query = $this->db->get_where('simpeg_user',$user);
        return $query->row_array();
    }
    function getPegawaiAccount($pegawai){
        $query = $this->db->get_where('simpeg_pegawai',$pegawai);
        return $query->row_array();
    }
    function getUserByUsername($username)
    {
        $this->db->from('simpeg_user');
        $this->db->where('user_username',$username);
        $query = $this->db->get();
        return $query->row_array();
    }
    function createUser($dataUser)
    {
        return $this->db->insert('simpeg_user',$dataUser);
    }
    function deleteUser($id)
    {
        $this->db->where('user_id',$id);
        return $this->db->delete('simpeg_user');
    }
    function UbahPassword($data,$id)
    {

        $this->db->where('username',$id);
        $this->db->update('simpeg_user',$data);
    }
}


