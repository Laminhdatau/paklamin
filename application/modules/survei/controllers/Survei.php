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
        $data = $this->m_survei->getSoalStep1($id);
        if (!empty($data)) {
            $a['soal1'] = $data['soal'];
            $a['bagian1']=$data['bagian'];
            $a['jenis1'] = $data['jenis'];
            $a['option1'] = $data['option'];
        }
        $data2 = $this->m_survei->getSoalStep2($id);
        if (!empty($data2)) {
            $a['soal2'] = $data2['soal'];
            $a['bagian2']=$data2['bagian'];
            $a['jenis2'] = $data2['jenis'];
            $a['option2'] = $data2['option'];
        }
        $data3 = $this->m_survei->getSoalStep3($id);
        if (!empty($data3)) {
            $a['soal3'] = $data3['soal'];
            $a['bagian3']=$data3['bagian'];
            $a['jenis3'] = $data3['jenis'];
            $a['option3'] = $data3['option'];
        }
        // print_r($a);die;
        $a['layout'] = 'v_temp';
        $a['modules'] = 'survei';
        echo Modules::run('template/backend', $a);
    }


    public function prosessSurvey()
{
    $response = $this->input->post();
    $valid = true;
    //validation process

    if ($valid) {
        //save response to db
        $this->m_survei->simpanJawaban($response);
        $this->session->set_flashdata('success', 'Survey has been submitted successfully');
        redirect('survey/thankyou');
    } else {
        $this->session->set_flashdata('error', 'Validation errors occured. Please try again.');
        redirect('survey');
    }
}
}
