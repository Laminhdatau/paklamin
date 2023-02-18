<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*Url default*/
$route['default_controller'] = 'login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

/*Url Login*/
$route['silahkan'] = 'login/login/prosesmasuk';
$route['keluar'] = 'login/login/proseskeluar';

/*Url Browser*/
$route['profile']                               = 'biodata_karyawan';
$route['profile-mahasiswa']                   = 'biodata_mahasiswa';
$route['id=3e09de2c5d7a06d1d89ecd89a87c5196'] = 'angket';
$route['pengaturan']                          = 'pengaturan';

$route['id=53a9d15e62c5e6b576d10845e9f06237']    = 'kuisdosen';
$route['id=b6f62f1d0ea26be48a9a2acc6f9071fa']    = 'kuismatakuliah';
$route['id=35465649f969f56eca07e9c526278c16']    = 'jenissurvei';

// isi survei
$route['survei/isisurvei/(:any)/(:any)'] = 'survei/isisurvei';
$route['id=3b6526beb6deaee9cc4bfbaca02e66d7'] = 'survei';

/*Url dispose Browser*/
$route['login']               = '404_override';
$route['logout']               = '404_override';
$route['biodata_karyawan']      = '404_override';
$route['hari']                   = '404_override';
