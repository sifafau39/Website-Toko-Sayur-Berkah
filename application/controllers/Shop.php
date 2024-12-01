<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shop extends CI_Controller {

	//Load model
    public function __construct()
    {
        parent::__construct();
        $this->load->model('produk_model');
        $this->load->model('setting_model');
        $this->load->model('pelanggan_model');
        $this->load->model('pembayaran_model');
        $this->load->model('transaksi_model');
        //Load helper random string
        $this->load->helper('string');
    }

    //Halaman Cart
	public function index()
	{
		$keranjang 	= $this->cart->contents();

		$data 		= array(	'title' 		=> 'Keranjang Belanja',
								'keranjang'		=> $keranjang,
								'isi' 			=> 'shop/list'
							);
		$this->load->view('layout/wrapper', $data, FALSE);
	}

	//Belanja Sukses
	public function sukses()
	{

		$data 		= array(	'title' 		=> 'Belanja Berhasil',
								'isi' 			=> 'shop/sukses'
							);
		$this->load->view('layout/wrapper', $data, FALSE);
	}

	//Checkout
	public function checkout()
	{
		//Cek pelanggan sudah login atau belum? Jika belum punya akun maka harus registrasi sekaligus login
		//Jika sudah punya akun harus login terlebih dahulu
		//Mengecek dengan session email
		
		//Kondisi sudah login
		if($this->session->userdata('email')) {
			$email 			= $this->session->userdata('email');
			$nama_pelanggan	= $this->session->userdata('nama_pelanggan');
			$pelanggan 		= $this->pelanggan_model->sudah_login($email, $nama_pelanggan);

			$keranjang 	= $this->cart->contents();

			//Validasi input
			$valid = $this->form_validation;

			$valid->set_rules('nama_pelanggan', 'Nama Lengkap', 'required',
				array(	'required'		=> '%s harus diisi'));

			$valid->set_rules('telepon', 'Telepon', 'required',
				array(	'required'		=> '%s harus diisi'));

			$valid->set_rules('alamat', 'Alamat', 'required',
				array(	'required'		=> '%s harus diisi'));

			$valid->set_rules('email', 'Email', 'required|valid_email',
				array(	'required'		=> '%s harus diisi',
						'valid_email'	=> '%s tidak valid'));

			if($valid->run()===FALSE) {
			//End Validasi

			$data 		= array(	'title' 		=> 'Checkout',
									'keranjang'		=> $keranjang,
									'pelanggan'		=> $pelanggan,
									'isi' 			=> 'shop/checkout'
								);
			$this->load->view('layout/wrapper', $data, FALSE);
			//Masuk database
			}else{
				$i = $this->input;

				$data = array(	'id_pelanggan'			=> $pelanggan->id_pelanggan,
								'nama_pelanggan'		=> $i->post('nama_pelanggan'),
								'email'					=> $i->post('email'),
								'telepon'				=> $i->post('telepon'),
								'alamat'				=> $i->post('alamat'),
								'kode_transaksi'		=> $i->post('kode_transaksi'),
								'tanggal_transaksi'		=> $i->post('tanggal_transaksi'),
								'jumlah_transaksi'		=> $i->post('jumlah_transaksi'),
								'status_pembayaran'		=> 'Belum Bayar',
								'tanggal_pembayaran'	=> date('Y-m-d H:i:s')
							);
				//Proses masuk ke pembayaran
				$this->pembayaran_model->tambah($data);
				//Proses masuk ke tabel transaksi
				foreach ($keranjang as $keranjang) {
					$sub_total = $keranjang['price'] * $keranjang['qty'];

					$data = array(	'id_pelanggan'		=> $pelanggan->id_pelanggan,
									'kode_transaksi'	=> $i->post('kode_transaksi'),
									'id_produk'			=> $keranjang['id'],
									'harga'				=> $keranjang['price'],
									'jumlah'			=> $keranjang['qty'],
									'total_harga'		=> $sub_total,
									'tanggal_transaksi'	=> $i->post('tanggal_transaksi')
								);
					$this->transaksi_model->tambah($data);
				}
				//End proses masuk ke tabel transaksi
				//Setelah masuk ke tabel transaksi, maka keranjang dikosongkan
				$this->cart->destroy();
				//End pengosongan keranjang
				$this->session->set_flashdata('sukses', 'Checkout Berhasil');
				redirect(base_url('shop/sukses'), 'refresh');
			}
			//End masuk database

		}else{
		//Jika belum maka harus registrasi/login
		$this->session->set_flashdata('sukses', 'Silahkan Login atau Registrasi Terlebih Dahulu');
		redirect(base_url('registrasi'), 'refresh');
		}
	}

	//Tambahkan ke cart
	public function add()
	{
		//Ambil data dari home
		$id 			= $this->input->post('id');
		$qty 			= $this->input->post('qty');
		$price 			= $this->input->post('price');
		$name 			= $this->input->post('name');
		$redirect_page 	= $this->input->post('redirect_page');
		//Proses memasukkan ke keranjang belanja
		$data 	= array(	'id'	=> $id,
							'qty'	=> $qty,
							'price'	=> $price,
							'name'	=> $name
						);
		$this->cart->insert($data);
		//redirect page
		redirect($redirect_page,'refresh');
	}

	//Update keranjang belanja
	public function update_cart($rowid)
	{
		//Jika ada ada rowid
		if($rowid) {
			$data = array(	'rowid'	=> $rowid,
							'qty'	=> $this->input->post('qty')
						);
			$this->cart->update($data);
			$this->session->set_flashdata('sukses', 'Data Keranjang telah diupdate');
			redirect(base_url('shop'), 'refresh');

		}else{
			//Jika tidak ada rowid
			redirect(base_url('shop'), 'refresh');
		}
	}

	//Hapus keranjang belanja
	public function delete($rowid='')
	{
		if($rowid) {
			//Hapus per item keranjang belanja
			$this->cart->remove($rowid);
			$this->session->set_flashdata('sukses', 'Keranjang Belanja telah dihapus');
			redirect(base_url('shop'), 'refresh');

		}else{
			//Hapus all keranjang belanja
			$this->cart->destroy();
			$this->session->set_flashdata('sukses', 'Data Keranjang Belanja telah dihapus');
			redirect(base_url('shop'), 'refresh');

		}
	}
}

/* End of file cart.php */
/* Location: ./application/controllers/cart.php */