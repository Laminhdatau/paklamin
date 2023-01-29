<?php

class M_grafik extends CI_Model
{
    //put your code here
    public function getData()
    {
        $sql = "SELECT bs.bagian_soal, COUNT(su.id_survei) AS jumlah_survei FROM t_answer_kuesioner ak LEFT JOIN t_survei su ON su.id_survei = ak.id_survei LEFT JOIN t_soal s ON s.id_soal = ak.id_soal LEFT JOIN t_bagian_soal bs ON bs.id_bagian_soal = s.id_bagian_soal WHERE bs.bagian_soal is not null GROUP BY bs.bagian_soal ORDER BY jumlah_survei ASC ";
        $hasil = $this->db->query($sql);
        if ($hasil) {
            return $hasil->result();
        } else {
            return 0;
        }
    }
}
