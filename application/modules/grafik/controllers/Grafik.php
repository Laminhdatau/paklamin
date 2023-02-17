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
        $prodi = prodi($this->session->userdata('security')->id_cession);
        if ($prodi == '') {
            $prodi = null;
        }
        // $a['datati']=$this->m_grafik->getDataTI();
        $a['datadosen'] = $this->m_grafik->getAllDosen($prodi);
        $a['layout'] = 'v_grafik';
        $a['modules'] = 'grafik';
        echo Modules::run('template/backend', $a);
    }
    public function getGrafik()
    {
        $kd = $this->input->post('dosen');

        $dosen = $this->m_grafik->getData($kd);
        echo json_encode($dosen);
    }
}
