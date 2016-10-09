<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Ne Kaldı, öğrenim hayatımızda önemli yer tutan büyük sınavlara, ne kadar süremiz kaldığını hatırlatan geri sayım uygulamasıdır." name="description">
    <meta content="sınav, ne kadar, zaman, ösym, ygs, lys, kpss, saat, sayaç, geri sayım, tus, dus, üniversite, okul" name="keywords">
    <meta content="Enes Çakır" name="author">

    <!-- FAVICON -->
    <link type="image/x-icon" rel="shortcut icon" href="favicon.ico" />

    <!-- PAGE TITLE -->
    <title>Ne Kaldı?</title>

    <!-- FONTS -->
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans&subset=latin,latin-ext' rel='stylesheet' type='text/css'>

    <!-- LIBS STYLESHEETS -->
    <link href="{{ asset('front/assets/libs/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('front/assets/libs/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('front/assets/libs/owl.carousel.2.0.0-beta.2.4/owl.carousel.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('front/assets/libs/video.js/dist/video-js.min.css') }}" rel="stylesheet" type="text/css"/>

    <!-- PROMINENT STYLESHEETS -->
    <link href="{{ asset('front/assets/css/styles.css') }}" rel="stylesheet" type="text/css"/>
</head>

<body>
<!-- START PAGE HEADER -->
<header class="header">

    <!-- START PAGE NAVIGATION -->
    <nav class="navbar navbar-default">
        <div class="container">
            <div class="nav-holder">

                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-nav">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!-- Set your logo here  -->
                    <a id="logo" class="navbar-brand small" href="#">
                        <img src="{{ asset('front/assets/img/logo.png') }}" alt="site logo">
                    </a>
                </div>

                <!-- START NAVIGATION LINKS -->
                <div class="nav-wrapper closed navbar-right">
                    <ul class="nav navbar-nav collapse navbar-collapse">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Versions <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="index.html">iOS</a></li>
                                <li><a href="index.android.html">Android</a></li>
                                <li><a href="index.desktop.html">Desktop</a></li>
                            </ul>
                        </li>
                        <li><a href="#features">Features</a></li>
                        <li><a href="#download">Download</a></li>
                        <li><a href="#screenshots">Screenshots</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Other <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#video">How it Works</a></li>
                                <li><a href="#reviews">Reviews</a></li>
                                <li><a href="#social">Social</a></li>
                                <li><a href="#team">Team</a></li>
                                <li><a href="#pricing">Pricing</a></li>
                                <li><a href="#updates">Updates</a></li>
                                <li><a href="#contacts">Contacts</a></li>
                                <li><a href="#links">Links</a></li>
                            </ul>
                        </li>
                        <!-- START CLOSE MENU BUTTON -->
                        <li>
                            <button class="btn btn-nav btn-nav-close">
                                <span class="fa fa-times"></span>
                            </button>
                        </li>
                        <!-- END CLOSE MENU BUTTON -->
                    </ul>
                </div>
                <!-- END NAVIGATION LINKS -->

                <!-- START OPEN MENU BUTTON -->
                <button class="btn btn-nav btn-nav-open" type="button">
                    <span class="btn-nav-text">Menü</span>
                            <span class="btn-nav-icon">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </span>
                </button>
                <!-- END OPEN MENU BUTTON -->

            </div>
        </div>
    </nav>
    <!-- END PAGE NAVIGATION -->

</header>
<!-- END PAGE HEADER -->

<!-- START BANNER -->
<!-- Set the URL of your banner background image to data-image-src="YOUR IMAGE URL" attribute. -->
<section id="banner" class="banner-wrapper" data-parallax="scroll" data-image-src="http://placehold.it/1920x1080">
    <div class="section-content">
        <div class="container">
            <div class="banner clearfix">

                <!-- START BANNER DECORATION -->
                <div class="banner-decoration reveal reveal-left" style="background-image: url('{{ asset('front/assets/img/banner_decoration.png') }}');">
                    <!-- Set banner image on the phone here. The image sets from remote server -->
                    <div class="image-holder">
                        <img src="http://placehold.it/287x510" alt="banner image"/>
                    </div>
                </div>
                <!-- END BANNER DECORATION -->

                <!-- START BANNER CONTENT -->
                <div class="banner-content reveal reveal-right">
                    <h1>Ne Kaldı?</h1>
                    <div class="banner-description">
                        Sınavlara ve özel günlere ne kadar kaldığınızı dert etmeyin. iPhone'unuza Ne Kaldı? indirin, önemli günleri hiç kaçırmayın.                    </div>
                    <button type="button" class="btn btn-primary">İNDİR</button>
                    <button type="button" class="btn btn-default">İNCELE</button>
                </div>
                <!-- END BANNER CONTENT -->

            </div>
        </div>
    </div>
