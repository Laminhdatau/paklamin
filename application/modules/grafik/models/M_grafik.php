<?php

class M_grafik extends CI_Model
{
    // //put your code here
    public function getDataTI($idp=null)
    {
        
        $wn="";
        if($idp != null){
            $wn=" and d.id_prodi=".$idp;
        }
        $sql = "SELECT
        dp.kd_dosen,
        s.id_jenis_survei,
        so.id_bagian_soal,
        bs.bagian_soal,
        SUM(j.bobot) AS jumlah,
        count(DISTINCT(kp.nim)) as total_respon,
        ROUND(COUNT(DISTINCT(kp.nim)) / SUM(j.id_jawaban) * 100) AS persentase,
        ROUND(COUNT(DISTINCT(kp.nim)) / SUM(j.bobot) * 100) AS persentasebobot,
        bk.nama_lengkap
    FROM
        t_survei s,
        t_answer_kuesioner ak,
        t_jawaban j,
        t_soal so
        left join t_bagian_soal bs on(bs.id_bagian_soal=so.id_bagian_soal)
        ,
        t_detail_krs dk,
        t_krs ks,
        t_kelas_perkuliahan kp,
        t_paket_perkuliahan pp,
        t_mata_kuliah mk,
        t_dosen_pengampu dp,
        t_dosen d
    LEFT JOIN t_biodata_karyawan bk ON
        (bk.nik = d.nik)
    WHERE
        ak.id_survei = s.id_survei AND j.id_jawaban = ak.id_jawaban AND(
            so.id_soal = ak.id_soal AND s.id_jenis_survei = so.id_jenis_survei
        ) AND dk.kd_detail_krs = s.kd_detail_krs AND ks.kd_krs = dk.kd_krs AND kp.nim = ks.nim AND kp.id_periode_perkuliahan = ks.id_periode_perkulihan AND pp.kd_paket_perkuliahan = dk.kd_paket_perkuliahan AND pp.kd_mata_kuliah = mk.kd_mata_kuliah AND(
            dp.kd_mata_kuliah = mk.kd_mata_kuliah AND dp.id_periode_perkuliahan = ks.id_periode_perkulihan
        ) 
        AND d.kd_dosen = dp.kd_dosen
        AND ks.id_periode_perkulihan IN(SELECT id_periode_perkuliahan FROM t_periode_perkuliahan WHERE STATUS = '1') 
        and s.id_jenis_survei='1'
        AND dp.id_kelas = kp.id_kelas 
        ".$wn." 
    GROUP BY
        dp.kd_dosen,
        s.id_jenis_survei,
        so.id_bagian_soal
    ORDER BY
        dp.kd_dosen,
        s.id_jenis_survei";
        $hasil = $this->db->query($sql);
        if ($hasil) {
            return $hasil->result();
        } else {
            return 0;
        }
    }

    public function getDataTI2($idp=null)
    {
        
        $wn="";
        if($idp != null){
            $wn=" and d.id_prodi=".$idp;
        }
        $sql = "SELECT
        dp.kd_dosen,
        s.id_jenis_survei,
        so.id_bagian_soal,
        bs.bagian_soal,
        SUM(j.bobot) AS jumlah,
        count(DISTINCT(kp.nim)) as total_respon,
        ROUND(COUNT(DISTINCT(kp.nim)) / SUM(j.bobot) * 100) AS persentase,
        bk.nama_lengkap
    FROM
        t_survei s,
        t_answer_kuesioner ak,
        t_jawaban j,
        t_soal so
        left join t_bagian_soal bs on(bs.id_bagian_soal=so.id_bagian_soal)
        ,
        t_detail_krs dk,
        t_krs ks,
        t_kelas_perkuliahan kp,
        t_paket_perkuliahan pp,
        t_mata_kuliah mk,
        t_dosen_pengampu dp,
        t_dosen d
    LEFT JOIN t_biodata_karyawan bk ON
        (bk.nik = d.nik)
    WHERE
        ak.id_survei = s.id_survei AND j.id_jawaban = ak.id_jawaban AND(
            so.id_soal = ak.id_soal AND s.id_jenis_survei = so.id_jenis_survei
        ) AND dk.kd_detail_krs = s.kd_detail_krs AND ks.kd_krs = dk.kd_krs AND kp.nim = ks.nim AND kp.id_periode_perkuliahan = ks.id_periode_perkulihan AND pp.kd_paket_perkuliahan = dk.kd_paket_perkuliahan AND pp.kd_mata_kuliah = mk.kd_mata_kuliah AND(
            dp.kd_mata_kuliah = mk.kd_mata_kuliah AND dp.id_periode_perkuliahan = ks.id_periode_perkulihan
        ) 
        AND d.kd_dosen = dp.kd_dosen
        AND ks.id_periode_perkulihan IN(SELECT id_periode_perkuliahan FROM t_periode_perkuliahan WHERE STATUS = '1') 
        and s.id_jenis_survei='1'
        and so.id_bagian_soal='2'
        AND dp.id_kelas = kp.id_kelas 
        ".$wn." 
    GROUP BY
        dp.kd_dosen,
        s.id_jenis_survei,
        so.id_bagian_soal
    ORDER BY
        dp.kd_dosen,
        s.id_jenis_survei";
        $hasil = $this->db->query($sql);
        if ($hasil) {
            return $hasil->result();
        } else {
            return 0;
        }
    }

