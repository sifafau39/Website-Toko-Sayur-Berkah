<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dasbor_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    //Total produk
    public function total_produk()
    {
    	$this->db->select('COUNT(*) AS total');
    	$this->db->from('produk');
    	$query = $this->db->get();
    	return $query->row();
    }

    //Total pelanggan
    public function total_pelanggan()
    {
    	$this->db->select('COUNT(*) AS total');
    	$this->db->from('pelanggan');
    	$query = $this->db->get();
    	return $query->row();
    }

    //Total transaksi
    public function total_transaksi()
    {
    	$this->db->select('COUNT(*) AS total');
    	$this->db->from('pembayaran');
    	$query = $this->db->get();
    	return $query->row();
    }

    //Total nilai transaksi
    public function total_nilai_transaksi()
    {
    	$this->db->select('SUM(transaksi.total_harga) AS total');
        $this->db->from('transaksi');
    	$query = $this->db->get();
    	return $query->row();
    }

}

/* End of file Dasbor_model.php */
/* Location: ./application/models/Dasbor_model.php */