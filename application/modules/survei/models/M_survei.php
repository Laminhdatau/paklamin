<?php

class M_survei extends CI_Model
{
    //put your code here
    public function getData()
    {

        return $this->db->query("SELECT DISTINCT
        prd.nama_prodi, 
        sm.semester,sm.status, 
        p.kd_mata_kuliah,
        js.jenis_survei,
        mk.nama_mata_kuliah,
        bk.nama_lengkap as nama_dosen
                FROM t_survei s
                LEFT JOIN t_detail_krs d ON (d.kd_detail_krs = s.kd_detail_krs)
                LEFT JOIN t_paket_perkuliahan p ON (p.kd_paket_perkuliahan = d.kd_paket_perkuliahan)
                LEFT JOIN t_kurikulum k on (k.id_kurikulum=p.id_kurikulum)
                LEFT JOIN m_semester sm on (sm.id_semester=p.id_semester)
                LEFT JOIN t_jenis_survei js on (js.id_jenis_survei=s.id_jenis_survei)
                LEFT JOIN t_mata_kuliah mk on (mk.kd_mata_kuliah=p.kd_mata_kuliah)
                left join t_krs ks on (ks.kd_krs=d.kd_krs)
                left join t_mahasiswa mhs on (mhs.nim=ks.nim)
                left join t_biodata b on (b.nik=mhs.nik)
                left join t_prodi prd on (prd.id_prodi=k.id_prodi)
                left join t_jadwal_perkuliahan j on (prd.id_prodi=j.id_prodi)
                left join t_dosen_pengampu dp on (dp.kd_dosen_pengampu=j.kd_dosen_pengampu)
                left join t_dosen dos on (dos.kd_dosen=dp.kd_dosen)
                left join t_biodata_karyawan bk on (bk.nik=dos.nik)
                left join t_periode_perkuliahan pkul on (pkul.id_semester=sm.id_semester)
                where mhs.id_status_mahasiswa=1")->result();
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
