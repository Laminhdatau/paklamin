<?php

class M_grafik extends CI_Model
{
    // //put your code here
    public function getData($kd = null)
    {
        $hasil = "";
        if ($kd != null || $kd != "") {


            $sql = "SELECT 1 as id_bagian_soal, j.id_jawaban, j.jawaban,bs.bagian_soal, COALESCE(ROUND( ( vg.jumlahsoal /(vtd.total_soal * vmd.total_mhs) ) * 100, 0 ),0) AS persentase FROM t_jawaban j LEFT JOIN v_grafik vg ON(vg.id_jawaban = j.id_jawaban AND vg.kd_dosen = '" . $kd . "' and vg.id_bagian_soal=1) 
            LEFT JOIN t_bagian_soal bs ON(vg.id_bagian_soal = bs.id_bagian_soal) 
            LEFT JOIN v_ttl_soal_dosen vtd ON(vtd.id_bagian_soal = vg.id_bagian_soal) 
            LEFT JOIN v_total_mhs_dosen vmd ON(vg.kd_dosen = vmd.kd_dosen ) WHERE j.id_jawaban > 0
            UNION
            SELECT 2 as id_bagian_soal, j.id_jawaban, j.jawaban,bs.bagian_soal, COALESCE(ROUND( ( vg.jumlahsoal /(vtd.total_soal * vmd.total_mhs) ) * 100, 0 ),0) AS persentase FROM t_jawaban j LEFT JOIN v_grafik vg ON(vg.id_jawaban = j.id_jawaban AND vg.kd_dosen = '" . $kd . "' and vg.id_bagian_soal=2) 
            LEFT JOIN t_bagian_soal bs ON(vg.id_bagian_soal = bs.id_bagian_soal) 
            LEFT JOIN v_ttl_soal_dosen vtd ON(vtd.id_bagian_soal = vg.id_bagian_soal) 
            LEFT JOIN v_total_mhs_dosen vmd ON(vg.kd_dosen = vmd.kd_dosen ) WHERE j.id_jawaban > 0
            UNION
            SELECT 3 as id_bagian_soal, j.id_jawaban, j.jawaban,bs.bagian_soal, COALESCE(ROUND( ( vg.jumlahsoal /(vtd.total_soal * vmd.total_mhs) ) * 100, 0 ),0) AS persentase FROM t_jawaban j LEFT JOIN v_grafik vg ON(vg.id_jawaban = j.id_jawaban AND vg.kd_dosen = '" . $kd . "' and vg.id_bagian_soal=3) 
            LEFT JOIN t_bagian_soal bs ON(vg.id_bagian_soal = bs.id_bagian_soal) 
            LEFT JOIN v_ttl_soal_dosen vtd ON(vtd.id_bagian_soal = vg.id_bagian_soal) 
            LEFT JOIN v_total_mhs_dosen vmd ON(vg.kd_dosen = vmd.kd_dosen ) WHERE j.id_jawaban > 0";
            $hasil = $this->db->query($sql);
        }
        if ($hasil) {
            return $hasil->result();
        } else {
            return 0;
        }
    }
    public function getData2($kd = null)
    {
        $hasil = "";
        if ($kd != null || $kd != "") {


            $sql = "SELECT
            1 AS id_bagian_soal,
            j.id_jawaban,
            j.jawaban,
            vgm.jumlahsoal,
            COALESCE( ROUND( ( vgm.jumlahsoal /(vtm.total_soal * vmk.ttl_mhs)) * 100, 0 ),0) AS persentase
        FROM t_jawaban j
        LEFT JOIN v_grafik_mk vgm ON
            (vgm.id_jawaban = j.id_jawaban 
                AND vgm.kd_mata_kuliah = '" . $kd . "' 
                AND vgm.id_bagian_soal = 1  )
        LEFT JOIN v_total_soal_mk vtm ON(vtm.id_bagian_soal = vgm.id_bagian_soal)
        LEFT JOIN v_total_mhs_mk vmk ON(vgm.kd_mata_kuliah = vmk.kd_mata_kuliah)
        WHERE j.id_jawaban > 0
        UNION
        SELECT
            2 AS id_bagian_soal,
            j.id_jawaban,
            j.jawaban,
            vgm.jumlahsoal,
            COALESCE( ROUND( ( vgm.jumlahsoal /(vtm.total_soal * vmk.ttl_mhs)) * 100, 0 ),0) AS persentase
        FROM t_jawaban j
        LEFT JOIN v_grafik_mk vgm ON
            (vgm.id_jawaban = j.id_jawaban 
                AND vgm.kd_mata_kuliah = '" . $kd . "'
                AND vgm.id_bagian_soal = 2  )
        LEFT JOIN v_total_soal_mk vtm ON(vtm.id_bagian_soal = vgm.id_bagian_soal)
        LEFT JOIN v_total_mhs_mk vmk ON(vgm.kd_mata_kuliah = vmk.kd_mata_kuliah)
        WHERE j.id_jawaban > 0
        UNION
        SELECT
            3 AS id_bagian_soal,
            j.id_jawaban,
            j.jawaban,
            vgm.jumlahsoal,
            COALESCE( ROUND( ( vgm.jumlahsoal /(vtm.total_soal * vmk.ttl_mhs)) * 100, 0 ),0) AS persentase
        FROM t_jawaban j
        LEFT JOIN v_grafik_mk vgm ON
            (vgm.id_jawaban = j.id_jawaban 
                AND vgm.kd_mata_kuliah = '" . $kd . "' 
                AND vgm.id_bagian_soal = 3  )
        LEFT JOIN v_total_soal_mk vtm ON(vtm.id_bagian_soal = vgm.id_bagian_soal)
        LEFT JOIN v_total_mhs_mk vmk ON(vgm.kd_mata_kuliah = vmk.kd_mata_kuliah)
        WHERE j.id_jawaban > 0";
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

    function getAllMk($idp = null)
    {
        $w = "";
        if ($idp != null) {

            $w = " and d.id_prodi='" . $idp . "'";
        }
        return $this->db->query("SELECT mk.kd_mata_kuliah,mk.nama_mata_kuliah FROM t_mata_kuliah mk
        ,t_paket_perkuliahan pp 
        ,t_detail_krs dk
        ,t_dosen_pengampu dp
        ,t_dosen d
        where mk.kd_mata_kuliah=pp.kd_mata_kuliah
        and dk.kd_paket_perkuliahan=pp.kd_paket_perkuliahan
        and dp.kd_mata_kuliah=mk.kd_mata_kuliah
        AND d.kd_dosen=dp.kd_dosen
        " . $w . "
        group by mk.kd_mata_kuliah")->result();
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

    public function getOption()
    {
        return $this->db->query("select * from t_jawaban where id_jawaban !=0 order by id_jawaban")->result();
    }

    public function getSeluruh($kd = null)
    {
        $semua = $this->db->query("SELECT dp.kd_dosen,count(kp.nim) as jumlah_seluruh FROM t_dosen_pengampu dp
        ,t_kelas_perkuliahan kp
        where dp.kd_dosen='" . $kd . "'
        and dp.id_periode_perkuliahan in (select id_periode_perkuliahan from t_periode_perkuliahan WHERE status='1')
        and kp.id_kelas=dp.id_kelas
        and kp.id_periode_perkuliahan=dp.id_periode_perkuliahan")->result();
        $semuamk = $this->db->query("SELECT
        dp.kd_mata_kuliah,
        COUNT(kp.nim) AS jumlah_seluruh
        FROM
            t_dosen_pengampu dp,
            t_kelas_perkuliahan kp
        WHERE
            dp.kd_mata_kuliah = '" . $kd . "' AND dp.id_periode_perkuliahan IN(
            SELECT
                id_periode_perkuliahan
            FROM
                t_periode_perkuliahan
            WHERE
        STATUS
            = '1'
        ) AND kp.id_kelas = dp.id_kelas AND kp.id_periode_perkuliahan = dp.id_periode_perkuliahan")->result();

        $partisipan = $this->db->query("select * from v_total_mhs_dosen where kd_dosen='" . $kd . "'")->result();
        $partisipanmk = $this->db->query("select * from v_total_mhs_mk where kd_mata_kuliah='" . $kd . "'")->result();
        $kelas = $this->db->query("SELECT dp.kd_dosen,count(distinct(kp.id_kelas)) as jumlah_kelas FROM t_dosen_pengampu dp
        ,t_kelas_perkuliahan kp
        where dp.kd_dosen='" . $kd . "'
        and dp.id_periode_perkuliahan in (select id_periode_perkuliahan from t_periode_perkuliahan WHERE status='1')
        and kp.id_kelas=dp.id_kelas
        and kp.id_periode_perkuliahan=dp.id_periode_perkuliahan")->result();
        $kelasmk = $this->db->query("SELECT
        dp.kd_mata_kuliah,
        COUNT(DISTINCT(dp.id_kelas)) AS jumlah_kelas
        FROM
            t_dosen_pengampu dp,
            t_kelas_perkuliahan kp
        WHERE
            dp.kd_mata_kuliah = '" . $kd . "' AND dp.id_periode_perkuliahan IN(
            SELECT
                id_periode_perkuliahan
            FROM
                t_periode_perkuliahan
            WHERE
        STATUS
            = '1'
        ) AND kp.id_kelas = dp.id_kelas 
        AND kp.id_periode_perkuliahan = dp.id_periode_perkuliahan")->result();

        $listmk = $this->db->query("SELECT dp.kd_dosen,mk.kd_mata_kuliah,mk.nama_mata_kuliah,COUNT(DISTINCT(mk.kd_mata_kuliah)) as total_mk FROM t_dosen_pengampu dp
        ,t_kelas_perkuliahan kp
        ,t_mata_kuliah mk
        where dp.kd_dosen='" . $kd . "'
        and dp.id_periode_perkuliahan in (select id_periode_perkuliahan from t_periode_perkuliahan WHERE status='1')
        and kp.id_kelas=dp.id_kelas
        and mk.kd_mata_kuliah=dp.kd_mata_kuliah
        and kp.id_periode_perkuliahan=dp.id_periode_perkuliahan
        GROUP by dp.kd_dosen,mk.kd_mata_kuliah
        order by kd_mata_kuliah")->result();

        $koment = $this->db->query("select DISTINCT(s.komentar),day(s.waktu) as tan,
        CASE 
           WHEN MONTH(s.waktu) = 1 THEN 'Januari'
           WHEN MONTH(s.waktu) = 2 THEN 'Februari'
           WHEN MONTH(s.waktu) = 3 THEN 'Maret'
           WHEN MONTH(s.waktu) = 4 THEN 'April'
           WHEN MONTH(s.waktu) = 5 THEN 'Mei'
           WHEN MONTH(s.waktu) = 6 THEN 'Juni'
           WHEN MONTH(s.waktu) = 7 THEN 'Juli'
           WHEN MONTH(s.waktu) = 8 THEN 'Agustus'
           WHEN MONTH(s.waktu) = 9 THEN 'September'
           WHEN MONTH(s.waktu) = 10 THEN 'Oktober'
           WHEN MONTH(s.waktu) = 11 THEN 'November'
           WHEN MONTH(s.waktu) = 12 THEN 'Desember'
         END AS bulan
        from t_dosen_pengampu dp
                ,t_survei s
                ,t_kelas_perkuliahan kp
        where dp.kd_dosen='" . $kd . "'
                and dp.id_periode_perkuliahan in (select id_periode_perkuliahan from t_periode_perkuliahan WHERE status='1')
               
        and s.kd_dosen=dp.kd_dosen")->result();

        $komentmk = $this->db->query("select DISTINCT(s.komentar),day(s.waktu) as tan,
        CASE 
           WHEN MONTH(s.waktu) = 1 THEN 'Januari'
           WHEN MONTH(s.waktu) = 2 THEN 'Februari'
           WHEN MONTH(s.waktu) = 3 THEN 'Maret'
           WHEN MONTH(s.waktu) = 4 THEN 'April'
           WHEN MONTH(s.waktu) = 5 THEN 'Mei'
           WHEN MONTH(s.waktu) = 6 THEN 'Juni'
           WHEN MONTH(s.waktu) = 7 THEN 'Juli'
           WHEN MONTH(s.waktu) = 8 THEN 'Agustus'
           WHEN MONTH(s.waktu) = 9 THEN 'September'
           WHEN MONTH(s.waktu) = 10 THEN 'Oktober'
           WHEN MONTH(s.waktu) = 11 THEN 'November'
           WHEN MONTH(s.waktu) = 12 THEN 'Desember'
         END AS bulan
        from t_dosen_pengampu dp
                ,t_survei s
                ,t_kelas_perkuliahan kp
                ,t_paket_perkuliahan pp
                ,t_detail_krs dk
                
        where pp.kd_mata_kuliah='".$kd."'
                and dp.id_periode_perkuliahan in (select id_periode_perkuliahan from t_periode_perkuliahan WHERE status='1')
          and s.kd_detail_krs=dk.kd_detail_krs     
        and dk.kd_paket_perkuliahan=pp.kd_paket_perkuliahan")->result();

        $responden = array(
            "1" => $partisipan,
            "2" => $semua,
            "3" => $kelas,
            "4" => $listmk,
            "5" => $koment,

            // ================
            "6" => $partisipanmk,
            "7" => $semuamk,
            "8" => $kelasmk,
            "9" => $komentmk,
        );
        return $responden;
    }
}
