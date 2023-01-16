<?php

class M_jenissurvei extends CI_Model
{
    //put your code here
    public function getData()
    {
        return $this->db->query('SELECT *,if((!isnull(id_jenis_survei))," "," ") as ada FROM t_jenis_survei where id_jenis_survei !=0 group by id_jenis_survei order by id_jenis_survei asc')->result();
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
