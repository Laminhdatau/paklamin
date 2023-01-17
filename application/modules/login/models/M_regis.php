<?php

class M_regis extends MY_Model{

    public function daftar($data){
        return $this->db->query("INSERT INTO `t_user` (`kd_user`, `user`, `password`, `id_level`, `status`) 
        VALUES (MD5('$data[kd_user]'), '$data[user]', MD5('$data[password]'), '$data[id_level]', '1')");
    }
    public function level(){
        return $this->db->get('t_level')->result();
    }
    public function blmDftr(){
        return $this->db->query('SELECT * FROM v_list_biodata WHERE kd NOT IN (SELECT kd_user FROM t_user)')->result();
    }
    public function dftUsr(){
        return $this->db->query('SELECT * FROM t_user a JOIN t_level b ON a.id_level=b.id_level')->result();
    }
}