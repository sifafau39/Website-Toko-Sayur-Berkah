<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Masuk extends CI_Controller {

	//Load model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('pelanggan_model');
	}

	//Login pelanggan
	public function index()
	{
		
		//Validasi
		$this->form_validation->set_rules('email','Email/Username','required',
			array(	'required' => '%s harus diisi'));

		$this->form_validation->set_rules('password','Password','required',
			array(	'required' => '%s harus diisi'));

		if($this->form_validation->run())
		{
			$email 		= $this->input->post('email');
			$password 	= $this->input->post('password');

			//Proses ke simple login
			$this->simple_pelanggan->login($email,$password);
		}
		//End validasi

		$data = array(	'title'	=> 'Login Pelanggan',
						'isi'	=> 'masuk/list'
					);
		$this->load->view('layout/wrapper', $data, FALSE);
	}

	//Logout
	public function logout()
	{
		//Ambil fungsi logout di simple_login_pelanggan
		$this->simple_pelanggan->logout();
	}

}

/* End of file Masuk.php */
/* Location: ./application/controllers/Masuk.php */