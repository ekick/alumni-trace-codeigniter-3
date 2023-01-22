<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_auth');
	}

	public function index()
	{
		$this->form_validation->set_rules('nis', 'Nis', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        if ($this->form_validation->run() == false) {
			$this->load->view('v_login'); 
        } else {
            $this->_login();
        }
	}

	private function _login()
	{
		$nis = $this->input->post('nis', true);
        $password = $this->input->post('password', true);
        $cek = $this->M_auth->cek_user($nis, $password);
		
        if (!empty($cek['nis']) && $cek['nis'] == 'FALSE') {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Akun ini belum diregistrasi.</div>');
            redirect('login');
		} else if (!empty($cek['pass']) && $cek['pass'] == 'FALSE'){
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password anda salah.</div>');
				redirect('login');
		} else {
			$data['user']= $cek;
			switch ($cek['role_id']) {
				case '1':
					$this->session->set_userdata($data);
					redirect('dashboard');
					break;
				case '2':
					$this->session->set_userdata($data);
					redirect('home');
					break;
				default:
					redirect('login');
					break;
				} 
		}

	}

	public function registration()
    {
        $reg = $this->m_auth;
        $validation = $this->form_validation;

        $validation->set_rules($reg->rules());

        if ($validation->run() == false) {
            $data['title'] = 'Halaman Registrasi Perusahaan';
            $data['role'] = NULL;
            $data['content_page'] = "auth/regis_perusahaan";
            echo Modules::run('template/loadTemplate', $data);
        } else {
            $reg->save();

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Akun telah berhasil dibuat!, silakan login.</div>');
            redirect('login');
        }
    }

	public function logout()
    {
        $this->session->unset_userdata('user');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda keluar aplikasi!</div>');
		// $this->session->sess_destroy();
        redirect('login');
    }
}
