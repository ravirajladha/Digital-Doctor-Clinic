<!doctype html>
<html lang="en">
@include('inc/newheader')
<style>
   .rating {
      float: right;
   }

   .rating:not(:checked)>input {
      position: absolute;
      /* top: -9999px; */
      clip: rect(0, 0, 0, 0);
   }

   .rating:not(:checked)>label {
      float: right;
      width: 1em;
      /* padding:0 .1em; */
      overflow: hidden;
      white-space: nowrap;
      cursor: pointer;
      font-size: 150%;
      /* line-height:1.2; */
      color: #ddd;
   }

   .rating:not(:checked)>label:before {
      content: '★ ';
   }

   .rating>input:checked~label {
      color: #ff9529;

   }

   .rating:not(:checked)>label:hover,
   .rating:not(:checked)>label:hover~label {
      color: #ff2994;

   }

   .rating>input:checked+label:hover,
   .rating>input:checked+label:hover~label,
   .rating>input:checked~label:hover,
   .rating>input:checked~label:hover~label,
   .rating>label:hover~input:checked~label {
      color: #ff2994;

   }

   .rating>label:active {
      position: relative;
      top: 2px;
      left: 2px;
   }

   td {
      padding: 20px;
   }

   .pq-testimonial-content {
      max-height: 3em;
      /* Set a fixed max height for three lines of text */
      overflow: hidden;
      /* Hide overflow content */
      position: relative;
   }

   .see-more-button {
      cursor: pointer;
      color: blue;
   }

   .pq-section-sub-title {
      position: relative;
      background-color: #ffffff;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      padding: 20px;
      border-radius: 8px;
   }

   .pq-section-sub-title:hover {
      box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
   }

   @keyframes elevate {
      0% {
         transform: translateZ(0);
      }

      100% {
         transform: translateZ(10px);
      }
   }

   .pq-section-sub-title:hover {
      animation: elevate 0.3s ease-out;
   }

   .section-header h2 {
      background: linear-gradient(to right, #00ccff, #ff2994);
      -webkit-background-clip: text;
      color: transparent;
      display: inline-block;
      padding: 15px 10px;
   }
   .card {
      border: 1px solid;
      border-image: linear-gradient(to right, #00ccff, #ff2994);
      border-image-slice: 1;
      border-radius: 0px;
      /* Rounded corners */
   }

   .card-body input,
   .card-body textarea {
      border: 1px solid;
      border-image: linear-gradient(to right, #00ccff, #ff2994);
      border-image-slice: 1;
      border-radius: 0px;
      /* Rounded corners */
   }

   .label {
      font-weight: 500;
      color: black;
   }

   .pq-bg-img-1:before {
      background: none;
      background-color: none;
   }

   .pq-bg-primary-dark {
      background-color: #00CCFF00;
   }
</style>


<!--=================================
         Banner start-->
<div class="pq-breadcrumb" style="background-image:url('/new_asset/images/breadcrumb.jpg');">
   <div class="container">
      <div class="row align-items-center">
         <div class="col-lg-12">
            <nav aria-label="breadcrumb">
               <div class="pq-breadcrumb-title">
                  <h2>Feedback</h2>
               </div>
               <div class="pq-breadcrumb-container mt-2">
                  <ol class="breadcrumb">
                     <li class="breadcrumb-item"><a href="/pages/index"><i class="fas fa-home mr-2"></i>Home</a></li>
                     <li class="breadcrumb-item active">Feedback</li>
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
         common-quaries start-->


<section class="pq-bg-grey">
   <div class="container">
      <div class="row align-items-center">
         <div class="col-lg-6">
            <img src="/asset_pages/img/feedback1.png" alt="alt" style="width:95%;">
         </div>
        <div class="col-lg-6 align-self-center mt-lg-0 mt-4 card" style="">
            <div class="card-body">
               <form action="/add_feedback" method="post">
                  @csrf
                  <div class=" ml-5 mt-n5">
                     <div class="section-header text-center">
                        <h2>Provide Your Feedback</h2>
                     </div><br>
                     <div class="row">

                        <div class="col-md-12">
                           <div class="form-group">
                              <label>Your Name <span>*</span></label>
                              <input type="text" name="name" class="form-control" placeholder="Enter your name" required>
                           </div>
                        </div>

                        <div class="col-md-12" style="width: auto;">
                           <div class="form-group">
                              <label>Rating <span>*</span></label>
                              <div class="rating" style="margin-right: 200px;">
                                 <input type="radio" id="star5_1" name="review_academic_5" value="5" /><label for="star5_1" title="Meh">5 stars</label>
                                 <input type="radio" id="star4_1" name="review_academic_4" value="4" /><label for="star4_1" title="Kinda bad">4 stars</label>
                                 <input type="radio" id="star3_1" name="review_academic_3" value="3" /><label for="star3_1" title="Kinda bad">3 stars</label>
                                 <input type="radio" id="star2_1" name="review_academic_2" value="2" /><label for="star2_1" title="Sucks big tim">2 stars</label>
                                 <input type="radio" id="star1_1" name="review_academic_1" value="1" /><label for="star1_1" title="Sucks big time">1 star</label>
                              </div>

                           </div>
                        </div>
                     </div>

                     <div class="col-md-12">
                        <div class="form-group">
                           <label>Comments <span>*</span></label>
                           <textarea class="form-control" name="comments" placeholder="Enter your comments" maxlength="200" required></textarea>
                        </div>
                     </div>
                  </div>
                  <center>
                     <button class=" btn btn-block" type="submit" style="color: white; margin: 15px;">Submit</button>
                  </center>
               </form>
            </div>

         </div>
      </div>
   </div>
</section>
<section class="pq-bg-primary-dark pq-bg-img-1" style="background-image: url(/new_asset/images/bgk-01.jpg); mask-repeat: no-repeat; background-size: cover; background-attachment: fixed; background-position: center center; position: relative; opacity:100%;">
   <div class="container">
      <div class="row">
         <div class="col-lg-8">
            <div class="pq-section pq-style-1 text-left">
               <span class="pq-section-sub-title" style="background: linear-gradient(to right, #00ccff, #ff2994);color:white">Reviews</span>
               <h5 class="pq-section-title " style="color: #ff2994;">What our clients say about us</h5>
            </div>
         </div>

         <div class="col-lg-12">
            <div class="pq-testimonial pq-testimonial-style-3">
               <div class="owl-carousel owl-loaded owl-drag" data-dots="false" data-nav="true" data-desk_num="3" data-lap_num="5" data-tab_num="5" data-mob_num="1" data-mob_sm="1" data-autoplay="true" data-loop="true" data-margin="30">
                  <?php foreach ($get_feedbacks as $feedback) { ?>

                     <div class="item">

                        <div class="pq-testimonial-box pq-style-3">

                           <div class="pq-testimonial-star">
                              <?php
                              if ($feedback->rating == 1) {
                                 echo '<i class="fas fa-star"></i>';
                              } else if ($feedback->rating == 2) {
                                 echo '<i class="fas fa-star"></i>';
                                 echo '<i class="fas fa-star"></i>';
                              } else if ($feedback->rating == 3) {
                                 echo '<i class="fas fa-star"></i>';
                                 echo '<i class="fas fa-star"></i>';
                                 echo '<i class="fas fa-star"></i>';
                              } else if ($feedback->rating == 4) {
                                 echo '<i class="fas fa-star"></i>';
                                 echo '<i class="fas fa-star"></i>';
                                 echo '<i class="fas fa-star"></i>';
                                 echo '<i class="fas fa-star"></i>';
                              } else {
                                 echo '<i class="fas fa-star"></i>';
                                 echo '<i class="fas fa-star"></i>';
                                 echo '<i class="fas fa-star"></i>';
                                 echo '<i class="fas fa-star"></i>';
                                 echo '<i class="fas fa-star"></i>';
                              }
                              ?>

                           </div>
                           <div class="pq-testimonial-info">
                              <p class="pq-testimonial-content">
                                 <?php echo $feedback->comments ?>
                              </p>
                              <span class="see-more-button" onclick="toggleSeeMore(this)">Read More</span>
                           </div>


                           <div class="pq-testimonial-media">

                              <div class="pq-testimonial-meta">
                                 <h5> <?php echo " " . $feedback->name ?></h5>

                              </div>
                              <div class="pq-testimonial-icon">
                                 <i class="fas fa-quote-right"></i>
                              </div>
                           </div>
                        </div>


                     </div>
                  <?php } ?>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<!--Testimonial End-->
<!--=================================
         common-quaries end-->

<script>
   function toggleSeeMore(button) {
      const contentContainer = button.previousElementSibling;

      if (contentContainer.style.maxHeight) {
         contentContainer.style.maxHeight = null; // Set to null to display all content
         button.innerText = 'read more';
      } else {
         contentContainer.style.maxHeight = 'none'; // Remove the max-height
         button.innerText = 'See Less';
      }
   }

   const contentContainers = document.querySelectorAll('.pq-testimonial-content');

   contentContainers.forEach(function(contentContainer) {
      const seeMoreButton = contentContainer.nextElementSibling;

      if (contentContainer.scrollHeight > contentContainer.clientHeight) {
         seeMoreButton.style.display = 'block';
      }
   });
</script>



</body>

</html>
@include('inc/newfooter')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php
if (isset($_SESSION['success'])) {
?>
   <script type="text/javascript">
      document.addEventListener('DOMContentLoaded', function() {
         //  swal("<?php echo $_SESSION['success']; ?>");
         swal({
            title: "success!",
            text: "<?php echo $_SESSION['success']; ?>",
            icon: "success",
            width: "400px", // Set the width as per your requirement
            height: "200px",

         });
      });
   </script>
<?php
   unset($_SESSION['success']);
} elseif (isset($_SESSION['error'])) {
?>
   <script type="text/javascript">
      document.addEventListener('DOMContentLoaded', function() {
         swal({
            title: "Error!",
            text: "<?php echo $_SESSION['error']; ?>",
            icon: "error",
            width: "400px", // Set the width as per your requirement
            height: "200px",


         });
      });
   </script>
<?php
   unset($_SESSION['error']);
}
?>
