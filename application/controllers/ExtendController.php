<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ExtendController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->load->model('ExtendModel');
        
        $this->load->model('Cuti');
        date_default_timezone_set('Asia/Jakarta');
        // }
        // if (!$this->session->has_userdata('session_nip')){
        //     redirect(site_url('login'));
        // }
        
	}

    public function create_hub($id)
    {
        if (isset($_POST['submit'])) {
           $data = array(
            'hubungan_nama' => $this->input->post('hubungan_nama'), 
            'hubungan_status' => $this->input->post('hubungan_status'), 
            'hubungan_tempat_lahir' => $this->input->post('hubungan_tempat_lahir'), 
            'hubungan_tgl_lahir' => $this->input->post('hubungan_tgl_lahir'), 
            'hubungan_pendidikan' => $this->input->post('hubungan_pendidikan'), 
            'hubungan_pekerjaan' => $this->input->post('hubungan_pekerjaan'), 
            'hubungan_pegawai_id' => $id 
        );
        
        if (count($_POST)>0) {
            $this->ExtendModel->post('simpeg_hubungan',$data);
            $this->session->set_flashdata('alert', 'success_post');
            redirect(site_url('pegawai/detail/'.$id));
        }else{
            $this->session->set_flashdata('alert', 'fail_post');
            redirect(site_url('pegawai/detail/'.$id));
        }


        }  
    }
    
    public function create_penghargaan($id)
    {
        if (isset($_POST['submit'])) {
           $data = array(
            'penghargaan_nama' => $this->input->post('penghargaan_nama'), 
            'penghargaan_tahun' => $this->input->post('penghargaan_tahun'), 
            'penghargaan_pegawai_id' => $id 
        );
        
        if (count($_POST)>0) {
            $this->ExtendModel->post('simpeg_penghargaan',$data);
            $this->session->set_flashdata('alert', 'success_post');
            redirect(site_url('pegawai/detail/'.$id));
        }else{
            $this->session->set_flashdata('alert', 'fail_post');
            redirect(site_url('pegawai/detail/'.$id));
        }


        }  
    }
    public function create_pelatihan($id)
    {
        if (isset($_POST['submit'])) {
           $data = array(
            'pelatihan_nama' => $this->input->post('pelatihan_nama'), 
            'pelatihan_tahun' => $this->input->post('pelatihan_tahun'), 
            'pelatihan_jumlah_jam' => $this->input->post('pelatihan_jumlah_jam'), 
            'pelatihan_pegawai_id' => $id 
        );
        
        if (count($_POST)>0) {
            $this->ExtendModel->post('simpeg_pelatihan',$data);
            $this->session->set_flashdata('alert', 'success_post');
            redirect(site_url('pegawai/detail/'.$id));
        }else{
            $this->session->set_flashdata('alert', 'fail_post');
            redirect(site_url('pegawai/detail/'.$id));
        }


        }  
    }
    public function create_pendidikan($id)
    {
        if (isset($_POST['submit'])) {
           $data = array(
            'pendidikan_tingkat' => $this->input->post('pendidikan_tingkat'), 
            'pendidikan_nama_pt' => $this->input->post('pendidikan_nama_pt'), 
            'pendidikan_lokasi' => $this->input->post('pendidikan_lokasi'), 
            'pendidikan_jurusan' => $this->input->post('pendidikan_jurusan'), 
            'pendidikan_no_ijazah' => $this->input->post('pendidikan_no_ijazah'), 
            'pendidikan_tgl_ijazah' => $this->input->post('pendidikan_tgl_ijazah'), 
            'pendidikan_pegawai_id' => $id 
        );
        
        if (count($_POST)>0) {
            $this->ExtendModel->post('simpeg_pendidikan',$data);
            $this->session->set_flashdata('alert', 'success_post');
            redirect(site_url('pegawai/detail/'.$id));
        }else{
            $this->session->set_flashdata('alert', 'fail_post');
            redirect(site_url('pegawai/detail/'.$id));
        }


        }  
    }

    public function create_seminar($id)
    {
        if (isset($_POST['submit'])) {
           $data = array(
            'seminar_nama' => $this->input->post('seminar_nama'), 
            'seminar_tempat' => $this->input->post('seminar_tempat'), 
            'seminar_penyelenggara' => $this->input->post('seminar_penyelenggara'), 
            'seminar_tgl_mulai' => $this->input->post('seminar_tgl_mulai'), 
            'seminar_tgl_selesai' => $this->input->post('seminar_tgl_selesai'), 
            'seminar_no_piagam' => $this->input->post('seminar_no_piagam'), 
            'seminar_tgl_piagam' => $this->input->post('seminar_tgl_piagam'), 
            'seminar_pegawai_id' => $id 
        );
        
        if (count($_POST)>0) {
            $this->ExtendModel->post('simpeg_seminar',$data);
            $this->session->set_flashdata('alert', 'success_post');
            redirect(site_url('pegawai/detail/'.$id));
        }else{
            $this->session->set_flashdata('alert', 'fail_post');
            redirect(site_url('pegawai/detail/'.$id));
        }


        }  
    }

    public function delete_hub($id){
        $this->ExtendModel->delete('hubungan_id',$id,'simpeg_hubungan');
        $this->session->set_flashdata('alert', 'success_delete');
         redirect(site_url('pegawai/detail/'.$this->session->userdata('session_id')));

    }
    public function delete_penghargaan($id){
        $this->ExtendModel->delete('penghargaan_id',$id,'simpeg_penghargaan');
        $this->session->set_flashdata('alert', 'success_delete');
         redirect(site_url('pegawai/detail/'.$this->session->userdata('session_id')));

    }
    public function delete_pendidikan($id){
        $this->ExtendModel->delete('pendidikan_id',$id,'simpeg_pendidikan');
        $this->session->set_flashdata('alert', 'success_delete');
         redirect(site_url('pegawai/detail/'.$this->session->userdata('session_id')));

    }
    public function delete_seminar($id){
        $this->ExtendModel->delete('seminar_id',$id,'simpeg_seminar');
        $this->session->set_flashdata('alert', 'success_delete');
         redirect(site_url('pegawai/detail/'.$this->session->userdata('session_id')));

    }
    public function delete_pelatihan($id){
        $this->ExtendModel->delete('pelatihan_id',$id,'simpeg_pelatihan');
        $this->session->set_flashdata('alert', 'success_delete');
         redirect(site_url('pegawai/detail/'.$this->session->userdata('session_id')));

    }
    
	
}
