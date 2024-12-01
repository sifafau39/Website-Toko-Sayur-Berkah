<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kontak extends CI_Controller {

	//Load model
	public function __construct()
    {
        parent::__construct();
		$this->load->model('kontak_model');
	}


	//Halaman Kontak/Pesan
	public function index()
	{
		$kontak = $this->kontak_model->listing();

		$data = array(	'title' 	=> 'Halaman Pesan Pelanggan',
						'kontak'	=> $kontak,
						'isi' 		=> 'admin/kontak/list'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	//Hapus pesan
	public function delete($id_kontak)
	{

		$data = array('id_kontak'	=> $id_kontak);
		$this->kontak_model->delete($data);
		$this->session->set_flashdata('sukses', 'Pesan telah dihapus');
		redirect(base_url('admin/kontak'), 'refresh');
	} 
}
