<?php

if (!function_exists("uuid_generator")) {

    function uuid_generator() {
        $CI = & get_instance();
        $get = $CI->db->query("select uuid() as uid")->row();
        return $get->uid;
    }

}

if (!function_exists("auto_inc")) {

    function auto_inc($id, $table) {
        $CI = & get_instance();
        $get = $CI->db->query("SELECT MAX($id)+1 as id FROM  $table")->row();
        if (!empty($get->id)){
           return $get->id; 
        }  else {
            return 1;
        }
        
    }

}

if (!function_exists("uuid_auto")) {

    function uuid_auto($id, $table,$kd) {
        $CI = & get_instance();
        $get = $CI->db->query("SELECT MAX($id)+1 as id FROM  $table WHERE idx = $id AND kd_kontrak_kuliah=$kd")->row();    
        if (!empty($get->id)){
            return $get->id; 
         }  else {
        return 1; 
        }

    }
} 

if (!function_exists("ada")) {

    function ada($attr,$table,$whre) {
        $CI = & get_instance();
        $get = $CI->db->query("SELECT ".$attr." FROM ".$table." WHERE ".$whre."")->row();
        if (!is_null($get->nik)){
           return $get->nik; 
        }  else {
           return 0;
        }
    }
}

if (!function_exists("who_am_i")) {

    function who_am_i($id) {
        $CI = & get_instance();
        $get = $CI->db->query("SELECT id_level FROM  t_user where kd_user = '$id'")->row();
        if (!is_null($get->id_level)){
           return $get->id_level; 
        }  else {
           return 9999;
        }
    }
}

if (!function_exists("cekmodule")) {

    function cekmodule($m) {
        $CI = & get_instance();
        switch ($m) {
            case 'dosen';
            case 'coba':
            case 'agama':
            case 'hari':
            case 'level':
            case 'pertemuan':
            case 'kurikulum':
            case 'semester':
            case 'kelas':
            case 'prodi':
            case 'ruangan':
            case 'daftar_kegiatan_akademik':
            case 'jenjang_pendidikan':
                            return true;
                            break;
            default:
                return false;
                break;
        }
    }
}


if (!function_exists("found")) {

    function found($attr,$table,$whre) {
        $CI = & get_instance();
        $get = $CI->db->query("SELECT ".$attr." FROM ".$table." WHERE ".$whre."")->row();
        if(!empty($get)){
            return $get;
        }else{
            $get = auto_inc("id_tahun_ajaran","t_tahun_ajaran");
            return $get;
        }
    }

}

if (!function_exists("gelombang_pendaftaran")){
    function gelombang_pendaftaran(){
        $CI = & get_instance();
        $get = $CI->db->query("SELECT id_gelombang_pendaftaran as id FROM `t_gelombang_pendaftaran` WHERE date(now()) BETWEEN tmt_gelombang AND tst_gelombang")->row();
        if(!empty($get)){
            return $get->id;
        }else{
            $get = $CI->db->query("SELECT 0 as id")->row();
            return $get->id;
        }
    }
}

if (!function_exists("pilihan")){
    function pilihan($nik){
        $CI = & get_instance();
        $get = $CI->db->query("SELECT p.pilihan,p.kode_prodi as kd_prodi, tp.nama_prodi as prodi FROM t_pendaftaran p , t_prodi tp WHERE p.kode_prodi=tp.kode_prodi_dikti AND p.nik='$nik'")->result();
        if(!empty($get)){
            return $get;
        }else{
            $get = $CI->db->query("SELECT '0' as pilihan, '0' as kd_prodi, 'Belum Memilih Program Studi' as prodi")->result();
            return $get;
        }
    }
}


if (!function_exists("nim")) {

    function nim($kd) {
        $CI = & get_instance();
        $get = $CI->db->query("SELECT nim FROM t_mahasiswa WHERE md5(nik)='$kd'")->row();
        if (!empty($get->nim)){
           return $get->nim; 
        }  else {
            return 1;
        }
        
    }

}

if (!function_exists("krs")) {

    function krs($kd) {
        $CI = & get_instance();
        $get = $CI->db->query("SELECT nim FROM t_krs WHERE nim='$kd'")->row();
        if (!empty($get->nim)){
           return 1; 
        }  else {
            return 0;
        }
        
    }

}
if (!function_exists("prodi")) {

    function prodi($kd) {
        $CI = & get_instance();
        $get = $CI->db->query("SELECT r.id_prodi FROM t_lokasi_kerja lk 
        JOIN m_ruangan r ON lk.id_ruangan=r.id_ruangan
        WHERE md5(lk.nik)='$kd'")->row();
        if(!empty($get->id_prodi)){
            return $get->id_prodi;
        }else{
        return '';
        }
    }

}

if (!function_exists("dosen")) {

    function dosen($kd) {
        $CI = & get_instance();
        $get = $CI->db->query("SELECT kd_dosen FROM t_dosen WHERE md5(nik)='$kd'")->row();
        if(!empty($get->kd_dosen)){
            return $get->kd_dosen;
        }else{
            return '';
        }
    }

}

if (!function_exists("nama")) {

    function nama($kd) {
        $CI = & get_instance();
        $get = $CI->db->query("SELECT nama_lengkap FROM v_list_biodata WHERE kd='$kd'")->row();
        if(!empty($get->nama_lengkap)){
            return $get->nama_lengkap;
        }else{
            return '';
        }
    }

}

if (!function_exists("kprodi")) {

    function kprodi($kd) {
        $CI = & get_instance();
        $get = $CI->db->query("SELECT r.id_prodi FROM t_lokasi_kerja lk 
        JOIN m_ruangan r ON lk.id_ruangan=r.id_ruangan 
        WHERE lk.id_jabatan='4' AND md5(nik)='$kd'")->row();
        if(!empty($get->id_prodi)){
            return $get->id_prodi;
            // return '0';
        }else{
            return '0';
        }
    }

}

if (!function_exists("akademik")) {

    function akademik($kd) {
        $CI = & get_instance();
        $get = $CI->db->query("SELECT r.id_ruangan FROM t_lokasi_kerja lk 
        JOIN m_ruangan r ON lk.id_ruangan=r.id_ruangan 
        WHERE lk.id_jabatan='2' AND md5(nik)='$kd'")->row();
        if(!empty($get->id_ruangan)){
            return 1;
        }else{
            return 0;
        }
    }

}

if (!function_exists("jobdesc")) {

    function jobdesc($kd) {
        $CI = & get_instance();
        $get = $CI->db->query("SELECT * FROM v_jobdesc WHERE kd='$kd'")->row();
        if(!empty($get)){
            return $get;
        }else{
            return 0;
        }
    }

}


?>
