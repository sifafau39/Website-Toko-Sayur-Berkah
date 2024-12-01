<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dasbor extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('pelanggan_model');
		$this->load->model('pembayaran_model');
		$this->load->model('transaksi_model');
		$this->load->model('rekening_model');
	}

	//Halaman dasbor
	public function index()
	{
		//Ambil data login id_pelanggan dari session
		$id_pelanggan	= $this->session->userdata('id_pelanggan');
		$pembayaran 	= $this->pembayaran_model->pelanggan($id_pelanggan);

		$data = array(	'title'			=> 'Halaman Dasbor Pelanggan',
						'pembayaran'	=> $pembayaran,
						'isi'			=> 'dasbor/list'
					);
		$this->load->view('layout/wrapper', $data, FALSE);
	}

	//Riwayat Belanja
	public function shop()
	{
		//Ambil data login id_pelanggan dari session
		$id_pelanggan	= $this->session->userdata('id_pelanggan');
		$pembayaran 	= $this->pembayaran_model->pelanggan($id_pelanggan);

		$data = array(	'title'			=> 'Riwayat Belanja',
						'pembayaran'	=> $pembayaran,
						'isi'			=> 'dasbor/shop'
					);
		$this->load->view('layout/wrapper', $data, FALSE);
	}

	//Detail
	public function detail($kode_transaksi)
	{
		//Ambil data login id_pelanggan dari session
		$id_pelanggan	= $this->session->userdata('id_pelanggan');
		$pembayaran 	= $this->pembayaran_model->kode_transaksi($kode_transaksi);
		$transaksi 		= $this->transaksi_model->kode_transaksi($kode_transaksi);

		//Pastikan bahwa pelanggan hanya mengakses data transaksinya
		if($pembayaran->id_pelanggan != $id_pelanggan) {
			$this->session->set_flashdata('warning', 'Anda mencoba mengakses data transaksi orang lain');
			redirect(base_url('masuk'));
		}

		$data = array(	'title'			=> 'Riwayat Belanja',
						'pembayaran'	=> $pembayaran,
						'transaksi'		=> $transaksi,
						'isi'			=> 'dasbor/detail'
					);
		$this->load->view('layout/wrapper', $data, FALSE);
	}

	//Profil
	public function profil()
	{
		//Ambil data login id_pelanggan dari session
		$id_pelanggan	= $this->session->userdata('id_pelanggan');
		$pelanggan 		= $this->pelanggan_model->detail($id_pelanggan);

		//Validasi input
		$valid = $this->form_validation;

		$valid->set_rules('nama_pelanggan', 'Nama Lengkap', 'required',
			array(	'required'		=> '%s harus diisi'));

		$valid->set_rules('telepon', 'Telepon', 'required',
			array(	'required'		=> '%s harus diisi'));

		$valid->set_rules('alamat', 'Alamat', 'required',
			array(	'required'		=> '%s harus diisi'));

		if($valid->run()===FALSE) {
		//End Validasi

		$data = array(	'title'			=> 'Profil Saya',
						'pelanggan'		=> $pelanggan,
						'isi'			=> 'dasbor/profil'
					);
		$this->load->view('layout/wrapper', $data, FALSE);

		//Masuk database
		}else{

			$i = $this->input;

			//Jika password lebih dari 6 karakter maka password diganti
			if(strlen($i->post('password')) >= 6) {
				$data = array(	'id_pelanggan'		=> $id_pelanggan,
								'nama_pelanggan'	=> $i->post('nama_pelanggan'),
								'password'			=> SHA1($i->post('password')),
								'telepon'			=> $i->post('telepon'),
								'alamat'			=> $i->post('alamat')
							);
			}else{

				//Jika password kurang dari 6 maka password tidak diganti
				$data = array(	'id_pelanggan'		=> $id_pelanggan,
								'nama_pelanggan'	=> $i->post('nama_pelanggan'),
								'telepon'			=> $i->post('telepon'),
								'alamat'			=> $i->post('alamat')
							);
			}

			$this->pelanggan_model->edit($data);
			$this->session->set_flashdata('sukses', 'Update Profil Berhasil');
			redirect(base_url('dasbor/profil'), 'refresh');
		}
		//End masuk database
	}

	//Konfirmasi pembayaran
	public function konfirmasi($kode_transaksi)
	{
		$pembayaran 	= $this->pembayaran_model->kode_transaksi($kode_transaksi);
		$rekening		= $this->rekening_model->listing();

		//Validasi input
		$valid = $this->form_validation;

		$valid->set_rules('nama_bank', 'Nama Bank/E-wallet', 'required',
			array(	'required'		=> '%s harus diisi'));

		$valid->set_rules('rekening_pembayaran', 'Nomor Rekening/E-wallet', 'required',
			array(	'required'		=> '%s harus diisi'));

		$valid->set_rules('rekening_pelanggan', 'Nama Pemilik', 'required',
			array(	'required'		=> '%s harus diisi'));

		$valid->set_rules('tanggal_pembayaran', 'Tanggal Pembayaran', 'required',
			array(	'required'		=> '%s harus diisi'));

		$valid->set_rules('jumlah_pembayaran', 'Jumlah Pembayaran', 'required',
			array(	'required'		=> '%s harus diisi'));


		if($valid->run()) {
			//Check jika gambar diganti
			if(!empty($_FILES['bukti_pembayaran']['name'])) {

			$config['upload_path'] 		= 'assets/fashe/images/upload/';
			$config['allowed_types'] 	= 'gif|jpg|png|jpeg';
			$config['max_size']  		= '5000'; //dalam KB
			$config['max_width'] 		= '5000';
			$config['max_height'] 	 	= '5000';
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('bukti_pembayaran')){
		//End Validasi

		$data = array(	'title'			=> 'Konfirmasi Pembayaran',
						'pembayaran'	=> $pembayaran,
						'rekening'		=> $rekening,
						'error'			=> $this->upload->display_error(),
						'isi'			=> 'dasbor/konfirmasi/list'
					);

		$this->load->view('layout/wrapper', $data, FALSE);

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

			$data = array(	'id_pembayaran'			=> $pembayaran->id_pembayaran,
							'status_pembayaran'		=> 'Sudah Bayar',
							'jumlah_pembayaran'		=> $i->post('jumlah_pembayaran'),
							'rekening_pembayaran'	=> $i->post('rekening_pembayaran'),
							'rekening_pelanggan'	=> $i->post('rekening_pelanggan'),
							'bukti_pembayaran'		=> $upload_gambar['upload_data']['file_name'],
							'id_rekening'			=> $i->post('id_rekening'),
							'tanggal_pembayaran'	=> $i->post('tanggal_pembayaran'),
							'nama_bank'				=> $i->post('nama_bank'),
						);
			$this->pembayaran_model->edit($data);
			$this->session->set_flashdata('sukses', 'Pembayaran Berhasil dilakukan');
			redirect(base_url('dasbor/sukses'), 'refresh');
		}} else {

			//Edit produk tanpa mengganti gambar
			$i = $this->input;

			$data = array(	'id_pembayaran'			=> $pembayaran->id_pembayaran,
							'status_pembayaran'		=> 'Sudah Bayar',
							'jumlah_pembayaran'		=> $i->post('jumlah_pembayaran'),
							'rekening_pembayaran'	=> $i->post('rekening_pembayaran'),
							'rekening_pelanggan'	=> $i->post('rekening_pelanggan'),
							//'bukti_pembayaran'		=> $upload_gambar['upload_data']['file_name'],
							'id_rekening'			=> $i->post('id_rekening'),
							'tanggal_pembayaran'	=> $i->post('tanggal_pembayaran'),
							'nama_bank'				=> $i->post('nama_bank'),
						);
			$this->pembayaran_model->edit($data);
			$this->session->set_flashdata('sukses', 'Pembayaran Berhasil dilakukan');
			redirect(base_url('dasbor/sukses'), 'refresh');

		}}
		//End masuk database

		$data = array(	'title'			=> 'Konfirmasi Pembayaran',
						'pembayaran'	=> $pembayaran,
						'rekening'		=> $rekening,
						'isi'			=> 'dasbor/konfirmasi'
					);

		$this->load->view('layout/wrapper', $data, FALSE);
	}

	//Sukses
	public function sukses()
	{
		$data = array( 	'title' 	=> 'Pembayaran Berhasil',
						'isi'		=> 'dasbor/sukses'
					);

		$this->load->view('layout/wrapper', $data, FALSE);
	}

}

/* End of file Dasbor.php */
/* Location: ./application/controllers/Dasbor.php */