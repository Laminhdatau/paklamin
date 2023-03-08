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
        $a['data'] = $this->m_kuismatakuliah->getData()->result();
        $a['bagiankum'] = $this->m_kuismatakuliah->getData()->row()->id_bagian_soal;
        $a['bsoal']=$this->m_kuismatakuliah->getBagianSoal();
        $a['hitung'] = $this->m_kuismatakuliah->hitung();
        $a['layout'] = 'v_soalmk';
        $a['modules'] = 'kuismatakuliah';
        echo Modules::run('template/backend', $a);
    }

    public function simpan_data()
    {
        $id = $this->input->post('id_soal');
        $data['soal_kepuasan'] = $this->input->post('soal_kepuasan');
        $data['id_jenis_survei'] = 2;
        $data['id_bagian_soal'] = $this->input->post('id_bagian_soal');
        $data['status'] = '0';

        if ($id == "") {
            $data['id_soal'] =  uuid_generator();
            $this->m_kuismatakuliah->save_soal($data);
        } else {
            $this->m_kuismatakuliah->update_data($id, $data);
        }
        redirect('id=' . md5('kuismatakuliah'));
    }
    public function statusAktif($id)
    {
        $sql = $this->db->query("UPDATE t_soal set status='1' where id_soal='$id'");
        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert" > Sementara Aktif<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('id=' . md5('kuismatakuliah'));
    }
    public function statusTidakAKtif($id)
    {
        $sql = $this->db->query("UPDATE t_soal set status='0' where id_soal='$id'");
        $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert" > Tidak Aktif<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
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

    public function updateStatusm()
    {
        $id = $this->input->post('kodesm');
        $status = $this->input->post('status');
        $data =  $this->m_kuismatakuliah->getIdm($id);
        if (!$data) {
            $response['success'] = false;
            $response['message'] = 'Data not found';
        } else {
            $newStatus = $status == '1' ? '0' : '1';
            $this->m_kuismatakuliah->updateStatusm($newStatus, $id);
            $response['success'] = true;
            $response['message'] = 'Status changed successfully';
            echo json_encode($response);
            exit();
        }
    }
}
