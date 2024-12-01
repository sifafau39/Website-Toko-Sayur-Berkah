<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kontak_model extends CI_Model {
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    //Listing all user
    public function listing()
    {
        $this->db->select('*');
        $this->db->from('kontak');
        $this->db->order_by('id_kontak', 'desc');
        $query = $this->db->get();
        return $query->result();
    }

    //Tambah 
    public function tambah($data)
    {
        $this->db->insert('kontak', $data);
    }

    //Hapus Pesan di admin
    public function delete($data)
    {
        $this->db->where('id_kontak', $data['id_kontak']);
        $this->db->delete('kontak', $data);
    }
}
