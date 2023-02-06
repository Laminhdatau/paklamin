<?php

class M_grafik extends CI_Model
{
    //put your code here
    public function getData($kelas)
    {
        $sql = "SELECT dp.kd_dosen_pengampu,so.id_bagian_soal,bs.bagian_soal, sum(DISTINCT(j.bobot)) as jumlah
        FROM t_answer_kuesioner ak
            ,t_survei s
            ,t_detail_krs dk
            ,t_jawaban j
            ,t_paket_perkuliahan pp
            ,t_dosen_pengampu dp
            ,t_soal so
            ,t_bagian_soal bs
        WHERE s.id_survei=ak.id_survei
            and so.id_soal=ak.id_soal
            and j.id_jawaban=ak.id_jawaban
            and dk.kd_detail_krs=s.kd_detail_krs
            and pp.kd_paket_perkuliahan=dk.kd_paket_perkuliahan
            and dp.kd_mata_kuliah=pp.kd_mata_kuliah
            and bs.id_bagian_soal=so.id_bagian_soal
            and s.id_jenis_survei=1
            and dp.id_kelas=2
        GROUP BY dp.kd_dosen_pengampu,so.id_bagian_soal,bs.bagian_soal
        ORDER by so.id_bagian_soal asc";
        $hasil = $this->db->query($sql);
        if ($hasil) {
            return $hasil->result();
        } else {
            return 0;
        }
    }

    public function getDataByDosen($id)
    {
        $sql = "SELECT bs.bagian_soal, COUNT(su.id_survei) AS jumlah_survei FROM t_answer_kuesioner ak LEFT JOIN t_survei su ON su.id_survei = ak.id_survei LEFT JOIN t_soal s ON s.id_soal = ak.id_soal LEFT JOIN t_bagian_soal bs ON bs.id_bagian_soal = s.id_bagian_soal WHERE bs.bagian_soal is not null GROUP BY bs.bagian_soal ORDER BY bagian_soal ASC  ";
        $hasil = $this->db->query($sql);
        if ($hasil) {
            return $hasil->result();
        } else {
            return 0;
        }
    }
}
