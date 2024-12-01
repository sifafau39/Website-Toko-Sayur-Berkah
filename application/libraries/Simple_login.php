<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Simple_login 
{
    protected $CI;

    public function __construct()
    {
       $this->CI =& get_instance();
       //load data user_model
       $this->CI->load->model('user_model');
    }

    //Fungsi Login
    public function login($username,$password)
    {
        $check = $this->CI->user_model->login($username,$password);
        //Jika ada data user, maka create session login
        if($check) {
            $id_user    = $check->id_user;
            $nama       = $check->nama;
            $role       = $check->role;

            //Create session
            $this->CI->session->set_userdata('id_user',$id_user);
            $this->CI->session->set_userdata('nama',$nama);
            $this->CI->session->set_userdata('username',$username);
            $this->CI->session->set_userdata('role',$role);

            //redirect ke halaman admin yang diproteksi
            redirect(base_url('admin/dasbor'), 'refresh');

        }else{

            //Kalau gagal, maka akan login lagi
            $this->CI->session->set_flashdata('warning', 'Username atau Password salah');
            redirect(base_url('login'), 'refresh');
        }
    }

    //Fungsi Cek Login
    public function cek_login()
    {
        //Memeriksa session sudah ada atau belum, jika belum alihkan ke halaman login
        if($this->CI->session->userdata('username') == "") {
            $this->CI->session->set_flashdata('warning', 'Anda belum login');
            redirect(base_url('login'), 'refresh');
        }
    }

    //Fungsi Logout
    public function logout()
    {
        //Membuang semua session yang sudah diset pada saat login
        $this->CI->session->unset_userdata('id_user');
        $this->CI->session->unset_userdata('nama');
        $this->CI->session->unset_userdata('username');
        $this->CI->session->unset_userdata('role');
        //Setelah session dibuang, maka redirect ke login
        $this->CI->session->set_flashdata('sukses', 'Anda berhasil Logout');
        redirect(base_url('login'), 'refresh');
    }

}