</section>
<!-- END BANNER -->

<!-- START FEATURES SECTION -->
<section class="section-light" id="features">
    <div class="container">

        <!-- START SECTION HEADER -->
        <h2 class="reveal reveal-top">Bütün Sınavlar, Bütün Önemli Günler</h2>
        <div class="subheading reveal reveal-top" >
            Widget desteği sayesinde uygulamayı açmadan
            favori sınavlara kalan süre pratik bir şekilde görüntülenebilir
        </div>
        <!-- END SECTION HEADER -->

        <div class="features">
            <div class="features-left reveal reveal-left">

                <div class="feature">
                    <div class="feature-disk">
                        <div class="icon pin"></div>
                    </div>
                    <div class="feature-name">Bütün Sınavlar Map</div>
                    <div class="feature-desc">
                        <p>YGS, LYS, KPSS, YDS, TUS, DUS gibi önemli sınavlar.</p>
                    </div>
                </div>

                <div class="feature">
                    <div class="feature-disk">
                        <div class="icon share"></div>
                    </div>
                    <div class="feature-name">Otomatik Takvim</div>
                    <div class="feature-desc">
                        <p>Sınav takvimi otomatik olarak güncellenmektedir.</p>
                    </div>
                </div>

                <div class="feature">
                    <div class="feature-disk">
                        <div class="icon friends"></div>
                    </div>
                    <div class="feature-name">Dakikalar Önemlidir</div>
                    <div class="feature-desc">
                        <p>Sınava ne kadar kaldığı gün, saat ve dakika formatlarında görüntülenebilir.</p>
                    </div>
                </div>

            </div>

            <!-- START FEATURES DECORATION-->
            <div class="features-decoration reveal reveal-bottom" style="background-image: url('{{ asset('front/assets/img/phone-black.png') }}')">
                <div class="image-holder">
                    <!-- Set your decoration image here. -->
                    <img src="http://placehold.it/269x477" alt="features image"/>
                </div>
            </div>
            <!-- END FEATURES DECORATION-->

            <div class="features-right reveal reveal-right">
                <div class="feature">
                    <div class="feature-disk">
                        <div class="icon chat"></div>
                    </div>
                    <div class="feature-name">Reklamsız ve Ücretsiz</div>
                    <div class="feature-desc">
                        <p>Ne Kaldı? uygulaması tamamen ücretsiz ve asla reklam içermez.</p>
                    </div>
                </div>

                <div class="feature">
                    <div class="feature-disk">
                        <div class="icon star"></div>
                    </div>
                    <div class="feature-name">Favorites List</div>
                    <div class="feature-desc">
                        <p>Lorem ipsum dolor sit amet,
                            consectetur adipiscing elit, sed do
                            eiusmod tempor incididunt ut labore</p>
                    </div>
                </div>

                <div class="feature">
                    <div class="feature-disk">
                        <div class="icon refresh"></div>
                    </div>
                    <div class="feature-name">Sync With Devices</div>
                    <div class="feature-desc">
                        <p>Sed ut perspiciatis unde omnis iste
                            natus error sit voluptatem accusantium
                            doloremque laudantium</p>
                    </div>
                </div>

            </div>
        </div>

    </div>
</section>
<!-- END FEATURES SECTION -->

