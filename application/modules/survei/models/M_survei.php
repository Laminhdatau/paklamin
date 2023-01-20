<?php

class M_survei extends CI_Model
{
    //put your code here
    public function getData($nim)
    {

        return $this->db->query("select dk.kd_detail_krs,dp.kd_mata_kuliah,d.kd_dosen,bk.nama_lengkap as nama_dosen,mk.nama_mata_kuliah

        from t_detail_krs dk
           , t_krs k
           , t_kelas_perkuliahan kp
           , t_paket_perkuliahan pp
           , t_dosen_pengampu dp
           left join t_mata_kuliah mk on (mk.kd_mata_kuliah=dp.kd_mata_kuliah)
           left join t_dosen d on (d.kd_dosen=dp.kd_dosen)
           left join t_biodata_karyawan bk on (bk.nik=d.nik)
        where k.kd_krs = dk.kd_krs
          and kp.nim = k.nim
          and k.nim = '" . $nim . "'
          and pp.kd_paket_perkuliahan = dk.kd_paket_perkuliahan
          and (dp.kd_mata_kuliah = pp.kd_mata_kuliah
               and dp.id_periode_perkuliahan = kp.id_periode_perkuliahan
               and kp.id_kelas = dp.id_kelas
               )")->result();
    }
    public function getSoal($id)
    {
        return $this->db->query("SELECT s.*,js.jenis_survei 
        from t_soal s 
        left join t_jenis_survei js on (s.id_jenis_survei=js.id_jenis_survei) 
        where s.id_jenis_survei='" . $id . "' AND s.status='1'")->result();
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
