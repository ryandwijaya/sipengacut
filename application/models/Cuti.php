<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Cuti extends CI_Model{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function getCuti(){
        $this->db->order_by('cuti_date_created','DESC');
        $this->db->join('simpeg_pegawai','simpeg_pegawai.pegawai_id = simpeg_cuti.cuti_pegawai_id');
        $query = $this->db->get('simpeg_cuti');
        return $query->result_array();
    }
     function getPengajuan($id){
        $this->db->order_by('cuti_date_created','DESC');
        $this->db->join('simpeg_pegawai','simpeg_pegawai.pegawai_id = simpeg_cuti.cuti_pegawai_id');
        $this->db->where('simpeg_cuti.cuti_id',$id);
        $this->db->where('simpeg_cuti.cuti_on_delete','0');
        $query = $this->db->get('simpeg_cuti');
        return $query->result_array();
    }
     function getPengajuanByPegawai($id){
        $this->db->order_by('cuti_date_created','DESC');
        $this->db->join('simpeg_pegawai','simpeg_pegawai.pegawai_id = simpeg_cuti.cuti_pegawai_id');
        $this->db->where('simpeg_cuti.cuti_pegawai_id',$id);
        $this->db->where('simpeg_cuti.cuti_on_delete','0');
        $query = $this->db->get('simpeg_cuti');
        return $query->result_array();
    }
   
    function getCutiById($id){
        $this->db->where('cuti_id',$id);
        $query = $this->db->get('simpeg_cuti');
        return $query->row_array();
    }

    function countCutiByTahun($pegawai,$tahun){
        $this->db->select('*');
        $this->db->where('cuti_pegawai_id',$pegawai);
        $this->db->where('year(cuti_date_created)',$tahun);
        $query = $this->db->get('simpeg_cuti');
        return $query->result_array();
    } 
    

    function getAllCutiByAcc($v1,$v2,$status){
        $this->db->order_by('cuti_date_created','DESC');
        $this->db->where('cuti_acc_pimpinan',$v1);
        $this->db->where('cuti_acc_supervisor',$v2);
        $this->db->where('cuti_status',$status);
        $this->db->join('simpeg_pegawai','simpeg_pegawai.pegawai_id = simpeg_cuti.cuti_pegawai_id');
        $query = $this->db->get('simpeg_cuti');
        return $query->result_array();
    }

    function checkPengajuan($id_pegawai){
        $this->db->order_by('cuti_date_created','DESC');
        $this->db->where('cuti_pegawai_id',$id_pegawai);
        $this->db->where('cuti_status_selesai','belum');
        $query = $this->db->get('simpeg_cuti');
        return $query->result_array();
    }
    function get_pengajuan($id_pegawai){
        $this->db->order_by('cuti_date_created','DESC');
        $this->db->where('cuti_pegawai_id',$id_pegawai);
        $query = $this->db->get('simpeg_cuti');
        return $query->result_array();
    }
    function getCutiByStatus($key,$status){
        $this->db->where($key,$status);
        $query = $this->db->get('simpeg_cuti');
        return $query->result_array();
    }

    function post($data){
        return $this->db->insert('simpeg_cuti',$data);
    }
    function delete($id){
        $this->db->where('cuti_id',$id);
        return $this->db->delete('simpeg_cuti');
    }
    
    function edit($id,$data){
        $this->db->where('cuti_id', $id);
        return $this->db->update('simpeg_cuti', $data);
    }
    
}


