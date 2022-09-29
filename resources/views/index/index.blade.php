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
@if(session('success'))
    <div class="alert alert-success">
        {!! session('success') !!}
    </div>
@endif
<div id="page-wrapper" class="page-wrapper ">
    <div id="page-body" class="page-body">
        <!-- header -->
        <header class="header page-header" >
            <div class="container">
                <div class="row align-items-center   justify-content-between ">
                    <div class="logo-wrap col-lg-4 col-md-6 col-9">
                        <a href="{{ route('home') }}" class="logo">
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
                            <!--<li>
                                <a href="#catalog" class="nav-link ">МЕРЧ</a>
                            </li>-->
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
                                        <div class="descr custom-color">Спеціально спроектована траса із перешкодами. Дистанції - від 3 та 15км.</div>
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
                                        <div class="descr custom-color">Подолай трасу на шосейному велосипеді. Дистанція - 15 км/20 км.</div>
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
                                        <h3 class="title">КРОС ДУАТЛОН</h3>
                                        <div class="descr custom-color">Поєднання бігу та вело - пробіжи та проїдь. Дистанція - 3/10/1 км.</div>
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
            @include('partials.our-events')

            <!--@include('partials.merch-catalog')-->

            @include('partials.gallery-section')

            @include('partials.contacts-section')
        </main>
        <!-- end of main content -->
        <!-- footer -->
        @include('partials.footer')
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

                            <div class="form-group prices my-4">
                                @include('partials.event-prices-block')
                            </div>

                            {{ csrf_field() }}
                            <input type="hidden" name="race_name" value="Воля FEST">
                            <input type="hidden" name="type" value="running with obstacles">
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
                                    <input id="registr_modal_form_cb_option6" type="radio" value="1000" name="distance"  class="custon-radio-btn" >
                                    <label for="registr_modal_form_cb_option6">1 км</label>
                                    <input id="registr_modal_form_cb_option7" type="radio" value="100" name="distance"  class="custon-radio-btn">
                                    <label for="registr_modal_form_cb_option7">100 м</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="btn-wrap text-center">
                                    <button type="submit" class="btn">ЗАРЕЄСТРУВАТИСЬ</button>
                                    <a href="{{ asset('/files/Положення.pdf') }}" target="_blank" class="btn btn-invert">Положення змагань</a>
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
                        <div class="form-group prices my-4">
                            @include('partials.event-prices-block')
                        </div>
                        <form class="" action="{{ route('race-register') }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <input type="hidden" name="race_name" value="Воля FEST">
                            <input type="hidden" name="type" value="bicycle">
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
                                    <input id="registr_modal3_form_cb_option1" type="radio" value="15000" name="distance" class="custon-radio-btn" checked>
                                    <label for="registr_modal3_form_cb_option1">ЖІНКИ - 15 КМ</label>
                                    <input id="registr_modal3_form_cb_option2" type="radio" value="20000" name="distance" class="custon-radio-btn" >
                                    <label for="registr_modal3_form_cb_option2">ЧОЛОВІКИ - 20 КМ</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="btn-wrap text-center">
                                    <button type="submit" class="btn">ЗАРЕЄСТРУВАТИСЬ</button>
                                    <a href="{{ asset('/files/Положення.pdf') }}" target="_blank" class="btn btn-invert">Положення змагань</a>
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
                        <h3 class="title">КРОС ДУАТЛОН</h3>
                        <button type="button" class="close" aria-label="Close" data-dismiss="modal">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @include('partials.event-prices-block')
                        <form class="" action="{{ route('race-register') }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <input type="hidden" name="race_name" value="Воля FEST">
                            <input type="hidden" name="type" value="duathlon">
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
                                    <input id="registr_modal3_form_cb_option1" type="radio" name="distance" value="3000/10000/1000"  class="custon-radio-btn" checked>
                                    <label for="registr_modal3_form_cb_option1">3 КМ / 10КМ / 1КМ</label>

                                </div>
                            </div>
                            <div class="form-group">
                                <div class="btn-wrap text-center">
                                    <button type="submit" class="btn">ЗАРЕЄСТРУВАТИСЬ</button>
                                    <a href="{{ asset('/files/Положення.pdf') }}" target="_blank" class="btn btn-invert">Положення змагань</a>
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
                        @include('partials.event-prices-block')
                        <form class="" action="{{ route('race-register') }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <input type="hidden" name="race_name" value="Воля FEST">
                            <input type="hidden" name="type" value="walking">
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
                                    <input id="registr_modal4_form_cb_option1" type="radio" name="distance" value="3000" class="custon-radio-btn" checked>
                                    <label for="registr_modal4_form_cb_option1">3 КМ</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="btn-wrap text-center">
                                    <button type="submit" class="btn">ЗАРЕЄСТРУВАТИСЬ</button>
                                    <a href="{{ asset('/files/Положення.pdf') }}" target="_blank" class="btn btn-invert">Положення змагань</a>
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

        <div class="modal fade" id="rules" tabindex="-1" aria-labelledby="rules" aria-modal="true"
             role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="section-title">ПРАВИЛА ТА УМОВИ</h2>
{{--                        <h3 class="title">БІГ З ПЕРЕШКОДАМИ</h3>--}}
                        <button type="button" class="close" aria-label="Close" data-dismiss="modal">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <p>FlashRun.org є платформою для реєстрації на спортивні події та надає послуги розміщення інформації про дані події, включно з функцією реєстрації та оплати участі у подіях. Оплата за участь у Події здійснюється через платіжні сервіс Liqpay безпосередньо на користь Громадської організації</p>
                        <p>Правила оплати грошових коштів, порядок відшкодування та повернення і скасування трансакції, а також будь які інші правила та умови є визначені у Положені Події та встановлюються безпосередньо Організатором Події.</p>
                        <p>FlashRun за вийнятком Подій які організовуються безпосередньо компанією Flashrun , не є відповідальним за збір та повернення коштів між Учасниками Події та Організаторами Події.</p>
                        <p>Варіанти оплати:</p>
                        <p>Оплата платіжними картами Visa та MasterCard або іншими методами (Apple Pay, Google Pay, оплата через термінал, тощо) через систему  Liqpay (залежить від Події та Дистанції, на яку учасник збирається реєструватися)</p>
                        <p>Контактна інформація:</p>
                        <p>Громадська організація «Клуб Швидкий біг»</p>
                        <p>Клуб “Flash Run”</p>
                        <p>ЄДРПОУ 44225232</p>
                        <p>Юр. адреса:</p>
                        <p>м. Хмельницький</p>
                        <p>Вул. Руданського 18</p>
                        <p>тел: +38(097)746.43.01</p>
                        <p>Соц. мережі</p>
                        <p>@flashRun_khm</p>
                    </div>

                </div>
            </div>
        </div>
        <div class="modal fade" id="policy" tabindex="-1" aria-labelledby="policy" aria-modal="true"
             role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="section-title">ПОЛІТИКА КОНФІДЕНЦІЙНОСТІ</h2>
                        {{--                        <h3 class="title">БІГ З ПЕРЕШКОДАМИ</h3>--}}
                        <button type="button" class="close" aria-label="Close" data-dismiss="modal">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <p>У цій політиці конфіденційності (далі – «Політика») описано, яку інформацію Адміністрація збирає про вас і навіщо, а також як Адміністрація використовує зібрану інформацію і в яких випадках її розкриває.</p>
                        <p>*1. ЗАГАЛЬНІ ПОЛОЖЕННЯ</p>
                        <p>1.1. Використовуючи Сайт, ви приймаєте цю Політику і даєте згоду на збір, зберігання використання і розголошення своїх персональних даних відповідно до Законів України «Про захист персональних даних», «Про захист інформації в інформаційно-телекомунікаційних системах».</p>
                        <p>1.2. Всі використані в цій Політиці терміни мають таке ж значення, як в Правилах користування вебсайтом.</p>
                        <p>1.3. Політика конфіденційності є додатком до Правил користування вебсайтом.</p>
                        <p>2. ЯКУ ІНФОРМАЦІЮ ми збираємо?</p>
                        <p>2.1. Перш за все, ви можете відвідувати загальнодоступні розділи Сайту анонімно, не розкриваючи своє ім’я або будь-яку іншу інформацію.</p>
                        <p>2.2. Щоб використовувати всі можливості Вебсайту, вам необхідно створити розділ: зареєструватися або авторизуватися за допомогою облікового запису в Facebook або email.</p>
                        <p>2.3. Коли ви увійшли в систему за допомогою акаунтів в соціальних мережах, Адміністрація отримує доступ до всієї видимої інформації, що міститься у Вашому акаунті відповідно до його налаштуваннями конфіденційності. Однак, Адміністрація збирає і використовує тільки таку інформацію, як:</p>
                        <p>ім’я та прізвище</p>
                        <p>ваше фото (зображення)</p>
                        <p>стать</p>
                        <p>адреса електронної пошти</p>
                        <p>URL вашої сторінки в соціальних мережах.</p>
                        <p>2.4. У створеному профілі ви, за бажанням, можете вказати додаткову інформацію:</p>
                        <p>посаду в компанії;</p>
                        <p>назва компанії;</p>
                        <p>телефон;</p>
                        <p>місто фактичного проживання;</p>
                        <p>іншу інформацію в розділі «Про себе».</p>
                        <p>дату народження;</p>
                        <p>2.5. Інформація, опублікована в вашому профілі, буде доступна іншим користувачам сайту. Ви можете переглядати, редагувати і видаляти інформацію в своєму профілі.</p>
                        <p>2.6. Ви також можете видалити прив’язку вашого профілю до соціальних мереж. Для цього напишіть Адміністрації на сторінку у інстаграм  @flashrun_khm</p>
                        <p>2.7. Крім зазначеної інформації, Адміністрація може збирати інформацію про вашу діяльність на вебсайті, наприклад, інформацію про залишені вами коментарях до публікацій інших користувачів або запропоновані вами теми для обговорення на форумі сайту.</p>
                        <p>2.8. Додатково, Адміністрація збирає деякі дані автоматично, а саме інформацію про пристрої, за допомогою яких ви використовуєте Сайт, IP-адреси ваших пристроїв, що використовуються браузер і версію операційної системи, час і дату доступу до веб-сайтів, інформацію про мову, якій ви віддаєте перевагу. Це полегшує роботу і використання веб-сайта.</p>
                        <p>3. Як ми використовуємо вашу інформацію?</p>
                        <p>3.1. Ваша інформація використовується Адміністрацією для:</p>

                        <p>- надання послуг, пропонованих на вебсайті;</p>
                        <p>- полегшення користування вебсайтом і поліпшення якості послуг;</p>
                        <p>- інформування про Послуги, новини і рекламних пропозиції.</p>

                        <p>3.2. Адміністрація може час від часу надсилати на вашу електронну пошту листи про пропоновані послуги або інші оголошення про діяльність сайту. Ви може відмовитися від такої розсилки, змінивши налаштування свого профілю в розділі «Підписка».</p>

                        <p>4. ЧИ РОЗКРИВАЄМО МИ ВАШУ ІНФОРМАЦІЮ?</p>

                        <p>4.1. Адміністрація не передає і не розкриває вашу інформацію третім особам за винятком таких випадків:</p>

                        <p>- Інший користувач Сайт буде бачити вашу електронну пошту, якщо ви відправляєте йому приватне повідомлення;</p>
                        <p>- Адміністрація розкриває вашу інформацію, якщо такі дії є обов’язковими відповідно до чинного законодавства України або є достатні підстави вважати, що розкриття такої інформації необхідно для дотримання чинного законодавства України, вимог юридичного процесу або законного запиту державних органів.</p>

                        <p>5. ЗАХИСТ ІНФОРМАЦІЇ</p>

                        <p>5.1. Адміністрація вживає всіх необхідних заходів для захисту вашої інформації від несанкціонованого доступу, зміни, розкриття чи знищення.</p>

                        <p>5.2. У той же час, Адміністрація звертає увагу на те, що жоден з існуючих способів передачі даних не може бути абсолютно безпечним. Тому Адміністрація, незважаючи на всі вжиті заходи щодо забезпечення безпеки, не може гарантувати повну безпеку інформації і даних.</p>

                        <p>6. Відповідальність АДМІНІСТРАЦІЇ</p>

                        <p>6.1.</p>
                        <p>Адміністрація несе відповідальність за всі дії або бездіяльність з вашою інформацією в рамках чинного чинного законодавства.</p>

                        <p>6.2. Адміністрація не несе відповідальності за дії користувачів Вебсайту і третіх осіб з вашою інформацією незалежно від того, отримані ці дані через Сайт або іншим способом.</p>

                        <p>7. ЧИ ВИКОРИСТОВУЄМО МИ COOKIES?</p>

                        <p>7.1. Так. Адміністрація використовує cookie-файли, веб-маяки, унікальні ідентифікатори та подібні технології для збору відомостей про переглядаються сторінках, переходах по посиланнях, а також про інші ваших діях, пов’язаних з відвідуванням і використанням Вебсайту.</p>

                        <p>7.2. Адміністрація застосовує подібні технології з метою зробити використання Вебсайт більш ефективним, швидким і безпечним, удосконалити функціонування Вебсайту, а також з метою надання реклами, адаптованої до ваших інтересів.</p>

                        <p>7.3. Ви можете заблокувати, відключити і видалити cookie-файли, веб-маяки та інші аналогічні елементи, якщо ваш веб-браузер або пристрій дозволяють зробити це.</p>

                        <p>8. ПОСИЛАННЯ НА ЗОВНІШНІ САЙТИ</p>

                        <p>8.1. Вебсайт може містити посилання на сторонні сайти. Адміністрація не несе відповідальність за зміст і діяльність таких сайтів, а також за забезпечення ними до вашої особистої інформації.</p>


                        <p>9. ЗМІНИ ДО ПОЛІТИКИ</p>

                        <p>9.1. Адміністрація може оновлювати, редагувати і вносити зміни в Політику без додаткового повідомлення. Такі зміни публікуються на веб-сайті і вступають в силу відразу після публікації, якщо інше не зазначено в самих змінах.</p>

                        <p>Якщо, на вашу думку, умови цієї Політики були порушені, або якщо у вас є питання щодо конфіденційності вашої інформації, напишіть нам на @flasrun_khm</p>

                        <p>10. ЯК САМЕ ВИ МОЖЕТЕ ПЕРЕГЛЯДАТИ, ОНОВЛЮВАТИ АБО ВИДАЛЯТИ ДАНІ, ЯКІ МИ ОТРИМУЄМО ВІД ВАС?</p>

                        <p>Згідно з законодавством деяких країн, у Вас може бути право вимагати доступу до особистої інформації, яку ми отримуємо від Вас, вносити зміни до цієї інформації або, за деяких обставин, видаляти її. Щоб отримати можливість для перегляду, оновлення або видалення Вашої особистої інформації, ми просимо Вас відвідати особистий кабінет, або звернутися до нас. Ми надамо відповідь на Ваше звернення протягом 30 днів.</p>

                        <p>Щоб повністю видалити усі дані, пов’язані з вашим акаунтом, перейдіть в особистий кабінет та скористайтеся посиланням “Видалити цього користувача”. Одразу після підтвердження видалення або після отримання вашого звернення про видалення акаунту користувача усі дані, пов’язані з цим акаунтом, будуть повністю видалені з усіх баз даних без можливості їх відновлення. Але ми просимо Вас звернути увагу, що дані не завжди можуть бути повністю або достатньо повно видалені з наших систем.</p>
                    </div>

                </div>
            </div>
        </div>
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
