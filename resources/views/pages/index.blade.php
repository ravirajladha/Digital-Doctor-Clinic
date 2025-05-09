<!doctype html>
<html lang="en">
@include('inc/newheader')

<head>

    <style>
        .truncate-text {
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            /* Limit to three lines */
            -webkit-box-orient: vertical;
        }

        .expand-btn {
            cursor: pointer;
            color: blue;
            text-decoration: underline;
            display: none;
        }

        .pq-testimonial-content {
            max-height: 1.2em;
            /* Set a fixed max height for one line */
            overflow: hidden;
            /* Hide overflow content */
            position: relative;
        }

        .see-more-link {

            /* cursor: pointer; */
            color: blue;
        }

        .computer {
            display: block;
            /* Ensure the default display is used for larger screens */
        }

        .mobile {
            display: none;
            /* Hide the mobile heading by default */
        }

        @media screen and (max-width: 650px) {

            .computer {
                display: none;
                /* Hide the computer heading on smaller screens */
            }

            /* Show the mobile heading on smaller screens */
            .mobile {
                display: block;
                /* Add other styles as needed for the "mobile" class on smaller screens */
            }
        }
    </style>

    <style>
        .custom-bg {
            background: url('/assets/img/newimgs/ddc1.jpg') center/cover;
            /* Set the background image */
            padding: 60px 0;
            /* Add padding as needed */
            position: relative;
            overflow: hidden;
            /* Hide overflowing content */
        }


        .mycard2:hover {
            background: linear-gradient(to right, #00ccff, #ff2994);
            color: white;
            border-radius: 20px;
            box-shadow: 20px 20px 30px rgba(0, 0, 0, 0.5);
            /* Adjust shadow values as needed */
        }

        .mycard2:before {
            transform: scale(1);
            /* Corrected scale value */
            transition: transform 0.35s ease-out;
        }

        .mycard2:hover:before {
            transform: scale(28);
        }



        .news-card {
            position: relative;
            overflow: hidden;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            transition: box-shadow 0.3s ease;
            margin-top: 20px;
        }

        .news-card:hover {
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.5);
        }

        .news-card-content {
            padding: 20px;
            background: linear-gradient(to right, #00ccff, #ff2994);
            color: white;
            height: 100%;
        }
    </style>
    <style>
        .card {
            width: auto;
            height: 400px;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.2);
            position: relative;
        }

        .remove-when-use {
            text-align: center;
            width: 100%;
            position: absolute;
            color: black;
            font-weight: bold;
        }

        .details>p {
            font-size: 0.8em;
            margin-top: 0.5em;
        }

        .details>label {
            font-weight: bold;
        }

        .details {
            color: white;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.2);
            width: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            position: absolute;
            bottom: 0;
            height: 3.6em;
            transition: height 0.5s ease-in-out;
            padding: 0.6em;
            overflow: hidden;
        }

        .card:hover>.details {
            height: 20.7em;
        }

        .text {
            max-height: 4.5em;
            /* Set max height for 3 lines of text */
            overflow: hidden;
            margin-bottom: 8px;
        }

        .see-more-btn {
            background-color: #3498db;
            color: #fff;
            border: none;
            padding: 8px 12px;
            border-radius: 4px;
            cursor: pointer;
        }

        .content {
            padding: 16px;
        }

        rs-module rs-mask-wrap .rs-layer,
        rs-module rs-mask-wrap *:last-child,
        .wpb_text_column rs-module rs-mask-wrap .rs-layer,
        .wpb_text_column rs-module rs-mask-wrap *:last-child {
            margin-bottom: 0px;
            margin-top: 95px;
        }

        .whyChooseUs1 img::after {
            content: "";
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background: linear-gradient(to right, #00ccff, #ff2994);
            transform: scaleX(0);
            transform-origin: 0 0;
            transition: transform 0.3s;
        }

        .pq-pt-300 {
            padding-top: 30px !important;
        }

        .pq-pb-210 {
            padding-bottom: 80px;
        }

        .pq-blog-post {
            position: relative;
            /* overflow: hidden; */
        }

        .pq-blog-post::after {
            content: "";
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background: linear-gradient(to right, #00ccff, #ff2994);
            transform: scaleX(0);
            transform-origin: 0 0;
            transition: transform 0.3s;
        }

        .pq-blog-post:hover::after {
            transform: scaleX(1);
        }

        .pq-blog {
            display: flex;
            flex-direction: column;
            height: 100%;
        }

        .pq-blog {
            display: flex;
            flex-direction: column;
            height: 100%;
        }

        .pq-blog-post {
            display: flex;
            flex-direction: column;
            height: 100%;
            box-sizing: border-box;
        }

        .pq-post-media {
            position: relative;
            overflow: hidden;
            height: 150px;
        }

        .pq-post-media img {
            width: 100%;
            /* height: auto; */
            height: 100%;
            object-fit: scale-down;
        }

        .pq-blog-contain {
            flex-grow: 1;
            padding: 15px;
            box-sizing: border-box;
        }

        .pq-blog-title,
        .pq-blog-info p {
        
         overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .pq-button {
            align-self: flex-end;
        }

        .pq-post-date {
            position: absolute;
            bottom: 0;
            left: 0;
            padding: 10px;
            background: #f3f2f2;
            border-radius: 10%;
        }

        .k-blue-highlight {
            background-color: #D3E9FB;
            padding: 0.4em;
            border-radius: 10px;
            text-align: center;
        }

        .pq-process-step-info h5 {
            text-align: center;
        }

    </style>
</head>

<body>
    <!-- START Home 1 REVOLUTION SLIDER 6.5.19

  ================================= -->
    <p class="rs-p-wp-fix"></p>
    <rs-module-wrap id="rev_slider_24_1_wrapper" data-alias="home-1" data-source="gallery"
        style="visibility:hidden;background:transparent;padding:0;margin:0px auto;margin-top:-10px;margin-bottom:0;">
        <rs-module id="rev_slider_24_1" data-version="6.5.19">
            <rs-slides>

                <rs-slide style="position: absolute;" data-key="rs-84" data-title="Slide"
                    data-thumb="rev/assets/1-51-50x100.jpg" data-anim="ms:600;" data-in="o:0;" data-out="a:false;">
                    <img src="new_asset/rev/assets/t3k.png" alt="" title="1-51.jpg"
                        class="rev-slidebg tp-rs-img" data-no-retina>
                    <rs-layer id="slider-24-slide-85-layer-2" data-type="text" data-color="#18100f" data-rsp_ch="on"
                        data-xy="xo:30px,30px,30px,31px;y:m;yo:-105px,-75px,-50px,-30px;"
                        data-text="w:normal;s:35,48,42,22;l:55,56,50,30;fw:600;"
                        data-border="boc:#14457b;bow:1px,1px,1px,1px;" data-frame_0="x:50,39,29,17;"
                        data-frame_1="st:1400;sp:1000;sR:1400;" data-frame_999="o:0;st:w;sR:6600;"
                        style="z-index:10;font-family:'Quicksand';text-transform:capitalize;margin: top 85px;">We
                        specialize in Providing<br /> Primary Care In Remote Areas
                    </rs-layer>

                </rs-slide>

                <rs-slide style="position: absolute;" data-key="rs-85" data-title="Slide"
                    data-thumb="rev/assets/2-51-50x100.jpg" data-in="o:0;" data-out="a:false;">
                    <img src="new_asset/rev/assets/t1k.png" alt="" title="2-51.jpg"
                        class="rev-slidebg tp-rs-img" data-no-retina>

                    <rs-layer id="slider-24-slide-85-layer-2" data-type="text" data-color="#18100f" data-rsp_ch="on"
                        data-xy="xo:30px,30px,30px,31px;y:m;yo:-105px,-75px,-50px,-30px;"
                        data-text="w:normal;s:35,48,42,22;l:55,56,50,30;fw:600;"
                        data-border="boc:#14457b;bow:1px,1px,1px,1px;" data-frame_0="x:50,39,29,17;"
                        data-frame_1="st:1400;sp:1000;sR:1400;" data-frame_999="o:0;st:w;sR:6600;"
                        style="z-index:10;font-family:'Quicksand';text-transform:capitalize;margin: top 85px;">Digital
                        doctor clinic is<br />conceptualized to connect people<br />in rural areas with
                        advanced<br />healthcare infrastructure through<br />assisted online consultation.
                    </rs-layer>
                </rs-slide>

                <rs-slide style="position: absolute;" data-key="rs-86" data-title="Slide"
                    data-thumb="rev/assets/3-2-50x100.jpg" data-in="o:0;" data-out="a:false;">
                    <img src="new_asset/rev/assets/t2k.png" alt="" title="3-2" class="rev-slidebg tp-rs-img"
                        data-no-retina>

                    <rs-layer id="slider-24-slide-85-layer-2" data-type="text" data-color="#18100f" data-rsp_ch="on"
                        data-xy="xo:30px,30px,30px,31px;y:m;yo:-105px,-75px,-50px,-30px;"
                        data-text="w:normal;s:35,48,42,22;l:55,56,50,30;fw:600;"
                        data-border="boc:#14457b;bow:1px,1px,1px,1px;" data-frame_0="x:50,39,29,17;"
                        data-frame_1="st:1400;sp:1000;sR:1400;" data-frame_999="o:0;st:w;sR:6600;"
                        style="z-index:10;font-family:'Quicksand';text-transform:capitalize;margin: top 85px;">Safe and
                        Quality healthcare<br />for you and your family with DDC<br />centers setup at Rural areas
                    </rs-layer>
                </rs-slide>
            </rs-slides>
            <rs-static-layers>
                <!--
               -->
            </rs-static-layers>
        </rs-module>
    </rs-module-wrap>

    <!--=================================
         END REVOLUTION SLIDER
         ================================= -->


    <div class="servicebox" style="margin-bottom: 60px;">
        <div class="container pq-mt-60">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-6 col-xl-4">
                    <div class="pq-info-box pq-style-1">
                        <div class="pq-info-box-right-icon"> <i class=" flaticon-medical-doctor"></i> </div>
                        <div class="pq-info-box-icon"><i class=" flaticon-medical-doctor"></i></div>
                        <h5 class="pq-info-title">Consultation</h5>
                        <p class="pq-infobox-description">We hire the best specialists to deliver top-notch diagnostic
                            services for you. </p>

                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-xl-4 pt-md-0 pt-4">
                    <div class="pq-info-box pq-style-2">
                        <div class="pq-info-box-right-icon"> <i class=" flaticon-doctor"></i> </div>
                        <div class="pq-info-box-icon"><i class="flaticon-medicine"></i></div>
                        <h5 class="pq-info-title">Medicines</h5>
                        <p class="pq-infobox-description">We provide a wide range of doctor prescribed genric & other
                            medicines at lesser price. </p>

                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-xl-4 pt-xl-0 pt-4">
                    <div class="pq-info-box pq-style-3">
                        <div class="pq-info-box-right-icon"> <i class=" flaticon-care"></i> </div>
                        <div class="pq-info-box-icon"><i class=" flaticon-medical-history"></i></div>
                        <h5 class="pq-info-title">Lab Tests</h5>
                        <div class="pq-info-hours">
                            <div class="pq-info-hours-row">
                                <p>We use the first-class medical equipment for timely diagnostics of various diseases.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Section End-->
    <div class="about-section-box2">
        <div class="container">
            <div class="text-center">

                <h5 class="sub-title1">Digital Dr. Clinic</h5><br>
                <p class="lh-lg mytext" style="text-align: justify;">
                    इस आधुनिकरण की दुनिया में आज रोज मररा की हर चीझ हमारी उँगलियों पर होती है. लेकिन आज भी जब बात
                    स्वस्थ्य से सम्बंधित हो तो हमे अस्पतालों और क्लीनिकों के लम्बे लाइन लगने पड़ते हैं.
                    लेकिन अब इन लम्बी लाइनो और घन्टों इंतज़ार को Digital Doctor’s Clinic उतर प्रदेश सरकार के सहयोग से
                    ग्रामीणों की उँगलियों पर ले आया है.
                    Digital Doctor’s Clinic भारत के स्वस्थ्य क्षेत्र में एक ऐसा प्रयास है जो मरीजों और चिकित्सकों के बिच
                    की दूरियों को मिटा देगी.
                    artificial intelligence Technology per based Digital Doctor’s Clinic पर MBBS qualified
                    भारत के सर्वश्रेष्ठ चिकित्सकों की एक टीम होगी जो गावों और सुदूर ग्रामीण क्षेत्रों के मरीजों तक
                    technology के
                    माध्यम से पहुचेंगे और उनका सही उपचार कर जरुरी दवाइयां भी उपलब्ध करवाएंगे.
                </p>

            </div>
        </div>

    </div>


    <!-- Start Why Choose Us -->

    <section class="equity pq-pt-300 pq-pb-210 pq-bg-grey">
        <div class="container">
            <div class="text-center mb-3">
                <h5 class="sub-title1">Why Choose Us</h5>
            </div>
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="about-us-img">
                        <img src="/new_asset/images/About-us/1.jpeg" class="pq-image9 wow animated fadeInLeft"
                            alt="" style="border-radius: 12px;">
                    </div>
                </div>
                <div class="col-lg-6 mt-4 mt-lg-0">

                    <div class="pq-section pq-style-1 text-left pq-mb-45">
                        <p class="pq-icon-box-description">Digital Doctor clinics are specially designed small that are
                            equipped with a tablet or laptop for a video consultation with a health care assistant as
                            well as medical equipment for a basic vitals check-up including Temperature, Blood Pressure,
                            Weight, Blood Sugar, Blood Count, etc. It is a simple and easy approach to get medical
                            treatment that’s
                            affordable, quick, and reaches out to rural areas.
                            The customer and the entire family members can utilise from this digital clinic
                            which not only creates the awareness of digital clinics in rural areas indeed helps
                            in identifying chronic diseases and prevents accordingly. The Digital doctor clinic
                            aims in providing quality primary healthcare with high-end technology devices.</p>
                    </div>

                    <div class="row">
                        <div class="col-lg-12 col-md-6 mb-2">
                            <div class="pq-icon-box pq-style-8">
                                <div class="pq-icon">
                                    <span><i class="ion ion-android-done"></i></span>
                                </div>
                                <div class="pq-icon-box-content">
                                    <h6 class="pq-icon-box-title" style="font-size: 16px;"><span>24×7 Emergency
                                            Services</span></h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-6 mb-2">
                            <div class="pq-icon-box pq-style-8">
                                <div class="pq-icon">
                                    <span><i class="ion ion-android-done"></i></span>
                                </div>
                                <div class="pq-icon-box-content">
                                    <h6 class="pq-icon-box-title" style="font-size: 16px;"><span>Patient Centered
                                            Care</span></h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-6 mb-2">
                            <div class="pq-icon-box pq-style-8">
                                <div class="pq-icon">
                                    <span><i class="ion ion-android-done"></i></span>
                                </div>
                                <div class="pq-icon-box-content">
                                    <h6 class="pq-icon-box-title" style="font-size: 16px;"><span>Assisted online
                                            consultation</span></h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-6 mb-2">
                            <div class="pq-icon-box pq-style-8">
                                <div class="pq-icon">
                                    <span><i class="ion ion-android-done"></i></span>
                                </div>
                                <div class="pq-icon-box-content">
                                    <h6 class="pq-icon-box-title" style="font-size: 16px;"><span>Diagnostic
                                            services</span></h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-6">
                            <div class="pq-icon-box pq-style-8">
                                <div class="pq-icon">
                                    <span><i class="ion ion-android-done"></i></span>
                                </div>
                                <div class="pq-icon-box-content">
                                    <h6 class="pq-icon-box-title" style="font-size: 16px;"><span>In house
                                            pharmacy</span></h6>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </section>
    <!-- End Why choose us -->

    <!-- News section Start -->
    <!-- Use for each later for the news -->
    <section style="padding: 70px 0px 40px 0px;">
        <div class="container">
            <div class="text-center mb-3">
                <span class="k-blue-highlight">डिजिटल डॉक्टर क्लीनिक की अधिक जानकारी के लिए नीचे दी गई संबंधित न्यूज़
                    पढ़ें !</span>
            </div>
            <div class="text-center mb-4">
                <h5 class="sub-title1">News</h5>
            </div>
            <div class="row">
                @foreach ($newsdata as $news)
                    <div class="col-lg-3">
                        <div class="pq-blog pq-blog-col-1 pq-process-style-2">
                            <div class="pq-blog-post">
                                <div class="pq-post-media">
                                    <img src="/uploads/newsroom/<?php echo $news->newphoto; ?>" class="img-fluid"
                                        alt="News Photo" style="width: 100%;">
                                    <div class="pq-post-date" style="background:#f3f2f2">
                                        <img src="/uploads/newslogo/<?php echo $news->newslogo; ?>" alt="News Logo"
                                            style="width: 50px; height: 50px; border-radius: 10%;">
                                    </div>
                                </div>
                                <div class="pq-blog-contain">
                                    <h2 class="pq-blog-title"
                                        style="-webkit-line-clamp: 3; overflow: hidden; display: -webkit-box; -webkit-box-orient: vertical; font-size: 15px;">
                                        {{ $news->title }}</h2>
                                    <div class="pq-blog-info">
                                        <p
                                            style="-webkit-line-clamp: 3; overflow: hidden; display: -webkit-box; -webkit-box-orient: vertical;">
                                            {{ $news->discription }}</p>
                                    </div>
                                    <a href="{{ $news->link }}" class="pq-button pq-button-flat">
                                        <div class="pq-button-block"> <span class="pq-button-text">Read More</span> <i
                                                class="ion ion-plus-round"></i> </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
    <!-- Use for each later for the news -->
    <!-- News section End -->




    <div class="container-fluid" style="padding-top: 10px;">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s"
            style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
            <h5 class="sub-title1 small_heading" style="margin-bottom: 40px;">Social Media</h5>
        </div>
        <div class="container">
            <div class="row ">
                <?php foreach ($socialmedia as $media) {
            ?>

                <div class="col" style="height: 250px;background-color:#3B5998;border-radius: 5px;">
                    <a href="<?php echo $media->facebook; ?>" class="rounded" target="_blank">
                        <div class="rounded ">
                            <div class="pt-0 icon wow fadeInLeft" data-wow-delay=".3s"
                                style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInLeft;">
                                <i class="fa-brands fa-facebook fa-3x p-3" style="color: white;"></i>
                            </div>
                            <div class="wow fadeInLeft" data-wow-delay=".3s"
                                style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInLeft;">
                                <p class="border-left ml-5 mt-2 pl-2 text-white">

                                    #---------<br>
                                    #-------- <br>
                                    {{ $media->updated_at }}
                                </p>
                            </div>

                        </div>
                    </a>

                </div>
                <div class="col"
                    style="height: 250px;background: radial-gradient(circle farthest-corner at 35% 90%, #fec564, transparent 50%), radial-gradient(circle farthest-corner at 0 140%, #fec564, transparent 50%), radial-gradient(ellipse farthest-corner at 0 -25%, #5258cf, transparent 50%), radial-gradient(ellipse farthest-corner at 20% -50%, #5258cf, transparent 50%), radial-gradient(ellipse farthest-corner at 100% 0, #893dc2, transparent 50%), radial-gradient(ellipse farthest-corner at 60% -20%, #893dc2, transparent 50%), radial-gradient(ellipse farthest-corner at 100% 100%, #d9317a, transparent), linear-gradient(#6559ca, #bc318f 30%, #e33f5f 50%, #f77638 70%, #fec66d 100%);
                    margin-left: 10px;border-radius: 5px;">
                    <a href="<?php echo $media->Instagram; ?>" class="rounded" target="_blank">
                        <div class="rounded">
                            <div class="icon wow fadeInLeft" data-wow-delay=".3s"
                                style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInLeft;">
                                <i class="fa-brands fa-instagram fa-3x p-3" style="color:white"></i>
                            </div>
                            <div class="wow fadeInLeft" data-wow-delay=".3s"
                                style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInLeft;">
                                <p class="border-left ml-5 pl-2 text-white"> #here the latest updates of <br>
                                    #--------<br>
                                    {{ $media->updated_at }}

                                </p>
                            </div>
                        </div>
                    </a>

                </div>

            </div>
        </div>
        <div class="container py-2">
            <div class="row ">
                <div class="col" style="height: 250px;background-color:black;border-radius: 5px;">
                    <a href="<?php echo $media->twitter; ?>" class="rounded" target="_blank">
                        <div class="rounded ">
                            <div class="pt-0 icon wow fadeInLeft" data-wow-delay=".3s"
                                style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInLeft;">

                                <svg xmlns="http://www.w3.org/2000/svg" height="5em" viewBox="0 0 448 512"
                                    class="p-3"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                    <path
                                        d="M64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64zm297.1 84L257.3 234.6 379.4 396H283.8L209 298.1 123.3 396H75.8l111-126.9L69.7 116h98l67.7 89.5L313.6 116h47.5zM323.3 367.6L153.4 142.9H125.1L296.9 367.6h26.3z"
                                        fill="white" />
                                </svg>
                            </div>
                            <div class="wow fadeInLeft" data-wow-delay=".3s"
                                style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInLeft;">


                                <p class="border-left ml-5 mt-2 pl-2 text-white">

                                    #------- <br>
                                    #-- <br>
                                    {{ $media->updated_at }}

                                </p>
                            </div>
                        </div>
                    </a>



                </div>
                <div class="col"
                    style="height: 250px;background-color:#3f729b;margin-left: 10px;border-radius: 5px;">
                    <a href="<?php echo $media->linkedin; ?>" class="rounded" target="_blank">
                        <div class="rounded">
                            <div class="icon wow fadeInLeft" data-wow-delay=".3s"
                                style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInLeft;">
                                <i class="fa-brands fa-linkedin fa-3x p-3" style="color:white"></i>
                            </div>
                            <div class="wow fadeInLeft" data-wow-delay=".3s"
                                style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInLeft;">
                                <p class="border-left ml-5 pl-2 text-white"> #here the latest updates of <br>
                                    #---- <br>
                                    {{ $media->updated_at }}

                                </p>
                            </div>
                        </div>
                    </a>

                </div>
                <?php
            } ?>
            </div>
        </div>
    </div>


    <div class="service" style="margin-top: 60px;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class=" pq-style-1 text-center">
                        <h5 class="sub-title1" style="margin-bottom: 40px;">In house services</h5>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-xl-3">
                    <div class="pq-service-box pq-style-1">

                        <div class="pq-service-block">
                            <div class="pq-service-img">
                                <img src="/asset_pages/img/services/pathology_facility.jpg" class="img-fluid"
                                    alt="servicebox">
                            </div>
                            <div class="pq-service-box-info">
                                <div class="pq-info-text">
                                    <div class="pq-service-icon"> <i class=" flaticon-laboratory"
                                            style="font-size: 50px; color: black;"></i> </div>
                                    <a href="/subpages/Pathology">
                                        <h5 class="pq-service-title">Pathology <br> Facility</h5>
                                    </a>
                                </div>
                            </div>
                            <p style="text-align: justify;">At Digital doctor clinic, we ensure to provide the best
                                services and to diagnose in the early..</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-xl-3">
                    <div class="pq-service-box pq-style-1">
                        <div class="pq-service-block">
                            <div class="pq-service-img"><img src="/asset_pages/img/services/pharmacy_facility.jpg"
                                    class="img-fluid" alt="servicebox"></div>
                            <div class="pq-service-box-info">
                                <div class="pq-info-text">
                                    <div class="pq-service-icon"> <i class="flaticon-medicine"
                                            style="font-size: 50px; color: black;"></i> </div>
                                    <a href="/subpages/PharmacyFacility">
                                        <h5 class="pq-service-title">Pharmacy <br>Facility</h5>
                                    </a>
                                </div>
                            </div>
                            <p>Pharmacy services at digital clinics can help to streamline the delivery of healthcare..
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-xl-3 pt-md-0 pt-4">
                    <div class="pq-service-box pq-style-1">
                        <div class="pq-service-block">
                            <div class="pq-service-img"><img
                                    src="/asset_pages/img/services/health_care_assistance.jpg" class="img-fluid"
                                    alt="servicebox"></div>
                            <div class="pq-service-box-info">
                                <div class="pq-info-text">
                                    <div class="pq-service-icon"><i class=" flaticon-doctor-1"
                                            style="font-size: 50px; color: black;"></i> </div>
                                    <a href="/subpages/HealthCare">
                                        <h5 class="pq-service-title">Health Care <br> Assistance</h5>
                                    </a>
                                </div>
                            </div>
                            <p>Digital clinics can provide variety of healthcare assistance to those in need...</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-xl-3 pt-4 pt-xl-0">
                    <div class="pq-service-box pq-style-1">
                        <div class="pq-service-block">
                            <div class="pq-service-img"><img
                                    src="/asset_pages/img/services/in_house_virtually_meeting.jpg" class="img-fluid"
                                    alt="servicebox"></div>
                            <div class="pq-service-box-info">
                                <div class="pq-service-icon"><i class=" flaticon-medical-prescription"
                                        style="font-size: 50px; color: black;"></i> </div>
                                <a href="/subpages/InHouseVirtually">
                                    <h5 class="pq-service-title" style="font-size: 20px;">In-House Virtual<br>
                                        Consultation </h5>
                                </a>
                            </div>
                            <p>In-house virtual consultation with an MBBS doctor in a digital clinic is a great way to
                                get the..</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!--Section service End-->


    <!--Section about start-->
    <center style="margin-top: 60px;">
        <span class="sub-title1" style="margin-bottom: 40px;">Digitally smart enabled healthcare in rural areas</span>
    </center>
    <div class="pq-bg-grey pq-dark-bg-side-right">

        <div class="container">

            <div class="row ">
                <div class="col-lg-6 col-md-12 col-xl-5 pb-lg-0 pb-5">
                    <div class="pq-section pq-style-1 text-left mb-4">
                        <h5 class="pq-section-title">Effective Healthcare Facilities</h5>
                        <p class="pq-section-description" style="text-align: justify; padding:5px;">According to the
                            WHO, all individuals and communities should be able to access the health care they require
                            without financial restraints. People in rural areas, on the other hand, tend to be
                            underserved when it comes to healthcare.
                            To cater to this issue through innovative and disruptive E-Clinic model that leverages
                            technology, we have teamed up to develop E-Clinics. With an aim to offer accessible &
                            affordable Digital Healthcare facilities in rural India, Digital doctor clinic is on a
                            mission to set up e-clinics in remote areas by providing quality
                            healthcare infrastructure with smart enabled medical devices and healthcare
                            assistance.&nbsp;
                        </p>
                    </div>
                    <div class="pq-about-info-box mt-1">
                        <div class="pq-about-info-box-icon">
                            <i aria-hidden="true" class=" flaticon-stethoscope"></i>
                        </div>
                    </div>

                </div>
                <div class="col-lg-6 col-md-12 col-xl-5 pe-lg-3 pq-img-none">
                    <img src="/new_asset/images/1.jpeg" class="img-fluid" alt="servicebox">
                </div>
                <div class="col-xl-2 col-lg-12 col-md-12 py-xl-0 py-5 align-self-center pq-form-counter pq-bg-primary"
                    style="background-color: red;">
                    <div class="pq-counter pq-style-2">
                        <div class="pq-counter-contain">
                            <div class="pq-counter-info text-center">
                                <div class="pq-counter-num-prefix">
                                    <h5 class="timer" data-to="450" data-speed="5000">450</h5> <span
                                        class="pq-counter-prefix">+</span>
                                </div>
                                <div class="pq-counter-num-prefix pq-prefix-top">
                                    <h5 class="timer" data-to="450" data-speed="5000">450</h5> <span
                                        class="pq-counter-prefix">+</span>
                                </div>
                                <p class="pq-counter-description">HAPPY PATIENTS</p>
                            </div>
                        </div>
                    </div>
                    <div class="pq-counter pq-style-2">
                        <div class="pq-counter-contain">
                            <div class="pq-counter-info text-center">
                                <div class="pq-counter-num-prefix">
                                    <h5 class="timer" data-to="100" data-speed="5000">100</h5> <span
                                        class="pq-counter-prefix">+</span>
                                </div>
                                <div class="pq-counter-num-prefix pq-prefix-top">
                                    <h5 class="timer" data-to="100" data-speed="5000">100</h5> <span
                                        class="pq-counter-prefix">+</span>
                                </div>
                                <p class="pq-counter-description">SAVED HEARTS</p>
                            </div>
                        </div>
                    </div>
                    <div class="pq-counter pq-style-2">
                        <div class="pq-counter-contain">
                            <div class="pq-counter-info text-center">
                                <div class="pq-counter-num-prefix">
                                    <h5 class="timer" data-to="59" data-speed="5000">59</h5> <span
                                        class="pq-counter-prefix">+</span>
                                </div>
                                <div class="pq-counter-num-prefix pq-prefix-top">
                                    <h5 class="timer" data-to="59" data-speed="5000">59</h5> <span
                                        class="pq-counter-prefix">+</span>
                                </div>
                                <p class="pq-counter-description">EXPERT DOCTORS</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!--Section about End-->

    <!-- Start Advantages -->

    <section class="equity pq-pt-100 pq-pb-210 pq-bg-grey">
        <div class="container">
            <div class="text-center mb-3">
                <h5 class="sub-title1">Advantages</h5>
            </div>
            <div class="row align-items-center">
                <div class="col-lg-6 mt-4 mt-lg-0">
                    <div class="pq-section pq-style-1 text-left pq-mb-45">
                        <h5 class="pq-section-title">Advantage of<br /> <span style="color: #ff2994 ;">Digital Doctor
                                Clinic </span></h5>
                    </div>

                    <div class="row">
                        <div class="col-lg-12 col-md-6 mb-2">
                            <div class="pq-icon-box pq-style-8">
                                <div class="pq-icon">
                                    <span><i class="ion ion-android-done"></i></span>
                                </div>
                                <div class="pq-icon-box-content">
                                    <h6 class="pq-icon-box-title" style="font-size: 16px;"><span>Digital clinic
                                            prevents disease and lowers healthcare costs</span></h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-6 mb-2">
                            <div class="pq-icon-box pq-style-8">
                                <div class="pq-icon">
                                    <span><i class="ion ion-android-done"></i></span>
                                </div>
                                <div class="pq-icon-box-content">
                                    <h6 class="pq-icon-box-title" style="font-size: 16px;"><span>Helps in monitoring
                                            and manage chronic conditions</span></h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-6 mb-2">
                            <div class="pq-icon-box pq-style-8">
                                <div class="pq-icon">
                                    <span><i class="ion ion-android-done"></i></span>
                                </div>
                                <div class="pq-icon-box-content">
                                    <h6 class="pq-icon-box-title" style="font-size: 16px;"><span>Technology used in
                                            digital clinic eases communication between healthcare providers and
                                            patients</span></h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-6 mb-2">
                            <div class="pq-icon-box pq-style-8">
                                <div class="pq-icon">
                                    <span><i class="ion ion-android-done"></i></span>
                                </div>
                                <div class="pq-icon-box-content">
                                    <h6 class="pq-icon-box-title" style="font-size: 16px;"><span>Improves access to
                                            more patients</span></h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-6 mb-2">
                            <div class="pq-icon-box pq-style-8">
                                <div class="pq-icon">
                                    <span><i class="ion ion-android-done"></i></span>
                                </div>
                                <div class="pq-icon-box-content">
                                    <h6 class="pq-icon-box-title" style="font-size: 16px;"><span>Medical access for
                                            people in underserved urban areas</span></h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-6">
                            <div class="pq-icon-box pq-style-8">
                                <div class="pq-icon">
                                    <span><i class="ion ion-android-done"></i></span>
                                </div>
                                <div class="pq-icon-box-content">
                                    <h6 class="pq-icon-box-title" style="font-size: 16px;"><span>Helps to provide
                                            tailored medicine for individual patients</span></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-us-img">
                        <img src="/new_asset/images/About-us/1.jpeg" class="pq-image9 wow animated fadeInRight"
                            alt="" style="border-radius: 12px;">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Advantages -->

    <center style="margin-top: 19px;">

        <h6 class="sub-title1">How Digital Clinic Works</h6>
    </center>
    <div class="" style="padding-top: 10px;">
        <div class="process-step1"
            style="background-image: url(/new_asset/images/bgk-03.png); mask-repeat: no-repeat; background-size: cover; background-attachment: fixed; background-position: center center; position: relative; opacity:100%; background-color:#00CCFF00;">
            <div class="container-md" style="width: 100%;">

                <h2 class="pq-section  text-center" style="margin-bottom: 30px; color: #ff2994; padding-top: 30px;">
                    Digital Dr. Clinic Functionalities</h2>

                <div class="row child-care">
                    <div class="text-body">
                        <p class="lh-lg"
                            style="font-size: large; margin-bottom: 50px; text-align: justify; color: black; font-weight:600;">
                            Typically, E-clinics are physical structures which dispense
                            primary healthcare services to citizens by creating a virtual
                            interface between doctors and patients, through the use
                            of ICT. Doctors interact with patients over a video call,
                            where patients explain their problems and accordingly
                            doctors prescribe medication on a digitally signed
                            prescription.
                        </p>
                    </div>

                    <div class="col-md-6">
                        <ul class="left" style="color: black; font-weight:500">
                            <li style="font-size: 16px;">
                                <i class="fa fa-arrow-circle-right" style="font-size:24px; color:#ff2994;"></i> &nbsp
                                &nbspThe entire process is managed by the e-clinic ground staff, which is usually
                                comprised of nurses, pharmacists, etc.
                            </li><br>
                            <li style="font-size: 16px;"><i class="fa fa-arrow-circle-right"
                                    style="font-size:24px; color:#ff2994;"></i> &nbsp&nbspApart from undertaking common
                                clinical procedures, such as recording the vitals and checking various primary
                                parameters and handing over prescribed medicines.</li><br>
                            <li style="font-size: 16px;"><i class="fa fa-arrow-circle-right"
                                    style="font-size:24px; color:#ff2994;"></i> &nbsp &nbspThe staff also helps in
                                facilitating the interaction between doctors and patients.</li><br>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <ul class="left" style="color: black; font-weight:500">
                            <li style="font-size: 16px;">
                                <i class="fa fa-arrow-circle-right" style="font-size:24px; color:#ff2994;"></i> &nbsp
                                &nbspCapacitating patients in using ICT
                                mode of interaction, assisting patients to explain their
                                problems efficiently and helping patients to understand
                                the prescription by the doctor.
                            </li><br>
                            <li style="font-size: 16px;"><i class="fa fa-arrow-circle-right"
                                    style="font-size:24px; color:#ff2994;"></i> &nbsp&nbspThe staff also helps doctor
                                in identifying the symptoms.</li><br>
                            <li style="font-size: 16px;"><i class="fa fa-arrow-circle-right"
                                    style="font-size:24px; color:#ff2994;"></i> &nbsp &nbspThis model effectively
                                reduces the need of doctors to be physically present at
                                the clinics to provide healthcare services.</li><br>
                        </ul>
                    </div>
                </div>

            </div>
        </div>

    </div>
    <!--Section process-step start-->
    <center style="padding-top: 40px;">
        <h5 class="pq-section sub-title1" style="margin-bottom: 40px;">Digital doctor clinic equipments</h5>
    </center>
    <!-- <div class="container" style="background-image:url('assets/img/newimgs/patrn.svg');"> -->
    <div class="container equipment-container"
        style="background-image:url('new_asset/images/bgk-03.png'); background-size:cover; border-radius:15px">
        <div class="">
            <p style="text-align: justify; color: black; font-size: large; font-weight: 500; padding:25px;">The Digital
                clinic concept of healthcare services in remote areas helps in identifying diseases early and provide
                treatment with assisted doctor online consultation. A combination of growing popularity, as well as
                better technology that facilitates the more efficient execution of virtual clinic techniques.
                But what exactly is this equipment that makes services like the Remote area's healthcare Program more
                viable now than, say 40 years ago? And how advanced is that technology? The answers to these questions
                lie as much in miniaturization as they do on the Internet.
                The Internet now makes it possible for huge amounts of digital data to be instantly transmitted from one
                location to another. Also with more advanced equipments, workers and resources like led camera, cctv,
                health assistants, in-house pharmacy etc it helps the clinic in providing all the amenities required
                that enhances healthcare in rural areas.
            </p>
        </div>


        <div class="row row-cols-auto">
            <div class="col-xl-3 col-md-6">
                <div class="pq-process-step pq-process-style-2 ">
                    <div class="pq-process-media">
                        <div class="">
                            <img src="/asset_pages/img/features/nurse.jpg" class="img-fluid" alt="ddc">
                        </div>

                    </div>
                    <div class="pq-process-step-info">
                        <h5 class="pq-process-title">Nurse<br />(Health care assistant)</h5> <span
                            class="pq-process-sub-title"></span>
                        <!--  -->
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="pq-process-step pq-process-style-2 ">
                    <div class="pq-process-media">
                        <div class=""><img src="/asset_pages/img/features/medicines.jpg" class="img-fluid"
                                alt="ddc"> </div>

                    </div>
                    <div class="pq-process-step-info">
                        <h5 class="pq-process-title">All types of Medicines</h5> <span
                            class="pq-process-sub-title"></span>
                        <!--  -->
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="pq-process-step pq-process-style-2 ">
                    <div class="pq-process-media">
                        <div class="">
                            <img src="/asset_pages/img/features/labtest.jpg" class="img-fluid" alt="ddc">
                        </div>

                    </div>
                    <div class="pq-process-step-info">
                        <h5 class="pq-process-title">Lab tests<br />(Medical devices)</h5> <span
                            class="pq-process-sub-title"></span>

                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 ">
                <div class="pq-process-step pq-process-style-2">
                    <div class="pq-process-media">
                        <div class="">
                            <img src="/asset_pages/img/features/cctv.jpg" class="img-fluid" alt="ddc"
                                style="max-width: 100%; height: 162px;">
                        </div>

                    </div>
                    <div class="pq-process-step-info">
                        <h5 class="pq-process-title">CCTV</h5> <span class="pq-process-sub-title"></span>

                    </div>
                </div>
            </div>
        </div>


        <section class="" style="padding: 5px;">
            <div class="container  ">
                <div class="row">
                    <div class="col-xl-3 col-md-6">
                        <div class="pq-process-step pq-process-style-2 ">
                            <div class="pq-process-media">
                                <div class="">
                                    <img src="/asset_pages/img/features/essentials.jpg" class="img-fluid"
                                        alt="ddc">
                                </div>

                            </div>
                            <div class="pq-process-step-info">
                                <h5 class="pq-process-title">Counter,Sleeping bench,Chair,and Table</h5> <span
                                    class="pq-process-sub-title"></span>

                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="pq-process-step pq-process-style-2 ">
                            <div class="pq-process-media">
                                <div class="">
                                    <img src="/asset_pages/img/features/firstaid.jpg" class="img-fluid"
                                        alt="ddc">
                                </div>

                            </div>
                            <div class="pq-process-step-info">
                                <h5 class="pq-process-title">First Aid</h5> <span class="pq-process-sub-title"></span>

                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="pq-process-step pq-process-style-2 ">
                            <div class="pq-process-media">
                                <div class=""><img src="/asset_pages/img/features/glucose.jpg"
                                        class="img-fluid" alt="ddc"> </div>

                            </div>
                            <div class="pq-process-step-info">
                                <h5 class="pq-process-title">Glucose/Drips/<br />Injections</h5> <span
                                    class="pq-process-sub-title"></span>

                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="pq-process-step pq-process-style-2 ">
                            <div class="pq-process-media">
                                <div class=""><img src="/asset_pages/img/features/generator.jpg"
                                        class="img-fluid" alt="ddc"> </div>

                            </div>
                            <div class="pq-process-step-info">
                                <h5 class="pq-process-title">Invertor for power backup</h5> <span
                                    class="pq-process-sub-title"></span>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </div>
    <!--Section process-step End-->
    <!--Section team start-->
    <!-- <section class="team pq-bg-grey pq-team-pb">
      <div class="container">
         <div class="row">
            <div class="col-lg-12">
               <div class="pq-section pq-style-1 text-center"> <span class="pq-section-sub-title">Our Team</span>
                  <h5 class="pq-section-title">Meet Our Heart Specialists</h5>
               </div>
            </div>
            <div class="col-lg-12 pb-dot-mt-0">
               <div class="owl-carousel owl-theme " data-dots="true" data-nav="false" data-desk_num="3" data-lap_num="3" data-tab_num="2" data-mob_num="2" data-mob_sm="1" data-autoplay="false" data-loop="false" data-margin="30">
                  <div class="item">
                     <div class="pq-team-box pq-style-1">
                        <div class="pq-team-img"> <img src="/new_asset/images/team/1.jpg" class="img-fluid" alt="team-image">
                           <div class="pq-team-social">
                              <ul>
                                 <li>
                                    <a class="facebook" href="" target="_blank"> <span class="sr-only">Facebook</span> <i class="fab fa-facebook"></i> </a>
                                 </li>
                                 <li>
                                    <a class="twitter" href="" target="_blank"> <span class="sr-only">Twitter</span> <i class="fab fa-twitter"></i> </a>
                                 </li>
                                 <li>
                                    <a class="google-plus" href="" target="_blank"> <span class="sr-only">Google-plus</span> <i class="fab fa-google-plus"></i> </a>
                                 </li>
                              </ul>
                           </div>
                        </div>
                        <div class="pq-team-info">
                           <h5 class="pq-member-name">
                              <a href="doctor-1.html">
                                 Naidan Smith </a>
                           </h5> <span class="pq-team-designation">Outpatient Surgery</span>
                        </div>
                     </div>
                  </div>
                  <div class="item">
                     <div class="pq-team-box pq-style-1">
                        <div class="pq-team-img"> <img src="/new_asset/images/team/2.jpg" class="img-fluid" alt="team-image">
                           <div class="pq-team-social">
                              <ul>
                                 <li>
                                    <a class="facebook" href="" target="_blank"> <span class="sr-only">Facebook</span> <i class="fab fa-facebook"></i> </a>
                                 </li>
                                 <li>
                                    <a class="twitter" href="" target="_blank"> <span class="sr-only">Twitter</span> <i class="fab fa-twitter"></i> </a>
                                 </li>
                                 <li>
                                    <a class="google-plus" href="" target="_blank"> <span class="sr-only">Google-plus</span> <i class="fab fa-google-plus"></i> </a>
                                 </li>
                              </ul>
                           </div>
                        </div>
                        <div class="pq-team-info">
                           <h5 class="pq-member-name">
                              <a href="doctor-1.html">
                                 Danial Frankie </a>
                           </h5> <span class="pq-team-designation">Outpatient Surgery</span>
                        </div>
                     </div>
                  </div>
                  <div class="item">
                     <div class="pq-team-box pq-style-1">
                        <div class="pq-team-img"> <img src="/new_asset/images/team/3.jpg" class="img-fluid" alt="team-image">
                           <div class="pq-team-social">
                              <ul>
                                 <li>
                                    <a class="facebook" href="" target="_blank"> <span class="sr-only">Facebook</span> <i class="fab fa-facebook"></i> </a>
                                 </li>
                                 <li>
                                    <a class="twitter" href="" target="_blank"> <span class="sr-only">Twitter</span> <i class="fab fa-twitter"></i> </a>
                                 </li>
                                 <li>
                                    <a class="google-plus" href="" target="_blank"> <span class="sr-only">Google-plus</span> <i class="fab fa-google-plus"></i> </a>
                                 </li>
                              </ul>
                           </div>
                        </div>
                        <div class="pq-team-info">
                           <h5 class="pq-member-name">
                              <a href="doctor-1.html">
                                 Alex Jhon </a>
                           </h5> <span class="pq-team-designation">Outpatient Surgery</span>
                        </div>
                     </div>
                  </div>
                  <div class="item">
                     <div class="pq-team-box pq-style-1">
                        <div class="pq-team-img"> <img src="/new_asset/images/team/4.jpg" class="img-fluid" alt="team-image">
                           <div class="pq-team-social">
                              <ul>
                                 <li>
                                    <a class="facebook" href="" target="_blank"> <span class="sr-only">Facebook</span> <i class="fab fa-facebook"></i> </a>
                                 </li>
                                 <li>
                                    <a class="twitter" href="" target="_blank"> <span class="sr-only">Twitter</span> <i class="fab fa-twitter"></i> </a>
                                 </li>
                                 <li>
                                    <a class="google-plus" href="" target="_blank"> <span class="sr-only">Google-plus</span> <i class="fab fa-google-plus"></i> </a>
                                 </li>
                              </ul>
                           </div>
                        </div>
                        <div class="pq-team-info">
                           <h5 class="pq-member-name">
                              <a href="doctor-1.html">
                                 Rihana Roy </a>
                           </h5> <span class="pq-team-designation">Outpatient Surgery</span>
                        </div>
                     </div>
                  </div>
                  <div class="item">
                     <div class="pq-team-box pq-style-1">
                        <div class="pq-team-img"> <img src="/new_asset/images/team/5.jpg" class="ig-fluid" alt="team-image">
                           <div class="pq-team-social">
                              <ul>
                                 <li>
                                    <a class="facebook" href="" target="_blank"> <span class="sr-only">Facebook</span> <i class="fab fa-facebook"></i> </a>
                                 </li>
                                 <li>
                                    <a class="twitter" href="" target="_blank"> <span class="sr-only">Twitter</span> <i class="fab fa-twitter"></i> </a>
                                 </li>
                                 <li>
                                    <a class="google-plus" href="" target="_blank"> <span class="sr-only">Google-plus</span> <i class="fab fa-google-plus"></i> </a>
                                 </li>
                              </ul>
                           </div>
                        </div>
                        <div class="pq-team-info">
                           <h5 class="pq-member-name">
                              <a href="doctor-1.html">
                                 Jason Roy </a>
                           </h5> <span class="pq-team-designation">Outpatient Surgery</span>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section> -->
    <!--Section team End-->
    <!--Section form start-->

    <div class="container" style="margin-top: 40px;">
        <div class="row align-items-center pq-bg-primary pq-reveser flex-md-column-reverse flex-lg-row"
            style="border-radius: 15px 0px 0px 15px;">
            <div class="col-lg-4 text-center">
                <img src="/new_asset/images/2.png" class="img-fluid pq-form-img-overflow" alt="...">
            </div>
            <div class="col-lg-8 mt-5 mt-lg-0 pq-form-pad pq-blue-section-side-right">
                <!-- <div class="pq-section pq-style-1 text-left"> <span class="pq-section-sub-title">Digitally smart enabled healthcare in rural areas</span> -->
                <h5 class="pq-section-title pq-text-white">Effective Healthcare Facilities</h5>
                <p style="color: white; font-size: 16px;">According to the WHO, all individuals and communities should
                    be able to access the health care they require without financial restraints. People in rural areas,
                    on the other hand, tend to be underserved when it comes to healthcare.

                    To cater to this issue through innovative and disruptive E-Clinic model that leverages technology,
                    we have teamed up to develop E-Clinics. With an aim to offer accessible & affordable Digital
                    Healthcare facilities in rural India, Digital doctor clinic is on a mission to set up e-clinics in
                    remote areas by providing quality healthcare infrastructure with smart enabled medical devices and
                    healthcare assistance.</p>
            </div>

        </div>
    </div>
    </div>
    <!--Section client End-->


    <center style="margin-top: 19px;">
        <h5 class="pq-text-white sub-title1">What our clients say about us</h5>

    </center>
    <section class="qt-background">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="pq-testimonial pq-testimonial-style-3">
                        <div class="owl-carousel owl-loaded owl-drag" data-dots="false" data-nav="true"
                            data-desk_num="3" data-lap_num="5" data-tab_num="5" data-mob_num="1"
                            data-mob_sm="1" data-autoplay="true" data-loop="true" data-margin="30">
                            <?php foreach ($get_feedbacks as $feedback) { ?>

                            <div class="item">

                                <div class="pq-testimonial-box pq-style-3">

                                    <div class="pq-testimonial-star">
                                        <?php
                                        if ($feedback->rating == 1) {
                                            echo '<i class="fas fa-star"></i>';
                                        } elseif ($feedback->rating == 2) {
                                            echo '<i class="fas fa-star"></i>';
                                            echo '<i class="fas fa-star"></i>';
                                        } elseif ($feedback->rating == 3) {
                                            echo '<i class="fas fa-star"></i>';
                                            echo '<i class="fas fa-star"></i>';
                                            echo '<i class="fas fa-star"></i>';
                                        } elseif ($feedback->rating == 4) {
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
                                            <?php echo $feedback->comments; ?>
                                        </p>
                                        <span class="see-more-button" onclick="toggleSeeMore(this)">Read More</span>
                                    </div>


                                    <div class="pq-testimonial-media">

                                        <div class="pq-testimonial-meta">
                                            <h5> <?php echo ' ' . $feedback->name; ?></h5>

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

    <div style="margin-top: 19px;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="pq-style-1 text-center">
                        <h5 class="sub-title1">Health test</h5>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="owl-carousel owl-theme" data-dots="false" data-nav="false" data-desk_num="3"
                        data-lap_num="2" data-tab_num="2" data-mob_num="1" data-mob_sm="1"
                        data-autoplay="true" data-loop="true" data-margin="20">
                        <div class="item">
                            <div class="pq-blog-post pq-style-1">
                                <div class="pq-post-media"> <img src="/asset_pages/img/patients/cbc.jpg"
                                        class="img-fluid" alt="images" style="height: 300px;">

                                </div>
                                <div class="pq-blog-contain">

                                    <h5 class="pq-blog-title"><a href="/subpages/CBC">CBC</a></h5>
                                    <div class="pq-blog-info">
                                        <p>The CBC test, or Complete Blood Count, is a diagnostic tool used to provide
                                            information about a person's overall health.</p>
                                    </div>
                                    <a href="/subpages/CBC" class="pq-button pq-button-link">
                                        <div class="pq-button-block"> <span class="pq-button-text">Read More</span>
                                            <i class="ion ion-plus-round"></i>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="pq-blog-post pq-style-1">
                                <div class="pq-post-media"> <img src="/asset_pages/img/patients/hemoglobin.jpg"
                                        class="img-fluid" alt="images" style="height: 300px;">

                                </div>
                                <div class="pq-blog-contain">

                                    <h5 class="pq-blog-title"><a href="/subpages/Hemoglobin">Hemoglobin</a></h5>
                                    <div class="pq-blog-info">
                                        <p>The Hemoglobin test is a blood test used to measure the amount of hemoglobin
                                            in the blood. Hemoglobin is a protein</p>
                                    </div>
                                    <a href="/subpages/Hemoglobin" class="pq-button pq-button-link">
                                        <div class="pq-button-block"> <span class="pq-button-text">Read More</span>
                                            <i class="ion ion-plus-round"></i>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="pq-blog-post pq-style-1">
                                <div class="pq-post-media"> <img src="/asset_pages/img/patients/TLC.jpg"
                                        class="img-fluid" alt="images" style="height: 300px;">

                                </div>
                                <div class="pq-blog-contain">

                                    <h5 class="pq-blog-title"><a href="/subpages/TLC">TLC</a></h5>
                                    <div class="pq-blog-info">
                                        <p>The Total Leucocyte Count test is a laboratory test conducted to measure the
                                            amount of white blood cells present in the body.</p>
                                    </div>
                                    <a href="/subpages/TCL" class="pq-button pq-button-link">
                                        <div class="pq-button-block"> <span class="pq-button-text">Read More</span>
                                            <i class="ion ion-plus-round"></i>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="pq-blog-post pq-style-1">
                                <div class="pq-post-media"> <img src="/asset_pages/img/patients/DLC.jpg"
                                        class="img-fluid" alt="images" style="height: 300px;">

                                </div>
                                <div class="pq-blog-contain">

                                    <h5 class="pq-blog-title"><a href="/subpages/DLC">DLC</a></h5>
                                    <div class="pq-blog-info">
                                        <p>The Differential Leucocyte Count test is a test that measures the number and
                                            types of white blood cells in a sample of blood.</p>
                                    </div>
                                    <a href="/subpages/DLC" class="pq-button pq-button-link">
                                        <div class="pq-button-block"> <span class="pq-button-text">Read More</span>
                                            <i class="ion ion-plus-round"></i>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="pq-blog-post pq-style-1">
                                <div class="pq-post-media"> <img src="/asset_pages/img/patients/Diabetes.jpg"
                                        class="img-fluid" alt="images" style="height: 300px;">

                                </div>
                                <div class="pq-blog-contain">

                                    <h5 class="pq-blog-title"><a href="/subpages/DiabetesTest">DIABETES</a></h5>
                                    <div class="pq-blog-info">
                                        <p>A diabetes test is a medical test used to diagnose diabetes. It is usually
                                            conducted to check for elevated levels of glucose.</p>
                                    </div>
                                    <a href="/subpages/DiabetesTest" class="pq-button pq-button-link">
                                        <div class="pq-button-block"> <span class="pq-button-text">Read More</span>
                                            <i class="ion ion-plus-round"></i>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Section blog Start-->

    <div class="container">
        <div class="row">

            <div class="col-lg-12">
                <div class="owl-carousel owl-theme" data-dots="false" data-nav="false" data-desk_num="3"
                    data-lap_num="2" data-tab_num="2" data-mob_num="1" data-mob_sm="1" data-autoplay="true"
                    data-loop="true" data-margin="30">

                    <div class="item">
                        <div class="pq-blog-post pq-style-1">
                            <div class="pq-post-media"> <img src="/asset_pages/img/patients/Platelets.jpg"
                                    class="img-fluid" alt="images" style="height: 300px;">

                            </div>
                            <div class="pq-blog-contain">

                                <h5 class="pq-blog-title"><a href="/subpages/PLATELETS">PLATELETS</a></h5>
                                <div class="pq-blog-info">
                                    <p>A platelets test is a blood test to measure the number of platelets in a person's
                                        body. Platelets are a type of cell.</p>
                                </div>
                                <a href="/subpages/PLATELETS" class="pq-button pq-button-link">
                                    <div class="pq-button-block"> <span class="pq-button-text">Read More</span> <i
                                            class="ion ion-plus-round"></i> </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="pq-blog-post pq-style-1">
                            <div class="pq-post-media"> <img src="/asset_pages/img/patients/dengue.jpg"
                                    class="img-fluid" alt="images" style="height: 300px;">

                            </div>
                            <div class="pq-blog-contain">

                                <h5 class="pq-blog-title"><a href="/subpages/DENGUE">DENGUE</a></h5>
                                <div class="pq-blog-info">
                                    <p>The dengue test is a laboratory test to detect the presence of antibodies or
                                        antigens that are specific to the dengue virus.</p>
                                </div>
                                <a href="/subpages/DENGUE" class="pq-button pq-button-link">
                                    <div class="pq-button-block"> <span class="pq-button-text">Read More</span> <i
                                            class="ion ion-plus-round"></i> </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="pq-blog-post pq-style-1">
                            <div class="pq-post-media"> <img src="/asset_pages/img/patients/widal.jpg"
                                    class="img-fluid" alt="images" style="height: 300px;">

                            </div>
                            <div class="pq-blog-contain">

                                <h5 class="pq-blog-title"><a href="/subpages/WIDAL">WIDAL</a></h5>
                                <div class="pq-blog-info">
                                    <p>The widal Test is a blood test used to detect the presence of antibodies against
                                        Salmonella typhi, the bacteria responsible.</p>
                                </div>
                                <a href="/subpages/WIDAL" class="pq-button pq-button-link">
                                    <div class="pq-button-block"> <span class="pq-button-text">Read More</span> <i
                                            class="ion ion-plus-round"></i> </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="pq-blog-post pq-style-1">
                            <div class="pq-post-media"> <img src="/asset_pages/img/patients/ecg.jpg"
                                    class="img-fluid" alt="images" style="height: 300px;">

                            </div>
                            <div class="pq-blog-contain">

                                <h5 class="pq-blog-title"><a href="/subpages/ECG">ECG</a></h5>
                                <div class="pq-blog-info">
                                    <p>ECG (electrocardiogram) is a test that measures the electrical activity of the
                                        heart. It is conducted to detect any irregularities.</p>
                                </div>
                                <a href="/subpages/ECG" class="pq-button pq-button-link">
                                    <div class="pq-button-block"> <span class="pq-button-text">Read More</span> <i
                                            class="ion ion-plus-round"></i> </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="pq-blog-post pq-style-1">
                            <div class="pq-post-media"> <img src="/asset_pages/img/patients/EKG.jpg"
                                    class="img-fluid" alt="images" style="height: 300px;">

                            </div>
                            <div class="pq-blog-contain">

                                <h5 class="pq-blog-title"><a href="/subpages/EKG">EKG</a></h5>
                                <div class="pq-blog-info">
                                    <p>An EKG (electrocardiogram) is a test that measures the electrical activity of the
                                        heart. The test is conducted to assess the heart’s rhythm .</p>
                                </div>
                                <a href="/subpages/EKG" class="pq-button pq-button-link">
                                    <div class="pq-button-block"> <span class="pq-button-text">Read More</span> <i
                                            class="ion ion-plus-round"></i> </div>
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!--Section Social-media End-->

    <!--Section service start-->
</body>
@include('inc/newfooter')
