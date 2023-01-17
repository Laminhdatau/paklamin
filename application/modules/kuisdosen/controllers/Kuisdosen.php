<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Kuisdosen extends MX_Controller{
    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->model('m_kuisdosen');
    }

    public function index(){
        $a['data'] = $this->m_kuisdosen->getData();
        $a['layout'] = 'v_soal';
        $a['modules'] = 'Kuisdosen';
        echo Modules::run('template/backend', $a);
    }

    public function simpan_data(){
        $id = $this->input->post('id_soal');
        $data['soal_kepuasan'] = $this->input->post('soal_kepuasan');
        $data['id_jenis_survei'] = '1';
        
        if($id == ""){
            $data['id_soal'] =  uuid_generator();
            $this->m_kuisdosen->save_soal($data);
        }else{
            $this->m_kuisdosen->update_data($id, $data);
        }
        redirect('id='.md5('kuisdosen'));
    }

    public function delete_data(){
        $dtdel = json_decode($_POST['id_del_arr']);
        foreach ($dtdel as $id){
            $this->m_kuisdosen->hapus_data($id);
        }
        redirect('id='.md5('kuisdosen'));
    }
}