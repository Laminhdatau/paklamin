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
$route['profile']                             = 'biodata_karyawan';
$route['profile-mahasiswa']                   = 'biodata_mahasiswa';
$route['pengaturan']                          = 'pengaturan';

// BEGIN LAMIN
$route['id=3e09de2c5d7a06d1d89ecd89a87c5196'] = 'angket';
$route['id=53a9d15e62c5e6b576d10845e9f06237']    = 'kuisdosen';
$route['id=b6f62f1d0ea26be48a9a2acc6f9071fa']    = 'kuismatakuliah';
$route['id=35465649f969f56eca07e9c526278c16']    = 'jenissurvei';
$route['id=70eaa213c400ad418884df3ae5a471f1']    = 'periodekuisioner';
$route['id=5c404d37aef84fc4d16c04089917d134']    = 'bagian';
$route['id=60962d57ee45d65c709e8ed19da35ae3'] = 'survei/isisurvei';

$route['id=3b6526beb6deaee9cc4bfbaca02e66d7'] = 'survei';
// END LAMIN

/*Url dispose Browser*/
$route['login']               = '404_override';
$route['logout']               = '404_override';
$route['biodata_karyawan']      = '404_override';
$route['hari']                   = '404_override';
