<head>
    <meta charset="utf-8">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Digital Doctor Clinic</title>
    <!-- Favicon Icon -->
    <!-- old css file -->

    <!-- old css file -->
    <link rel="shortcut icon" href="/asset_pages/img/fev.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/new_asset/css/bootstrap.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

    <!-- Bootstrap JavaScript (popper.js is required for dropdowns) -->

    <!-- LOADING FONTS AND ICONS -->
    <link rel="stylesheet" type="text/css" href="/new_asset/rev/fonts/pe-icon-7-stroke/css/pe-icon-7-stroke.css">
    <link rel="stylesheet" type="text/css" href="/new_asset/rev/fonts/font-awesome/css/font-awesome.css">
    <!-- REVOLUTION STYLE SHEETS -->
    <link rel="stylesheet" type="text/css" href="/new_asset/rev/css/rs6.css">
    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" href="/new_asset/css/owl.carousel.min.css">
    <!-- Progressbar CSS -->
    <link rel="stylesheet" href="/new_asset/css/progressbar.css">
    <!-- Animation CSS -->
    <link rel="stylesheet" href="/new_asset/css/animations.min.css">
    <!-- Magnefic Popup CSS -->
    <link rel="stylesheet" href="/new_asset/css/magnific-popup.min.css">
    <!-- Icons CSS -->
    <link rel="stylesheet" href="/new_asset/fonts/font-awesome/css/all.min.css">
    <link rel="stylesheet" href="/new_asset/fonts/flaticon/flaticon.css">
    <link rel="stylesheet" href="/new_asset/css/ionicons.min.css">
    <link rel="stylesheet" href="/new_asset/fonts/themify-icons/themify-icons.css">
    <!--  Style CSS -->
    <link rel="stylesheet" href="/new_asset/css/style.css">
    <!--  Responsive CSS -->
    <link rel="stylesheet" href="/new_asset/css/responsive.css">
    <link rel="stylesheet" href="/asset_pages/css/review.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>


    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" async
        src="https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.5/latest.js?config=TeX-MML-AM_CHTML"></script>

    <script>
        // Disable right-click context menu
        document.addEventListener('contextmenu', function(e) {
            e.preventDefault();
        });

        // Disable text selection
        document.addEventListener('selectstart', function(e) {
            e.preventDefault();
        });
    </script>

</head>
<style>
    .custom-swal {
        background-color: red;
    }
</style>
<style>
    .row img {
        max-width: 100%;
        height: auto;
        display: flex;
        margin: 0 auto;
    }

    @media (max-width: 765px) {
        .row img {
            width: auto;
        }

        .col-md-12 {
            width: 100%;
        }
    }

    @media (max-width: 765px) {
        .col-3 {
            display: none;

        }

    }

    @media (max-width: 765px) {
        .social-media-block div {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .navbar .navbar-nav li:last-child i {
            position: initial !important;
        }
    }

    .social-media-block div i {
        color: #ff2994 !important;
        font-size: 20px !important;
        padding-left: 5px !important;
    }

    .top-header {
        position: absolute;
        top: 0px;
        left: 0px;
        width: 100%;
        margin: 0 auto;
        z-index: 20;
        background-position: left;
        background-repeat: no-repeat;
        background-color: transparent;
        background-size: auto 100%;
    }

    @keyframes fillAnimation {
        0% {
            background-size: 0% 100%;
        }

        100% {
            background-size: 100% 100%;
        }
    }


    hr {
        font-size: small;
        border: none;
        height: 5px;
        background: linear-gradient(70deg, rgba(247, 243, 243, 1) 0%, rgba(67, 168, 249, 1) 46%, rgba(221, 18, 189, 1) 77%);

        background-size: 0% 100%;
        animation: fillAnimation 5s ease infinite;
    }


    #customNavbar {
        background-color: transparent;
        transition: background-color 0.3s ease;
        position: absolute;
        width: 100%;
        z-index: 1000;
    }


    #customNavbar.scrolled {
        background-color: #ffffff;
    }

    #slider {

        margin-top: 68px;
    }

    #language-dropdown {
        font-size: 0.8rem;
    }

    #language-dropdown option {
        font-size: 0.8rem;
    }

    .pq-dark-bg-side-right:before {
        display: none;
    }
</style>



