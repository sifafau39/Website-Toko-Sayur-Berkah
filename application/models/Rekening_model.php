<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rekening_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    //Listing all rekening
    public function listing()
    {
        $this->db->select('*');
        $this->db->from('rekening');
        $this->db->group_by('rekening.id_rekening');
        $this->db->order_by('id_rekening', 'desc');
        $query = $this->db->get();
        return $query->result();
    }

    //Detail rekening
    public function detail($id_rekening)
    {
        $this->db->select('*');
        $this->db->from('rekening');
        $this->db->where('id_rekening', $id_rekening);
        $this->db->order_by('id_rekening', 'desc');
        $query = $this->db->get();
        return $query->row();
    }

    //Tambah 
    public function tambah($data)
    {
        $this->db->insert('rekening', $data);
    }

    
     //Edit
    public function edit($data)
    {
        $this->db->where('id_rekening', $data['id_rekening']);
        $this->db->update('rekening', $data);
    }

    //Delete
    public function delete($data)
    {
        $this->db->where('id_rekening', $data['id_rekening']);
        $this->db->delete('rekening', $data);
    }

 }

/* End of file Rekening_model.php */
/* Location: ./application/models/Rekening_model.php */