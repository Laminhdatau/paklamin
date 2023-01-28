<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Survei extends MX_Controller
{
    //put your code here
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_survei');
    }

    public function index()
    {
        // $nim = "20501049";
        $nim = nim($this->session->userdata('security')->id_cession);
        
        $a['data'] = $this->m_survei->getData($nim);
        $a['layout'] = 'v_survei';
        $a['modules'] = 'survei';
        echo Modules::run('template/backend', $a);
    }
    public function isisurvei()
    {
        $id = $this->uri->segment(3);//id_jenis_survei
        $a['id_jenis']=$id;
        $a['kd'] = $this->uri->segment(4);//kd_dosen
        $a['kd_mk'] = $this->uri->segment(5);//kd_matakuliah
        $a['nama'] = $this->uri->segment(6);//nama_dosen
        $data1 = $this->m_survei->getSoalStep1($id);
        if (!empty($data1)) {
            $a['survei1'] = $data1['survei'];
            $a['soal1'] = $data1['soal'];
            $a['bagian1'] = $data1['bagian'];
            $a['jenis1'] = $data1['jenis'];
            $a['option1'] = $data1['option'];
        }
        $data2 = $this->m_survei->getSoalStep2($id);
        if (!empty($data2)) {
            $a['survei2'] = $data2['survei'];
            $a['soal2'] = $data2['soal'];
            $a['bagian2'] = $data2['bagian'];
            $a['jenis2'] = $data2['jenis'];
            $a['option2'] = $data2['option'];
        }
        $data3 = $this->m_survei->getSoalStep3($id);
        if (!empty($data3)) {
            $a['survei3'] = $data2['survei'];
            $a['soal3'] = $data3['soal'];
            $a['bagian3'] = $data3['bagian'];
            $a['jenis3'] = $data3['jenis'];
            $a['option3'] = $data3['option'];
        }
        // print_r($a);die;
        
        $a['layout'] = 'v_temp';
        $a['modules'] = 'survei';
        echo Modules::run('template/backend', $a);
    }


    public function prosesSurvei()
    {
        // ambil data dari form
        $nim=nim($this->session->userdata('security')->id_cession);
        $id_jenis = $this->input->post('id_jenis');
        $kd = $this->input->post('kd_dosen');
        $kd_mk = $this->input->post('kd_mata_kuliah');
        $soal1 = $this->input->post('soal1');
        $soal2 = $this->input->post('soal2');
        $soal3 = $this->input->post('soal3');
        $option1 = $this->input->post('option1');
        $option2 = $this->input->post('option2');
        $option3 = $this->input->post('option3');
        $komentar = $this->input->post('komentar');

        $kd_detail_krs=$this->m_survei->getData($nim,$kd,$kd_mk);
        
        // validasi input
        if (empty($kd_detail_krs) || empty($soal1) ||empty($soal2) ||empty($soal3) ||empty($option1) ||empty($option2) ||empty($option3) || empty($komentar)){
            // tampilkan pesan error jika data input tidak lengkap
            $this->session->set_flashdata('error', 'Data tidak lengkap, silahkan isi kembali kuisioner');
            redirect(base_url('survei/isisurvei'));
        }
        $id_survei=uuid_generator();
        $survei = array(
            'id_survei'=>$id_survei,
            'kd_detail_krs'=>$kd_detail_krs[0]->kd_detail_krs,
            'id_jenis_survei'=>$id_jenis,
            'komentar'=>$komentar

        );
        $b=$this->m_survei->simpanSurvei($survei);
        // print_r($option1);die;
        
        if($b){
            for ($i=1;$i <= count($soal1);$i++){
                $id_soal=$soal1[$i];
                $id_jawaban=$option1[$i];
                $answer= array(
                    'id_answer'=>uuid_generator(),
                    'id_survei'=>$id_survei,
                    'id_soal'=>$id_soal,
                    'id_jawaban'=>$id_jawaban
                );
                $this->m_survei->simpanAnswer($answer);
            }
            for ($i=1;$i <= count($soal2);$i++){
                $id_soal=$soal2[$i];
                $id_jawaban=$option2[$i];
                $answer= array(
                    'id_answer'=>uuid_generator(),
                    'id_survei'=>$id_survei,
                    'id_soal'=>$id_soal,
                    'id_jawaban'=>$id_jawaban
                );
                $this->m_survei->simpanAnswer($answer);
            }
            for ($i=1;$i <= count($soal3);$i++){
                $id_soal=$soal3[$i];
                $id_jawaban=$option3[$i];
                $answer= array(
                    'id_answer'=>uuid_generator(),
                    'id_survei'=>$id_survei,
                    'id_soal'=>$id_soal,
                    'id_jawaban'=>$id_jawaban
                );
                $this->m_survei->simpanAnswer($answer);
            }
        }
        // cek apakah data berhasil dimasukkan ke database
        if ($b) {
            // tampilkan pesan sukses jika insert data berhasil
            $this->session->set_flashdata('success', '<div style="background-color:green;color=white;heigth:50%;" class="col-sm-12">Terima Kasih Telah Mengisi Kuisioner</div>');
            redirect(base_url('survei'));
        } else {
            // tampilkan pesan error jika insert data gagal
            $this->session->set_flashdata('error', 'Terjadi kesalahan saat mengisi kuisioner, silahkan coba lagi');
            redirect(base_url('survei'));
        }
    }
}
