<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Alumni extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_alumni');
		$this->user = $this->session->userdata('user');
		if (empty($this->user)) {
			$this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert"><i class="fas fa-exclamation-triangle"> Anda harus login terlebih dahulu!</i></div>');
			redirect('login');
		} elseif ($this->user['role_id'] != 2) {
			redirect('dashboard');
		}
	
	}

	private $user;

	private function content($name)
	{
		// echo "<pre>";
		// var_dump($this->session->userdata());
		// echo "</pre>";
		// die();
		$data['user'] = $this->user;
		if ($data['user']['foto'] == NULL) {
			$data['user']['foto'] = 'user.png';
		}

		$data['title'] = 'Halaman '.ucfirst($name);
		$data['content_page'] = "alumni/v_".$name;
		echo Modules::run('template/loadTemplate', $data);
	}
	
	public function index()
	{
		$this->content('home');
	}
	
	public function data_alumni()
	{
		$this->content('alumni');
	}

	public function tambah_aksi(){
		$nis = $this->user['nis'];
		$foto = $_FILES['foto'];
		$format = substr($foto['name'], -4);

		if ($foto='') {
		}else{
			$nama = uniqid($nis);
			$config['file_name'] = $nama;
			$config['upload_path'] = './assets/foto';
			$config['allowed_types'] = 'jpg|png|ico';
			$config['overwrite'] = TRUE;
			$config['max_size'] = 4096;

			$this->load->library('upload',$config);
			if ($this->upload->do_upload('foto')) {
				$foto = $this->upload->data('file_name');
			}else{
				$this->session->set_flashdata('upload', '<div class="alert alert-warning" role="alert"><span class="glyphicon glyphicon-remove"></span> Format Gambar Maksimal 4mb dan format jpg/png/ico!</div>');
				redirect($_SERVER['HTTP_REFERER']);
			}
		}

		$data = $this->user;

		$data['foto'] = $nama.$format;

		$this->session->set_userdata('user',$data);
		$this->m_alumni->upload($data['foto'], $nis);

		redirect($_SERVER['HTTP_REFERER']);
	}

	public function simpan_alumni(){
		// echo $_POST['optionsRadios'];die();
		$alamat = $this->input->post('alamat');
		$no = $this->input->post('no_hp');
		$this->m_alumni->updateAlumni($alamat,$no, $this->user['nis']);

		$data = $this->user;
		$data['alamat'] = $alamat;
		$data['no_hp'] = $no;
		$this->session->set_userdata('user',$data);

		$kd = md5($this->user['nis']);

		switch ($this->input->post('optionsRadios')) {
			case 'bekerja':
			$data = array(
				'id_jenis_bekerja' => $kd,
				'nama_perusahaan' => $this->input->post('namaperusahaan'),
				'alamat' => $this->input->post('alamatperusahaan'),
				'sektor' => $this->input->post('sektor'),
				'jabatan' => $this->input->post('jabatan')
			);

			$this->m_alumni->insert_bekerja($data);
			
			break;
			case 'wirausaha':
			$data = array(
				'id_jenis_wirausaha' => $kd,
				'nama_usaha' => $this->input->post('namausaha'),
				'alamat' => $this->input->post('alamatusaha'),
				'bidang' => $this->input->post('bidang'),
				'waktu_mulai' => $this->input->post('bulanusaha')
			);

			$this->m_alumni->insert_wirausaha($data);
			
			break;
			case 'kuliah':
			$data = array(
				'id_jenis_kuliah' => $kd,
				'nama_perguruan' => $this->input->post('namauniv'),
				'fakultas' => $this->input->post('fakultas'),
				'jurusan' => $this->input->post('jurusanuniv')
			);

			$this->m_alumni->insert_kuliah($data);
			
			break;
			case 'belum':
			if($this->input->post('belum')=='lainnya'){
				$data = array(
					'id_jenis_option' => $kd,
					'nama_kegiatan' => $this->input->post('lainnyatext')
				);
				$this->m_alumni->insert_option($data);
			}else{
				$data = array(
					'id_jenis_option' => $kd,
					'nama_kegiatan' => $this->input->post('belum')
				);
				$this->m_alumni->insert_option($data);
			}
			
			
			break;
			
			default:
				# code...
			break;
		}
		redirect('home');
	}
	
	public function profile()
	{
		$this->content('profile');
	}
}
