<?php
defined('BASEPATH') or exit('no direct script  access allowed');

class M_admin extends CI_Model
{
    public function ambildata()
    {
        $query = $this->db->query('SELECT a.nis, a.nama, a.alamat,a.no_hp, a.j_kelamin ,a.tahun_angkatan , b.nama  AS nama_jurusan, c.nama AS nama_kegiatan from t_siswa a  left join t_jurusan b on b.id_jurusan = a.id_jurusan left join t_kegiatan c on c.id_kegiatan = a.id_kegiatan');

        return $query->result();
    }

    public function insert($data){
		$insert = $this->db->insert_batch('t_siswa', $data);
		if($insert){
			return true;
		}
	}

    public function jumlah()
    {
        return $this->db->query("SELECT nis from t_siswa")->num_rows();
    }

    public function ambiljurusan($var = null)
    {
        return $this->db->query("SELECT b.nama from t_siswa a left join t_jurusan b on b.id_jurusan = a.id_jurusan where b.id_jurusan= '".$var."'")->num_rows();
    }

    public function data_kegiatan($var = null)
    {
        return $this->db->query("SELECT b.nama from t_siswa a left join t_kegiatan b on b.id_kegiatan = a.id_kegiatan where b.id_kegiatan= '".$var."'")->num_rows();
    }

    public function dataalumni()
    {
        return $this->db->query('Select a.nis, a.nama, a.alamat,a.no_hp, a.j_kelamin ,a.tahun_angkatan , b.nama  AS nama_jurusan, c.nama AS nama_kegiatan from t_siswa a  left join t_jurusan b on b.id_jurusan = a.id_jurusan left join t_kegiatan c on c.id_kegiatan = a.id_kegiatan')->result();
    }
}
