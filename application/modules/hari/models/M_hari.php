<?php

class M_hari extends CI_Model
{
    //put your code here
    public function getData()
    {
        return $this->db->query('SELECT a.* , if((!isnull(jp.id_hari))," disabled=\"disabled\" "," ") as ada FROM m_hari a left join t_jadwal_perkuliahan jp on (jp.id_hari = a.id_hari) where a.id_hari != 0 group by a.id_hari order by a.id_hari asc')->result();
    }
    public function save_hari($data = array())
    {
        return $this->db->insert("m_hari", $data);
    }
    public function hapus_data($id)
    {
        $this->db->where('id_hari', $id);
        return $this->db->delete('m_hari');
    }
    public function update_data($where, $data)
    {
        $this->db->where(array('id_hari' => $where));
        return $this->db->update('m_hari', $data);
    }
}
