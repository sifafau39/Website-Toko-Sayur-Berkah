<?php

defined('BASEPATH') OR exit('No direct script access allowed');
//Loading konfigurasi website
$site   = $this->setting_model->listing();
?>

<!-- Start Main Top -->
<div class="main-top">
<div class="container-fluid">
<div class="row">
<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
    <div class="custom-select-box">
    </div>
    <div class="our-link">
        <ul>
            <li><a href="#"><i class="fa fa-location-arrow"></i> <?php echo $site->alamat ?></a></li>
            <li><a href="#"><i class="fa fa-phone"></i> <?php echo $site->telepon ?></a></li>
            <li><a href="#"><i class="fa fa-envelope s_color"></i> <?php echo $site->email ?></a></li>
        </ul>
    </div>
</div>
    <div class="text-slid-box">
        <div id="offer-box" class="carouselTicker">
            <ul class="offer-box">
                <li>
                    <i class="fab fa-opencart"></i> 20% off Entire Purchase Promo code: offT80
                </li>
                <li>
                    <i class="fab fa-opencart"></i> 50% - 80% off on Vegetables
                </li>
                <li>
                    <i class="fab fa-opencart"></i> Off 10%! Shop Vegetables
                </li>
                <li>
                    <i class="fab fa-opencart"></i> Off 50%! Shop Now
                </li>
                <li>
                    <i class="fab fa-opencart"></i> Off 10%! Shop Vegetables
                </li>
                <li>
                    <i class="fab fa-opencart"></i> 50% - 80% off on Vegetables
                </li>
                <li>
                    <i class="fab fa-opencart"></i> 20% off Entire Purchase Promo code: offT30
                </li>
                <li>
                    <i class="fab fa-opencart"></i> Off 50%! Shop Now 
                </li>
            </ul>
        </div>
    </div>
</div>
</div>
</div>
</div>
<!-- End Main Top -->