<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php
if (isset($_SESSION['success'])) {
?>
<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function() {
        swal({
            title: "success!",
            text: "<?php echo $_SESSION['success']; ?>\n",
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

<script type="text/javascript" async
    src="https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.5/latest.js?config=TeX-MML-AM_CHTML"></script>


<body>


    <div id="pq-loading">
        <div id="pq-loading-center">
            <div class="loading">
                <span>D</span>
                <span>D</span>
                <span>C</span>
            </div>

            <div id="preloader">
            </div>
        </div>
    </div>



    <!--loading End-->

    <!-- ==================== Start cursor ==================== -->

    <div class="mouse-cursor cursor-outer"></div>
    <div class="mouse-cursor cursor-inner"></div>

    <!-- ==================== End cursor ==================== -->
    <!--=================================
      header start-->

    <header id="pq-header" class="pq-header-default top-header">
        <div class="pq-top-header"
            style="background: linear-gradient(70deg, rgba(247,243,243,1) 0%, rgba(67,168,249,1) 46%, rgba(221,18,189,1) 77%);
                    width: 100%; height: auto;">
            <div class="container">
                <div class="row">
                    <div class="col-2" style="margin-top: 2px;">
                        <img class="img-fluid logo" src="/new_asset/images/logo/abcd.png" alt=""
                            style="width: 100px;">
                    </div>
                    <div class="col-3" style="margin-top: 20px;" id="healthnumber">
                        <p style="font-weight: 2px; color: black;">उत्तर प्रदेश सरकार की ओर से उत्तर प्रदेश के लिए।
                            ओब्डू के
                            साथ समझौता ज्ञापन 23/HEALTH/0000010982</p>
                    </div>
                    <div class="col-2" style="margin-top: 2px;display:flex;box-sizing:border-box;margin-bottom:15px">
                        <img class="img-fluid logo" src="/new_asset/images/logo/digital-india-removebg-preview.png"
                            alt="" style="width: auto; height:auto">
                    </div>
                    <div class="col-2" style="margin-top: 2px;">
                        <img class="img-fluid logo" src="/new_asset/images/logo/up.png" alt=""
                            style="width: 100px;">
                    </div>
                    <div class="col-2" style="margin-top: 2px;">
                        <img class="img-fluid logo" src="/new_asset/images/logo/newutter.png" alt=""
                            style="width: 140px;">
                    </div style="">
                    <div class="col-1 " style="display: flex">
                        <div id="google_translate_element" style="display: none;" class="language-dropdown">
                        </div>
                        <div
                            style="display: flex; align-items: center; box-sizing: border-box; margin-top: 5px; margin-bottom: 5px; margin-left: -10px;">

                            <select id="language-dropdown" onchange="changeLanguage(this.value);" class="form-select "
                                aria-label="Default select example" style="width: 100px; height: 30px;">
                                <option value="en" class="option1">
                                    <p>English</p>
                                </option>
                                <option value="hi">Hindi</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>

        <!-- <hr> -->
        <div class="pq-bottom-header" id="customNavbar">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">

                        <nav class="navbar navbar-expand-lg navbar-light  top-header">

                            <a class="navbar-brand" href="/">
                                <img class="img-fluid logo"
                                    src="/new_asset/images/logo/DDC New logo Name corner-Whitout Background .png"
                                    alt="ddc" style="width: 185px; height: 68px;">
                            </a>
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <div id="pq-menu-contain" class="pq-menu-contain">
                                    <ul id="pq-main-menu" class="navbar-nav ml-auto">
                                        <li class="menu-item current-menu-item">
                                            <a href="/">Home</a><i
                                                class="fa fa-chevron-down pq-submenu-icon"></i>
                                            <ul class="sub-menu">
                                                <li class="menu-item">
                                                    <a href="/pages/info_page">info</a>
                                                </li>
                                                <li class="menu-item ">
                                                    <a href="/pages/feedback">Feedback
                                                    </a>
                                                </li>
                                                <li class="menu-item ">
                                                    <a href="/pages/about_us">About
                                                    </a>
                                                </li>
                                                <li class="menu-item">
                                                    <a href="/pages/career" aria-current="page">Career</a>
                                                </li>
                                                <li class="menu-item">
                                                    <a href="/pages/contact_us">Contact Us</a>
                                                </li>


                                            </ul>
                                        </li>

                                        <li class="menu-item ">
                                            <a href="#">Registration</a><i
                                                class="fa fa-chevron-down pq-submenu-icon"></i>
                                            <ul class="sub-menu">
                                                <li class="menu-item ">
                                                    <a href="/pages/doctor_register">Doctor
                                                    </a>
                                                </li>
                                                <li class="menu-item ">
                                                    <a href="/pages/ngoregistration">NGO</a>
                                                </li>
                                                <li class="menu-item ">
                                                    <a href="/representatives/representatives_reg">Representative</a>
                                                </li>

                                            </ul>
                                        </li>
                                        <li class="menu-item">
                                            <a href="/pages/newsroom">News Room</a>
                                        </li>


                                        <li class="menu-item ">
                                            <a href="/admins/login">Login</a>
                                        </li>
                                        <li class="menu-item social-media-block">
                                            <div>
                                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                                <a href="#"><i class="fab fa-instagram"></i></a>
                                                <a href="#"><i class="fab fa-x"></i></a>
                                                <a href="#"><i class="fab fa-linkedin"></i></a>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation">
                                <i class="fas fa-bars"></i>
                            </button>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>




    <!-- Main Wrapper -->
    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit">
    </script>
    <script type="text/javascript">
        function googleTranslateElementInit() {
            new google.translate.TranslateElement({
                pageLanguage: 'en',
                includedLanguages: 'en,hi'
            }, 'google_translate_element');
        }

        function changeLanguage(languageCode) {
            var translateDropdown = document.querySelector('.goog-te-combo');
            translateDropdown.value = languageCode;
            translateDropdown.dispatchEvent(new Event('change'));
        }
    </script>


    <!--==============
         Header end
         =================-->
    <script>
        $(document).ready(function() {
            // Check the scroll position
            $(window).scroll(function() {
                if ($(this).scrollTop() > 50) {
                    // If scrolled down, add a class to make the navbar white
                    $('#customNavbar').addClass('scrolled');
                } else {
                    // If at the top, remove the class to make the navbar transparent
                    $('#customNavbar').removeClass('scrolled');
                }
            });
        });
    </script>
