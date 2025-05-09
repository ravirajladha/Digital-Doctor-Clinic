<!DOCTYPE html>
<html lang="en">
<meta name="viewport" content="width=device-width, initial-scale=1">

@include('inc/newheader')
<!-- Add Bootstrap CSS -->

<!-- Add jQuery (Bootstrap requires it) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

<!-- Add Popper.js (Bootstrap requires it) -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>

<!-- Add Bootstrap JS -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<style>
   .abc {
      text-align: left;
      margin-bottom: 220px;
      margin-left: -80px;
   }


   @media screen and (max-width: 650px) {
      .carousel-caption {
         text-align: center; /* Center the text on smaller screens */
      }

      /* Add styles for .abc within the media query as needed */
      .abc {
         /* Add your mobile-specific styles here */
       text-align: left;
      margin-bottom: 0px;
      margin-left: -30px;
         z-index: 1;
      }
   }
   .pq-blog-info p {
    overflow: hidden;
    text-overflow: ellipsis;
    display: -webkit-box;
    -webkit-line-clamp: 2; /* Number of lines to show before truncating */
    -webkit-box-orient: vertical;
}

</style>

<body>
   <div class="pq-breadcrumb " style="background-image:url('/new_asset/images/breadcrumb.jpg');">
      <div class="container">
         <div class="row align-items-center">
            <div class="col-lg-12">
               <nav aria-label="breadcrumb">
                  <div class="pq-breadcrumb-title">
                     <h2>Information</h2> </div>
                  <div class="pq-breadcrumb-container mt-2">
                     <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/"><i class="fas fa-home mr-2"></i>Home</a></li>
                        <li class="breadcrumb-item active">Information</li>
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
         3-colume-grid start-->
   <section class="3-colume-grid pq-pb-60" style="padding: 60px 0px;">
      <div class="container">
         <div class="row">
            <div class="col-lg-4">
               <div class="pq-blog pq-blog-col-1">
                  <div class="row">
                     <div class="col-lg-12">
                        <div class="pq-blog-post">
                           <div class="pq-post-media"> <img src="/asset_pages/img/info/kidney_stone.jpg" class="img-fluid" alt="Features">
                              <div class="pq-post-date">
                              </div>
                           </div>
                           <div class="pq-blog-contain">

                              <h5 class="pq-blog-title">
                                 <a href="/subpages/KidneyStone">Kidney Stone</a>
                                 </h5>
                              <div class="pq-blog-info">
                                 <p>Renal calculi, or kidney stones develop from the dissolved salts and minerals like calcium, potassium . </p>
                              </div>
                              <a href="/subpages/KidneyStone" class="pq-button pq-button-flat">
                                 <div class="pq-button-block"> <span class="pq-button-text">Read More</span> <i class="ion ion-plus-round"></i> </div>
                              </a>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-lg-4">
               <div class="pq-blog-post">
                  <div class="pq-post-media"> <img src="/asset_pages/img/info/diabetes.jpg" class="img-fluid" alt="blogimage">
                     <div class="pq-post-date">
                     </div>
                  </div>
                  <div class="pq-blog-contain">

                     <h5 class="pq-blog-title"><a href="/subpages/Diabetes">Diabetes</a>
                        </h5>
                     <div class="pq-blog-info">
                        <p>Diabetes is a chronic disease that affects millions of people around the world. It is caused by a disruption .. </p>
                     </div>
                     <a href="/subpages/Diabetes" class="pq-button pq-button-flat">
                        <div class="pq-button-block"> <span class="pq-button-text">Read More</span> <i class="ion ion-plus-round"></i> </div>
                     </a>
                  </div>
               </div>
            </div>
            <div class="col-lg-4">
               <div class="pq-blog-post">
                  <div class="pq-post-media"> <img src="/asset_pages/img/info/thyroid.png" class="img-fluid" alt="blogimage">
                     <div class="pq-post-date">
                     </div>
                  </div>
                  <div class="pq-blog-contain">

                     <h5 class="pq-blog-title"><a href="/subpages/Thyroid">Thyroid
