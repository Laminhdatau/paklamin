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
        pku.status,
        pp.status AS status_semester,
        IF(
            (
                ! ISNULL(pp.id_periode_perkuliahan)
            ),
            "disabled=\"disabled\" ",
            " "
        ) AS ada
    FROM
        t_periode_kuesioner pku,
        t_tahun_ajaran ta,
        t_periode_perkuliahan pp
        ,m_semester m
    WHERE
        ta.id_tahun_ajaran = pp.id_tahun_ajaran 
        AND pp.id_periode_perkuliahan = pku.id_periode_perkuliahan 
        AND m.id_semester=pp.id_semester
    GROUP BY
        pku.id_pkuesioner,
        pp.id_periode_perkuliahan
    ORDER BY
        pku.id_pkuesioner')->result();
    }
    function getPeriode()
    {
        return $this->db->query("SELECT
        pp.id_periode_perkuliahan,
        pp.status,
        m.semester,
        ta.tmt_tahun_ajaran AS daritahun,
        ta.tst_tahun_ajaran AS sampaitahun,
        ta.status_tahun_ajaran
    FROM
        t_periode_perkuliahan pp,
        t_tahun_ajaran ta,
        m_semester m
    WHERE
         pp.id_periode_perkuliahan not IN(
        SELECT
            pp.id_periode_perkuliahan
        FROM
            t_periode_kuesioner pk 
             where pp.id_periode_perkuliahan=pk.id_periode_perkuliahan 
    ) AND m.id_semester=pp.id_semester 
    and pp.id_tahun_ajaran=ta.id_tahun_ajaran
    and pp.status='1'")->result();
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

    public function updateStatus1($id){
        $this->db->where('id_pkuesioner',$id);
        $this->db->set('status','1');
        $this->db->update('t_periode_kuesioner');
    }
    public function updateStatus0($id){
        $this->db->where('id_pkuesioner',$id);
        $this->db->set('status','0');
        $this->db->update('t_periode_kuesioner');
    }
}