<!-- START DOWNLOADS SECTION -->
<section class="section-dark" id="download" data-parallax="scroll" data-image-src="http://placehold.it/1920x1080">      <!-- Set the URL of your section background image to "data-image-src" attr. -->
    <div class="section-content">
        <div class="container">

            <!-- START SECTION HEADER -->
            <h2 class="reveal reveal-top">Uygulamayı İndirin</h2>
            <div class="subheading reveal reveal-top" >
                Neye ne kaldığını takip etmek artık çok kolay!
                Ne Kaldı? uygulaması iPhone 4 ve üzeri bütün cihazlarda sorunsuz çalışır. Hadi, şimdi indirin.
            </div>
            <!-- END SECTION HEADER -->

            <!-- START SECTION CONTENT -->
            <div class="stores clearfix">
                <a href="#" class="store reveal reveal-left">
                    <span class="store-icon fa fa-apple"></span>
                    <span class="store-name">App Store</span>
                </a>

                <a href="#" class="store reveal reveal-bottom">
                    <svg class="store-icon" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 51">
                        <path fill-rule="evenodd" d="M 3 0 C 3 0 36 17 36 17 C 36 17 28 25 28 25 C 28 25 3 0 3 0 Z M 0 1 C 0 1 26 26 26 26 C 26 26 26 27 26 27 C 26 27 1 51 1 51 C 1 51 0 50 0 50 C 0 50 0 1 0 1 Z M 29 29 C 29 29 34 35 34 35 C 34 35 7 50 7 50 C 7 50 6 50 6 50 C 6 50 28 29 28 29 C 28 29 29 29 29 29 M 30 27 C 30 27 36 33 36 33 C 36 33 38 33 38 33 C 38 33 48 27 48 27 C 48 27 48 25 48 25 C 48 25 38 19 38 19 C 38 19 30 27 30 27 Z"/>
                    </svg>
                    <span class="store-name">Google Play</span>
                </a>

                <a href="#" class="store reveal reveal-right">
                    <svg class="store-icon" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 45 52">
                        <path fill-rule="evenodd" d="M 37.49 51.99 C 37.49 51.99 0 44.6 0 44.6 C 0 44.6 0 17.71 0 17.71 C 0 17.71 37.49 10.31 37.49 10.31 C 37.49 10.31 44.98 13 44.98 13 C 44.98 13 44.98 49.3 44.98 49.3 C 44.98 49.3 37.49 51.99 37.49 51.99 Z M 16.38 22.61 C 16.38 22.61 8.06 23.77 8.06 23.77 C 8.06 23.77 8.06 30.04 8.06 30.04 C 8.06 30.04 16.38 30.04 16.38 30.04 C 16.38 30.04 16.38 22.61 16.38 22.61 Z M 16.38 31.07 C 16.38 31.07 8.06 31.07 8.06 31.07 C 8.06 31.07 8.06 37.88 8.06 37.88 C 8.06 37.88 16.38 39.03 16.38 39.03 C 16.38 39.03 16.38 31.07 16.38 31.07 Z M 27.91 21.04 C 27.91 21.04 17.43 22.55 17.43 22.55 C 17.43 22.55 17.43 30.04 17.43 30.04 C 17.43 30.04 27.91 30.04 27.91 30.04 C 27.91 30.04 27.91 21.04 27.91 21.04 Z M 27.91 31.07 C 27.91 31.07 17.43 31.07 17.43 31.07 C 17.43 31.07 17.43 39.1 17.43 39.1 C 17.43 39.1 27.91 40.61 27.91 40.61 C 27.91 40.61 27.91 31.07 27.91 31.07 Z M 29.33 9.18 C 29.33 6.16 29.39 4.71 25.83 5.22 C 25.78 4.73 25.71 4.28 25.62 3.86 C 29.93 3.23 30.67 4.49 30.67 9.18 C 30.67 9.18 30.67 10.03 30.67 10.03 C 30.67 10.03 29.33 10.3 29.33 10.3 C 29.33 10.3 29.33 9.18 29.33 9.18 Z M 17.72 12.59 C 17.72 12.59 17.72 10.53 17.72 10.53 C 17.72 6.24 19.39 5.57 21.66 4.78 C 21.75 5.17 21.8 5.63 21.81 6.18 C 19.82 7.02 19.05 7.63 19.09 10.54 C 19.09 10.54 19.09 12.32 19.09 12.32 C 19.09 12.32 17.72 12.59 17.72 12.59 Z M 23.18 6.28 C 23.18 4.02 22.82 0.48 17.25 1.77 C 13.55 2.62 11.55 3.8 11.59 7.62 C 11.59 7.62 11.59 13.8 11.59 13.8 C 11.59 13.8 10.23 14.07 10.23 14.07 C 10.23 14.07 10.23 7.49 10.23 7.49 C 10.23 1.91 13.64 1.07 16.98 0.32 C 23.18 -1.07 24.53 2.13 24.54 6.39 C 24.54 6.39 24.54 11.24 24.54 11.24 C 24.54 11.24 23.18 11.51 23.18 11.51 C 23.18 11.51 23.18 6.28 23.18 6.28 Z"/>
                    </svg>
                    <span class="store-name">Windows Phone</span>
                </a>
            </div>
            <!-- END SECTION CONTENT -->

        </div>
    </div>
</section>
<!-- END DOWNLOADS SECTION -->

<!-- START SCREENSHOTS SECTION -->
<section class="section-light screenshots" id="screenshots">
    <div class="container-fluid">

        <!-- START SECTION HEADER -->
        <h2 class="reveal reveal-top">Screenshots</h2>
        <div class="subheading reveal reveal-top" >
            Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam,
            nisi ut aliquid ex ea commodi consequatur?
        </div>
        <!-- END SECTION HEADER -->

        <!-- START WIDGET: CAROUSEL-->
        <div class="carousel-wrapper reveal reveal-bottom">
            <div class="screenshot-carousel">
                <!-- Set the URLs of your images to "background-image" attributes. Images set from remote server -->
                <div class="image-holder" style="background-image: url('http://placehold.it/270x478');"></div>
                <div class="image-holder" style="background-image: url('http://placehold.it/270x478');"></div>
                <div class="image-holder" style="background-image: url('http://placehold.it/270x478');"></div>
                <div class="image-holder" style="background-image: url('http://placehold.it/270x478');"></div>
                <div class="image-holder" style="background-image: url('http://placehold.it/270x478');"></div>
                <div class="image-holder" style="background-image: url('http://placehold.it/270x478');"></div>
            </div>
        </div>
        <!-- END WIDGET: CAROUSEL-->

    </div>
