<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'landing';
$route['404_override'] = 'Custom_404';
$route['translate_uri_dashes'] = FALSE;

$route['login'] = 'auth';
$route['logout'] = 'auth/logout';

//rute modul alumni
$route['profile'] = 'alumni/profile';
$route['kegiatan'] = 'alumni/data_alumni';
$route['home'] = 'alumni';
$route['simpan'] = 'alumni/simpan_alumni';
$route['ubah_foto'] = 'alumni/tambah_aksi';

//rute modul admin
$route['pdf'] = 'Admin/pdf';
$route['import'] = 'admin/import_excel';
$route['dashboard'] = 'admin/dashboard';
$route['tables'] = 'admin/tables';
$route['tambah_data'] = 'admin/import';