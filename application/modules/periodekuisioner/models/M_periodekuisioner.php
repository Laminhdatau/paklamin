<?php

class M_periodekuisioner extends CI_Model
{
    //put your code here
    public function getData()
    {
        return $this->db->query('SELECT
        pku.id_pkuesioner,
        pp.id_periode_perkuliahan,
        pku.tmt,
        pku.tst,
        ta.tmt_tahun_ajaran AS daritahun,
        ta.tst_tahun_ajaran AS sampaitahun,
        m.semester,
        pp.status AS status_semester,
        IF(
            (
                ! ISNULL(pp.id_periode_perkuliahan)
            ),
            " ",
            " "
        ) AS ada
    FROM
        t_periode_kuesioner pku,
        t_tahun_ajaran ta,
        t_periode_perkuliahan pp
        ,m_semester m
    WHERE
        ta.id_tahun_ajaran = pp.id_tahun_ajaran AND pp.id_periode_perkuliahan = pku.id_periode_perkuliahan AND pku.id_pkuesioner != 0 AND m.id_semester=pp.id_semester
    GROUP BY
        pku.id_pkuesioner,
        pp.id_periode_perkuliahan
    ORDER BY
        pku.id_pkuesioner')->result();
    }
    function getPeriode()
    {
        return $this->db->query("SELECT pp.id_periode_perkuliahan,m.semester,ta.tmt_tahun_ajaran as daritahun,ta.tst_tahun_ajaran as sampaitahun,ta.status_tahun_ajaran
        FROM t_periode_perkuliahan pp
        ,t_tahun_ajaran ta
        ,m_semester m where
         pp.status='1'
        and ta.id_tahun_ajaran=pp.id_tahun_ajaran
        and m.id_semester=pp.id_semester")->result();
    }
    public function save_periodekuisioner($data = array())
    {
        return $this->db->insert("t_periode_kuesioner", $data);
    }
    public function hapus_data($id)
    {
        $this->db->where('id_pkuesioner', $id);
        return $this->db->delete('t_periode_kuesioner');
    }
    public function update_data($where, $data)
    {
        $this->db->where(array('id_pkuesioner' => $where));
        return $this->db->update('t_periode_kuesioner', $data);
    }
}
