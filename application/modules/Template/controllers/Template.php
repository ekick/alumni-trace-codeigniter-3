<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Template extends MY_Controller
{
	private $menu;

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_temp');
		$this->menu = $this->M_temp->menu();
	}

	public function loadTemplate($data = NULL)
	{
		if (empty($this->menu)) {
			$data['menu'] = array(
				[
					'nama' => "nama_menu_user",
					'icon' => "fas fa-fw fa-folder"
				]
			);
		} else {
			$data['menu'] = $this->menu;	
		}
		// var_dump($data['menu']); die();
		$this->load->view("template/v_template", $data);
	}
}
