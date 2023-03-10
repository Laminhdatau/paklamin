<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Bagian extends MX_Controller
{
    //put your code here
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_bagian');
    }

    public function index()
    {
        $a['data'] = $this->m_bagian->getData();
        $a['layout'] = 'v_bagian';
        $a['modules'] = 'bagian';
        echo Modules::run('template/backend', $a);
    }

    public function simpan_data()
    {
        $id = $this->input->post('id_bagian_soal');
        $data['bagian_soal'] = $this->input->post('bagian_soal');

        if ($id == "") {
            $data['id_bagian_soal'] = auto_inc("id_bagian_soal", "t_bagian_soal");
            $this->m_bagian->save_bagian($data);
        } else {
            $this->m_bagian->update_data($id, $data);
        }
        redirect('id=' . md5('bagian'));
    }

    public function delete_data()
    {
        $dtdel = json_decode($_POST['id_del_arr']);
        foreach ($dtdel as $id) {
            $this->m_bagian->hapus_data($id);
        }
        redirect('id=' . md5('bagian'));
    }
}
