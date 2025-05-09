<!DOCTYPE html>
<html lang="en">
@include('inc/newheader')

<head>
   <style>
      .pq-contact-box {
         min-height: 332px !important;
      }

      .pq-contact-box {
         background: linear-gradient(to right, #00ccff, #ff2994);
      }

      .pq-contact-box-icon i {
         background: none;
      }

      input,
      textarea {
         border: 1px solid;
         border-image: linear-gradient(to right, #00ccff, #ff2994);
         border-image-slice: 1;
         border-radius: 0px;
         /* Rounded corners */
      }

      label {
         font-weight: 500;
         color: black;
      }

      .get-in-touch .pq-form-box {
         border: 1px solid;
         border-image: linear-gradient(to right, #00ccff, #ff2994);
         border-image-slice: 1;
         border-radius: 0px;
         /* Rounded corners */
      }

      @media (max-width: 1999px) {
         .map {
            padding-bottom: 0px;
         }
      }

      .btn {
         background:linear-gradient(to right, #00ccff, #ff2994);
         color: white;
         border-color: white;
      }

      .btn:hover {
         color: none;
         background-color: none;
         border-color: none;
      }
   </style>
</head>

<div class="pq-breadcrumb" style="background-image:url('/new_asset/images/breadcrumb.jpg');">
   <div class="container">
      <div class="row align-items-center">
         <div class="col-lg-12">
            <nav aria-label="breadcrumb">
               <div class="pq-breadcrumb-title">
                  <h2>Contact Us</h2>
               </div>
               <div class="pq-breadcrumb-container mt-2">
                  <ol class="breadcrumb">
                     <li class="breadcrumb-item"><a href="/pages/index">
                           <i class="fas fa-home mr-2"></i>Home</a></li>
                     <li class="breadcrumb-item active">Contact Us</li>
                  </ol>
               </div>
            </nav>
         </div>
         <div class="col-lg-4">
            <div class="pq-breadcrumb-img text-right wow fadeInRight"></div>
         </div>
      </div>
   </div>
</div>
<!--=================================
         Banner end-->
<!--=================================
         conatct-us start-->
<section class="pq-contact-us" style="padding: 80px 0px 60px 0px;">
   <div class="container">
      <div class="row justify-content-center">
         <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="pq-contact-box">
               <div class="pq-contact-box-icon">
                  <div class="pq-info-box-icon">
                     <i class="fa fa fa-map-location"></i>
                  </div>
               </div>
               <div class="pq-contact-box-info">
                  <h4 class="pq-contact-box-title">
                     Our Location
                  </h4>
                  <p class="pq-contact-box-description"> <br>
                     Digital Doctor Clinic 212-second floor Cyber Heights
                     Vibhuti Khand, Gomti Nagar, Lucknow, Uttar Pradesh 226010
                  </p>
               </div>
            </div>
         </div>
         <div class="col-lg-4 col-md-6 col-sm-12 mt-lg-0 mt-md-0 mt-4">
            <div class="pq-contact-box">
               <div class="pq-contact-box-icon">
                  <div class="pq-info-box-icon"> <i class="fa fa fa-phone"></i> </div>
               </div>
               <div class="pq-contact-box-info">
                  <h4 class="pq-contact-box-title">
                     Our Contact
                  </h4>
                  <p class="pq-contact-box-description"><br>
                     +91 9532985796
                     <br>+91 9473546943
                  </p>
               </div>
            </div>
         </div>
         <div class="col-lg-4 col-md-6 col-sm-12 mt-lg-0 mt-4">
            <div class="pq-contact-box">
               <div class="pq-contact-box-icon">
                  <div class="icon animation-grow">
                     <i class="fa fa fa-envelope"></i>
                  </div>
               </div>
               <div class="pq-contact-box-info">
                  <h4 class="pq-contact-box-title">
                     Mail Us
                  </h4>
                  <p class="pq-contact-box-description">
                     {{-- www.obdu.in --}}
                     <br>info@drclinic.com
                  </p>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<!--=================================
         contact-us end-->
<!--=================================
         get-in-touch start-->
<section class="get-in-touch" style="padding: 40px 0px 100px 0px;">
   <div class="container">
      <div class="row">
         <div class="col-lg-8 col-md-8  pq-form-box">
            <div class="form-container">
               <div class="pq-section pq-style-1 text-center p-0"> <span class="pq-section-sub-title">contact us</span>
                  <h5 class="pq-section-title">Get in touch with us</h5>
               </div>
            </div>
            <div class="pq-applyform-whitebg text-start">
               <form action="/add_contact" method="post" class="pq-applyform">
                  @csrf
                  <div class="row">
                     <div class="col-lg-6 col-md-6">
                        <input type="text" id="first-name" name="name" class="name-field" value="" size="40" aria-required="true" aria-invalid="false" placeholder="Enter Your Name" required>
                     </div>
                     <div class="col-lg-6 col-md-6">
                        <input type="email" id="e-mail" name="email" class="e-mail-field" value="" size="40" aria-required="true" aria-invalid="false" placeholder="Enter Your Email" required>
                     </div>
                     <div class="col-lg-6 col-md-6">
                        <input type="tel" id="phone-number" name="phone_number" class="phone-number-field" value="" size="40" aria-required="true" aria-invalid="false" placeholder="Enter Your Phone Number" maxlength="10" pattern="[0-9]{10}" oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                     </div>
                     <div class="col-lg-6 col-md-6">
                        <input type="text" id="subject" name="subject" class="subject-field" size="40" aria-required="true" aria-invalid="false" placeholder="Subject" required>
                     </div>
                     <div class="col-lg-12 col-md-12">
                        <textarea name="comment" id="message" cols="40" rows="10" aria-required="true" aria-invalid="false" placeholder="Write Your Message"></textarea>
                     </div>
                     <div class="col-lg-12 col-md-12">
                        <button class="btn btn btn-lg btn-success "> Send message</button>

                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</section>
<!--=================================
         get-in-touch end-->
<!--=================================
         map start-->
<section style="padding: 0px 0px 0px 0px;">
   <div class="map container-flud pt-0">
      <div class="pq-bg-map">
         <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3559.070226857684!2d81.0093357!3d26.869509799999996!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x399be2960054b457%3A0xb849bd63be3f5485!2sCyber%20Heights%2C%20Vibhuti%20Khand%2C%20Gomti%20Nagar%2C%20Lucknow%2C%20Uttar%20Pradesh%20226010!5e0!3m2!1sen!2sin!4v1701235225358!5m2!1sen!2sin" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>
   </div>
</section>
@include('inc/newfooter')

</html>
