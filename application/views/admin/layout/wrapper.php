<?php

//Proteksi halaman admin dengan fungsi cek_login yang ada di Simple_login
$this->simple_login->cek_login();

//Gabungan semua bagian layout menjadi satu
require_once('head.php');
require_once('header.php');
require_once('nav.php');
require_once('content.php');
require_once('footer.php');