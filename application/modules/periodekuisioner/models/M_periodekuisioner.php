<?php

class M_periodekuisioner extends CI_Model
{
    //put your code here
    public function getData()
    {
        return $this->db->query('SELECT pku.id_pkuesioner,pp.id_periode_perkuliahan,pku.tmt,pku.tst,ta.tmt_tahun_ajaran as daritahun, ta.tst_tahun_ajaran as sampaitahun,ta.status_tahun_ajaran as status_ta,pp.id_semester,pp.status as status_semester, IF( (! ISNULL(pp.id_periode_perkuliahan)), " disabled=\"disabled\" ", " " ) AS ada FROM t_periode_kuesioner pku ,t_tahun_ajaran ta ,t_periode_perkuliahan pp where ta.id_tahun_ajaran=pp.id_tahun_ajaran and pp.id_periode_perkuliahan=pku.id_periode_perkuliahan and pku.id_pkuesioner != 0 GROUP BY pku.id_pkuesioner,pp.id_periode_perkuliahan ORDER BY pku.id_pkuesioner ')->result();
    }
    public function save_periodekuisioner($data = array())
    {
        return $this->db->insert("t_periode_kuesioner", $data);
    }
    public function hapus_data($id)
    {
        $this->db->where('id_pkuisioner', $id);
        return $this->db->delete('t_periode_kuesioner');
    }
    public function update_data($where, $data)
    {
        $this->db->where(array('id_pkuisioner' => $where));
        return $this->db->update('t_periode_kuesioner', $data);
    }
}
