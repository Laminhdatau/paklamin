<?php

class M_grafik extends CI_Model
{
    // //put your code here
    public function getData($kd = null)
    {
        $hasil = "";
        if ($kd != null || $kd != "") {


            $sql = "SELECT 1 as id_bagian_soal, j.id_jawaban, j.jawaban,bs.bagian_soal, COALESCE(ROUND( ( vg.jumlahsoal /(vtd.total_soal * vmd.ttl_mhs) ) * 100, 0 ),0) AS persentase FROM t_jawaban j LEFT JOIN v_grafik vg ON(vg.id_jawaban = j.id_jawaban AND vg.kd_dosen = '" . $kd . "' and vg.id_bagian_soal=1) LEFT JOIN t_bagian_soal bs ON(vg.id_bagian_soal = bs.id_bagian_soal) LEFT JOIN v_ttl_soal_dosen vtd ON(vtd.id_bagian_soal = vg.id_bagian_soal) LEFT JOIN v_total_mhs_dosen vmd ON(vmd.id_bagian_soal = vg.id_bagian_soal AND vg.kd_dosen = vmd.kd_dosen ) WHERE j.id_jawaban > 0 
            UNION
            SELECT 2 as id_bagian_soal, j.id_jawaban, j.jawaban,bs.bagian_soal, COALESCE(ROUND( ( vg.jumlahsoal /(vtd.total_soal * vmd.ttl_mhs) ) * 100, 0 ),0) AS persentase FROM t_jawaban j LEFT JOIN v_grafik vg ON(vg.id_jawaban = j.id_jawaban AND vg.kd_dosen = '" . $kd . "' and vg.id_bagian_soal=2) LEFT JOIN t_bagian_soal bs ON(vg.id_bagian_soal = bs.id_bagian_soal) LEFT JOIN v_ttl_soal_dosen vtd ON(vtd.id_bagian_soal = vg.id_bagian_soal) LEFT JOIN v_total_mhs_dosen vmd ON(vmd.id_bagian_soal = vg.id_bagian_soal AND vg.kd_dosen = vmd.kd_dosen ) WHERE j.id_jawaban > 0 
            UNION
            SELECT 3 as id_bagian_soal, j.id_jawaban, j.jawaban,bs.bagian_soal, COALESCE(ROUND( ( vg.jumlahsoal /(vtd.total_soal * vmd.ttl_mhs) ) * 100, 0 ),0) AS persentase FROM t_jawaban j LEFT JOIN v_grafik vg ON(vg.id_jawaban = j.id_jawaban AND vg.kd_dosen = '" . $kd . "' and vg.id_bagian_soal=3) LEFT JOIN t_bagian_soal bs ON(vg.id_bagian_soal = bs.id_bagian_soal) LEFT JOIN v_ttl_soal_dosen vtd ON(vtd.id_bagian_soal = vg.id_bagian_soal) LEFT JOIN v_total_mhs_dosen vmd ON(vmd.id_bagian_soal = vg.id_bagian_soal AND vg.kd_dosen = vmd.kd_dosen ) WHERE j.id_jawaban > 0";
            $hasil = $this->db->query($sql);
        }
        if ($hasil) {
            return $hasil->result();
        } else {
            return 0;
        }
    }


    public function getDetail()
    {
        return $this->db->query("SELECT
        dp.kd_dosen,
        s.id_jenis_survei,
        so.id_bagian_soal,
        bs.bagian_soal,
        COUNT(DISTINCT(so.id_soal)) as jumlah_soal,
        SUM(j.bobot) AS jumlah,
        COUNT(DISTINCT(kp.nim)) AS total_respon,
        ROUND(
            (
                COUNT(DISTINCT(kp.nim))/(SUM(j.bobot))*100
            )
        ) AS persentase,
        bk.nama_lengkap
    FROM
        t_survei s,
        t_answer_kuesioner ak,
        t_jawaban j,
        t_soal so
    LEFT JOIN t_bagian_soal bs ON
        (
            bs.id_bagian_soal = so.id_bagian_soal
        ),
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
        ) AND d.kd_dosen = dp.kd_dosen AND ks.id_periode_perkulihan IN(
        SELECT
            id_periode_perkuliahan
        FROM
            t_periode_perkuliahan
        WHERE
    STATUS
        = '1'
    ) AND s.id_jenis_survei = '1' AND dp.id_kelas = kp.id_kelas
    GROUP BY
        dp.kd_dosen,
        s.id_jenis_survei,
        so.id_bagian_soal
    ORDER BY
        dp.kd_dosen,
        s.id_jenis_survei,
        so.id_bagian_soal")->result();
    }


    function getAllDosen($idp = null)
    {
        $w = "";
        if ($idp != null) {

            $w = " and d.id_prodi='" . $idp . "'";
        }

        return $this->db->query("SELECT d.kd_dosen,bk.nama_lengkap
        FROM t_dosen d
        LEFT JOIN t_biodata_karyawan bk ON  bk.nik = d.nik 
        where bk.sts_data='1'
        " . $w . "
        order by d.id_prodi,bk.nama_lengkap")->result();
    }




    function hapusAnswer($id)
    {
        $this->db->where('id_answer', $id);
        return $this->db->delete('t_answer_kuesioner');
    }
    function hapusSurvei($id1)
    {
        $this->db->where('id_survei', $id1);
        return $this->db->delete('t_survei');
    }
}
