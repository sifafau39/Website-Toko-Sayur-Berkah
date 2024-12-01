<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	
    //Load model
    public function __construct()
    {
        parent::__construct();
        $this->load->model('produk_model');
        $this->load->model('setting_model');
    }
    //Halaman Utama Website/Home
    public function index() 
    {
        $site   = $this->setting_model->listing();
        $produk   = $this->produk_model->home();

        $data = array(  'title'     => $site->nama_web.' | '.$site->tagline,
                        'site'      => $site,
                        'produk'    => $produk,
                        'isi'       => 'home/list'
                        );

    	$this->load->view('layout/wrapper', $data, FALSE);
      
     }
}
    