    public function getDataTI3($idp=null)
    {
        
        $wn="";
        if($idp != null){
            $wn=" and d.id_prodi=".$idp;
        }
        $sql = "SELECT
        dp.kd_dosen,
        s.id_jenis_survei,
        so.id_bagian_soal,
        bs.bagian_soal,
        SUM(j.bobot) AS jumlah,
        count(DISTINCT(kp.nim)) as total_respon,
        ROUND(COUNT(DISTINCT(kp.nim)) / SUM(j.bobot) * 100) AS persentase,
        bk.nama_lengkap
    FROM
        t_survei s,
        t_answer_kuesioner ak,
        t_jawaban j,
        t_soal so
        left join t_bagian_soal bs on(bs.id_bagian_soal=so.id_bagian_soal)
        ,
        t_detail_krs dk,
        t_krs ks,
        t_kelas_perkuliahan kp,
        t_paket_perkuliahan pp,
        t_mata_kuliah mk,
        t_dosen_pengampu dp,
        t_dosen d
    LEFT JOIN t_biodata_karyawan bk ON
        (bk.nik = d.nik)
    WHERE
        ak.id_survei = s.id_survei AND j.id_jawaban = ak.id_jawaban AND(
            so.id_soal = ak.id_soal AND s.id_jenis_survei = so.id_jenis_survei
        ) AND dk.kd_detail_krs = s.kd_detail_krs AND ks.kd_krs = dk.kd_krs AND kp.nim = ks.nim AND kp.id_periode_perkuliahan = ks.id_periode_perkulihan AND pp.kd_paket_perkuliahan = dk.kd_paket_perkuliahan AND pp.kd_mata_kuliah = mk.kd_mata_kuliah AND(
            dp.kd_mata_kuliah = mk.kd_mata_kuliah AND dp.id_periode_perkuliahan = ks.id_periode_perkulihan
        ) 
        AND d.kd_dosen = dp.kd_dosen
        AND ks.id_periode_perkulihan IN(SELECT id_periode_perkuliahan FROM t_periode_perkuliahan WHERE STATUS = '1') 
        and s.id_jenis_survei='1'
        and so.id_bagian_soal='3'
        AND dp.id_kelas = kp.id_kelas 
        ".$wn." 
    GROUP BY
        dp.kd_dosen,
        s.id_jenis_survei,
        so.id_bagian_soal
    ORDER BY
        dp.kd_dosen,
        s.id_jenis_survei";
        $hasil = $this->db->query($sql);
        if ($hasil) {
            return $hasil->result();
        } else {
            return 0;
        }
    }

    function getAllDosenTI(){
        return $this->db->query("SELECT DISTINCT
        (d.kd_dosen),
        bk.nama_lengkap
    FROM
        t_dosen_pengampu dp
    LEFT JOIN t_dosen d ON
        d.kd_dosen = dp.kd_dosen
        and d.id_prodi='3'
    LEFT JOIN t_biodata_karyawan bk ON
        bk.nik = d.nik where d.kd_dosen")->result();
        
    }
    function getAllDosenTHP(){
        return $this->db->query("SELECT DISTINCT
        (d.kd_dosen),
        bk.nama_lengkap
    FROM
        t_dosen_pengampu dp
    LEFT JOIN t_dosen d ON
        d.kd_dosen = dp.kd_dosen
        and d.id_prodi='2'
    LEFT JOIN t_biodata_karyawan bk ON
        bk.nik = d.nik where d.kd_dosen")->result();
        
    }
    function getAllDosenMPP(){
        return $this->db->query("SELECT DISTINCT
        (d.kd_dosen),
        bk.nama_lengkap
    FROM
        t_dosen_pengampu dp
    LEFT JOIN t_dosen d ON
        d.kd_dosen = dp.kd_dosen
        and d.id_prodi='1'
    LEFT JOIN t_biodata_karyawan bk ON
        bk.nik = d.nik where d.kd_dosen")->result();
        
    }
    
    function hapusAnswer($id){
        $this->db->where('id_answer', $id);
        return $this->db->delete('t_answer_kuesioner');
    }
    function hapusSurvei($id1){
        $this->db->where('id_survei', $id1);
        return $this->db->delete('t_survei');
    }
}
