<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class JabatanController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->load->model('Jabatan');
        
        $this->load->model('Cuti');
        date_default_timezone_set('Asia/Jakarta');
        // }
        // if (!$this->session->has_userdata('session_nip')){
        //     redirect(site_url('login'));
        // }
        
	}
	public function index()
	{

        $data['jabatan'] = $this->Jabatan->getJabatan();
        $data['judul'] = 'Jabatan';
		$this->load->view('templates/header',$data);
        $this->load->view('backend/jabatan/index',$data);
        $this->load->view('templates/footer');
		
	}
    
   

    public function create()
    {
        if (isset($_POST['submit'])) {
           $data = array(
            'jabatan_nama' => $this->input->post('jabatan_nama') 
        );
        
        if (count($_POST)>0) {
            $this->Jabatan->post($data);
            $this->session->set_flashdata('alert', 'success_post');
            redirect(site_url('jabatan'));
        }else{
            $this->session->set_flashdata('alert', 'fail_post');
            redirect(site_url('jabatan'));
        }


        }  
    }

    public function edit($id)
    {
        if (isset($_POST['submit'])) {
           $data = array(
            'jabatan_nama' => $this->input->post('jabatan_nama') 
        );
        
        if (count($_POST)>0) {
            $this->Jabatan->edit($id,$data);
            $this->session->set_flashdata('alert', 'success_change');
            redirect(site_url('jabatan'));
        }else{
            $this->session->set_flashdata('alert', 'fail_post');
            redirect(site_url('jabatan'));
        }
        }else{
            $data['jabatan'] = $this->Jabatan->getJabatanById($id);
            // var_dump($data['jabatan']);
            // exit();
            $data['judul'] = 'Edit Data Jabatan';
            $this->load->view('templates/header',$data);
            $this->load->view('backend/jabatan/edit',$data);
            $this->load->view('templates/footer');  
        } 
    }

    public function delete($id){
        $this->Jabatan->delete($id);
        $this->session->set_flashdata('alert', 'success_delete');
        redirect(site_url('jabatan'));

    }
    
	
}
