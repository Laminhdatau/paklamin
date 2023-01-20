<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Kuismatakuliah extends MX_Controller
{
    //put your code here
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_kuismatakuliah');
    }

    public function index()
    {
        $a['data'] = $this->m_kuismatakuliah->getData();
        $a['layout'] = 'v_soalmk';
        $a['modules'] = 'kuismatakuliah';
        echo Modules::run('template/backend', $a);
    }

    public function simpan_data()
    {
        $id = $this->input->post('id_soal');
        $data['soal_kepuasan'] = $this->input->post('soal_kepuasan');
        $data['id_jenis_survei'] = 2;
        $data['status'] = '0';

        if ($id == "") {
            $data['id_soal'] =  uuid_generator();
            $this->m_kuismatakuliah->save_soal($data);
        } else {
            $this->m_kuismatakuliah->update_data($id, $data);
        }
        redirect('id=' . md5('kuismatakuliah'));
    }


    public function delete_data()
    {
        $dtdel = json_decode($_POST['id_del_arr']);
        foreach ($dtdel as $id) {
            $this->m_kuismatakuliah->hapus_data($id);
        }
        redirect('id=' . md5('kuismatakuliah'));
    }
}
