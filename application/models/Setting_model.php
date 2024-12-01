<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	//Listing
	public function listing()
	{
		$query	= $this->db->get('setting');
		return $query->row();
	}

	//Edit
	public function edit($data)
	{
		$this->db->where('id_setting', $data['id_setting']);
		$this->db->update('setting', $data);
	}

}

/* End of file Setting_model.php */
/* Location: ./application/models/Setting_model.php */