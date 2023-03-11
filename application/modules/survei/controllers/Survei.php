<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Survei extends MX_Controller
{
    //put your code here
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_survei');
        $this->load->library('form_validation');
    }

    public function index()
    {

        $nim = nim($this->session->userdata('security')->id_cession);
        // $data['active_periods'] = $this->m_survei->get_active_periods();
        $a['data'] = $this->m_survei->getData($nim);

        $a['layout'] = 'v_survei';
        $a['modules'] = 'survei';
        echo Modules::run('template/backend', $a);
    }
    public function isisurvei()
    {
        $id = $this->uri->segment(3); //id_jenis_survei
        $a['id_jenis'] = $id;
        $a['kd'] = $this->uri->segment(4); //kd_dosen
        $a['kd_mk'] = $this->uri->segment(5); //kd_matakuliah
        $a['nama'] = $this->uri->segment(6); //nama_dosen
        if ($id == 2) {
            $a['kd'] = "0"; //kd_dosen
            $a['kd_mk'] = $this->uri->segment(4); //kd_matakuliah
        }
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
        $a['layout'] = 'v_isisurvei';
        $a['modules'] = 'survei';
        echo Modules::run('template/backend', $a);
    }


    public function prosesSurvei()
    {
        // ambil data dari form
        $nim = nim($this->session->userdata('security')->id_cession);
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
        $kd_detail_krs = $this->m_survei->getData($nim, $kd, $kd_mk);


        if (empty($kd_detail_krs) || empty($soal1) || empty($soal2) || empty($soal3) || empty($option1) || empty($option2) || empty($option3)) {
            $this->session->set_flashdata('message', '<div class="btn alert-danger col-md-12">
            Jawaban Tidak Valid, Silahkan isi kembali kuisioner.</div>');
            // redirect(base_url('survei/isisurvei'));
            redirect('survei');
        } else {
            foreach ($soal1 as $key => $value) {
                if (empty($option1[$key])) {
                    $this->session->set_flashdata('message', '<div class="btn alert-danger col-md-12">
                    Opsi pada pertanyaan ' . $key . ' belum diisi. Silahkan isi kembali kuisioner.</div>');
                    redirect('survei/');
                }
            }

            foreach ($soal2 as $key => $value) {
                if (empty($option2[$key])) {
                    $this->session->set_flashdata('message', '<div class="btn alert-danger col-md-12">
                    Opsi pada pertanyaan ' . $key . ' belum diisi. Silahkan isi kembali kuisioner.</div>');
                    redirect('survei/');
                }
            }
            foreach ($soal2 as $key => $value) {
                if (empty($option2[$key])) {
                    $this->session->set_flashdata('message', '<div class="btn alert-danger col-md-12">
                    Opsi pada pertanyaan ' . $key . ' belum diisi. Silahkan isi kembali kuisioner.</div>');
                    redirect('survei/');
                }
            }
        }






        //     else if (empty($_POST['radio'])) {
        //         // Menyimpan Jawaban SEBELUMNYA
        //         $this->session->set_userdata('soal1', $soal1);
        //         $this->session->set_userdata('soal2', $soal2);
        //         $this->session->set_userdata('soal3', $soal3);
        //         $this->session->set_userdata('option1', $option1);
        //         $this->session->set_userdata('option2', $option2);
        //         $this->session->set_userdata('option3', $option3);

        //         $this->session->set_flashdata('message', '<div class="btn alert-danger col-md-12">
        // Semua Opsi Kuisioner Dosen Wajib Di isi yaa!!.</div>');
        //         // redirect(base_url('survei/isisurvei'));
        //         redirect('survei/isisurvei/');

        //     }
        $id_survei = uuid_generator();
        $survei = array(
            'id_survei' => $id_survei,
            'kd_detail_krs' => $kd_detail_krs[0]->kd_detail_krs,
            'kd_dosen' => $kd,
            'id_jenis_survei' => $id_jenis,
            'komentar' => $komentar
        );
        $b = $this->m_survei->simpanSurvei($survei);

        if ($b) {
            for ($i = 1; $i <= count($soal1); $i++) {
                $id_soal = $soal1[$i];
                $id_jawaban = $option1[$i];
                $answer = array(
                    'id_answer' => uuid_generator(),
                    'id_survei' => $id_survei,
                    'id_soal' => $id_soal,
                    'id_jawaban' => $id_jawaban
                );
                $this->m_survei->simpanAnswer($answer);
            }
            for ($i = 1; $i <= count($soal2); $i++) {
                $id_soal = $soal2[$i];
                $id_jawaban = $option2[$i];
                $answer = array(
                    'id_answer' => uuid_generator(),
                    'id_survei' => $id_survei,
                    'id_soal' => $id_soal,
                    'id_jawaban' => $id_jawaban
                );
                $this->m_survei->simpanAnswer($answer);
            }
            for ($i = 1; $i <= count($soal3); $i++) {
                $id_soal = $soal3[$i];
                $id_jawaban = $option3[$i];
                $answer = array(
                    'id_answer' => uuid_generator(),
                    'id_survei' => $id_survei,
                    'id_soal' => $id_soal,
                    'id_jawaban' => $id_jawaban
                );
                $this->m_survei->simpanAnswer($answer);
            }
        }
        // JIKA BERHASIL MASUK KE DATABASE
        if ($b) {
            $this->session->set_flashdata('message', '<div class="btn alert-success col-md-12">
            <strong>Terima Kasih!</strong> Anda Telah Mengisi Semua Kuisioner. Silahkan Mengurus KRS</div>');
            redirect('survei');
        } else {
            // GAGAL
            $this->session->set_flashdata('message', '<div class="btn alert-dangger col-md-12">
            <strong>Maaf!</strong> Anda Tidak Boleh Mengisi Kuisioner Yang Sama.</div>');
            redirect('survei');
        }
    }
    // public function get_active_periods()
    // {
    //     $data = $this->m_survei->get_active_periods();

    //     echo json_encode($data);
    // }
}
