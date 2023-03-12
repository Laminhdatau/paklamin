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
        $kd = $this->input->post('dosen');
        $a['opt'] = $this->m_grafik->getOption();
        $a['datadosen'] = $this->m_grafik->getAllDosen($prodi);
        $a['layout'] = 'v_grafik';
        $a['modules'] = 'grafik';
        echo Modules::run('template/backend', $a);
    }
    public function index2()
    {
        $prodi = prodi($this->session->userdata('security')->id_cession);
        if ($prodi == '') {
            $prodi = null;
        }
        $a['opt'] = $this->m_grafik->getOption();
        $a['datamk'] = $this->m_grafik->getAllMk($prodi);
        $a['layout'] = 'v_grafikmk';
        $a['modules'] = 'grafik';
        echo Modules::run('template/backend', $a);
    }
    public function detailGrafik()
    {
        $prodi = prodi($this->session->userdata('security')->id_cession);
        if ($prodi == '') {
            $prodi = null;
        }
        $a['data'] = $this->m_grafik->getDetail($prodi);
        $a['layout'] = 'v_detailgrafik';
        $a['modules'] = 'grafik';
        echo Modules::run('template/backend', $a);
    }
    public function getGrafik()
    {
        $kd = $this->input->post('dosen');
        $dosen = $this->m_grafik->getData($kd);
        echo json_encode($dosen);
    }
    public function getGrafikMk()
    {
        $kd = $this->input->post('mk');
        $mk = $this->m_grafik->getData2($kd);
        echo json_encode($mk);
    }
    public function getSeluruh()
    {
        $kd = $this->input->post('dosen');
        $semua = $this->m_grafik->getSeluruh($kd);
        echo json_encode($semua);
    }
    public function getSeluruhMkPunya()
    {
        $kd = $this->input->post('mk');
        $semua = $this->m_grafik->getSeluruh($kd);
        echo json_encode($semua);
    }
}
