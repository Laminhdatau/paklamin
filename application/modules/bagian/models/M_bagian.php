<?php

class M_bagian extends CI_Model
{
    //put your code here
    public function getData()
    {
        return $this->db->query('SELECT
        a.*,
        IF(
            (! ISNULL(a.id_bagian_soal)),
            " disabled=\"disabled\" ",
            " "
        ) AS ada
    FROM
        t_bagian_soal a
    ORDER BY
        a.id_bagian_soal ASC')->result();
    }
    public function save_bagian($data = array())
    {
        return $this->db->insert("t_bagian_soal", $data);
    }
    public function hapus_data($id)
    {
        $this->db->where('id_bagian_soal', $id);
        return $this->db->delete('t_bagian_soal');
    }
    public function update_data($where, $data)
    {
        $this->db->where(array('id_bagian_soal' => $where));
        return $this->db->update('t_bagian_soal', $data);
    }
}
