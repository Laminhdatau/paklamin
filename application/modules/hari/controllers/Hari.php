<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Hari extends MX_Controller
{
    //put your code here
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_hari');
    }

    public function index()
    {
        $a['data'] = $this->m_hari->getData();
        $a['layout'] = 'v_piearea';
        $a['modules'] = 'hari';
        echo Modules::run('template/backend', $a);
    }

    public function simpan_data()
    {
        $id = $this->input->post('id_hari');
        $data['hari'] = $this->input->post('hari');

        if ($id == "") {
            $data['id_hari'] = auto_inc("id_hari", "m_hari");
            $this->m_hari->save_hari($data);
        } else {
            $this->m_hari->update_data($id, $data);
        }
        redirect('id=' . md5('hari'));
    }

    public function delete_data()
    {
        $dtdel = json_decode($_POST['id_del_arr']);
        foreach ($dtdel as $id) {
            $this->m_hari->hapus_data($id);
        }
        redirect('id=' . md5('hari'));
    }
}
