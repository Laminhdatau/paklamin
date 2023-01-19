<?php

class M_survei extends CI_Model
{
    //put your code here
    public function getData()
    {
        return $this->db->query('SELECT * from t_survei')->result();
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
