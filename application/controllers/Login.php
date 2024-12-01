<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	//Halaman Login
	public function index()
	{
		
		//Validasi
		$this->form_validation->set_rules('username','Username','required',
			array(	'required' => '%s harus diisi'));

		$this->form_validation->set_rules('password','Password','required',
			array(	'required' => '%s harus diisi'));

		if($this->form_validation->run())
		{
			$username 	= $this->input->post('username');
			$password 	= $this->input->post('password');

			//Proses ke simple login
			$this->simple_login->login($username,$password);
		}
		//End validasi

		$data = array( 'title'	=> 'Login Admin');
		$this->load->view('login/list', $data, FALSE);
	}

	//Fungsi logout
	public function logout()
	{
		//Fungsi logout dari Simple_login
		$this->simple_login->logout();
	}
}
