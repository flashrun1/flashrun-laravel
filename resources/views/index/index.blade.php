<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no">
    <title>FLASHRUN - перший біговий клуб у Хмельницькому! </title>
    <meta name="keywords" content="FLASHRUN, RUNNING CLUB, біговий клуб у Хмельницькому">
    <meta name="description" content="FLASHRUN - перший біговий клуб у Хмельницькому!">
    <!-- CSS-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}"/>
    <!-- FAVICON -->
    <link rel="icon" type="image/x-icon" href="favicon.ico">
    <!-- OG -->
    <meta property="og:title" content="FLASHRUN - перший біговий клуб у Хмельницькому!">
    <meta property="og:url" content="FLASHRUN, RUNNING CLUB, біговий клуб у Хмельницькому">
    <meta property="og:description" content="FLASHRUN - перший біговий клуб у Хмельницькому!">
    <meta property="og:image" content="/images/logo.svg">
    <meta property="og:image:type" content="image/jpeg">
    <meta property="og:image:width" content="500">
    <meta property="og:image:height" content="300">
    <meta property="twitter:description" content="FLASHRUN - перший біговий клуб у Хмельницькому!">
    <!--END OF OG -->
</head>
<body class="">
<div id="page-wrapper" class="page-wrapper ">
    <div id="page-body" class="page-body">
        <!-- header -->
        <header class="header page-header" >
            <div class="container">
                <div class="row align-items-center   justify-content-between ">
                    <div class="logo-wrap col-lg-4 col-md-6 col-9">
                        <a href="index.html" class="logo">
                            <img  src="{{ asset('/images/logo.svg') }}" class="" alt="FLASHRUN">
                        </a>
                    </div>
                    <div class="menu-wrap navbar-expand-lg col-lg-8 col-md-6 col-3">
                        <ul class="nav nav-menu navbar-wrap  justify-content-end collapse navbar-collapse" id="collapseMenu" aria-expanded="true" role="navigation" >
                            <li>
                                <a href="#registration" class="nav-link ">РЕЄСТРАЦІЯ</a>
                            </li>
                            <li>
                                <a href="#events" class="nav-link ">ЗАХОДИ</a>
                            </li>
                            <li>
                                <a href="#catalog" class="nav-link ">МЕРЧ</a>
                            </li>
                            <li>
                                <a href="#gallery" class="nav-link ">ГАЛЕРЕЯ</a>
                            </li>
                            <li>
                                <a href="#contacts" class="nav-link ">Контакти</a>
                            </li>
                        </ul>
                        <button id="navbar-toggler" class="navbar-toggler collapsed" type="button" data-target="#collapseMenu" data-toggle="collapse"  aria-controls="navbarNav" aria-expanded="true" aria-label="Toggle navigation"
                                onclick="displayMenu(event)">
                            <span></span>
                            <span></span>
                            <span></span>
                        </button>
                    </div>

                </div>
            </div>
        </header>
        <!-- end of header -->
        <!-- main content -->
        <main class="main ">
            <section class="promo video-bg-container">
                <div class="video-bg-player" data-video="2iTTOvTgZHc">
                    <div class="video-bg">
                        <div id="yt-player"></div>
                    </div>
                </div>
                <div class="video-bg-overlay" style="background-image: url('/images/bg1.png');">
                </div>
                <div class="video-bg-content">
                    <h1>
                        <span>RUNNING CLUB</span>
                        «FLASHRUN»
                    </h1>
                    <p class="tagline">Перший біговий клуб у Хмельницькому!</p>
                </div>
            </section>
            <section class="section about">
                <div class="container">
                    <div class="text-center icon-decorate">
                        <img src="{{ asset('/images/icon-flash.svg') }}" alt="icon" class="">
                    </div>
                    <h2 class="section-title">«FLASHRUN»</h2>
                    <p class="text-center custom-color">
                        Бігова спільнота Хмельницького! <br>
                        Ми об'єднуємо людей завдяки бігу :) <br>
                        Організовуємо масові забіги у нашому місті.
                    </p>

                </div>
            </section>
            <section class="section registr-cards" id="registration">
                <div class="container">
                    <h2 class="section-title">РЕЄСТРАЦІЯ <span class="sub-title">«ВОЛЯ FEST»</span></h2>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="categories-card">
                                <div class="row">
                                    <div class="col-sm-5">
                                        <div class="img-wrap">
                                            <img src="{{ asset('/images/category1.jpg') }}" alt="category" class="bg-image-pos">
                                        </div>
                                    </div>
                                    <div class="col-sm-7">
                                        <h3 class="title">БІГ З ПЕРЕШКОДАМИ</h3>
                                        <div class="descr custom-color">Спеціально спроектована траса із перешкодами. Дистанції - 5 та 10км.</div>
                                        <button  type="button" class="btn" data-toggle="modal" data-target="#registr_modal">ЗАРЕЄСТРУВАТИСЬ</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="categories-card">
                                <div class="row">
                                    <div class="col-sm-5">
                                        <div class="img-wrap">
                                            <img src="{{ asset('/images/category2.jpg') }}" alt="category" class="bg-image-pos">
                                        </div>
                                    </div>
                                    <div class="col-sm-7">
                                        <h3 class="title">ВЕЛО</h3>
                                        <div class="descr custom-color">Подолай трасу на шосейному велосипеді. Дистанція - 20 км.</div>
                                        <button  type="button" class="btn" data-toggle="modal" data-target="#registr_modal2">ЗАРЕЄСТРУВАТИСЬ</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="categories-card">
                                <div class="row">
                                    <div class="col-sm-5">
                                        <div class="img-wrap">
                                            <img src="{{ asset('/images/category3.jpg') }}" alt="category" class="bg-image-pos">
                                        </div>
                                    </div>
                                    <div class="col-sm-7">
                                        <h3 class="title">ДУАТЛОН</h3>
                                        <div class="descr custom-color">Поєднання бігу та вело - пробіжи та проїдь. Дистанція - 5/10/5 км.</div>
                                        <button  type="button" class="btn" data-toggle="modal" data-target="#registr_modal3">ЗАРЕЄСТРУВАТИСЬ</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="categories-card">
                                <div class="row">
                                    <div class="col-sm-5">
                                        <div class="img-wrap">
                                            <img src="{{ asset('/images/category4.jpg') }}" alt="category" class="bg-image-pos">
                                        </div>
                                    </div>
                                    <div class="col-sm-7">
                                        <h3 class="title">СКАНДИНАВСЬКА ХОДЬБА</h3>
                                        <div class="descr custom-color">Пройди пішки використовуючи спорядження.</div>
                                        <button  type="button" class="btn" data-toggle="modal" data-target="#registr_modal4">ЗАРЕЄСТРУВАТИСЬ</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="section events" id="events">
                <div class="container">
                    <h2 class="section-title">НАШІ ЗАХОДИ</h2>
                    <p class="section-descr custom-color">Ми організували 4 маштабні заходи на міському рівні, три із них - були благодійними: ми допомогали тваринам, діткам та нашим захисникам. </p>
                    <div class="row events-row equal-wrap">
                        <div class="col-lg-3 col-6">
                            <div class="events-card">
                                <a href="#" class="img-wrap">
                                    <img src="images/event1.png" alt="Ardoise" class="product-image equal">
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6">
                            <div class="events-card">
                                <a href="#" class="img-wrap">
                                    <img src="images/event2.png" alt="Ardoise" class="product-image equal">
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6">
                            <div class="events-card">
                                <a href="#" class="img-wrap">
                                    <img src="images/event3.png" alt="Ardoise" class="product-image equal">
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6">
                            <div class="events-card">
                                <a href="#" class="img-wrap">
                                    <img src="images/event4.png" alt="Ardoise" class="product-image equal">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="btn-wrap text-center">
                        <a href="https://instagram.com/flashrun_khm" target="_blank" class="btn">ПЕРЕЙТИ В ІНСТАГРАМ</a>
                    </div>


                </div>
            </section>
            <section class="section catalog " id="catalog">
                <div class="container">
                    <h2 class="section-title">ФІРМОВИЙ ОДЯГ <span class="sub-title">«FLASHRUN»</span></h2>

                    <div class="row catalog-row">
                        <div class="col-lg-4 col-sm-6">
                            <div class="catalog-card">
                                <a href="#" class="img-wrap">
                                    <img src="images/product-card1.png" alt="КЛУБНА ФУТБОЛКА" class="product-image equal">
                                </a>
                                <div class="catalog-card-descr ">
                                    <div class="catalog-card-title">КЛУБНА ФУТБОЛКА</div>
                                    <div class="price">410 грн</div>
                                </div>
                                <div class="btn-wrap text-center">
                                    <button  type="button" class="btn" data-toggle="modal" data-target="#buy_modal">КУПИТИ</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6">
                            <div class="catalog-card">
                                <a href="#" class="img-wrap">
                                    <img src="images/product-card2.png" alt="КЛУБНІ НОСКИ" class="product-image equal">
                                </a>
                                <div class="catalog-card-descr ">
                                    <div class="catalog-card-title">КЛУБНІ НОСКИ</div>
                                    <div class="price">80 грн</div>
                                </div>
                                <div class="btn-wrap text-center">
                                    <button  type="button" class="btn" data-toggle="modal" data-target="#buy_modal">КУПИТИ</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6">
                            <div class="catalog-card">
                                <a href="#" class="img-wrap">
                                    <img src="images/product-card3.png" alt="КЛУБНИЙ ЛОНГСЛІВ" class="product-image equal">
                                </a>
                                <div class="catalog-card-descr ">
                                    <div class="catalog-card-title">КЛУБНИЙ ЛОНГСЛІВ</div>
                                    <div class="price"> 450 грн</div>
                                </div>
                                <div class="btn-wrap text-center">
                                    <button  type="button" class="btn" data-toggle="modal" data-target="#buy_modal">КУПИТИ</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="section gallery" id="gallery">
                <div class="container">
                    <h2 class="section-title">галерея</h2>
                    <div class="row gallery-row grid">
                        <div class="grid-item col-md-4 col-6">
                            <a href="images/gallery1.jpg"  data-fancybox="gallery">
                                <img src="images/gallery1.jpg" alt="gallery">
                            </a>
                        </div>
                        <div class="grid-item col-md-4 col-6">
                            <a href="images/gallery2.jpg"  data-fancybox="gallery">
                                <img src="images/gallery2.jpg" alt="gallery">
                            </a>
                        </div>
                        <div class="grid-item col-md-4 col-6">
                            <a href="images/gallery3.jpg"  data-fancybox="gallery">
                                <img src="images/gallery3.jpg" alt="gallery">
                            </a>
                        </div>
                        <div class="grid-item col-md-4 col-6" >
                            <a href="images/gallery5.jpg"  data-fancybox="gallery">
                                <img src="images/gallery5.jpg" alt="gallery">
                            </a>
                        </div>
                        <div class="grid-item col-md-4 col-6" >
                            <a href="images/gallery4.jpg"  data-fancybox="gallery">
                                <img src="images/gallery4.jpg" alt="gallery">
                            </a>
                        </div>
                        <div class="grid-item col-md-4 col-6" >
                            <a href="images/gallery6.jpg"  data-fancybox="gallery">
                                <img src="images/gallery6.jpg" alt="gallery">
                            </a>
                        </div>
                        <div class="grid-item col-md-4 col-6" >
                            <a href="images/gallery7.jpg"  data-fancybox="gallery">
                                <img src="images/gallery7.jpg" alt="gallery">
                            </a>
                        </div>
                        <div class="grid-item col-md-4 col-6" >
                            <a href="images/gallery9.jpg"  data-fancybox="gallery">
                                <img src="images/gallery9.jpg" alt="gallery">
                            </a>
                        </div>
                        <div class="grid-item col-md-4 col-6" >
                            <a href="images/gallery8.jpg"  data-fancybox="gallery">
                                <img src="images/gallery8.jpg" alt="gallery">
                            </a>
                        </div>
                        <div class="grid-item col-md-4 col-6" >
                            <a href="images/gallery10.jpg"  data-fancybox="gallery">
                                <img src="images/gallery10.jpg" alt="gallery">
                            </a>
                        </div>
                        <div class="grid-item col-md-4 col-6" >
                            <a href="images/gallery12.jpg"  data-fancybox="gallery">
                                <img src="images/gallery12.jpg" alt="gallery">
                            </a>
                        </div>
                        <div class="grid-item col-md-4 col-6" >
                            <a href="images/gallery11.jpg"  data-fancybox="gallery">
                                <img src="images/gallery11.jpg" alt="gallery">
                            </a>
                        </div>
                    </div>
                </div>
            </section>
            <section class="section contacts" id="contacts">
                <div class="container">
                    <h2 class="section-title">Контакти</h2>
                    <div class="row contacts-row">
                        <div class="col-md-3 ">
                            <div class="inner">
                                <div class="title">INSTAGRAM</div>
                                <a href="https://instagram.com/flashrun_khm" target="_blank">flashrun_khm</a>
                            </div>
                        </div>
                        <div class="col-md-6 text-center">
                            <div class="inner">
                                <div class="title">E-MAIL:</div>
                                <a href="mailto:rybak.snizhana@gmail.com">rybak.snizhana@gmail.com</a>
                            </div>
                        </div>
                        <div class="col-md-3 text-md-right">
                            <div class="inner">
                                <div class="title">PHONE</div>
                                <a class="phone-call" href="tel:+380977464301">+380 97 746 43 01</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
        <!-- end of main content -->
        <!-- footer -->
        <footer class="footer">
            <div class="footer-main">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-2 col-md-3 text-center text-md-left">
                            <div class="copy">©2022 FLASHRUN</div>
                        </div>
                        <div class="col-lg-8 col-md-6">
                            <ul class="nav nav-menu navbar-wrap justify-content-center">
                                <li>
                                    <a href="#registration" class="nav-link">РЕЄСТРАЦІЯ</a>
                                </li>
                                <li>
                                    <a href="#events" class="nav-link ">ЗАХОДИ</a>
                                </li>
                                <li>
                                    <a href="#catalog" class="nav-link ">МЕРЧ</a>
                                </li>
                                <li>
                                    <a href="#gallery" class="nav-link ">ГАЛЕРЕЯ</a>
                                </li>
                                <li>
                                    <a href="#contacts" class="nav-link ">Контакти</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-2 col-md-3 text-center text-md-right">
                            <div id="up-btn">НАВЕРХ</div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- end of footer -->
        <!-- modals -->
        <div class="modal fade " id="registr_modal" tabindex="-1" aria-labelledby="registr_modal" aria-modal="true"
             role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="section-title">РЕЄСТРАЦІЯ <span class="sub-title">«ВОЛЯ FEST»</span></h2>
                        <h3 class="title">БІГ З ПЕРЕШКОДАМИ</h3>
                        <button type="button" class="close" aria-label="Close" data-dismiss="modal">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="" action="{{ route('race-register') }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <input type="hidden" name="race_name" value="Воля FEST">
                            <div class="form-group">
                                <label for="registr_modal_form_cb_name">Ім’я та прізвище</label>
                                <input id="registr_modal_form_cb_name" type="text" name="name" placeholder="Введіть ім’я та прізвище" value="" required="" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="email">E-mail</label>
                                <input id="email" type="email" name="email" placeholder="Введіть електронну пошту" value="" required="" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="registr_modal_form_cb_phone">Номер телефону</label>
                                <input id="registr_modal_form_cb_phone" type="tel" name="phone" placeholder="Введіть номер телефону" required="" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="registr_modal_form_cb_clubname">Ваш клуб</label>
                                <input id="registr_modal_form_cb_clubname" type="text" name="club" placeholder="Введіть клуб" value="" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="registr_modal_form_cb_sity">Ваше місто</label>
                                <input id="registr_modal_form_cb_sity" type="text" name="city" placeholder="Введіть Ваше місто" value="" required="" class="form-control">
                            </div>
                            <div class="form-group">
                                <div class="label-wrap">
                                    <label for="">Дистанції</label>
                                </div>
                                <div class="custon-radio-group">
                                    <input id="registr_modal_form_cb_option1" type="radio" name="distance" value="3000"  class="custon-radio-btn" checked>
                                    <label for="registr_modal_form_cb_option1">3 км</label>
                                    <input id="registr_modal_form_cb_option2" type="radio" name="distance" value="5000"  class="custon-radio-btn" >
                                    <label for="registr_modal_form_cb_option2">5 км</label>
                                    <input id="registr_modal_form_cb_option3" type="radio" name="distance" value="10000"  class="custon-radio-btn">
                                    <label for="registr_modal_form_cb_option3">10 км</label>
                                    <input id="registr_modal_form_cb_option4" type="radio" name="distance" value="15000"  class="custon-radio-btn">
                                    <label for="registr_modal_form_cb_option4">15 км</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="label-wrap">
                                    <label for="">Дитячі дистанції</label>
                                </div>
                                <div class="custon-radio-group">
                                    <input id="registr_modal_form_cb_option6" type="radio" value="1000" name="registr_modal_distance"  class="custon-radio-btn" >
                                    <label for="registr_modal_form_cb_option6">1 км</label>
                                    <input id="registr_modal_form_cb_option7" type="radio" value="100" name="registr_modal_distance"  class="custon-radio-btn">
                                    <label for="registr_modal_form_cb_option7">100 м</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="btn-wrap text-center">
                                    <button type="submit" class="btn  ">ЗАРЕЄСТРУВАТИСЬ</button>
                                    <a href="#" target="_blank" class="btn btn-invert">Положення змагань</a>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
        <div class="modal fade " id="registr_modal2" tabindex="-1" aria-labelledby="registr_modal2" aria-modal="true"
             role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="section-title">РЕЄСТРАЦІЯ <span class="sub-title">«ВОЛЯ FEST»</span></h2>
                        <h3 class="title">ВЕЛО</h3>
                        <button type="button" class="close" aria-label="Close" data-dismiss="modal">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class=" " action="/" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="registr_modal3_form_cb_name">Ім’я та прізвище</label>
                                <input id="registr_modal3_form_cb_name" type="text" name="registr_modal3_user_name" placeholder="Введіть ім’я та прізвище" value="" required="" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="registr_modal3_form_cb_phone">Номер телефону</label>
                                <input id="registr_modal3_form_cb_phone" type="tel" name="registr_modal3_user_phone" placeholder="Введіть номер телефону" required="" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="registr_modal3_form_cb_clubname">Ваш клуб</label>
                                <input id="registr_modal3_form_cb_clubname" type="text" name="registr_modal3_club_name" placeholder="Введіть клуб" value="" required="" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="registr_modal3_form_cb_sity">Ваше місто</label>
                                <input id="registr_modal3_form_cb_sity" type="text" name="registr_modal3_user_name" placeholder="Введіть Ваше місто" value="" required="" class="form-control">
                            </div>
                            <div class="form-group">
                                <div class="label-wrap">
                                    <label for="">Дистанції</label>
                                </div>
                                <div class="custon-radio-group">
                                    <input id="registr_modal3_form_cb_option1" type="radio" name="registr_modal3_distance"  class="custon-radio-btn" checked>
                                    <label for="registr_modal3_form_cb_option1">ЖІНКИ - 15 КМ</label>
                                    <input id="registr_modal3_form_cb_option2" type="radio" name="registr_modal3_distance"  class="custon-radio-btn" >
                                    <label for="registr_modal3_form_cb_option2">ЧОЛОВІКИ - 20 КМ</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="btn-wrap text-center">
                                    <button type="submit" class="btn  ">ЗАРЕЄСТРУВАТИСЬ</button>
                                    <a href="#" target="_blank" class="btn btn-invert">Положення змагань</a>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
        <div class="modal fade " id="registr_modal3" tabindex="-1" aria-labelledby="registr_modal3" aria-modal="true"
             role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="section-title">РЕЄСТРАЦІЯ <span class="sub-title">«ВОЛЯ FEST»</span></h2>
                        <h3 class="title">ДУАТЛОН</h3>
                        <button type="button" class="close" aria-label="Close" data-dismiss="modal">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class=" " action="/" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="registr_modal3_form_cb_name">Ім’я та прізвище</label>
                                <input id="registr_modal3_form_cb_name" type="text" name="registr_modal3_user_name" placeholder="Введіть ім’я та прізвище" value="" required="" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="registr_modal3_form_cb_phone">Номер телефону</label>
                                <input id="registr_modal3_form_cb_phone" type="tel" name="registr_modal3_user_phone" placeholder="Введіть номер телефону" required="" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="registr_modal3_form_cb_clubname">Ваш клуб</label>
                                <input id="registr_modal3_form_cb_clubname" type="text" name="registr_modal3_club_name" placeholder="Введіть клуб" value="" required="" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="registr_modal3_form_cb_sity">Ваше місто</label>
                                <input id="registr_modal3_form_cb_sity" type="text" name="registr_modal3_user_name" placeholder="Введіть Ваше місто" value="" required="" class="form-control">
                            </div>
                            <div class="form-group">
                                <div class="label-wrap">
                                    <label for="">Дистанції</label>
                                </div>
                                <div class="custon-radio-group">
                                    <input id="registr_modal3_form_cb_option1" type="radio" name="registr_modal3_distance"  class="custon-radio-btn" checked>
                                    <label for="registr_modal3_form_cb_option1">2 КМ / 8КМ / 1КМ</label>

                                </div>
                            </div>
                            <div class="form-group">
                                <div class="btn-wrap text-center">
                                    <button type="submit" class="btn  ">ЗАРЕЄСТРУВАТИСЬ</button>
                                    <a href="#" target="_blank" class="btn btn-invert">Положення змагань</a>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
        <div class="modal fade " id="registr_modal4" tabindex="-1" aria-labelledby="registr_modal4" aria-modal="true"
             role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="section-title">РЕЄСТРАЦІЯ <span class="sub-title">«ВОЛЯ FEST»</span></h2>
                        <h3 class="title">СКАНДИНАВСЬКА ХОДЬБА</h3>
                        <button type="button" class="close" aria-label="Close" data-dismiss="modal">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class=" " action="/" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="registr_modal4_form_cb_name">Ім’я та прізвище</label>
                                <input id="registr_modal4_form_cb_name" type="text" name="registr_modal3_user_name" placeholder="Введіть ім’я та прізвище" value="" required="" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="registr_modal4_form_cb_phone">Номер телефону</label>
                                <input id="registr_modal4_form_cb_phone" type="tel" name="registr_modal3_user_phone" placeholder="Введіть номер телефону" required="" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="registr_modal4_form_cb_clubname">Ваш клуб</label>
                                <input id="registr_modal4_form_cb_clubname" type="text" name="registr_modal3_club_name" placeholder="Введіть клуб" value="" required="" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="registr_modal4_form_cb_sity">Ваше місто</label>
                                <input id="registr_modal4_form_cb_sity" type="text" name="registr_modal3_user_name" placeholder="Введіть Ваше місто" value="" required="" class="form-control">
                            </div>
                            <div class="form-group">
                                <div class="label-wrap">
                                    <label for="">Дистанції</label>
                                </div>
                                <div class="custon-radio-group">
                                    <input id="registr_modal4_form_cb_option1" type="radio" name="registr_modal4_distance"  class="custon-radio-btn" checked>
                                    <label for="registr_modal4_form_cb_option1">3 КМ</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="btn-wrap text-center">
                                    <button type="submit" class="btn  ">ЗАРЕЄСТРУВАТИСЬ</button>
                                    <a href="#" target="_blank" class="btn btn-invert">Положення змагань</a>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
        <div class="modal fade " id="buy_modal" tabindex="-1" aria-labelledby="buy_modal" aria-modal="true"
             role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="section-title">ФІРМОВИЙ ОДЯГ <span class="sub-title">«FLASHRUN»</span></h2>
                        <button type="button" class="close" aria-label="Close" data-dismiss="modal">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class=" " action="/" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="form_cb_name">Ім’я та прізвище</label>
                                <input id="form_cb_name" type="text" name="user_name" placeholder="Введіть ім’я та прізвище" value="" required="" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="form_cb_phone">Номер телефону</label>
                                <input id="form_cb_phone" type="tel" name="user_phone" placeholder="Введіть номер телефону" required="" class="form-control">
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <label for="">Розмір</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <input id="form_cb_size1" type="radio" name="user_size"  class="custon-radio-btn" checked>
                                        <label for="form_cb_size1">S</label>
                                        <input id="form_cb_size2" type="radio" name="user_size"  class="custon-radio-btn">
                                        <label for="form_cb_size2">M</label>
                                        <input id="form_cb_size3" type="radio" name="user_size"  class="custon-radio-btn">
                                        <label for="form_cb_size3">L</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="btn-wrap text-center">
                                    <button type="submit" class="btn  ">КУПИТИ</button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
        <div class="modal-backdrop fade " id="backdrop" style="display: none;"></div>
    </div>
</div>

<!-- scripts -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<!-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script> -->
<script src="https://unpkg.com/imagesloaded@5/imagesloaded.pkgd.min.js"></script>
<script src="https://npmcdn.com/isotope-layout@3.0/dist/isotope.pkgd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.matchHeight/0.7.2/jquery.matchHeight-min.js" integrity="sha512-/bOVV1DV1AQXcypckRwsR9ThoCj7FqTV2/0Bm79bL3YSyLkVideFLE3MIZkq1u5t28ke1c0n31WYCOrO01dsUg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0.27/dist/fancybox.umd.min.js"></script>
<link  rel="stylesheet"  href="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.css" />
<script src="{{ asset('/js/common.js') }}"></script>
</body>
</html>
