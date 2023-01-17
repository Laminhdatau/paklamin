<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Jenissurvei extends MX_Controller{
    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->model('m_jenissurvei');
    }

    public function index(){
        $a['data'] = $this->m_jenissurvei->getData();
        $a['layout'] = 'v_jenissurvei';
        $a['modules'] = 'jenissurvei';
        echo Modules::run('template/backend', $a);
    }

    public function simpan_data(){
        $id = $this->input->post('id_jenis_survei');
        $data['jenis_survei'] = $this->input->post('jenis_survei');
        
        if($id == ""){
            $data['jenis_survei'] = auto_inc('id_jenis_survei','t_jenis_survei');
            $this->m_jenissurvei->save_jenis($data);
        }else{
            $this->m_jenissurvei->update_data($id, $data);
        }
        redirect('id='.md5('jenissurvei'));
    }

    public function delete_data(){
        $dtdel = json_decode($_POST['id_del_arr']);
        foreach ($dtdel as $id){
            $this->m_jenissurvei->hapus_data($id);
        }
        redirect('id='.md5('jenissurvei'));
    }
}
