# alumni-trace-codeigniter-3
This repository contains my side project about the website for alumni of Gorontalo City Vocational High School 1, built with PHP languange and codeigniter 3 framework

# Menjalankan Proyek

Lakukan instalasi semua depedencies yang dibutuhkan dengan composer. Ketik
perintah berikut pada root direktori project.

```bash
composer install
```

Buat database di Phpmyadmin dan ubah konfigurasi database di `application/config/database.php`,
Import database db_alumni_smk pada database yang telah dibuat.

```php
$active_group = 'default';
$query_builder = TRUE;

$db['default'] = array(
	'dsn'	=> '',
	'hostname' => 'localhost',
	'username' => 'root', // <- sesuaikan dengan username mysql
	'password' => '', // <- isi dengan password user mysql
	'database' => 'db_alumni_smk', //<- sesuaikan nama database dengan yang kamu buat
	'dbdriver' => 'mysqli',
	'dbprefix' => '',
	'pconnect' => FALSE,
	'db_debug' => (ENVIRONMENT !== 'production'),
	'cache_on' => FALSE,
	'cachedir' => '',
	'char_set' => 'utf8',
	'dbcollat' => 'utf8_general_ci',
	'swap_pre' => '',
	'encrypt' => FALSE,
	'compress' => FALSE,
	'stricton' => FALSE,
	'failover' => array(),
	'save_queries' => TRUE
);
```
