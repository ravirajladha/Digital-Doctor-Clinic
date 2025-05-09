</body>


<!-- Footer -->
<footer class="footer">

	<!-- Footer Top -->
	<div class="footer-top">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-3 col-md-6">

					<!-- Footer Widget -->
					<div class="footer-widget footer-about">
						<div class="footer-logo">
							<img src="/asset_pages/img/logo_white.png" height=75px; width=250px; alt="logo">
						</div>
						<div class="footer-about-content">
							<p style='font-size:14px;'>Digital doctor clinic provides easy and quality healthcare accessible to people in rural by setting up digital clinics in villages. </p>
							<br>
							<div class="social-icon">
								<ul>
									<li>
										<a href="#" target="_blank"><i class="fab fa-facebook-f"></i> </a>
									</li>
									<li>
										<a href="#" target="_blank"><i class="fab fa-twitter"></i> </a>
									</li>
									<li>
										<a href="#" target="_blank"><i class="fab fa-instagram"></i></a>
									</li>
									<li>
										<a href="#" target="_blank"><i class="fab fa-whatsapp"></i></a>
									</li>
									<li>
										<a href="#" target="_blank"><i class="fab fa-youtube" style="color:white;"></i> </a>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Footer Widget -->

				</div>

				<div class="col-lg-3 col-md-6" style='margin-left:200px;'>

					<!-- Footer Widget -->
					<div class="footer-widget footer-menu">
						<h2 class="footer-title">Our Links</h2>
						<ul>
							<li><a href="/pages/index">Home</a></li>
							<li><a href="/pages/about_us">About Us</a></li>
							<li><a href="/pages/ngo_page">NGO Registration</a></li>
							<li><a href="/pages/index">Services</a></li>
							<li><a href="/pages/contact_us">Contact US</a></li>
						</ul>
					</div>
					<!-- /Footer Widget -->

				</div>

				<!-- </div> -->
				<div class="col-lg-3 col-md-6">

					<!-- Footer Widget -->
					<div class="footer-widget footer-contact">
						<h2 class="footer-title">Contact Us</h2>
						<div class="footer-contact-info">
							<div class="footer-address">
								<span style="margin-left: -2px;"><i class="fas fa-map-marker-alt"></i></span>
								<p style="font-size:13px;"> 212, Cyber Heights ,Vibhuti Khand, Gomti Nagar, Lucknow, Uttar Pradesh 226010 </p>
							</div>
							<br>
							<p style="font-size:13px;">
								<i class="fas		 fa-mobile-alt fa-lg"></i>
								+91 7309981223, +91 7302448226
							</p>
							<br>
							<p class="mb-0" style="font-size:13px;">
								<i class="fa-solid fa-globe "></i>
								www.obdu.in
							</p>
						</div>
					</div>
					<!-- /Footer Widget -->

				</div>

			</div>
		</div>
	</div>
	<!-- /Footer Top -->

	<!-- Footer Bottom -->
	<div class="footer-bottom">
		<div class="container-fluid">

			<!-- Copyright -->
			<div class="copyright">
				<div class="row">
					<div class="col-md-6 col-lg-6">
						<div class="copyright-text">
							<p class="mb-0">&copy; 2022 Digital Dr Clinic. All rights reserved.</p>
						</div>
					</div>
					<div class="col-md-6 col-lg-6">

						<!-- Copyright Menu -->
						<div class="copyright-menu">
							<ul class="policy-menu">
								<li><a href="#">Terms and Conditions</a></li>
								<li><a href="#">Policy</a></li>
							</ul>
						</div>
						<!-- /Copyright Menu -->

					</div>
				</div>
			</div>
			<!-- /Copyright -->

		</div>
	</div>
	<!-- /Footer Bottom -->

</footer>
<!-- /Footer -->

</div>
<!-- /Main Wrapper -->

<!-- jQuery -->
<script src="/asset_pages/js/jquery-3.6.0.min.js"></script>

<!-- Bootstrap Core JS -->
<script src="/asset_pages/js/bootstrap.bundle.min.js"></script>

<!-- Slick JS -->
<script src="/asset_pages/js/slick.js"></script>

<!-- Custom JS -->
<script src="/asset_pages/js/script.js"></script>

<!-- Review-->
<script src="/asset_pages/js/review.js"></script>

<!-- App js -->
<script src="/assets_admin/js/app.js"></script>

<!-- Slimscroll JS -->
<script src="/assets_admin/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<script src="/assets_admin/plugins/raphael/raphael.min.js"></script>
<script src="/assets_admin/plugins/morris/morris.min.js"></script>
<script src="/assets_admin/js/chart.morris.js"></script>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php if (isset($_SESSION['success'])) { ?>
	<script type="text/javascript">
		swal("<?php echo $_SESSION['success']; ?>");
	</script>
<?php }
unset($_SESSION['success']); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" async src="https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.5/latest.js?config=TeX-MML-AM_CHTML" async>
</script>