</section>
<!-- END SCREENSHOTS SECTION-->

<!-- START VIDEO SECTION -->
<section class="section-video" id="video" data-parallax="scroll" data-image-src="http://placehold.it/1920x1080" data-z-index="9998">      <!-- Set the URL of your section background image to "data-image-src" attr. -->
    <!--You can add a poster to the video. Set the image URL into the data-image attribute for this. -->
    <div class="video-start-btn" data-toggle="modal" data-target=".modal-video" >

        <!-- START SECTION HEADER -->
        <h2 class="reveal reveal-top">How It Works</h2>
        <div class="subheading reveal reveal-top" >
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
            eiusmod tempor incididunt ut labore et dolore magna aliqua.
        </div>
        <!-- END SECTION HEADER -->

        <div class="video-play fa fa-play"></div>
    </div>
</section>
<!-- START VIDEO SECTION -->

<!-- START MODAL -->
<section class="modal fade modal-video" role="dialog">
    <!-- The modal opens when a user clicks the video section -->
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- START MODAL HEADER -->
            <div class="modal-header">
                <h2 class="modal-title"></h2>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- END MODAL HEADER -->

            <!-- START MODAL BODY -->
            <div class="modal-body">
                <!-- JS CODE ADDS VIDEO HERE DYNAMICALLY -->
            </div>
            <!-- END MODAL BODY -->

        </div>
    </div>
</section>
<!-- END MODAL -->

<!-- START REVIEW SECTION -->
<section class="section-light section-review" id="reviews">
    <div class="container-fluid">

        <!-- START SECTION HEADER -->
        <h2 class="reveal reveal-top">Reviews</h2>
        <div class="subheading reveal reveal-top" >
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
            eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
            enim ad minim veniam, quis nostrud exercitation
        </div>
        <!-- END SECTION HEADER -->

        <!-- START WIDGET: CAROUSEL -->
        <div class="reviews-carousel reveal reveal-bottom">
            <div class="review-wrapper">
                <div class="review">
                    Duis aute irure dolor in reprehenderit in
                    voluptate velit esse cillum dolore eu fugiat
                    nulla pariatur. Excepteur sint occaecat
                    cupidatat non proident, sunt in culpa
                </div>
                <div class="review-author">
                    <div class="media">
                        <div class="media-left">
                            <a href="#">
                                <!-- Set here an author icon. The image sets from remote server -->
                                <img class="media-object author-icon" src="http://placehold.it/70x70" alt="author icon"/>
                            </a>
                        </div>
                        <div class="media-body">
                            <h4 class="author-name">Ron Evgeniy</h4>
                            <div class="author-company">Seo Ron design studio</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="review-wrapper">
                <div class="review">
                    Duis aute irure dolor in reprehenderit in
                    voluptate velit esse cillum dolore eu fugiat
                    nulla pariatur. Excepteur sint occaecat
                    cupidatat non proident, sunt in culpa
                </div>
                <div class="review-author">
                    <div class="media">
                        <div class="media-left">
                            <a href="#">
                                <!-- Set here an author icon. The image sets from remote server -->
                                <img class="media-object author-icon" src="http://placehold.it/70x70" alt="author icon"/>
                            </a>
                        </div>
                        <div class="media-body">
                            <h4 class="author-name">Ron Evgeniy</h4>
                            <div class="author-company">Seo Ron design studio</div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="review-wrapper">
                <div class="review">
                    Duis aute irure dolor in reprehenderit in
                    voluptate velit esse cillum dolore eu fugiat
                    nulla pariatur. Excepteur sint occaecat
                    cupidatat non proident, sunt in culpa
                </div>
                <div class="review-author">
                    <div class="media">
                        <div class="media-left">
                            <a href="#">
                                <!-- Set here an author icon. The image sets from remote server -->
                                <img class="media-object author-icon" src="http://placehold.it/70x70" alt="author icon"/>
                            </a>
                        </div>
                        <div class="media-body">
                            <h4 class="author-name">Ron Evgeniy</h4>
                            <div class="author-company">Seo Ron design studio</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END WIDGET: CAROUSEL -->

    </div>
</section>
<!-- END REVIEW SECTION -->

