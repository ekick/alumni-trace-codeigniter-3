# alumni-trace-codeigniter-3
Repository ini berisi proyek sampingan untuk mendata para alumni SMK Negeri 1 Kota Gorontalo, dibuat dengan bahasa PHP dan framework codeigniter 3.

# Menjalankan Proyek

Lakukan instalasi semua depedencies yang dibutuhkan dengan menggunakan composer. Ketik
perintah berikut pada direktori project.

```bash
composer install
```

Buat database melalui phpmyadmin atau command line MySQL/MariaDB dan ubah konfigurasi database di `application/config/database.php`,
import database db_alumni_smk pada database yang telah dibuat.

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
