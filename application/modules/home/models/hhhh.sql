
SELECT DISTINCT '' as id_url 
     , '' as url 
     , h.id_head_menu 
     , h.caption 
     , h.icon_tipe 
     , '' as nama_view 
     , '' as id_level 
     , '' as level 
     , '' as id_privilege 
     , '' as privilege 
     , '' as edit 
     , '' as delete 
     , '' as view 
     , '' as insert 
     , 1 as sts_ac 
     , 0 as hls 
     , 0 as uls 
     , 1 as status 
     , h.parent_id
     , h.level_short
     , h.short_list
from tr_head_menu h 
where h.id_head_menu > 1 
  and ( h.id_head_menu in (SELECT id_head_menu from v_hau_list where id_level = ".$i->lv.") 
     or h.id_head_menu in (SELECT id_head_menu from v_ha_list WHERE kd_user = '".$i->kd."') 
      )

union 

SELECT vhau.* from v_hau_list vhau  where id_level = ".$i->lv." and id_url not in (SELECT id_url from v_ha_list where kd_user = '".$i->kd."') 

UNION 
SELECT vhal.id_url, vhal.url, vhal.id_head_menu, vhal.caption, vhal.icon_tipe, vhal.nama_view, vhal.id_level, vhal.level, vhal.id_privilege, vhal.privilege, vhal.edit, vhal.delete, vhal.view, vhal.insert, vhal.sts_ac, vhal.hls, vhal.uls, vhal.status from v_ha_list vhal where vhal.id_privilege != 0 and kd_user = '".$i->kd."'



select u1.id_url
     ,u1.url
     ,u1.id_head_menu
     ,hm1.caption
     ,hm1.icon_tipe
     ,u1.nama_view
     ,l1.id_level
     ,l1.level
     ,p1.id_privilege
     ,p1.privilege
     ,p1.edit
     ,p1.delete
     ,p1.view
     ,p1.insert
     ,if((p1.id_privilege = 0), if((lower(u1.url) = 'home'),1,0), 1) AS sts_ac
     ,hm1.level_short AS hls
     ,u1.level_short AS uls
     ,u1.status
     ,hm1.parent_id
     ,hm1.level_short
     ,hm1.short_list     
from t_url u1 
  left join t_head_menu hm1 on (hm1.id_head_menu = u1.id_head_menu)
  left join t_hak_akses ha1 on (ha1.id_url = u1.id_url)
  left join t_level l1 on (l1.id_level = ha1.id_level)
  left join t_privilege p1 on (p1.id_privilege = ha1.id_privilege)
union 
select u.id_url AS id_url,u.url AS url,u.id_head_menu AS id_head_menu,hm.caption AS caption,hm.icon_tipe AS icon_tipe,u.nama_view AS nama_view,0 AS id_level,'ADMINISTRATOR' AS level,8 AS id_privilege,'Full RUD' AS privilege,1 AS edit,1 AS delete,1 AS view,1 AS insert,1 AS sts_ac,hm.level_short AS hls,u.level_short AS uls,u.status AS status from (t_url u left join tr_head_menu hm on((hm.id_head_menu = u.id_head_menu)))