<!-- START SOCIAL SECTION -->
<section class="section-dark" id="social" data-parallax="scroll" data-image-src="http://placehold.it/1920x1080">      <!-- Set the URL of your section background image to "data-image-src" attr. -->
    <div class="section-content">
        <div class="container">

            <!-- START SECTION HEADER -->
            <h2 class="reveal reveal-top">We Are Social</h2>
            <div class="subheading reveal reveal-top" >
                Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit,
                sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam ali-
            </div>
            <!-- END SECTION HEADER -->

            <!-- START SOCIAL LINKS -->
            <ul class="social-content">
                <li class="reveal reveal-animate">
                    <a class="social-link" href="#">
                        <div class="social-icon-holder">
                            <span class="social-icon fa fa-flickr"></span>
                        </div>
                        <span class="social-name">Flickr</span>
                    </a>
                </li>

                <li class="reveal reveal-animate">
                    <a class="social-link" href="#">
                        <div class="social-icon-holder">
                            <span class="social-icon fa fa-vimeo-square"></span>
                        </div>
                        <span class="social-name">Vimeo</span>
                    </a>
                </li>

                <li class="reveal reveal-animate">
                    <a class="social-link" href="#">
                        <div class="social-icon-holder">
                            <span class="social-icon fa fa-twitter-square"></span>
                        </div>
                        <span class="social-name">Twitter</span>
                    </a>
                </li>

                <li class="reveal reveal-animate">
                    <a class="social-link" href="#">
                        <div class="social-icon-holder">
                            <span class="social-icon social-icon-symbol fa fa-facebook"></span>
                        </div>
                        <span class="social-name">Facebook</span>
                    </a>
                </li>

                <li class="reveal reveal-animate">
                    <a class="social-link" href="#">
                        <div class="social-icon-holder">
                            <span class="social-icon fa fa-google-plus-square"></span>
                        </div>
                        <span class="social-name">Google +</span>
                    </a>
                </li>

                <li class="reveal reveal-animate">
                    <a class="social-link" href="#">
                        <div class="social-icon-holder">
                            <span class="social-icon social-icon-symbol fa fa-pinterest-p"></span>
                        </div>
                        <span class="social-name">Pintereset</span>
                    </a>
                </li>

                <li class="reveal reveal-animate">
                    <a class="social-link" href="#">
                        <div class="social-icon-holder">
                            <span class="social-icon social-icon-symbol fa fa-linkedin"></span>
                        </div>
                        <span class="social-name">Linkedin</span>
                    </a>
                </li>

                <li class="reveal reveal-animate">
                    <a class="social-link" href="#">
                        <div class="social-icon-holder">
                            <span class="social-icon social-icon-symbol fa fa-youtube-square"></span>
                        </div>
                        <span class="social-name">YouTube</span>
                    </a>
                </li>
            </ul>
            <!-- END SOCIAL LINKS -->

        </div>
    </div>
</section>
<!-- END SOCIAL SECTION -->

<!-- START TEAM SECTION -->
<section class="section-light section-team" id="team">
    <div class="container">

        <!-- START SECTION HEADER -->
        <h2 class="reveal reveal-top">Meet the Team</h2>
        <div class="subheading reveal reveal-top">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
            ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ulla.
        </div>
        <!-- START END HEADER -->

        <!-- START SECTION CONTENT -->
        <div class="team-content">

            <div class="member reveal reveal-left">
                <div class="image-holder">
                    <img src="http://placehold.it/345x332" alt="team member icon"/>     <!-- Set here team member icon. -->
                    <div class="social-container">
                        <a href="#" class="member-social-link">
                            <span class="fa fa-facebook link-icon"></span>
                        </a>
                        <a href="#" class="member-social-link">
                            <span class="fa fa-linkedin link-icon"></span>
                        </a>
                        <a href="#" class="member-social-link">
                            <span class="fa fa-twitter link-icon"></span>
                        </a>
                    </div>
                </div>
                <div class="member-post">Founder / Ceo</div>
                <div class="member-name">Enes Çakır</div>
                <div class="member-description">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                    eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim
                    ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat.
                </div>
            </div>

            <div class="member reveal reveal-bottom">
                <div class="image-holder">
                    <img src="http://placehold.it/345x332" alt="team member icon"/>      <!-- Set here team member icon. -->
                    <div class="social-container">
                        <a href="#" class="member-social-link">
                            <span class="fa fa-facebook link-icon"></span>
                        </a>
                        <a href="#" class="member-social-link">
                            <span class="fa fa-linkedin link-icon"></span>
                        </a>
                        <a href="#" class="member-social-link">
                            <span class="fa fa-twitter link-icon"></span>
                        </a>
                    </div>
                </div>
                <div class="member-post">Designer</div>
                <div class="member-name">Murat Çakır</div>
                <div class="member-description">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                    eiusmod tempor incididunt ut labore et dolore magna aliqua.
                </div>
            </div>

            <div class="member reveal reveal-right">
                <div class="image-holder">
                    <img src="http://placehold.it/345x332" alt="team member icon"/>      <!-- Set here team member icon. -->
                    <div class="social-container">
                        <a href="#" class="member-social-link">
                            <span class="fa fa-facebook link-icon"></span>
                        </a>
                        <a href="#" class="member-social-link">
                            <span class="fa fa-linkedin link-icon"></span>
                        </a>
                        <a href="#" class="member-social-link">
                            <span class="fa fa-twitter link-icon"></span>
                        </a>
                    </div>
                </div>
                <div class="member-post">Developer</div>
                <div class="member-name">Alparslan Demir</div>
                <div class="member-description">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                    eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim
                    ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat.
                </div>
            </div>

        </div>
        <!-- END SECTION CONTENT -->

    </div>
