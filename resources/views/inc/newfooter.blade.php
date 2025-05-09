
<!-- =========================
     Footer start
     ============================== -->

     <footer id="pq-footer" >
      <div class="pq-footer-style-1" >
      <div style="background: linear-gradient(70deg, rgba(247,243,243,1) 0%, rgba(67,168,249,1) 46%, rgba(221,18,189,1) 77%);">
            <div class="pq-footer-top">

               <div class="container-sm">
                  <div class="row">
                     <div class="col-md-4">
                        <div class="pq-footer-block">
                           <div class="footermobile">
                           <img src="/new_asset/images/logo.png" class="pq-footer-logo img-fluid" alt="ddc-footer-logo"  style="padding-right: 226px;">
                           </div>

                        <p style="color:black;font-weight:bold;">Digital doctor clinic provides easy and quality healthcare accessible to people in rural by setting up digital clinics in villages.</p>

                          <div class="pq-footer-social">
                           <ul>

                              <li><a href=""><i class="fab fa-facebook-f"></i></a></li>
                              <li><a href=""><i class="fab fa-instagram"></i></a></li>
                              <li><a href=""><i class="fab fa-x  "></i></a></li>

                              <li><a href=""><i class="fab fa-linkedin"></i></a></li>

                           </ul>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-4" >
                     <div class="row">
                        <div class="col-md-6">
                     <div class="pq-footer-block">
                        <div class="menu-useful-links-container">
                           <ul  class="menu">
                              <li><a href="/">Home</a></li>
                              <li><a href="/pages/info_page">Info</a></li>
                              <li><a href="/pages/about_us">About us</a></li>
                              <li><a href="/pages/career">Career </a></li>
                              <li><a href="/pages/newsroom">News Room</a></li>
                              <li><a href="/pages/contact_us">Contact Us</a></li>
                           </ul>
                        </div>
                     </div>
                        </div>
                        <div class="col-md-6">
                        <ul  class="menu">
                              <li><a href="/pages/doctor_register">Doctor Form</a></li>
                              <li><a href="/pages/ngoregistration">Ngo Form</a></li>
                              <li><a href="/representatives/representatives_reg">Representatives</a></li>
                              <li><a href="/pages/camp_request">Camp Form</a></li>

                           </ul>
                        </div>

                     </div>

                  </div>

                        <div class="col-md-4 ">
                           <div class="pq-footer-block">
                              <h4 class="footer-title">Contact Us</h4>
                              <div class="row">
                                 <div class="col-md-12">
                                    <ul class="pq-contact">

                                       <li> <a href="tel:+1800001658">

                                           <i class="fas fa-phone"></i> +91 9532985796, +91 9473546943
                                       </a>
                                     </li>
                                       <li> <a href="mailto:info@peacefulthemes.com"><i class="fas fa-envelope"></i><span>  info@digitaldrclinic.com</span></a>
                                     </li>
                                       <li> <span>
                                            <i class="fas fa-map-marker fa-2x"></i>
                                          </span>
                                          212, Cyber Heights ,Vibhuti Khand, Gomti Nagar, Lucknow, Uttar Pradesh 226010

                                     </li>
                                    </ul>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>

               <div class="pq-copyright-footer">
                  <div class="container">
                     <div class="row">
                        <div class="col-md-12 text-center "> <span class="pq-copyright"> ..</span> </div>
                     </div>
                  </div>
               </div>
            </div>

      </div>
         </footer>

         </body>

         <!--Back To Top start-->
         <div id="back-to-top">
            <a class="topbtn" id="top" href="#top"> <i class="ion-ios-arrow-up" style="border-radius: 50%;"></i> </a>
         </div>
         <!--Back To Top End-->
