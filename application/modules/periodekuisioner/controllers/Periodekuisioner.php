<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Periodekuisioner extends MX_Controller
{
    //put your code here
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_periodekuisioner');
    }

    public function index()
    {
        $a['data'] = $this->m_periodekuisioner->getData();
        $a['layout'] = 'v_periodekuisioner';
        $a['modules'] = 'periodekuisioner';
        echo Modules::run('template/backend', $a);
    }

    public function simpan_data()
    {
        $id = $this->input->post('id_pkuisioner');
        $data['id_periode_perkuliahan'] = $this->input->post('id_periode_perkuliahan');
        $data['tmt'] = $this->input->post('tmt');
        $data['tst'] = $this->input->post('tst');

        if ($id == "") {
            $data['id_pkuesioner'] = uuid_generator();
            $this->m_periodekuisioner->save_periodekuisioner($data);
        } else {
            $this->m_periodekuisioner->update_data($id, $data);
        }
        redirect('id=' . md5('periodekuisioner'));
    }

    public function delete_data()
    {
        $dtdel = json_decode($_POST['id_del_arr']);
        foreach ($dtdel as $id) {
            $this->m_periodekuisioner->hapus_data($id);
        }
        redirect('id=' . md5('periodekuisioner'));
    }
}
