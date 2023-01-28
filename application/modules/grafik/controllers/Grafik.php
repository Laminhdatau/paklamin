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
        // $nim = "20501049";
        $nim = nim($this->session->userdata('security')->id_cession);
        
        $a['data'] = $this->m_grafik->getData($nim);
        $a['layout'] = 'v_temp';
        $a['modules'] = 'grafik';
        echo Modules::run('template/backend', $a);
    }
   
}
