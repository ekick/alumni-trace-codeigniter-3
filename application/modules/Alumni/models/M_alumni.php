<?php
defined('BASEPATH') or exit('No direct script access allowed');
class M_alumni extends MY_Controller
{

	function insert_bekerja($data){
		$this->db->insert('t_kegiatan_bekerja',$data);
	}

	function insert_kuliah($data){
		$this->db->insert('t_kegiatan_kuliah',$data);
	}

	function insert_wirausaha($data){
		$this->db->insert('t_kegiatan_wirausaha',$data);
	}

	function insert_option($data){
		$this->db->insert('t_kegiatan_option',$data);
	}

	function upload($nama,$nis){
		$this->db->query("UPDATE t_siswa SET foto = '".$nama."' where nis = '".$nis."'");
	}

	function updateAlumni($alamat, $no_hp, $nis)
	{
		$this->db->query("UPDATE t_siswa SET alamat = '".$alamat."', no_hp = '".$no_hp."' where nis = '".$nis."'");
	}
}