<?php

class M_kuismatakuliah extends CI_Model
{
    //put your code here
    public function getData()
    {
        return $this->db->query('SELECT s.* ,js.jenis_survei,if((!isnull(js.id_jenis_survei))," disabled=\"disabled\" "," ") as ada FROM t_soal s left join t_jenis_survei js on (js.id_jenis_survei = s.id_jenis_survei) where s.id_soal !=0 AND s.id_jenis_survei=2 group by s.id_soal order by s.id_soal asc')->result();
    }
    public function save_soal($data = array())
    {
        return $this->db->insert("t_soal", $data);
    }
    public function hapus_data($id)
    {
        $this->db->where('id_soal', $id);
        return $this->db->delete('t_soal');
    }
    public function update_data($where, $data)
    {
        $this->db->where(array('id_soal' => $where));
        return $this->db->update('t_soal', $data);
    }
}
