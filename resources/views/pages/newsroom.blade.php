<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('inc/newheader')
    <style>
        .truncate-text {
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 4;
            /* Limit to three lines */
            -webkit-box-orient: vertical;
        }

        .expand-btn {
            cursor: pointer;
            color: blue;
            text-decoration: underline;
            display: none;
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
            padding: 0px;
            background: #f3f2f2;
            border-radius: 10%;
        }
    </style>
</head>

<body>
    <div class="pq-breadcrumb ">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <nav aria-label="breadcrumb">
                        <div class="pq-breadcrumb-title">
                            <h2>News Room </h2>
                        </div>
                        <div class="pq-breadcrumb-container mt-2">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="http://localhost/digitaldrclinic/pages/index"><i class="fas fa-home mr-2"></i>Home</a></li>
                                <li class="breadcrumb-item active">News Room</li>
                            </ol>
                        </div>
                    </nav>
                </div>
                <div class="col-lg-4">
                    <div class="pq-breadcrumb-img text-right wow fadeInRight" style="visibility: visible; animation-name: fadeInRight;"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="container" style="margin-top: 10px;">
        <div class="row">

            <?php
            if ($newdata) {
                foreach ($newdata as $news) {
            ?>
                    <div class="col-lg-3">
                        <div class="pq-blog pq-blog-col-1 pq-process-style-2">
                            <div class="pq-blog-post">
                                <div class="pq-post-media">
                                    <img src="/uploads/newsroom/<?php echo $news->newphoto ?>" class="img-fluid" alt="News Photo" style="width: 100%;">
                                    <div class="pq-post-date" style="background:#f3f2f2">
                                        <img src="/uploads/newslogo/<?php echo $news->newslogo ?>" alt="News Logo" style="width: 50px; height: 50px; border-radius: 10%;">
                                    </div>
                                </div>
                                <div class="pq-blog-contain">
                                    <h2 class="pq-blog-title" style="-webkit-line-clamp: 3; overflow: hidden; display: -webkit-box; -webkit-box-orient: vertical; font-size: 15px;">{{$news->title}}</h2>
                                    <div class="pq-blog-info">
                                        <p style="-webkit-line-clamp: 3; overflow: hidden; display: -webkit-box; -webkit-box-orient: vertical;">{{$news->discription}}</p>
                                    </div>
                                    <a href="{{ $news->link }}" class="pq-button pq-button-flat">
                                        <div class="pq-button-block"> <span class="pq-button-text">Read More</span> <i class="ion ion-plus-round"></i> </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php
                }
            }
            ?>
        </div>
    </div>



    <!-- Fact Start -->



</body>
<footer>
    <script>
        function toggleText() {
            var newsTitle = document.getElementById('newsTitle');
            var expandBtn = document.querySelector('.expand-btn');

            if (newsTitle.classList.contains('truncate-text')) {
                // Expand the text
                newsTitle.classList.remove('truncate-text');
                expandBtn.textContent = 'Show less';
            } else {
                // Collapse the text
                newsTitle.classList.add('truncate-text');
                expandBtn.textContent = 'Show more';
            }
        }

        // Show the expand button only if the text exceeds three lines
        var newsTitle = document.getElementById('newsTitle');
        var expandBtn = document.querySelector('.expand-btn');

        if (newsTitle.scrollHeight > newsTitle.clientHeight) {
            expandBtn.style.display = 'inline';
        }
    </script>
    @include('inc/newfooter')
</footer>

</html>
<script>
    let slideIndex = 1;
    showSlides(slideIndex);

    function plusSlides(n) {
        showSlides(slideIndex += n);
    }

    function currentSlide(n) {
        showSlides(slideIndex = n);
    }

    function showSlides(n) {
        let i;
        let slides = document.getElementsByClassName("mySlides");
        let dots = document.getElementsByClassName("dot");
        if (n > slides.length) {
            slideIndex = 1
        }
        if (n < 1) {
            slideIndex = slides.length
        }
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex - 1].style.display = "block";
        dots[slideIndex - 1].className += " active";
    }
</script>