</section>
<!-- END TEAM SECTION -->

<!-- START PRICING SECTION -->
<section class="section-deep" id="pricing" data-parallax="scroll" data-image-src="http://placehold.it/1920x1080">      <!-- Set the URL of your section background image to "data-image-src" attr. -->
    <div class="section-content">
        <div class="container">

            <!-- START SECTION HEADER -->
            <h2 class="reveal reveal-top">Pricing Tablets</h2>
            <div class="subheading reveal reveal-top">
                Lorem ipsum dolor sit amet, consectetur adipiscing
                elit, sed do eiusmod tempor incididunt ut labore et dolore
                magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                ulla.
            </div>
            <!-- END SECTION HEADER -->

            <!-- START PRICING CONTENT -->
            <div class="pricing-content">

                <div class="offer reveal reveal-left">
                    <h3 class="offer-header">Standard</h3>

                    <div class="offer-body">
                        <div class="offer-price">
                            <span class="price-sum">79</span>
                            <span class="price-period">/ Month</span>
                        </div>

                        <ul class="offer-description">
                            <li>Unlimited products</li>
                            <li>20 Pages, Galleries</li>
                        </ul>

                        <button class="btn btn-show"><span class="fa fa-chevron-down icon"></span></button>
                    </div>

                    <div class="offer-footer">
                        <button class="btn btn-offer button--saqui">Get Started Free</button>
                    </div>
                </div>

                <div class="offer reveal reveal-bottom">
                    <h3 class="offer-header">Premium</h3>

                    <div class="offer-body">
                        <div class="offer-price">
                            <span class="price-sum">89</span>
                            <span class="price-period">/ Month</span>
                        </div>

                        <ul class="offer-description">
                            <li>Unlimited products</li>
                            <li>20 Pages, Galleries</li>
                            <li>500 GB Bandwidth</li>
                            <li>Mobile Website and Store</li>
                        </ul>

                        <button class="btn btn-show"><span class="fa fa-chevron-down icon"></span></button>
                    </div>

                    <div class="offer-footer">
                        <button class="btn btn-offer">Get Started Free</button>
                    </div>
                </div>

                <div class="offer reveal reveal-right">
                    <h3 class="offer-header">Ultimate</h3>

                    <div class="offer-body">
                        <div class="offer-price">
                            <span class="price-sum">99</span>
                            <span class="price-period">/ Month</span>
                        </div>

                        <ul class="offer-description">
                            <li>Unlimited products</li>
                            <li>20 Pages, Galleries</li>
                            <li>500 GB Bandwidth</li>
                            <li>Mobile Website and Store</li>
                            <li>Custom Domain Free</li>
                            <li>24/7 Customer Support</li>
                        </ul>

                        <button class="btn btn-show"><span class="fa fa-chevron-down icon"></span></button>
                    </div>

                    <div class="offer-footer">
                        <button class="btn btn-offer">Get Started Free</button>
                    </div>
                </div>

            </div>
            <!-- END PRICING CONTENT -->

        </div>
    </div>
</section>
<!-- END PRICING SECTION -->

