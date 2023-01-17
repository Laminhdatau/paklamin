<?php


class Template extends MX_Controller{

    public function backend ($template){
        if (!$this->session->userdata('security')){
            $this->session->set_flashdata('gagal','Maaf Anda Belum Login');
            redirect('login','refresh');
        }else{
            $this->load->model("home/m_home");
            $data = $this->m_home->dataLogin($this->session->userdata('security')->id_cession, $template['modules']);

            $template['cap']  = $this->m_home->findheadermenu($template['modules']); 
            $template['akun'] = $data['akun'];
            $template['ses']  = $data['ses'];
            $template['pri']  = $data['pri'];

            // print_r($template['pri']);die; 
            // if (($template['modules'] != 'biodata_karyawan') && ($template['modules'] != 'biodata_mahasiswa') && (empty($data['ses']) || $data['pri'][0]->zp[6] == "0" || empty($data['pri']) || $data['pri'][0]->zs == 0)){
            //         $template['modules'] = 'home';
            //         $template['layout'] = 'v_home';                      
            // } 

            $this->load->view('v_backend',$template);
        }       
    } 



}
