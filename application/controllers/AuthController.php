<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AuthController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('AuthModel');
    }

    public function index()
    {

        $this->load->view('auth/login');
    }
    

    public function login()
    {
        
        if (isset($_POST['submit'])) {

            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $user = array(
                'user_username' => $username,
                'user_password' => md5($password)
            );
            $pegawai = array(
                'pegawai_nik' => $username,
                'pegawai_password' => md5($password)
            );

            $validate = $this->AuthModel->getUsers($user)->num_rows();
            $validate2 = $this->AuthModel->getPegawai($pegawai)->num_rows();
            $admin = $this->AuthModel->getUserAccount($user);
            $pgw = $this->AuthModel->getPegawaiAccount($pegawai);
            

            if ($validate > 0 ) {
                $data_session = array(
                    'session_id' => 'A'.$admin['user_id'],
                    'session_username' => $admin['user_username'],
                    'session_nama' => $admin['user_nama'],
                    'session_level' => $admin['user_level'],
                    'session_foto' => $admin['user_foto'],
                    'session_jk' => 'admin'
                );

                $this->session->set_flashdata('alert', 'success_login');
                $this->session->set_userdata($data_session);
                
                redirect(site_url('dashboard'));

            }elseif($validate2>0){
                 $data_session = array(
                    'session_id' => $pgw['pegawai_id'],
                    'session_username' => $pgw['pegawai_username'],
                    'session_nama' => $pgw['pegawai_nama'],
                    'session_level' => 'pegawai',
                    'session_foto' => $pgw['pegawai_foto'],
                    'session_jk' => $pgw['pegawai_jk']
                );
                $this->session->set_flashdata('alert', 'success_login');
                $this->session->set_userdata($data_session);
                
                redirect(site_url('pegawai/detail/'.$pgw['pegawai_id']));
            }
            
            
            else{
                $this->session->set_flashdata('alert','gagalLogin');
                redirect(site_url('login'));
                
            }

        } else {
            $this->load->view('backend/auth/login');
        }
    }

    
    

    
    public function logout()
    {
        $this->session->sess_destroy();
        redirect(site_url('login'));
    }
}
