<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Grafik extends MX_Controller
{
    //put your code here
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_grafik');
    }

    public function index()
    {
        $kelas = nim($this->session->userdata('security')->id_cession);
        $a['data'] = $this->m_grafik->getData($kelas);
        $a['layout'] = 'v_graptemp';
        $a['modules'] = 'grafik';
        echo Modules::run('template/backend', $a);
    }
}
