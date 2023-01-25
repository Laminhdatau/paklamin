<?php

class M_survei extends CI_Model
{
    //put your code here
    public function getData($nim)
    {

        return $this->db->query("SELECT dk.kd_detail_krs
                                        ,dp.kd_mata_kuliah
                                        ,d.kd_dosen
                                        ,bk.nama_lengkap as nama_dosen
                                        ,mk.nama_mata_kuliah

                                FROM t_detail_krs dk
                                        , t_krs k
                                        , t_kelas_perkuliahan kp
                                        , t_paket_perkuliahan pp
                                        , t_dosen_pengampu dp
                                left join t_mata_kuliah mk on (mk.kd_mata_kuliah=dp.kd_mata_kuliah)
                                left join t_dosen d on (d.kd_dosen=dp.kd_dosen)
                                left join t_biodata_karyawan bk on (bk.nik=d.nik)
                                where k.kd_krs = dk.kd_krs
                                and kp.nim = k.nim
                                and k.nim = '" . $nim . "'
                                and pp.kd_paket_perkuliahan = dk.kd_paket_perkuliahan
                                and (dp.kd_mata_kuliah = pp.kd_mata_kuliah
                                    and dp.id_periode_perkuliahan = kp.id_periode_perkuliahan
                                    and kp.id_kelas = dp.id_kelas
                                    )")->result();
    }
    public function getSoalStep1($id)
    {
        $soal = $this->db->query("SELECT s.*,b.bagian_soal from t_soal s 
        left join t_bagian_soal b on (b.id_bagian_soal=s.id_bagian_soal) 
        where s.id_jenis_survei='" . $id . "' 
        AND s.status='1' AND s.id_bagian_soal='1'")->result();
        $survei = $this->db->query("SELECT * from t_survei")->row_array();
        $soalbag = $this->db->query("SELECT * from t_bagian_soal where id_bagian_soal='1'")->row_array();
        $jenis = $this->db->query("SELECT * FROM t_jenis_survei where id_jenis_survei='.$id.'")->row_array();
        $option = $this->db->query("SELECT * FROM t_jawaban where id_jawaban > 0 order by id_jawaban asc")->result();
        $data = array(
            "survei" => $survei,
            "soal" => $soal,
            "bagian" => $soalbag,
            "jenis" => $jenis,
            "option" => $option
        );
        return $data;
    }
    public function getSoalStep2($id)
    {
        $soal = $this->db->query("SELECT s.*,b.bagian_soal from t_soal s 
        left join t_bagian_soal b on (b.id_bagian_soal=s.id_bagian_soal) 
        where s.id_jenis_survei='" . $id . "' 
        AND s.status='1' AND s.id_bagian_soal='2'")->result();
        $survei = $this->db->query("SELECT * from t_survei")->row_array();
        $soalbag = $this->db->query("SELECT * from t_bagian_soal where id_bagian_soal='2'")->row_array();
        $jenis = $this->db->query("SELECT * FROM t_jenis_survei where id_jenis_survei='.$id.'")->row_array();
        $option = $this->db->query("SELECT * FROM t_jawaban where id_jawaban > 0 order by id_jawaban asc")->result();
        $data = array(
            "survei" => $survei,
            "soal" => $soal,
            "bagian" => $soalbag,
            "jenis" => $jenis,
            "option" => $option
        );
        return $data;
    }
    public function getSoalStep3($id)
    {
        $soal = $this->db->query("SELECT s.*,b.bagian_soal from t_soal s 
        left join t_bagian_soal b on (b.id_bagian_soal=s.id_bagian_soal) 
        where s.id_jenis_survei='" . $id . "' 
        AND s.status='1' AND s.id_bagian_soal='3'")->result();
        $survei = $this->db->query("SELECT * from t_survei")->row_array();
        $soalbag = $this->db->query("SELECT * from t_bagian_soal where id_bagian_soal='3'")->row_array();
        $jenis = $this->db->query("SELECT * FROM t_jenis_survei where id_jenis_survei='.$id.'")->row_array();
        $option = $this->db->query("SELECT * FROM t_jawaban where id_jawaban > 0 order by id_jawaban asc")->result();
        $data = array(
            "survei" => $survei,
            "soal" => $soal,
            "bagian" => $soalbag,
            "jenis" => $jenis,
            "option" => $option
        );
        return $data;
    }
}
