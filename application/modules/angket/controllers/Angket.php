<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Angket extends MX_Controller
{
    //put your code here
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_angket');
    }

    public function index()
    {
        $a['data'] = $this->m_angket->getData();
        $a['layout'] = 'v_angket';
        $a['modules'] = 'angket';
        echo Modules::run('template/backend', $a);
    }

    public function simpan_data()
    {
        $id = $this->input->post('id_jawaban');
        $data['jawaban'] = $this->input->post('jawaban');

        if ($id == "") {
            $data['id_jawaban'] = auto_inc("id_jawaban", "t_jawaban");
            $this->m_angket->save_jawaban($data);
        } else {
            $this->m_angket->update_data($id, $data);
        }
        redirect('id=' . md5('jawaban'));
    }

    public function delete_data()
    {
        $dtdel = json_decode($_POST['id_del_arr']);
        foreach ($dtdel as $id) {
            $this->m_angket->hapus_data($id);
        }
        redirect('id=' . md5('jawaban'));
    }
}
