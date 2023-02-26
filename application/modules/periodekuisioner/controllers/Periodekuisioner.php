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
        $a['periode'] = $this->m_periodekuisioner->getPeriode();
        $a['layout'] = 'v_periodekuisioner';
        $a['modules'] = 'periodekuisioner';
        echo Modules::run('template/backend', $a);
    }

    public function simpan_data()
    {
        $id = $this->input->post('id_pkuesioner');
        $data['tmt'] = $this->input->post('tmt');
        $data['tst'] = $this->input->post('tst');
        $data['id_periode_perkuliahan'] = $this->input->post('id_periode_perkuliahan');
        if ($id == "") {
            $data['id_pkuesioner'] = uuid_generator();
            if ($this->m_periodekuisioner->save_periodekuisioner($data)) {
                $this->session->set_flashdata('message', '<div class="alert" style="background-color:green;color:white;weight:bold;" role="alert">Berhasil Simpan<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                redirect('id=' . md5('periodekuisioner'));
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal Simpan<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                redirect('id=' . md5('periodekuisioner'));
            };
            redirect('id=' . md5('periodekuisioner'));
        } else {
            if ($this->m_periodekuisioner->update_data($id, $data)) {
                $this->session->set_flashdata('message', '<div class="alert" style="background-color:orange;color:black;weight:bold;" role="alert">Berhasil Update<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                redirect('id=' . md5('periodekuisioner'));
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal Update<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                redirect('id=' . md5('periodekuisioner'));
            };
            redirect('id=' . md5('periodekuisioner'));
        }
    }

    public function delete_data()
    {
        $dtdel = json_decode($_POST['id_del_arr']);
        foreach ($dtdel as $id) {
            $this->m_periodekuisioner->hapus_data($id);
        }
        redirect('id=' . md5('periodekuisioner'));
    }
    public function aktifkan($id)
    {
        $this->m_periodekuisioner->updateStatus1($id);
        redirect('id=' . md5('periodekuisioner'));
    }
    public function matikan($id)
    {
        $this->m_periodekuisioner->updateStatus0($id);
        redirect('id=' . md5('periodekuisioner'));
    }
}
