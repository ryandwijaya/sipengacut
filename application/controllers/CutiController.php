<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CutiController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->load->model('Cuti');
        $this->load->model('Pegawai');
        date_default_timezone_set('Asia/Jakarta');
        // }
        // if (!$this->session->has_userdata('session_nip')){
        //     redirect(site_url('login'));
        // }
        
	}
	public function index()
	{

		$data['cuti'] = $this->Cuti->getCuti();
        $data['pegawai'] = $this->Pegawai->getPegawai();
        $data['judul'] = 'Cuti';
		$this->load->view('templates/header',$data);
        $this->load->view('backend/cuti/index',$data);
        $this->load->view('templates/footer');
		
	}

    public function all_cuti()
    {

        $data['cuti'] = $this->Cuti->getAllCutiByAcc(1,1,'disetujui');
        $data['judul'] = 'Cuti';
        $this->load->view('templates/header',$data);
        $this->load->view('backend/cuti/all',$data);
        $this->load->view('templates/footer');
        
    }
    public function new_cuti()
    {
        $thn = date('Y');
        $data['all_cuti']= $this->Cuti->countCutiByTahun($this->session->userdata('session_id'),$thn);
        $data['judul'] = 'Form Pengajuan Cuti';
        
        $data['pegawai'] = $this->Pegawai->get_one($this->session->userdata('session_id'));
        $data['get_pegawai'] = $this->Pegawai->getPegawai();
        $data['check_pengajuan'] = $this->Cuti->checkPengajuan($this->session->userdata('session_id'));
        $this->load->view('templates/header',$data);
        $this->load->view('backend/cuti/pengajuan',$data);
        $this->load->view('templates/footer');
        
    }
    public function cetak($id)
    {
        $thn = date('Y');
        $data['all_cuti']= $this->Cuti->countCutiByTahun(2,$thn);
        $data['judul'] = 'Laporan Pengajuan Cuti';
        $data['pengajuan'] = $this->Cuti->getPengajuan($id);
        $this->load->view('templates/header',$data);
        $this->load->view('backend/cuti/cetak',$data);
        $this->load->view('templates/footer');
        
    }
  
    
    public function create()
    {
        if (isset($_POST['submit'])) {

            $pengacut = $this->Cuti->get_pengajuan($this->session->userdata('session_id'));
            $total = 0;
            foreach ($pengacut as $key => $var) {
                $tgl_cuti[$key] = new DateTime($var['cuti_tgl_mulai']);
                $tgl_selesai[$key] = new DateTime($var['cuti_tgl_akhir']);

                $selisih[$key] = $tgl_cuti[$key]->diff($tgl_selesai[$key])->format("%a");

                $total = $total + $selisih[$key];


            }
            $cuti_baru = new DateTime($this->input->post('cuti_tgl_mulai'));
            $cuti_sampai = new DateTime($this->input->post('cuti_tgl_akhir'));
            $j_hari = $cuti_baru->diff($cuti_sampai)->format("%a");

            $jumlah_cuti = $total+$j_hari;

            if ($jumlah_cuti<=12) {
                $data = array(
            'cuti_pegawai_id' => $this->input->post('cuti_pegawai_id') , 
            'cuti_tgl_mulai' => $this->input->post('cuti_tgl_mulai') , 
            'cuti_tgl_akhir' => $this->input->post('cuti_tgl_akhir') , 
            'cuti_jenis' => $this->input->post('cuti_jenis') , 
            'cuti_pengganti' => $this->input->post('cuti_pengganti') , 
            'cuti_keterangan' => $this->input->post('cuti_keterangan') ,
            'cuti_acc_supervisor' => 0 ,
            'cuti_acc_pimpinan' => 0,
            'cuti_status' => 'waiting'
             );
        
                if (count($_POST)>0) {
                $this->Cuti->post($data);
                $this->session->set_flashdata('alert', 'success_post');
                    if ($this->session->userdata('session_level')!='pegawai') {
                        redirect(site_url('cuti'));
                    }else{
                       redirect(site_url('cuti/new')); 
                    }
                }else{
                    $this->session->set_flashdata('alert', 'fail_post');
                    redirect(site_url('cuti'));
                }
                
            }else{
                $this->session->set_flashdata('alert', 'cuti_over');
                    redirect(site_url('cuti/new'));
            }

           


        }  
    }


    public function konfirmasi($cuti_id){
        
        if ($this->session->userdata('session_level')=='pimpinan') {
            $data = [
            'cuti_acc_pimpinan' => 1,
            'cuti_status' => 'disetujui'
            ];
            $get_cuti = $this->Cuti->getCutiById($cuti_id);
            $data_pegawai = [
                'pegawai_status' => 'Cuti' 
            ];
            $this->Pegawai->edit($get_cuti['cuti_pegawai_id'],$data_pegawai);
        }else{
            $data = [
            'cuti_acc_supervisor' => 1
            ];
        }
        
        $this->Cuti->edit($cuti_id,$data);
        if ($this->Cuti->edit($cuti_id,$data)) {
        $this->session->set_flashdata('alert', 'success_change');
        redirect(site_url('cuti'));
        }else{
        $this->session->set_flashdata('alert', 'fail_change');
        redirect(site_url('cuti'));  
        }
    }
    public function tolak($cuti_id){
        if ($this->session->userdata('session_level')=='pimpinan') {
            $data = [
            'cuti_acc_pimpinan' => 1,
            'cuti_status' => 'ditolak'
            ];
        }else{
            $data = [
            'cuti_acc_supervisor' => 1,
            'cuti_status' => 'ditolak'
            ];
        }
        
        $this->Cuti->edit($cuti_id,$data);
        if ($this->Cuti->edit($cuti_id,$data)) {
        $this->session->set_flashdata('alert', 'success_change');
        redirect(site_url('cuti'));
        }else{
        $this->session->set_flashdata('alert', 'fail_change');
        redirect(site_url('cuti'));  
        }
    }
    public function waiting($cuti_id){
        if ($this->session->userdata('session_level')=='pimpinan') {
            $data = [
            'cuti_acc_pimpinan' => 0,
            'cuti_status' => 'waiting'
            ];
        }else{
            $data = [
            'cuti_acc_supervisor' => 0,
            'cuti_status' => 'waiting'
            ];
        }
        
        $this->Cuti->edit($cuti_id,$data);
        if ($this->Cuti->edit($cuti_id,$data)) {
        $this->session->set_flashdata('alert', 'success_change');
        redirect(site_url('cuti'));
        }else{
        $this->session->set_flashdata('alert', 'fail_change');
        redirect(site_url('cuti'));  
        }
    }
    public function batal($cuti_id){
       
            $data = [
            'cuti_on_delete' => '1'
            ];
        
        
        $this->Cuti->edit($cuti_id,$data);
        if ($this->Cuti->edit($cuti_id,$data)) {
        $this->session->set_flashdata('alert', 'success_change');
        if ($this->session->userdata('session_level')!='pegawai') {
                redirect(site_url('cuti'));
            }else{
               redirect(site_url('cuti/new')); 
            }
        }else{
        $this->session->set_flashdata('alert', 'fail_change');
        if ($this->session->userdata('session_level')!='pegawai') {
                redirect(site_url('cuti'));
            }else{
               redirect(site_url('cuti/new')); 
            }  
        }
    }

    public function selesai($cuti_id){
       
            $data = [
            'cuti_status_selesai' => 'sudah'
            ];
        
        
        $this->Cuti->edit($cuti_id,$data);
        if ($this->Cuti->edit($cuti_id,$data)) {
        $this->session->set_flashdata('alert', 'success_change');
        if ($this->session->userdata('session_level')!='pegawai') {
                redirect(site_url('cuti'));
            }else{
               redirect(site_url('cuti/new')); 
            }
        }else{
        $this->session->set_flashdata('alert', 'fail_change');
        if ($this->session->userdata('session_level')!='pegawai') {
                redirect(site_url('cuti'));
            }else{
               redirect(site_url('cuti/new')); 
            }
        }
    }
    


    public function delete($id){
        $this->Cuti->delete($id);
        $this->session->set_flashdata('alert', 'success_delete');
        if ($this->session->userdata('session_level')!='pegawai') {
                redirect(site_url('cuti'));
            }else{
               redirect(site_url('cuti/new')); 
            }
    }
    
    
	
}
