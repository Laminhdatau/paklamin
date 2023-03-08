<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kuisdosen extends MX_Controller
{
    //put your code here
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_kuisdosen');
    }

    public function index()
    {


        $a['data'] = $this->m_kuisdosen->getData();

        $a['bsoal'] = $this->m_kuisdosen->getBagianSoal();
        $a['hitung'] = $this->m_kuisdosen->hitung();
        $a['layout'] = 'v_soaldos';
        $a['modules'] = 'kuisdosen';
        echo Modules::run('template/backend', $a);
    }

    public function simpan_data()
    {
        $id = $this->input->post('id_soal');
        $data['soal_kepuasan'] = $this->input->post('soal_kepuasan');
        $data['id_jenis_survei'] = '1';
        $data['id_bagian_soal'] = $this->input->post('id_bagian_soal');
        $data['status'] = '0';

        if ($id == "") {
            $data['id_soal'] =  uuid_generator();
            $this->m_kuisdosen->save_soal($data);
        } else {
            $this->m_kuisdosen->update_data($id, $data);
        }
        redirect('id=' . md5('kuisdosen'));
    }

    public function delete_data()
    {
        $dtdel = json_decode($_POST['id_del_arr']);
        foreach ($dtdel as $id) {
            $this->m_kuisdosen->hapus_data($id);
        }
        redirect('id=' . md5('kuisdosen'));
    }

    public function updateStatus()
    {
        $id = $this->input->post('kodes');
        $status = $this->input->post('status');
        $data =  $this->m_kuisdosen->getId($id);
        if (!$data) {
            $response['success'] = false;
            $response['message'] = 'Data Tidak Ada';
        } else {
            $newStatus = $status == '1' ? '0' : '1';
            $this->m_kuisdosen->updateStatus($newStatus, $id);
            $response['success'] = true;
            $response['message'] = 'Status changed successfully';
            echo json_encode($response);
        }
    }
}