</html>
         <!--Footer End-->

         <!--jquery js-->
         <script src="/new_asset/js/jquery.min.js"></script>
         <!--bootstrap js-->
         <script src="/new_asset/js/bootstrap.min.js"></script>
         <!--owl-carousal-->
         <script src="/new_asset/js/owl.carousel.min.js"></script>
         <!--progress-bar js-->
         <script src="/new_asset/js/progressbar.js"></script>
         <!--isotope js-->
         <script src="/new_asset/js/isotope.pkgd.min.js"></script>
         <!--countTo js-->
         <script src="/new_asset/js/jquery.countTo.min.js"></script>
         <!--Maginfic-Popup js-->
         <script src="/new_asset/js/jquery.magnific-popup.min.js"></script>
         <!-- Animation JS -->
         <script src="/new_asset/js/wow.min.js"></script>
         <!-- Rev-Slider -->
         <script src="/new_asset/rev/js/rbtools.min.js"></script>
         <script src="/new_asset/rev/js/rs6.min.js"></script>
         <script src="/new_asset/js/rev-custom.js"></script>
         <!--custom js-->
         <script src="/new_asset/js/custom.js"></script>


         <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

         <?php if (!empty(session()->get('failed'))) { ?>
         <script type="text/javascript">
             Swal.fire({
                 icon: 'warning',
                 title: '{{ session('failed') }}',
                 showConfirmButton: false,
                 timer: 2000,
                 customClass: {
                     popup: 'sweetalert-message' // Apply custom CSS class to the message
                 }
             });
         </script>
         <?php }
         session()->forget('failed'); ?>


         @if (!empty(session()->get('success')))
            <script type="text/javascript">
                  Swal.fire({
                     icon: 'success',
                     title: '{{ session('success') }}',
                     showConfirmButton: false,
                     timer: 2000,
                     customClass: {
                        popup: 'sweetalert-message' // Apply custom CSS class to the message
                     }
                  });
            </script>
            @php
                  session()->forget('success');
            @endphp
         @endif



         <script>
            jQuery(window).on('load', function (e) {
               jQuery(".pq-applyform .form-btn").click(function () {
                  var first_name = jQuery('#first-name').val();
                  var doctor_name = jQuery('#doctor-name').val();
                  var disease_name = jQuery('#disease-name').val();
                  var email = jQuery('#e-mail').val();

                  var result;

                  jQuery('.pq-applyform .pq-message').remove();
                  jQuery('.pq-applyform .pq-thank-you-message').remove();

                  if (first_name == '' || first_name == undefined) {
                     jQuery("<span class='pq-name-error-message pq-message'>Please fill the field</span>").insertAfter('.pq-applyform .name-field');
                     result = false;
                  }
                  else {
                     jQuery('.pq-name-error-message').remove();
                     result = true;
                  }

                  if (email == '' || email == undefined) {
                     jQuery("<span class='pq-email-error-message pq-message'>Please fill the field</span>").insertAfter('.pq-applyform .e-mail-field');
                     result = false;
                  }
                  else {
                     jQuery('.pq-email-error-message').remove();
                     result = true;
                  }

                  if (doctor_name == '' || doctor_name == undefined )
                  {
                     jQuery("<span class='pq-doctor-name-error-message pq-message'>Please fill the field</span>").insertAfter('.pq-applyform .doctor-name-field');
                     result = false;
                  }
                  else
                  {
                     jQuery('.pq-doctor-name-error-message').remove();
                     result = true;
                  }

                  if (disease_name == '' || disease_name == undefined )
                  {
                     jQuery("<span class='pq-disease-name-error-message pq-message'>Please fill the field</span>").insertAfter('.pq-applyform #disease-name');
                     result = false;
                  }
                  else
                  {
                     jQuery('.pq-disease-name-error-message').remove();
                     result = true;
                  }

                  if(result == true)
                  {
                     var email = jQuery("#email").text();
                     event.preventDefault();
                     jQuery.ajax({
                        type: "POST",
                        url: "mail.php",
                        data: {'email':email },
                        success: function(){
                          jQuery("<span class='pq-thank-you-message pq-text-white ms-5'> Thank You For Filling The form</span>").insertAfter('.pq-applyform .pq-button');
                       }
                    });
                  }
               });
            });
         </script>

