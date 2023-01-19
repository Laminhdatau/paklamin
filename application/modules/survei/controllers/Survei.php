<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Survei extends MX_Controller
{
    //put your code here
    public function __construct()
    {
        parent::__construct();
        // $this->load->model('m_kuisionerdosen');
    }

    public function index()
    {
        // $a['data'] = $this->m_kuisioner->getData();
        $a['layout'] = 'v_survei';
        $a['modules'] = 'survei';
        echo Modules::run('template/backend', $a);
    }
}
