<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DashboardController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->load->model('Jabatan');
        $this->load->model('Pegawai');
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
        $data['pegawai'] = $this->Pegawai->getPegawai();
        $data['p_cuti'] = $this->Pegawai->getPegawaiByStatus('Cuti');
        $data['p_aktif'] = $this->Pegawai->getPegawaiByStatus('Aktif');
        $data['cuti'] = $this->Cuti->getCuti();
        $data['judul'] = 'Dashboard';
		$this->load->view('templates/header',$data);
        $this->load->view('dashboard/index',$data);
        $this->load->view('templates/footer');
		
	}
    
    
	
}