<!-- START UPDATES SECTION -->
<section class="section-light section-updates" id="updates">
    <div class="container">

        <!-- START SECTION HEADER -->
        <h2 class="reveal reveal-top">Updates</h2>
        <div class="subheading reveal reveal-top">
            Sed ut perspiciatis unde omnis iste natus
            error sit voluptatem accusantium doloremque laudantium, totam
            rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi
        </div>
        <!-- END SECTION HEADER -->

        <!-- START UPDATES STEPS -->
        <div class="updates-content reveal reveal-bottom">

            <div class="step step-first">
                <div>
                    <div class="name name-lg">Version 1.0</div>
                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem
                        accusantium doloremque laudantium, totam rem aperiam, eaque
                        ipsa quae ab illo inventore veritatis et quasi architecto beatae
                        vitae dicta sunt explicabo.</p>
                </div>
                <div class="disk btn-open" data-toggle="modal" data-target=".modal-updates">
                    <svg class="svg-icon play-icon" height="47" width="37" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 37 47">
                        <path stroke-linejoin="round" stroke-linecap="round" stroke-width="3" stroke="#fa6b5b" fill="#ffffff" fill-rule="evenodd" d="M 3 3 C 3 3 3 44 3 44 C 3 44 34 22.13 34 22.13 C 34 22.13 3 3 3 3 Z" />
                    </svg>
                </div>
            </div>
            <div class="step step-right">
                <div class="step-content">
                    <div class="name">Version 1.1</div>
                    <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit
                        aut fugit, sed quia consequuntur magni dolores eos qui ratione
                        voluptatem sequi nesciunt.</p>
                </div>
                <div class="disk"></div>
                <div class="step-decoration">
                    <div class="mask line-1"></div>
                    <div class="mask curve-1"></div>
                    <div class="mask line-2"></div>
                </div>
            </div>

            <div class="step step-left">

                <div class="step-left">
                    <div class="step-content">
                        <div class="name name-lg">Version 2.0</div>
                        <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit
                            aut fugit, sed quia consequuntur magni dolores eos qui ratione
                            voluptatem sequi nesciunt.</p>
                    </div>
                    <div class="disk"></div>
                </div>

                <div class="step step-center">
                    <div class="step-content">
                        <div class="name">Version 1.2</div>
                        <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit
                            aut fugit, sed quia consequuntur magni dolores eos qui ratione
                            voluptatem sequi nesciunt.</p>
                    </div>
                    <div class="disk"></div>
                </div>

                <div class="step step-center step-center-bottom">
                    <div class="step-content">
                        <div class="name">Version 2.1</div>
                        <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit
                            aut fugit, sed quia consequuntur magni dolores eos qui ratione
                            voluptatem sequi nesciunt.</p>
                    </div>
                    <div class="disk"></div>
                </div>

                <div class="step-decoration">
                    <div class="mask line-3"></div>
                    <div class="mask curve-2"></div>
                    <div class="mask line-4"></div>
                </div>

            </div>

            <div class="step step-right">
                <div class="step-content">
                    <div class="name">Version 2.2</div>
                    <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit
                        aut fugit, sed quia consequuntur magni dolores eos qui ratione
                        voluptatem sequi nesciunt.</p>
                </div>
                <div class="disk"></div>
                <div class="step-decoration">
                    <div class="mask line-5"></div>
                    <div class="mask curve-3"></div>
                    <div class="mask line-6"></div>
                </div>
            </div>

            <div class="step step-last">
                <div class="step-content">
                    <div class="name name-lg">Version 3.0</div>
                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem
                        accusantium doloremque laudantium, totam rem aperiam, eaque
                        ipsa quae ab illo inventore veritatis et quasi architecto beatae
                        vitae dicta sunt explicabo.</p>
                </div>
                <div class="disk">
                    <svg class="arrow-icon svg-icon" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 38 47">
                        <path stroke-linejoin="round" stroke-linecap="round" stroke-width="3" stroke="#fa6b5b" fill="none" fill-rule="evenodd" d="M 19 1 C 19 1 19 45 19 45 M 18 45 C 18 45 1 25 1 25 M 20 45 C 20 45 36 26 36 26" />
                    </svg>
                </div>
            </div>

        </div>

        <div class="updates-footer reveal reveal-bottom">
            <button class="btn btn-info">SEE ALL HISTORY</button>
        </div>

    </div>
    <!-- END UPDATES STEPS -->

</section>
<!-- END UPDATES SECTION -->

<!-- START MODAL -->
<section class="modal fade modal-updates" role="dialog">
    <!-- The modal window opens when a user clicks button with class="btn-open" in "Updates" section -->
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- START MODAL HEADER -->
            <div class="modal-header">
                <h2 class="modal-title"></h2>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- END MODAL HEADER -->

            <!-- START MODAL BODY -->
            <div class="modal-body">
                <!-- JS CODE ADDS VIDEO HERE DYNAMICALLY -->
            </div>
            <!-- END MODAL BODY -->

        </div>
    </div>
</section>
<!-- END MODAL -->

