<?php

class M_login extends MY_Model {

	public function cekLogin($username = "", $password = "") {
		$username = str_replace("limit 1", " ", $username);
		$data =  $this->db->query("SELECT u.kd_user as id_cession, if(isnull(vb.nik),if(u.id_level = 0,'1','2'),u.status) as status, u.id_level as lv FROM t_user u left join v_list_biodata vb on (vb.kd = u.kd_user) WHERE u.user = '$username' AND u.password = md5('$password')");
		if ($data->num_rows() == 1) {
			$data =  $data->row();
		}else{
			$data =  $this->db->query("SELECT  '0' as status")->row();		
		}
		return $data;
	}

	public function ApiLogin($username = "", $password = "") {
		$username = str_replace("limit 1", " ", $username);
		$data =  $this->db->query("SELECT vb.nik,u.user,vb.nama_lengkap, if(isnull(vb.nik),if(u.id_level = 0,'1','2'),u.status) as status, u.id_level as lv FROM t_user u left join v_list_biodata vb on (vb.kd = u.kd_user) WHERE u.user = '$username' AND u.password = md5('$password')");
		if ($data->num_rows() == 1) {
			$data =  $data->row();
		}else{
			$data =  $this->db->query("SELECT  null as status")->row();		
		}
		return $data;
	}

}
