<?php

class M_grafik extends CI_Model
{
    // //put your code here
    public function getData($kd = null)
    {
        $hasil = "";
        if ($kd != null || $kd != "") {


            $sql = "SELECT
        vg.id_bagian_soal,bs.bagian_soal,
        j.id_jawaban,j.jawaban,
        ROUND(
            (
                vg.jumlahsoal /(vtd.total_soal * vmd.ttl_mhs)
            ) * 100,
            0
        ) AS persentase
    FROM
        t_jawaban j
    LEFT JOIN v_grafik vg ON
        (vg.id_jawaban = j.id_jawaban)
    left join t_bagian_soal bs on (vg.id_bagian_soal=bs.id_bagian_soal)
    LEFT JOIN v_ttl_soal_dosen vtd ON
        (
            vtd.id_bagian_soal = vg.id_bagian_soal
        )
    LEFT JOIN v_total_mhs_dosen vmd ON
        (
            vmd.id_bagian_soal = vg.id_bagian_soal
        )
    WHERE
        j.id_jawaban > 0 
        AND NOT(ISNULL(vg.id_bagian_soal)) 
        AND vg.kd_dosen = vmd.kd_dosen 
        AND vg.kd_dosen ='" . $kd . "'";
            $hasil = $this->db->query($sql);
        }
        if ($hasil) {
            return $hasil->result();
        } else {
            return 0;
        }
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