<!-- START CONTACT SECTION -->
<section class="section-contact" id="contacts">
    <div class="container">

        <!-- START SECTION HEADER -->
        <h2 class="reveal reveal-top">Contact Us</h2>
        <div class="subheading reveal reveal-top">
            Sed ut perspiciatis unde omnis iste natus error
            sit voluptatem accusantium doloremque laudantium, totam rem aperiam,
            eaque ipsa quae ab illo inventore veritatis et quasi archi
        </div>
        <!-- END SECTION HEADER -->

        <div class="contact-form-wrapper reveal reveal-bottom">

            <!-- START CONTACT FORM -->
            <form method="POST" action="{{ asset('front/scripts/writeus.php') }}" accept-charset="UTF-8" class="contact-form" id="jvalidate" novalidate="novalidate">

                <div class="row">
                    <div class="col-sm-12 col-md-4">
                        <div class="field-holder">
                            <input class="form-control input-lg field" placeholder="John Snow" name="name" type="text">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4">
                        <div class="field-holder">
                            <input class="form-control input-lg field" placeholder="example@exemple.com" name="email" type="email">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4">
                        <div class="field-holder">
                            <input class="form-control input-lg field" placeholder="example.com" name="website" type="text">
                        </div>
                    </div>
                    <div class="col-md-12 col-xs-12">
                        <div class="field-holder">
                            <textarea class="form-control" placeholder="Some text" name="message" cols="50" rows="10"></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-12">
                            <div class="alert alert-success" role="alert" style="display: none;">
                                Message has been successfully sent.
                            </div>
                            <div class="alert alert-danger" role="alert" style="display: none;">
                                <div class="alert-text">Server error</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <button class="btn btn-primary btn-contact" type="submit" value="SEND MESSAGE">SEND MESSAGE</button>
                    </div>
                </div>
            </form>
            <!-- END CONTACT FORM -->

        </div>

    </div>
</section>
<!-- END CONTACT SECTION -->

<!-- START FOOTER -->
<footer class="footer" id="links">
    <div class="container-fluid">

        <h2 class="reveal reveal-top">Photo App</h2>

        <!-- START FOOTER NAVIGATION -->
        <ul class="footer-nav reveal reveal-left">
            <li><a href="#banner" class="active">Home</a></li>
            <li><a href="#download">Download</a></li>
            <li><a href="#reviews">Reviews</a></li>
            <li><a href="#features">Features</a></li>
            <li><a href="#screenshots">Screenshots</a></li>
            <li><a href="#contacts">Contact</a></li>
        </ul>
        <!-- END FOOTER NAVIGATION -->

        <!-- START FOOTER SOCIAL BLOCK -->
        <ul class="footer-social reveal reveal-right">
            <li><a href="#" class="fa fa-vimeo"></a></li>
            <li><a href="#" class="fa fa-flickr"></a></li>
            <li><a href="#" class="fa fa-twitter"></a></li>
            <li><a href="#" class="fa fa-facebook"></a></li>
            <li><a href="#" class="fa fa-google-plus"></a></li>
            <li><a href="#" class="fa fa-pinterest-p"></a></li>
            <li><a href="#" class="fa fa-linkedin"></a></li>
            <li><a href="#" class="fa fa-dribbble"></a></li>
            <li><a href="#" class="fa fa-behance"></a></li>
        </ul>
        <!-- END FOOTER SOCIAL BLOCK -->

        <!-- START COPYRIGHTS -->
        <div class="footer-copyrights">
            <span class="copyrights-date">&#169; Photo circle 2015.</span>
            <span class="copyrights-text">All Rights Reserved.</span>
        </div>
        <!-- END COPYRIGHTS -->

    </div>
</footer>
<!-- END FOOTER -->

<!-- START GOOGLE ANALYTICS -->
<script type="text/javascript">
    var google_analytics_id = 'UA-49890851-2';  // Enter your ID here. ex: UA-9999999-99

    if(google_analytics_id != '') {
        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', google_analytics_id]);
        _gaq.push(['_trackPageview']);

        (function() {
            var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
        })();
    }
</script>
<!-- END GOOGLE ANALYTICS -->

<!-- JS LIBS-->
<!-- you can add remote instance of jquery -->
<!--<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>-->

<script src="{{ asset('front/assets/libs/jquery/dist/jquery.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('front/assets/libs/bootstrap/dist/js/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('front/assets/libs/owl.carousel.2.0.0-beta.2.4/owl.carousel.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('front/assets/libs/video.js/dist/video.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('front/assets/libs/videojs-youtube/dist/Youtube.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('front/assets/libs/jquery-validation/dist/jquery.validate.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('front/assets/libs/parallax.js/parallax.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('front/assets/libs/scrollreveal/dist/scrollreveal.min.js') }}" type="text/javascript"></script>

<!-- PROMINENT JS CODE -->
<script src="{{ asset('front/assets/js/init.js') }}" type="text/javascript"></script>

<!-- IN THIS FILE YOU CAN WRITE YOUR CUSTOM SCRIPTS -->
<script src="{{ asset('front/assets/js/custom.js') }}" type="text/javascript"></script>
</body>
</html>
