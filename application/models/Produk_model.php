<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    //Listing all produk
    public function listing()
    {
        $this->db->select('produk.*,
                        user.nama');
        $this->db->from('produk');
        //JOIN
        $this->db->join('user', 'user.id_user = produk.id_user', 'left');
        //END JOIN
        
        $this->db->group_by('produk.id_produk');
        $this->db->order_by('id_produk', 'desc');
        $query = $this->db->get();
        return $query->result();
    }

     //Listing all produk home
    public function home()
    {
        $this->db->select('produk.*,
                        user.nama');
        $this->db->from('produk');
        //JOIN
        $this->db->join('user', 'user.id_user = produk.id_user', 'left');
        //END JOIN

        $this->db->group_by('produk.id_produk');
        $this->db->order_by('id_produk', 'desc');
        $this->db->limit(6);
        $query = $this->db->get();
        return $query->result();
    }

    //Read Produk
    public function read($slug_produk)
    {
        $this->db->select('produk.*,
                        user.nama');
        $this->db->from('produk');
        //JOIN
        $this->db->join('user', 'user.id_user = produk.id_user', 'left');
        //END JOIN

        $this->db->where('produk.slug_produk', $slug_produk);
        $this->db->group_by('produk.id_produk');
        $this->db->order_by('id_produk', 'desc');
        $query = $this->db->get();
        return $query->row();
    }
    
    //Produk
    public function produk($limit,$start)
    {
        $this->db->select('produk.*,
                        user.nama');
        $this->db->from('produk');
        //JOIN
        $this->db->join('user', 'user.id_user = produk.id_user', 'left');
        //END JOIN

        $this->db->group_by('produk.id_produk');
        $this->db->order_by('id_produk', 'desc');
        $this->db->limit($limit,$start);
        $query = $this->db->get();
        return $query->result();
    }
    
    //Total Produk
    public function total_produk()
    {
        $this->db->select('COUNT(*) AS total');
        $this->db->from('produk');
        $query = $this->db->get();
        return $query->row();
    }

    //Detail produk
    public function detail($id_produk)
    {
        $this->db->select('*');
        $this->db->from('produk');
        $this->db->where('id_produk', $id_produk);
        $this->db->order_by('id_produk', 'desc');
        $query = $this->db->get();
        return $query->row();
    }

    //Tambah 
    public function tambah($data)
    {
        $this->db->insert('produk', $data);
    }

    
     //Edit
    public function edit($data)
    {
        $this->db->where('id_produk', $data['id_produk']);
        $this->db->update('produk', $data);
    }

    //Delete
    public function delete($data)
    {
        $this->db->where('id_produk', $data['id_produk']);
        $this->db->delete('produk', $data);
    }

 }

/* End of file Produk_model.php */
/* Location: ./application/models/Produk_model.php */