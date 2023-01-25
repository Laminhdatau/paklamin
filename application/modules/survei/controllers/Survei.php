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
        $nim = "20501049";
        $a['data'] = $this->m_survei->getData($nim);
        $a['layout'] = 'v_survei';
        $a['modules'] = 'survei';
        echo Modules::run('template/backend', $a);
    }
    public function isisurvei()
    {
        $id = $this->uri->segment(3);
        $a['kd'] = $this->uri->segment(4);
        $a['nama'] = $this->uri->segment(5);
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
        $id_answer = $this->input->post('id_answer');
        $survei = $this->input->post('survei');
        $soal = $this->input->post('soal');
        $option = $this->input->post('option');
        $komentar = $this->input->post('komentar');
        $full = array(
            $survei = explode(",", $survei),
            $soal = explode(",", $soal),
            $option = explode(",", $option),
            $komentar = explode(",", $komentar),

        );

        // validasi input
        if (empty($id_survei) || empty($soal) || empty($option)) {
            // tampilkan pesan error jika data input tidak lengkap
            $this->session->set_flashdata('error', 'Data tidak lengkap, silahkan isi kembali kuisioner');
            redirect(base_url('survei'));
        }

        // looping data soal dan option untuk dimasukkan ke database
        $data = [];
        for ($i = 0; $i < count($full); $i++) {
            $data = array(
                'id_answer' => uuid_generator(),
                'id_survei' => $survei[$i],
                'id_soal' => $soal[$i],
                'id_option' => $option[$i],
                'komentar' => $komentar[$i],
                $this->db->insert('v_kuisioner', $data)
            );
            // insert data ke tabel jawaban kuisioner
            var_dump(json_encode($data));
            die;
        }

        // cek apakah data berhasil dimasukkan ke database
        if ($this->db->affected_rows() > 0) {
            // tampilkan pesan sukses jika insert data berhasil
            $this->session->set_flashdata('success', 'Terima kasih telah mengisi kuisioner');
            redirect(base_url('survei'));
        } else {
            // tampilkan pesan error jika insert data gagal
            $this->session->set_flashdata('error', 'Terjadi kesalahan saat mengisi kuisioner, silahkan coba lagi');
            redirect(base_url('survei'));
        }
    }
}
