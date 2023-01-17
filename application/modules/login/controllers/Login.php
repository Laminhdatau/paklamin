<?php

class Login extends MX_Controller{

	public function __construct() {
        parent::__construct();
        $this->load->model('m_login');
    }

    public function index(){
        if (!$this->session->userdata('security')){
            $this->load->view('v_login2');
        }else {
            redirect('home','refresh');
        }
    }

    public function prosesmasuk(){
        $username = $this->input->post('user');
        $password = $this->input->post('password');

        if ($cekLogin = $this->m_login->cekLogin($username,$password)){
            if ($cekLogin->status == '1'){
                $this->session->set_userdata('security',$cekLogin);
                redirect('home','refresh');
            }elseif($cekLogin->status == '0'){
                $this->session->set_flashdata('belum_aktif', '<div >maaf username "'.$username.'" belum aktif</div>');
                redirect('');
            }else{
                $this->session->set_flashdata('belum_aktif', '<div >Data Anda belum lengkap</div>');
                redirect('');
            };
        }else{
           $this->session->set_flashdata('error', '<div >maaf user "'.$username. '" dan password "*****" anda salah</div>');
           redirect('');     
       };
    }

    public function proseskeluar(){
        $this->session->sess_destroy();
        redirect('');
    }
}