<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Survei extends MX_Controller
{
    //put your code here
    public function __construct()
    {

        parent::__construct();

        $this->load->model('m_survei');
    }

    public function index()
    {
        $nim = "20501049";
        $a['data'] = $this->m_survei->getData($nim);
        $a['layout'] = 'v_survei';
        $a['modules'] = 'survei';
        echo Modules::run('template/backend', $a);
    }
    public function isisurvei()
    {
        $id = $this->uri->segment(3);
        $a['kd'] = $this->uri->segment(4);
        $a['nama'] = $this->uri->segment(5);
        $data = $this->m_survei->getSoal($id);
        $a['soal'] = $data['soal'];
        $a['jenis'] = $data['jenis'];
        $a['option'] = $data['option'];
        // print_r($a);die;
        $a['layout'] = 'v_isisurvei';
        $a['modules'] = 'survei';
        echo Modules::run('template/backend', $a);
    }
}
