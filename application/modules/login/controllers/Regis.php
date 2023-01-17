<?php

class Regis extends MX_Controller{

	public function __construct() {
        parent::__construct();
        $this->load->model('m_login');
        $this->load->model('home/m_home');
        $this->load->model('m_regis');
        if ($this->session->userdata('security')->lv == "8"){
            redirect('home');
           }
        if (!$this->session->userdata('security')){
            $this->session->set_flashdata('gagal','Maaf Anda Belum Login');
            redirect('');

            }
        $this->id = $this->session->userdata('security')->id_cession;
        }

        public function index(){
            $a['akun'] = $this->m_home->dataLogin($this->id);
            $a['lv'] = $this->m_regis->level();
            $a['bd'] = $this->m_regis->blmDftr();
            $a['ld'] = $this->m_regis->dftUsr();
            $a['layout'] ='v_regis';
            $a['modules'] = 'login';
            echo Modules::run('template/backend', $a);
        }
        public function daftar(){
            $data['kd_user'] = $this->input->post('kd_user');
            $data['user'] = $this->input->post('user1');
            $data['password'] = $this->input->post('password');
            $data['id_level'] = $this->input->post('id_level');
                    
                      $this->m_regis->daftar($data);
                      redirect('daftar-akun.html');
        }

}