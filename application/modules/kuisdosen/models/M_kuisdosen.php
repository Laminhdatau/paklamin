<?php

class M_kuisdosen extends CI_Model
{
    //put your code here
    public function getData()
    {
        // disabled=\"disabled\"
        return $this->db->query('SELECT s.* ,js.jenis_survei,bs.bagian_soal,if((!isnull(js.id_jenis_survei))," "," ") as ada FROM t_soal s left join t_jenis_survei js on (js.id_jenis_survei = s.id_jenis_survei) left join t_bagian_soal bs on (bs.id_bagian_soal=s.id_bagian_soal) where s.id_jenis_survei="1" order by bs.bagian_soal asc ')->result();
    }
    
    public function hitung()
    {
        return $this->db->query("SELECT COUNT(soal_kepuasan) as jumlah_soal FROM t_soal WHERE id_jenis_survei='1' ")->row();
    }
    public function getBagianSoal()
    {
        return $this->db->query('SELECT * from t_bagian_soal')->result();
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
