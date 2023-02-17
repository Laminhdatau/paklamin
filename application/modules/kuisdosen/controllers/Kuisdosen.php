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
        foreach ($a['data'] as $i) {
            if ($i->status == 1) {
                $i->status_class = 'btn-success';
                $i->status_icon = 'glyphicon-ok';
            } else {
                $i->status_class = 'btn-danger';
                $i->status_icon = 'glyphicon-remove';
            }
        }
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
        $data['status'] =  $this->input->post('status');

        if ($id == "") {
            $data['id_soal'] =  uuid_generator();
            $this->m_kuisdosen->save_soal($data);
        } else {
            $this->m_kuisdosen->update_data($id, $data);
        }
        redirect('id=' . md5('kuisdosen'));
    }

    public function statusAktif($id)
    {
        $sql = $this->db->query("UPDATE t_soal set status='1' where id_soal='$id'");
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert" > OK<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('id=' . md5('kuisdosen'));
    }
    public function statusTidakAKtif($id)
    {
        $sql = $this->db->query("UPDATE t_soal set status='0' where id_soal='$id'");
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert" > NO<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
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
}
