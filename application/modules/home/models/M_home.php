<?php

class M_home extends CI_Model{

	private function buat_head_menu(){
		$this->db->query("create or replace view tr_head_menu as (
							SELECT *, if(h.parent_id=0, h.id_head_menu
							        , if(h.parent_id>(SELECT max(id_head_menu) from t_head_menu WHERE parent_id = 0)
							            , (SELECT parent_id from t_head_menu where id_head_menu = h.parent_id)
							            , h.parent_id) ) as short_list
							FROM t_head_menu h
							where h.id_head_menu > 0 
							ORDER by short_list, h.parent_id, h.level_short)");
	}

	public function buat_view($i){
		if ($i->status == 1){ 
			$this->buat_head_menu();
			$this->db->query("create or replace view v_url_".$i->kd." as SELECT DISTINCT '' as id_url , '' as url , h.id_head_menu , h.caption , h.icon_tipe , '' as nama_view , '' as id_level , '' as level , '' as id_privilege , '' as privilege , '' as `edit` , '' as `delete` , '' as `view` , '' as `insert` , 1 as sts_ac , 0 as hls , 0 as uls , 1 as status, 1 as id_platform from tr_head_menu h where h.id_head_menu > 1 and ( h.id_head_menu in (SELECT id_head_menu from v_hau_list where id_level = ".$i->lv.") or h.id_head_menu in (SELECT id_head_menu from v_ha_list WHERE kd_user = '".$i->kd."') ) union SELECT vhau.* from v_hau_list vhau  where id_level = ".$i->lv." and id_url not in (SELECT id_url from v_ha_list where kd_user = '".$i->kd."') UNION SELECT vhal.id_url, vhal.url, vhal.id_head_menu, vhal.caption, vhal.icon_tipe, vhal.nama_view, vhal.id_level, vhal.level, vhal.id_privilege, vhal.privilege, vhal.edit, vhal.delete, vhal.view, vhal.insert, vhal.sts_ac, vhal.hls, vhal.uls, vhal.status, 1 as id_platform from v_ha_list vhal where vhal.id_privilege != 0 and kd_user = '".$i->kd."'");
		}else{
			$this->db->query("drop view v_url_".$i->kd);
		}
	}

	public function ceklogin($kd){
		return $this->db->query("SELECT TABLE_NAME as tname FROM INFORMATION_SCHEMA.TABLES WHERE `TABLE_NAME` = 'v_url_".$kd."'")->result();
	}

	public function dataLogin($id, $md){
		$v1 = $this->db->query("SELECT vlb.*, u.status, if(isnull(u.id_level),-1,u.id_level) as lv FROM v_list_biodata vlb, t_user u where (u.kd_user = vlb.kd) and md5(vlb.nik)='$id'")->result();
		$v2 = ""; 
		$v3 = "";
		foreach ($v1 as $i) {
			$this->buat_view($i); 
			if(!empty($this->ceklogin($i->kd))){
				$v2 = $this->db->query("SELECT * from v_url_".$i->kd." order by id_head_menu,hls,uls")->result();
				$v3 = $this->db->query("SELECT concat(u.insert,',',u.edit,',',u.delete,',',u.view) as zp,u.status as zs from v_url_".$i->kd." u where lower(u.url) = '".strtolower($md)."'")->result();
				if(empty($v3)){
					$v3 = $this->db->query("SELECT '0,0,0,0' as zp, '1' as zs")->result();
				}
			}
		};
		return array('akun' => $v1, 'ses' => $v2, 'pri' => $v3);
	}

	public function findheadermenu($klas){
		$data1 = $this->db->query("SELECT h.caption FROM t_url u, t_head_menu h where u.id_head_menu = h.id_head_menu and lower(u.url) = '".strtolower($klas)."'")->result();
		if (empty($data1)){
            $data1 = $this->db->query("SELECT 'xxx' as caption from t_url where id_url = 1")->result();
        }
        return $data1;
	}

}