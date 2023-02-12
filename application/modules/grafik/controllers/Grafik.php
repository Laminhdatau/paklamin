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
        // $idp = '3';
        // $a['data'] = $this->m_grafik->getData($idp);
        
        $a['data']=$this->m_grafik->getDataTI();
        
        $a['layout'] = 'v_grafikti';
        $a['modules'] = 'grafik';
        echo Modules::run('template/backend', $a);
    }
    public function getTHP()
    {
        $kelas = nim($this->session->userdata('security')->id_cession);
        // $idp = '3';
        // $a['data'] = $this->m_grafik->getData($idp);
        $a['data']=$this->m_grafik->getDataTHP();
        $a['layout'] = 'v_grafikthp';
        $a['modules'] = 'grafik';
        echo Modules::run('template/backend', $a);
    }
    public function getMPP()
    {
        $kelas = nim($this->session->userdata('security')->id_cession);
        // $idp = '3';
        // $a['data'] = $this->m_grafik->getData($idp);
        $a['data']=$this->m_grafik->getDataMPP();
        $a['layout'] = 'v_grafikmpp';
        $a['modules'] = 'grafik';
        echo Modules::run('template/backend', $a);
    }

    public function getTRP()
    {
        $kelas = nim($this->session->userdata('security')->id_cession);
        // $idp = '3';
        // $a['data'] = $this->m_grafik->getData($idp);
        $a['data']=$this->m_grafik->getDataMPP();
        $a['layout'] = 'v_grafiktrp';
        $a['modules'] = 'grafik';
        echo Modules::run('template/backend', $a);
    }
}
