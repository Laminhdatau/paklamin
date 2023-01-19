<?php

class M_survei extends CI_Model
{
    //put your code here
    public function getData()
    {

        return $this->db->query('SELECT DISTINCT k.kontrak FROM t_kursus k
                                JOIN t_kontrak kn ON k.kursus_id = kn.kursus_id
                                JOIN t_kontrakdosen kd ON kn.konrak_id = kd.kontrak_id
                                JOIN t_dosen d ON kd.dosen_id = d.dosen_id
                                WHERE d.name = 'nama dosen'
        ')->result();
    }
    public function save_jenis($data = array())
    {
        return $this->db->insert("t_jenis_survei", $data);
    }
    public function hapus_data($id)
    {
        $this->db->where('id_jenis_survei', $id);
        return $this->db->delete('t_jenis_survei');
    }
    public function update_data($where, $data)
    {
        $this->db->where(array('id_jenis_survei' => $where));
        return $this->db->update('t_jenis_survei', $data);
    }
}
