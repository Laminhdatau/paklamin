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
        
        $a['data'] = $this->m_grafik->getData();
        $a['layout'] = 'v_grafik';
        $a['modules'] = 'grafik';
        echo Modules::run('template/backend', $a);
    }
   
}
