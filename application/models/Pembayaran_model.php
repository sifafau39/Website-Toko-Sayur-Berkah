<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembayaran_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    //Listing all pembayaran
    public function listing()
    {
       
        $this->db->select('pembayaran.*,
                            pelanggan.nama_pelanggan,
                            SUM(transaksi.jumlah) AS total_item');
        $this->db->from('pembayaran');
        //Join
        $this->db->join('transaksi', 'transaksi.kode_transaksi = pembayaran.kode_transaksi', 'left');
        $this->db->join('pelanggan', 'pelanggan.id_pelanggan = pembayaran.id_pelanggan', 'left');
        //End join
        $this->db->group_by('pembayaran.id_pembayaran');
        $this->db->order_by('id_pembayaran', 'desc');
        $query = $this->db->get();
        return $query->result();
    }

    //Listing all pembayaran dari pelanggan
    public function pelanggan($id_pelanggan)
    {
        $this->db->select('pembayaran.*,
                            SUM(transaksi.jumlah) AS total_item');
        $this->db->from('pembayaran');
        $this->db->where('pembayaran.id_pelanggan', $id_pelanggan);
        //Join
        $this->db->join('transaksi', 'transaksi.kode_transaksi = pembayaran.kode_transaksi', 'left');
        //End join
        $this->db->group_by('pembayaran.id_pembayaran');
        $this->db->order_by('id_pembayaran', 'desc');
        $query = $this->db->get();
        return $query->result();
    }
    
    //Detail pembayaran
    public function kode_transaksi($kode_transaksi)
    {
        
        $this->db->select('pembayaran.*,
                            pelanggan.nama_pelanggan,
                            rekening.nama_bank AS bank,
                            rekening.nomor_rekening,
                            rekening.nama_pemilik,
                            SUM(transaksi.jumlah) AS total_item');
        $this->db->from('pembayaran');
        //Join
        $this->db->join('transaksi', 'transaksi.kode_transaksi = pembayaran.kode_transaksi', 'left');
        $this->db->join('pelanggan', 'pelanggan.id_pelanggan = pembayaran.id_pelanggan', 'left');
        $this->db->join('rekening', 'rekening.id_rekening = pembayaran.id_rekening', 'left');
        //End join
        $this->db->group_by('pembayaran.id_pembayaran');
        $this->db->where('transaksi.kode_transaksi', $kode_transaksi);
        $this->db->order_by('id_pembayaran', 'desc');
        $query = $this->db->get();
        return $query->row();
    }

    //Detail pembayaran
    public function detail($id_pembayaran)
    {
        $this->db->select('*');
        $this->db->from('pembayaran');
        $this->db->where('id_pembayaran', $id_pembayaran);
        $this->db->order_by('id_pembayaran', 'desc');
        $query = $this->db->get();
        return $query->row();
    }

    //Tambah 
    public function tambah($data)
    {
        $this->db->insert('pembayaran', $data);
    }

    
     //Edit
    public function edit($data)
    {
        $this->db->where('id_pembayaran', $data['id_pembayaran']);
        $this->db->update('pembayaran', $data);
    }

    //Delete
    public function delete($data)
    {
        $this->db->where('id_pembayaran', $data['id_pembayaran']);
        $this->db->delete('pembayaran', $data);
    }

 }

/* End of file Pembayaran_model.php */
/* Location: ./application/models/Pembayaran_model.php */