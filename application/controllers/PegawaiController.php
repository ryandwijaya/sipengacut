<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PegawaiController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->load->model('Pegawai');
        $this->load->model('ExtendModel');
        
        $this->load->model('Cuti');
        date_default_timezone_set('Asia/Jakarta');
        // }
        // if (!$this->session->has_userdata('session_nip')){
        //     redirect(site_url('login'));
        // }
        
	}
	public function index()
	{

		$data['pegawai'] = $this->Pegawai->getPegawai();
        $data['judul'] = 'Pegawai';
		$this->load->view('templates/header',$data);
        $this->load->view('backend/pegawai/index',$data);
        $this->load->view('templates/footer');
		
	}

    public function list_biodata()
    {

        $data['pegawai'] = $this->Pegawai->getPegawai();
        $data['judul'] = 'Pegawai';
        $this->load->view('templates/header',$data);
        $this->load->view('backend/pegawai/list_biodata',$data);
        $this->load->view('templates/footer');
        
    }
    
    public function detail($id)
    {

        $data['pegawai'] = $this->Pegawai->getPegawaiById($id);
        $data['hubungan'] = $this->ExtendModel->getHubunganByPegawai($id);
        $data['pendidikan'] = $this->ExtendModel->getPendidikanByPegawai($id);
        $data['penghargaan'] = $this->ExtendModel->getPenghargaanByPegawai($id);
        $data['pelatihan'] = $this->ExtendModel->getPelatihanByPegawai($id);
        $data['seminar'] = $this->ExtendModel->getSeminarByPegawai($id);
        $data['judul'] = 'Detail Pegawai';
        $this->load->view('templates/header',$data);
        $this->load->view('backend/pegawai/detail',$data);
        $this->load->view('templates/footer');
    }



    public function biodata ($id)
    {

        $data['pegawai'] = $this->Pegawai->getPegawaiById($id);
        $data['hubungan'] = $this->ExtendModel->getHubunganByPegawai($id);
        $data['pendidikan'] = $this->ExtendModel->getPendidikanByPegawai($id);
        $data['penghargaan'] = $this->ExtendModel->getPenghargaanByPegawai($id);
        $data['pelatihan'] = $this->ExtendModel->getPelatihanByPegawai($id);
        $data['seminar'] = $this->ExtendModel->getSeminarByPegawai($id);
        $data['judul'] = 'Laporan Biodata';
        $this->load->view('templates/header',$data);
        $this->load->view('backend/pegawai/biodata',$data);
        $this->load->view('templates/footer');
    }


    public function edit($id)
    {
        if (isset($_POST['submit'])) {
           $data = array(
            'pegawai_nama' => $this->input->post('pegawai_nama') , 
            'pegawai_nik' => $this->input->post('pegawai_nik') , 
            'pegawai_password' => md5($this->input->post('pegawai_nik')) , 
            'pegawai_tempat_lahir' => $this->input->post('pegawai_tempat_lahir') , 
            'pegawai_tgl_lahir' => $this->input->post('pegawai_tgl_lahir') , 
            'pegawai_agama' => $this->input->post('pegawai_agama') , 
            'pegawai_jk' => $this->input->post('pegawai_jk') , 
            'pegawai_alamat' => $this->input->post('pegawai_alamat') , 
            'pegawai_no_hp' => $this->input->post('pegawai_nope') , 
            'pegawai_jabatan' => $this->input->post('pegawai_jabatan'),
            'pegawai_status' => $this->input->post('pegawai_status'),
            'pegawai_tgl_diterima' => $this->input->post('pegawai_tgl_diterima')
            );
        
        if (count($_POST)>0) {
            $this->Pegawai->edit($id,$data);
            $this->session->set_flashdata('alert', 'success_change');
            redirect(site_url('pegawai'));
        }else{
            $this->session->set_flashdata('alert', 'fail_post');
            redirect(site_url('pegawai'));
        }
        }else{
            $data['pegawai'] = $this->Pegawai->get_one($id);
            // var_dump($data['jabatan']);
            // exit();
            $data['judul'] = 'Edit Data Pegawai';
            $this->load->view('templates/header',$data);
            $this->load->view('backend/pegawai/edit',$data);
            $this->load->view('templates/footer');  
        } 
    }
    
    public function create()
    {
        if (isset($_POST['submit'])) {

            $config['upload_path']          = './uploads/';
            $config['allowed_types']        = 'jpg|png|jpeg|PNG';
            $nama_file = $_FILES['userfile']['name'];
            $this->upload->initialize($config);
            $this->load->library('upload', $config);

           $data = array(
            'pegawai_nama' => $this->input->post('pegawai_nama') , 
            'pegawai_nik' => $this->input->post('pegawai_nik') , 
            'pegawai_password' => md5($this->input->post('pegawai_nik')) , 
            'pegawai_tempat_lahir' => $this->input->post('pegawai_tempat_lahir') , 
            'pegawai_tgl_lahir' => $this->input->post('pegawai_tgl_lahir') , 
            'pegawai_agama' => $this->input->post('pegawai_agama') , 
            'pegawai_jk' => $this->input->post('pegawai_jk') , 
            'pegawai_alamat' => $this->input->post('pegawai_alamat') , 
            'pegawai_no_hp' => $this->input->post('pegawai_nope') , 
            'pegawai_jabatan' => $this->input->post('pegawai_jabatan'),
            'pegawai_status' => $this->input->post('pegawai_status'),
            'pegawai_tgl_diterima' => $this->input->post('pegawai_tgl_diterima'),
            'pegawai_foto' => str_replace(' ','_',$nama_file)
        );
        
        if (count($_POST)>0) {
            
            $this->upload->do_upload('userfile');
            $this->Pegawai->post($data);
            $this->session->set_flashdata('alert', 'success_post');
            redirect(site_url('pegawai'));
        }else{
            $this->session->set_flashdata('alert', 'fail_post');
            redirect(site_url('pegawai'));
        }


        }  
    }

    public function delete($id){

        $this->ExtendModel->delete('hubungan_pegawai_id',$id,'simpeg_hubungan');
        $this->ExtendModel->delete('pelatihan_pegawai_id',$id,'simpeg_pelatihan');
        $this->ExtendModel->delete('pendidikan_pegawai_id',$id,'simpeg_pendidikan');
        $this->ExtendModel->delete('penghargaan_pegawai_id',$id,'simpeg_penghargaan');
        $this->ExtendModel->delete('seminar_pegawai_id',$id,'simpeg_seminar');
        $this->Pegawai->delete($id);
        $this->session->set_flashdata('alert', 'success_delete');
        redirect(site_url('pegawai'));

    }
    
	
}
