<?php

class M_angket extends CI_Model
{
    //put your code here
    public function getData()
    {
        return $this->db->query('SELECT * , if((!isnull(id_jawaban))," "," ") as ada FROM t_jawaban where id_jawaban != 0 group by id_jawaban order by id_jawaban asc')->result();
    }
    public function save_jawaban($data = array())
    {
        return $this->db->insert("t_jawaban", $data);
    }
    public function hapus_data($id)
    {
        $this->db->where('id_jawaban', $id);
        return $this->db->delete('t_jawaban');
    }
    public function update_data($where, $data)
    {
        $this->db->where(array('id_jawaban' => $where));
        return $this->db->update('t_jawaban', $data);
    }
}
