<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {

	//Load model
	public function __construct()
    {
        parent::__construct();
		$this->load->model('produk_model');
		//Proteksi halaman
		$this->simple_login->cek_login();
	}

	//Data produk
	public function index()
	{
		$produk = $this->produk_model->listing();

		$data = array(	'title' 	=> 'Data Produk',
						'produk'	 => $produk,
						'isi'		=> 'admin/produk/list'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	//Tambah
	public function tambah()
	{
		//Validasi input
		$valid = $this->form_validation;

		$valid->set_rules('nama_produk', 'Nama Produk', 'required',
			array(	'required'		=> '%s harus diisi'));

		$valid->set_rules('kode_produk', 'Kode Produk', 'required|is_unique[produk.kode_produk]',
			array(	'required'		=> '%s harus diisi',
					'is_unique'		=> '%s Kode produk sudah ada. Buat kode produk baru'));


		if($valid->run()) {

			$config['upload_path'] 		= 'assets/fashe/images/upload/';
			$config['allowed_types'] 	= 'gif|jpg|png|jpeg';
			$config['max_size']  		= '2000'; //dalam KB
			$config['max_width'] 		= '2024';
			$config['max_height'] 	 	= '2024';
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('foto_produk')){
		//End Validasi

		$data = array(	'title' 	=> 'Tambah Produk',
						'error'		=> $this->upload->display_error(),
						'isi'		=> 'admin/produk/tambah'
					);
		
		$this->load->view('admin/layout/wrapper', $data, FALSE);

		//Masuk database
		}else{
			$upload_gambar = array('upload_data' => $this->upload->data());

			//Create thumbnail
			$config['image_library'] 	= 'gd2';
			$config['source_image'] 	= 'assets/fashe/images/upload/'.$upload_gambar['upload_data']['file_name'];
			//Lokasi folder thumbnail
			$config['new_image']		= 'assets/fashe/images/upload/';
			$config['create_thumb'] 	= TRUE;
			$config['maintain_ratio'] 	= TRUE;
			$config['width']         	= 250; //pixel
			$config['height']       	= 250;

			$this->load->library('image_lib', $config);

			$this->image_lib->resize();

			//End create thumbnail

			$i = $this->input;
			//Slug produk
			$slug_produk = url_title($this->input->post('nama_produk').'-'.$this->input->post('kode_produk'), 'dash', TRUE);
			
			$data = array(	'id_user'				=> $this->session->userdata('id_user'),
							'kode_produk'			=> $i->post('kode_produk'),
							'nama_produk'			=> $i->post('nama_produk'),
							'harga_produk'			=> $i->post('harga_produk'),
							'keterangan_harga'		=> $i->post('keterangan_harga'),
							'stok_produk'			=> $i->post('stok_produk'),
							'slug_produk'			=> $slug_produk,							
							'keterangan_produk'		=> $i->post('keterangan_produk'),
							//Disimpan nama file gambar
							'foto_produk'			=> $upload_gambar['upload_data']['file_name']

						);
			$this->produk_model->tambah($data);
			$this->session->set_flashdata('sukses', 'Data telah ditambahkan');
			redirect(base_url('admin/produk'), 'refresh');
		}}
		//End masuk database

		$data = array(	'title' 	=> 'Tambah Produk',
						'isi'		=> 'admin/produk/tambah'
					);
		
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	//Edit Produk
	public function edit($id_produk)
	{
		$produk = $this->produk_model->detail($id_produk);

		//Validasi input
		$valid = $this->form_validation;

		$valid->set_rules('nama_produk', 'Nama Produk', 'required',
			array(	'required'		=> '%s harus diisi'));

		$valid->set_rules('kode_produk', 'Kode Produk', 'required',
			array(	'required'		=> '%s harus diisi'));


		if($valid->run()) {
			//Check jika gambar diganti
			if(!empty($_FILES['foto_produk']['name'])) {

			$config['upload_path'] 		= 'assets/fashe/images/upload/';
			$config['allowed_types'] 	= 'gif|jpg|png|jpeg';
			$config['max_size']  		= '2000'; //dalam KB
			$config['max_width'] 		= '2024';
			$config['max_height'] 	 	= '2024';
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('foto_produk')){
		//End Validasi

		$data = array(	'title' 	=> 'Edit Produk: '.$produk->nama_produk,
						'produk'	=> $produk,
						'error'		=> $this->upload->display_error(),
						'isi'		=> 'admin/produk/edit'
					);
		
		$this->load->view('admin/layout/wrapper', $data, FALSE);

		//Masuk database
		}else{
			$upload_gambar = array('upload_data' => $this->upload->data());

			//Create thumbnail
			$config['image_library'] 	= 'gd2';
			$config['source_image'] 	= 'assets/fashe/images/upload/'.$upload_gambar['upload_data']['file_name'];
			//Lokasi folder thumbnail
			$config['new_image']		= 'assets/fashe/images/upload/';
			$config['create_thumb'] 	= TRUE;
			$config['maintain_ratio'] 	= TRUE;
			$config['width']         	= 250; //pixel
			$config['height']       	= 250;

			$this->load->library('image_lib', $config);

			$this->image_lib->resize();

			//End create thumbnail

			$i = $this->input;
			//Slug Produk
			$slug_produk = url_title($this->input->post('nama_produk').'-'.$this->input->post('kode_produk'), 'dash', TRUE);
			
			$data = array(	'id_produk'				=> $id_produk,
							'id_user'				=> $this->session->userdata('id_user'),
							'kode_produk'			=> $i->post('kode_produk'),
							'nama_produk'			=> $i->post('nama_produk'),
							'harga_produk'			=> $i->post('harga_produk'),
							'keterangan_harga'		=> $i->post('keterangan_harga'),
							'stok_produk'			=> $i->post('stok_produk'),
							'slug_produk'			=> $slug_produk,
							'keterangan_produk'		=> $i->post('keterangan_produk'),
							//Disimpan nama file gambar
							'foto_produk'			=> $upload_gambar['upload_data']['file_name']

						);
			$this->produk_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data telah diedit');
			redirect(base_url('admin/produk'), 'refresh');
		}} else {

			//Edit produk tanpa mengganti gambar
			$i = $this->input;
			//Slug produk
			$slug_produk = url_title($this->input->post('nama_produk').'-'.$this->input->post('kode_produk'), 'dash', TRUE);

			$data = array(	'id_produk'				=> $id_produk,
							'id_user'				=> $this->session->userdata('id_user'),
							'kode_produk'			=> $i->post('kode_produk'),
							'nama_produk'			=> $i->post('nama_produk'),
							'harga_produk'			=> $i->post('harga_produk'),
							'keterangan_harga'		=> $i->post('keterangan_harga'),
							'stok_produk'			=> $i->post('stok_produk'),
							'slug_produk'			=> $slug_produk,
							'keterangan_produk'		=> $i->post('keterangan_produk')
							//Disimpan nama file gambar (gambar tidak diganti)
							// 'foto_produk'			=> $upload_gambar['upload_data']['file_name'],

						);
			$this->produk_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data telah diedit');
			redirect(base_url('admin/produk'), 'refresh');

		}}
		//End masuk database

		$data = array(	'title' 	=> 'Edit Produk: '.$produk->nama_produk,
						'produk'	=> $produk,
						'isi'		=> 'admin/produk/edit'
					);
		
		$this->load->view('admin/layout/wrapper', $data, FALSE);

	}
	
	//Delete Produk
	public function delete($id_produk)
	{
		//Proses hapus gambar
		$produk = $this->produk_model->detail($id_produk);
		unlink('assets/fashe/images/upload/'.$produk->foto_produk);
		//End proses hapus

		$data = array('id_produk'	=> $id_produk);
		$this->produk_model->delete($data);
		$this->session->set_flashdata('sukses', 'Data telah dihapus');
		redirect(base_url('admin/produk'), 'refresh');
	} 
}