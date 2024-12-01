<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {

	//Load model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('pembayaran_model');
		$this->load->model('transaksi_model');
		$this->load->model('rekening_model');
		$this->load->model('setting_model');
	}

	//Load data transaksi
	public function index()
	{
		$pembayaran = $this->pembayaran_model->listing();

		$data  = array(	'title'			=> 'Data Transaksi',
						'pembayaran'	=> $pembayaran,
						'isi'			=> 'admin/transaksi/list'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	//Detail
	public function detail($kode_transaksi)
	{

		$pembayaran 	= $this->pembayaran_model->kode_transaksi($kode_transaksi);
		$transaksi 		= $this->transaksi_model->kode_transaksi($kode_transaksi);

		$data = array(	'title'			=> 'Data Transaksi',
						'pembayaran'	=> $pembayaran,
						'transaksi'		=> $transaksi,
						'isi'			=> 'admin/transaksi/detail'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	//Cetak
	public function cetak($kode_transaksi)
	{

		$pembayaran 	= $this->pembayaran_model->kode_transaksi($kode_transaksi);
		$transaksi 		= $this->transaksi_model->kode_transaksi($kode_transaksi);
		$site 			= $this->setting_model->listing();

		$data = array(	'title'			=> 'Data Transaksi',
						'pembayaran'	=> $pembayaran,
						'transaksi'		=> $transaksi,
						'site'			=> $site
					);
		$this->load->view('admin/transaksi/cetak', $data, FALSE);
	}

	//Unduh pdf
	public function pdf($kode_transaksi)
	{

		$pembayaran 	= $this->pembayaran_model->kode_transaksi($kode_transaksi);
		$transaksi 		= $this->transaksi_model->kode_transaksi($kode_transaksi);
		$site 			= $this->setting_model->listing();

		$data = array(	'title'			=> 'Data Transaksi',
						'pembayaran'	=> $pembayaran,
						'transaksi'		=> $transaksi,
						'site'			=> $site
					);
		//$this->load->view('admin/transaksi/cetak', $data, FALSE);

		$html = $this->load->view('admin/transaksi/cetak', $data, true);
		$mpdf = $mpdf = new \Mpdf\Mpdf();

		// Write some HTML code:
		$mpdf->WriteHTML($html);

		// Output a PDF file directly to the browser
		$mpdf->Output();
	}
}

/* End of file Transaksi.php */
/* Location: ./application/controllers/admin/Transaksi.php */