</a>
                        </h5>
                     <div class="pq-blog-info">
                        <p>Thyroid disease is a metabolic disorder that affects millions of people worldwide. It is a condition in .. </p>
                     </div>
                     <a href="/subpages/Thyroid" class="pq-button pq-button-flat">
                        <div class="pq-button-block"> <span class="pq-button-text">Read More</span> <i class="ion ion-plus-round"></i> </div>
                     </a>
                  </div>
               </div>
            </div>
            <div class="col-lg-4">
               <div class="pq-blog-post">
                  <div class="pq-post-media"> <img src="/asset_pages/img/info/nutrition.jpg" class="img-fluid" alt="blogimage">
                     <div class="pq-post-date">
                     </div>
                  </div>
                  <div class="pq-blog-contain">

                     <h5 class="pq-blog-title"><a href="/subpages/Nutrition">Nutrition</a>
                        </h5>
                     <div class="pq-blog-info">
                        <p>When it comes to maintaining a healthy lifestyle, nutrition is key. Eating a balanced dietthat is rich in vitamins .. </p>
                     </div>
                     <a href="/subpages/Nutrition" class="pq-button pq-button-flat">
                        <div class="pq-button-block"> <span class="pq-button-text">Read More</span> <i class="ion ion-plus-round"></i> </div>
                     </a>
                  </div>
               </div>
            </div>
            <div class="col-lg-4">
               <div class="pq-blog-post">
                  <div class="pq-post-media"> <img src="/asset_pages/img/info/fitness.jpg" class="img-fluid" alt="blogimage">
                     <div class="pq-post-date">
                     </div>
                  </div>
                  <div class="pq-blog-contain">

                     <h5 class="pq-blog-title"><a href="/subpages/Fitness">Fitness</a>
                        </h5>
                     <div class="pq-blog-info">
                        <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.

                            </p>
                     </div>
                     <a href="/subpages/Fitness" class="pq-button pq-button-flat">
                        <div class="pq-button-block"> <span class="pq-button-text">Read More</span> <i class="ion ion-plus-round"></i> </div>
                     </a>
                  </div>
               </div>
            </div>
            <div class="col-lg-4">
               <div class="pq-blog-post">
                  <div class="pq-post-media"> <img src="/asset_pages/img/info/Anxiety.jpg" class="img-fluid" alt="blogimage">
                     <div class="pq-post-date">
                     </div>
                  </div>
                  <div class="pq-blog-contain">

                     <h5 class="pq-blog-title"><a href="/subpages/Anxiety">Anxiety</a>
                        </h5>
                     <div class="pq-blog-info">
                        <p>Anxiety is a normal emotion that we all experience from time to time. It's the feeling of fear, worry, and .. </p>
                     </div>
                     <a href="/subpages/Anxiety" class="pq-button pq-button-flat">
                        <div class="pq-button-block"> <span class="pq-button-text">Read More</span> <i class="ion ion-plus-round"></i> </div>
                     </a>
                  </div>
               </div>
            </div>
            <div class="col-lg-4">
               <div class="pq-blog-post">
                  <div class="pq-post-media"> <img src="/asset_pages/img/info/Vitamin_b12.jpg" class="img-fluid" alt="blogimage">
                     <div class="pq-post-date">
                     </div>
                  </div>
                  <div class="pq-blog-contain">

                     <h5 class="pq-blog-title"><a href="/subpages/VitaminB12">Vitamin B12</a>
                        </h5>
                     <div class="pq-blog-info">
                        <p>Vitamin B12 is an essential vitamin that plays an important role in maintaining good health.. </p>
                     </div>
                     <a href="/subpages/VitaminB12" class="pq-button pq-button-flat">
                        <div class="pq-button-block"> <span class="pq-button-text">Read More</span> <i class="ion ion-plus-round"></i> </div>
                     </a>
                  </div>
               </div>
            </div>
            <div class="col-lg-4">
               <div class="pq-blog-post">
                  <div class="pq-post-media"> <img src="/asset_pages/img/info/Anemia.jpg" class="img-fluid" alt="blogimage">
                     <div class="pq-post-date">
                     </div>
                  </div>
                  <div class="pq-blog-contain">

                     <h5 class="pq-blog-title"><a href="/subpages/Anaemia">Anaemia</a></h5>
                     <div class="pq-blog-info">
                        <p>Anaemia is a condition in which the body does not have enough healthy red blood.. </p>
                     </div>
                     <a href="/subpages/Anaemia" class="pq-button pq-button-flat">
                        <div class="pq-button-block"> <span class="pq-button-text">Read More</span> <i class="ion ion-plus-round"></i> </div>
                     </a>
                  </div>
               </div>
            </div>
            <div class="col-lg-4">
               <div class="pq-blog-post">
                  <div class="pq-post-media"> <img src="/asset_pages/img/info/Depression.jpg" class="img-fluid" alt="blogimage">
                     <div class="pq-post-date">
                     </div>
                  </div>
                  <div class="pq-blog-contain">

                     <h5 class="pq-blog-title"><a href="/subpages/Depression">Depression</a>
                        </h5>
                     <div class="pq-blog-info">
                        <p>Depression is a mental health disorder that affects millions of people around the world.. </p>
                     </div>
                     <a href="/subpages/Depression" class="pq-button pq-button-flat">
                        <div class="pq-button-block"> <span class="pq-button-text">Read More</span> <i class="ion ion-plus-round"></i> </div>
                     </a>
                  </div>
               </div>
            </div>

         </div>
      </div>
   </section>
</body>
@include('inc/newfooter')

</html>
