<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting extends CI_Controller {

//Load Model
public function __construct()
{
	parent::__construct();
	$this->load->model('setting_model');
}

//Pengaturan Umum
	public function index()
	{
		$setting 	= $this->setting_model->listing();

		//Validasi input
		$valid = $this->form_validation;

		$valid->set_rules('nama_web', 'Nama Website', 'required',
			array(	'required'		=> '%s harus diisi'));

		if($valid->run()===FALSE) {
		//End Validasi

		$data = array(	'title' 	=> 'Pengaturan Website',
						'setting'	=> $setting,
						'isi'		=> 'admin/setting/list'
					);
		
		$this->load->view('admin/layout/wrapper', $data, FALSE);

		//Masuk database
		}else{
			$i = $this->input;

			$data = array(	'id_setting'	=> $setting->id_setting,
							'nama_web'		=> $i->post('nama_web'),
							'tagline'		=> $i->post('tagline'),
							'email'			=> $i->post('email'),
							'website'		=> $i->post('website'),
							'telepon'		=> $i->post('telepon'),
							'alamat'		=> $i->post('alamat'),
							'logo'			=> $i->post('logo'),
							'icon'			=> $i->post('icon'),
						);
			$this->setting_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data telah diedit');
			redirect(base_url('admin/setting'), 'refresh');
		}
		//End masuk database
	}

//Pengaturan Logo
	public function logo()
	{
		$setting 	= $this->setting_model->listing();

		//Validasi Input
		$valid = $this->form_validation;

		$valid->set_rules('nama_web', 'Nama Website', 'required',
			array(	'required'		=> '%s harus diisi'));


		if($valid->run()) {
			//Check jika gambar diganti
			if(!empty($_FILES['logo']['name'])) {

			$config['upload_path'] 		= 'assets/fashe/images/upload/';
			$config['allowed_types'] 	= 'gif|jpg|png|jpeg';
			$config['max_size']  		= '1000'; //dalam KB
			$config['max_width'] 		= '2024';
			$config['max_height'] 	 	= '2024';
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('logo')){
		//End Validasi

		$data = array(	'title' 	=> 'Pengaturan Logo',
						'setting'	=> $setting,
						'error'		=> $this->upload->display_error(),
						'isi'		=> 'admin/setting/logo'
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
			$data = array(	'id_setting'	=> $setting->id_setting,
							'nama_web'		=> $i->post('nama_web'),
							//Disimpan nama file gambar
							'logo'			=> $upload_gambar['upload_data']['file_name']

						);

			$this->setting_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data telah diedit');
			redirect(base_url('admin/setting/logo'), 'refresh');
		}} else {

			//Edit produk tanpa mengganti gambar
			$i = $this->input;
			$data = array(	'id_setting'	=> $setting->id_setting,
							'nama_web'		=> $i->post('nama_web'),
							//Disimpan nama file gambar
							//'logo'		=> $upload_gambar['upload_data']['file_name']

						);

			$this->setting_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data telah diedit');
			redirect(base_url('admin/setting/logo'), 'refresh');
		}}
		//End masuk database

		$data = array(	'title' 	=> 'Pengaturan Logo',
						'setting'	=> $setting,
						'isi'		=> 'admin/setting/logo'
					);
		
		$this->load->view('admin/layout/wrapper', $data, FALSE);

	}

//Pengaturan Icon
	public function icon()
	{
		$setting 	= $this->setting_model->listing();

		//Validasi Input
		$valid = $this->form_validation;

		$valid->set_rules('nama_web', 'Nama Website', 'required',
			array(	'required'		=> '%s harus diisi'));


		if($valid->run()) {
			//Check jika gambar diganti
			if(!empty($_FILES['icon']['name'])) {

			$config['upload_path'] 		= 'assets/fashe/images/upload/';
			$config['allowed_types'] 	= 'gif|jpg|png|jpeg';
			$config['max_size']  		= '1000'; //dalam KB
			$config['max_width'] 		= '2024';
			$config['max_height'] 	 	= '2024';
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('icon')){
		//End Validasi

		$data = array(	'title' 	=> 'Pengaturan Icon',
						'setting'	=> $setting,
						'error'		=> $this->upload->display_error(),
						'isi'		=> 'admin/setting/icon'
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
			$data = array(	'id_setting'	=> $setting->id_setting,
							'nama_web'		=> $i->post('nama_web'),
							//Disimpan nama file gambar
							'icon'			=> $upload_gambar['upload_data']['file_name']

						);

			$this->setting_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data telah diedit');
			redirect(base_url('admin/setting/icon'), 'refresh');
		}} else {

			//Edit produk tanpa mengganti gambar
			$i = $this->input;
			$data = array(	'id_setting'	=> $setting->id_setting,
							'nama_web'		=> $i->post('nama_web'),
							//Disimpan nama file gambar
							//'logo'		=> $upload_gambar['upload_data']['file_name']

						);

			$this->setting_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data telah diedit');
			redirect(base_url('admin/setting/icon'), 'refresh');
		}}
		//End masuk database

		$data = array(	'title' 	=> 'Pengaturan Icon',
						'setting'	=> $setting,
						'isi'		=> 'admin/setting/icon'
					);
		
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

}

/* End of file Setting.php */
/* Location: ./application/controllers/admin/Setting.php */