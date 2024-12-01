<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
    <!-- Start Footer  -->
    <footer>
        <div class="footer-main">
            <div class="container">
				<div class="row">
					<div class="col-lg-4 col-md-12 col-sm-12">
						<div class="footer-top-box">
							<h3>Jam Kerja</h3>
							<ul>
								<li>Monday - Friday: 08.00am to 05.00pm</li> <li>Saturday: 10.00am to 08.00pm</li> <li>Sunday: <span>Closed</span></li>
							</ul>
						</div>
					</div>

                     <div class="col-lg-3 col-md-12 col-sm-12">
                        <div class="footer-top-box">
                            <h3>Bantuan</h3>
                        </div>
                            <div class="footer-link">
                            <ul>
                                <li><a href=" <?php echo base_url('tentang_kami') ?>">About Us</a></li>
                                <li><a href="#">Customer Service</a></li>
                                <li><a href="#">Our Sitemap</a></li>
                                <li><a href="#">Terms &amp; Conditions</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                                <li><a href="#">Delivery Information</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="footer-top-box">
                            <h3>Kontak</h3>
                        </div>
                            <div class="footer-link">
                                <ul>
                                    <li><a href="#"><i class="fa fa-map-marker-alt"></i> <?php echo $site->alamat ?></a></li>
                                    <li><a href=""><i class="fas fa-phone-square"></i> Telepon : <?php echo $site->telepon ?></a></li>
                                    <li><a href="#"><i class="fas fa-envelope"></i> Email :  <?php echo $site->email ?></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- End Footer  -->

    <!-- Start copyright  -->
    <div class="footer-copyright">
        <p class="footer-company">All Rights Reserved. &copy; 2018 <a href="#">ThewayShop</a> Design By :
            <a href="https://html.design/">html design</a></p>
    </div>
    <!-- End copyright  -->

    <a href="#" id="back-to-top" title="Back to top" style="display: none;">&uarr;</a>

    <!-- ALL JS FILES -->
    <script src="<?php echo base_url();?>assets/freshshop/js/jquery-3.2.1.min.js"></script>
    <script src="<?php echo base_url();?>assets/freshshop/js/popper.min.js"></script>
    <script src="<?php echo base_url();?>assets/freshshop/js/bootstrap.min.js"></script>
    <!-- ALL PLUGINS -->
    <script src="<?php echo base_url();?>assets/freshshop/js/jquery.superslides.min.js"></script>
    <script src="<?php echo base_url();?>assets/freshshop/js/bootstrap-select.js"></script>
    <script src="<?php echo base_url();?>assets/freshshop/js/inewsticker.js"></script>
    <script src="<?php echo base_url();?>assets/freshshop/js/bootsnav.js."></script>
    <script src="<?php echo base_url();?>assets/freshshop/js/images-loded.min.js"></script>
    <script src="<?php echo base_url();?>assets/freshshop/js/isotope.min.js"></script>
    <script src="<?php echo base_url();?>assets/freshshop/js/owl.carousel.min.js"></script>
    <script src="<?php echo base_url();?>assets/freshshop/js/baguetteBox.min.js"></script>
    <script src="<?php echo base_url();?>assets/freshshop/js/form-validator.min.js"></script>
    <script src="<?php echo base_url();?>assets/freshshop/js/contact-form-script.js"></script>
    <script src="<?php echo base_url();?>assets/freshshop/js/custom.js"></script>
</body>

</html>