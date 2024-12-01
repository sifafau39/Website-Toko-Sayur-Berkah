<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kontak extends CI_Controller {

    //Load model
    public function __construct()
    {
        parent::__construct();
        $this->load->model('kontak_model');
        $this->load->model('setting_model');
    }

    public function index()
    {
       
		//Validasi input
		$valid = $this->form_validation;

		$valid->set_rules('nama', 'Nama Lengkap', 'required',
			array(	'required'		=> '%s harus diisi'));

		$valid->set_rules('email', 'Email', 'required',
			array(	'required'		=> '%s harus diisi'));

		$valid->set_rules('telepon', 'Telepon', 'required',
			array(	'required'		=> '%s harus diisi'));

		$valid->set_rules('pesan', 'Pesan', 'required',
			array(	'required'		=> '%s harus diisi'));

		if($valid->run()===FALSE) {
		//End Validasi

		$data = array(	'title' 	=> 'Kirim Pesan',
						'isi' 		=> 'kontak/list'
					);

		$this->load->view('layout/wrapper', $data, FALSE);

		//Masuk database
		}else{

			$i = $this->input;
			$data = array(	'nama'				=> $i->post('nama'),
							'email'				=> $i->post('email'),
							'telepon'			=> $i->post('telepon'),
							'pesan'				=> $i->post('pesan'),
							'tanggal_pesan'		=> date('Y-m-d')
						);

			$this->kontak_model->tambah($data);
			$this->session->set_flashdata('sukses', 'Pesan anda telah terkirim');
			redirect(base_url('kontak/sukses'), 'refresh');
		}
		//End masuk database
	}

	//Sukses
	public function sukses()
	{
		$data = array( 	'title' 	=> 'Pesan terkirim',
						'isi'		=> 'kontak/sukses'
					);

		$this->load->view('layout/wrapper', $data, FALSE);
	}

}
