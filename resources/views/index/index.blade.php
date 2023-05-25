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
@if(session('danger'))
    <div class="alert alert-danger">
        {!! session('danger') !!}
    </div>
@endif
<div id="page-wrapper" class="page-wrapper ">
    <div id="page-body" class="page-body">
        <!-- header -->
        @include('partials.header')
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
                    <h2 class="section-title">РЕЄСТРАЦІЯ <span class="sub-title">«FLASHRUN»</span></h2>

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
                                        <h3 class="title" style="text-transform: none;">ПроскурівRUN</h3>
                                        <div class="descr custom-color">Весняний крос, який відбудеться 23 квітня 2023 року в дендропарку.</div>
                                        <button disabled type="button" class="btn" data-toggle="modal" data-target="#registr_modal">ЗАРЕЄСТРУВАТИСЬ</button>
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
                                        <h3 class="title">UKRAINERUN</h3>
                                        <div class="descr custom-color">18.06.23 - Патріотичний фановий, який відбудеться в парку.</div>
                                        <button type="button" class="btn" data-toggle="modal" data-target="#registr_modal5">ЗАРЕЄСТРУВАТИСЬ</button>
                                        <a class="mt-2 text-decoration-underline" href="{{ route('race-participants', ['raceId' => \App\Models\Race::getIdByName('UkraineRUN')]) }}">Список учасників</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="categories-card">
                                <div class="row">
                                    <div class="col-sm-5">
                                        <div class="img-wrap">
                                            <img src="{{ asset('/images/category5.jpg') }}" alt="category" class="bg-image-pos">
                                        </div>
                                    </div>
                                    <div class="col-sm-7">
                                        <h3 class="title">Благодійний Забіг</h3>
                                        <div class="descr custom-color">30.04.23
                                            Благодійний забіг заради Валерія Одайника
                                            Збір коштів на реабілітацію важкопораненому на Бахмутському напрямку військовослужбовцю кам‘янчанину</div>
                                        <button disabled type="button" class="btn" data-toggle="modal" data-target="#registr_modal3">ЗАРЕЄСТРУВАТИСЬ</button>
                                        <a class="mt-2 text-decoration-underline" href="{{ route('race-participants', ['raceId' => 3]) }}">Список учасників</a>
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
                                        <h3 class="title">Воля.fest</h3>
                                        <div class="descr custom-color">20.08.23 - забіг, який відбудеться в Лісогринівецькому лісі.</div>
                                        <button disabled="disabled" type="button" class="btn" data-toggle="modal" data-target="#registr_modal3">ЗАРЕЄСТРУВАТИСЬ</button>
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
                                        <h3 class="title">Різдвяний забіг</h3>
                                        <div class="descr custom-color">24.12.2023 - забіг, який відбудеться в парку ім.Чекмана.</div>
                                        <button disabled="disabled" type="button" class="btn" data-toggle="modal" data-target="#registr_modal4">ЗАРЕЄСТРУВАТИСЬ</button>
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

        <div class="modal fade" id="registr_modal3" tabindex="-1" aria-labelledby="registr_modal3" aria-modal="true"
             role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="section-title">РЕЄСТРАЦІЯ <span class="sub-title">«Благодійний забіг заради Валерія Одайника»</span></h2>
                        <h3 class="title">м. Кам"янець-Подільський, Європейський сквер (готель 7 днів)</h3>
                        <button type="button" class="close" aria-label="Close" data-dismiss="modal">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <form action="{{ route('race-register') }}" method="post" enctype="multipart/form-data">

{{--                            <div class="form-group prices my-4">--}}
{{--                                @include('partials.event-subtype-switcher')--}}
{{--                            </div>--}}
                        <!--<div class="form-group prices my-4">
                                @include('partials.event-prices-block')
                            </div>-->

                            {{ csrf_field() }}
                            <input type="hidden" name="race_name" value="Благодійний Забіг">

                            <div class="race-subtype-content">

                            </div>
                            <div class="form-group">
                                <div class="btn-wrap text-center">
                                    <button type="submit" class="btn">ЗАРЕЄСТРУВАТИСЬ</button>
                                    <a href="https://docs.google.com/document/d/10BSiSsVYb5E1W9m1rYGXNe_GVzduUwoCbzQoAylsIAA/edit" target="_blank" class="btn btn-invert">Положення змагань</a>
                                </div>
                            </div>
                        </form>


                        <div class="regular-subtype-wrapper d-none">
                            <input type="hidden" name="type" value="regular">
                            <input type="hidden" name="price" value="300">
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
{{--                            <div class="form-group">--}}
{{--                                <label for="registr_modal_form_cb_promocode">Промокод</label>--}}
{{--                                <input id="registr_modal_form_cb_promocode" type="text" name="code" placeholder="Введіть промокод" value="" class="form-control">--}}
{{--                            </div>--}}
                            <div class="form-group">
                                <div class="label-wrap">
                                    <label for="">Дистанції</label>
                                </div>
                                <div class="custon-radio-group">
                                    <input id="registr_modal_form_cb_option1" type="radio" name="distance" value="2000"  class="custon-radio-btn" checked>
                                    <label for="registr_modal_form_cb_option1">2 км</label>
                                </div>
                            </div>
                        </div>







                    </div>

                </div>
            </div>
        </div>


        <div class="modal fade" id="registr_modal" tabindex="-1" aria-labelledby="registr_modal" aria-modal="true"
             role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="section-title">РЕЄСТРАЦІЯ <span class="sub-title">«ПроскурівRUN»</span></h2>
                        <h3 class="title">ДЕНДРОПАРК</h3>
                        <button type="button" class="close" aria-label="Close" data-dismiss="modal">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <form action="{{ route('race-register') }}" method="post" enctype="multipart/form-data">

                            <div class="form-group prices my-4">
                                @include('partials.event-subtype-switcher')
                            </div>
                            <!--<div class="form-group prices my-4">
                                @include('partials.event-prices-block')
                            </div>-->

                            {{ csrf_field() }}
                            <input type="hidden" name="race_name" value="ПроскурівRUN">

                            <div class="race-subtype-content">

                            </div>
                            <div class="form-group">
                                <div class="btn-wrap text-center">
                                    <button type="submit" class="btn">ЗАРЕЄСТРУВАТИСЬ</button>
                                    <a href="{{ asset('/files/polozhennya.pdf') }}" target="_blank" class="btn btn-invert">Положення змагань</a>
                                </div>
                            </div>
                        </form>


                        <div class="regular-subtype-wrapper d-none">
                            <input type="hidden" name="type" value="regular">
                            <input type="hidden" name="price" value="850">
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
                                <label for="registr_modal_form_cb_promocode">Промокод</label>
                                <input id="registr_modal_form_cb_promocode" type="text" name="code" placeholder="Введіть промокод" value="" class="form-control">
                            </div>
                            <div class="form-group">
                                <div class="label-wrap">
                                    <label for="">Дистанції</label>
                                </div>
                                <div class="custon-radio-group">
                                    <input id="registr_modal_form_cb_option1" type="radio" name="distance" value="2000"  class="custon-radio-btn" checked>
                                    <label for="registr_modal_form_cb_option1">2 км</label>
                                    <input id="registr_modal_form_cb_option2" type="radio" name="distance" value="6000"  class="custon-radio-btn" >
                                    <label for="registr_modal_form_cb_option2">6 км</label>
                                    <input id="registr_modal_form_cb_option3" type="radio" name="distance" value="10000"  class="custon-radio-btn">
                                    <label for="registr_modal_form_cb_option3">10 км</label>
                                </div>
                            </div>
                        </div>

                        <div class="relay-subtype-wrapper d-none">
                            <input type="hidden" name="type" value="relay">
                            <input type="hidden" name="price" value="4350">
                            <div class="form-group">
                                <label for="registr_modal_form_cb_name">Імена та прізвища усіх учасників (через кому)</label>
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
                                <label for="registr_modal_form_cb_clubname">Назва команди</label>
                                <input id="registr_modal_form_cb_clubname" type="text" name="club" placeholder="Назва команди" value="" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="registr_modal_form_cb_sity">Ваше місто</label>
                                <input id="registr_modal_form_cb_sity" type="text" name="city" placeholder="Введіть Ваше місто" value="" required="" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="registr_modal_form_cb_promocode">Промокод</label>
                                <input id="registr_modal_form_cb_promocode" type="text" name="promocode" placeholder="Введіть Промокод" value="" class="form-control">
                            </div>
                            <input type="hidden" name="distance" value="0">
{{--                            <div class="form-group">--}}
{{--                                <div class="label-wrap">--}}
{{--                                    <label for="">Дистанції</label>--}}
{{--                                </div>--}}
{{--                                <div class="custon-radio-group">--}}
{{--                                    <input id="registr_modal_form_cb_option1" type="radio" name="distance" value="2000"  class="custon-radio-btn" checked>--}}
{{--                                    <label for="registr_modal_form_cb_option1">2 км</label>--}}
{{--                                    <input id="registr_modal_form_cb_option2" type="radio" name="distance" value="6000"  class="custon-radio-btn" >--}}
{{--                                    <label for="registr_modal_form_cb_option2">6 км</label>--}}
{{--                                    <input id="registr_modal_form_cb_option3" type="radio" name="distance" value="10000"  class="custon-radio-btn">--}}
{{--                                    <label for="registr_modal_form_cb_option3">10 км</label>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                        </div>

                        <div class="kids-subtype-wrapper d-none">
                            <input type="hidden" name="type" value="kids">
                            <input type="hidden" name="price" value="0">
                            <div class="form-group">
                                <label for="registr_modal_form_cb_name">Ім"я та прізвище дитини</label>
                                <input id="registr_modal_form_cb_name" type="text" name="name" placeholder="Введіть ім’я та прізвище" value="" required="" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="email">E-mail</label>
                                <input id="email" type="email" name="email" placeholder="Введіть електронну пошту" value="" required="" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="registr_modal_form_cb_phone">Номер телефону одного з батьків</label>
                                <input id="registr_modal_form_cb_phone" type="tel" name="phone" placeholder="Введіть номер телефону" required="" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="registr_modal_form_cb_clubname">Клуб дитини</label>
                                <input id="registr_modal_form_cb_clubname" type="text" name="club" placeholder="Клуб Дитини" value="" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="registr_modal_form_cb_sity">Ваше місто</label>
                                <input id="registr_modal_form_cb_sity" type="text" name="city" placeholder="Введіть Ваше місто" value="" required="" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="registr_modal_form_cb_promocode">Промокод</label>
                                <input id="registr_modal_form_cb_promocode" type="text" name="promocode" placeholder="Введіть Промокод" value="" class="form-control">
                            </div>
                            <div class="form-group">
                                <div class="label-wrap">
                                    <label for="">Дистанції</label>
                                </div>
                                <div class="custon-radio-group">
                                    <input id="registr_modal_form_cb_option1" type="radio" name="distance" value="100"  class="custon-radio-btn" checked>
                                    <label for="registr_modal_form_cb_option1">100м</label>
                                    <input id="registr_modal_form_cb_option2" type="radio" name="distance" value="500"  class="custon-radio-btn" >
                                    <label for="registr_modal_form_cb_option2">500м</label>
                                    <input id="registr_modal_form_cb_option3" type="radio" name="distance" value="1000"  class="custon-radio-btn">
                                    <label for="registr_modal_form_cb_option3">1 км</label>
                                </div>
                            </div>
                        </div>



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

        @include('races.partials.ukrainerun-reg-modal')

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
        <div class="modal fade" id="oferta-modal" tabindex="-1" aria-labelledby="oferta-modal" aria-modal="true"
             role="dialog">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="section-title">ДОГОВІР (ПУБЛІЧНА ОФЕРТА)</h2>
                        <h3 class="title">про надання послуг з організації участі у спортивно-масовому заході</h3>
                        <button type="button" class="close" aria-label="Close" data-dismiss="modal">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <p>Громадська організація  «Швидкий біг»,  код  ЄДРПОУ 44225232,  в  особі Голови Кріль С,   яка   діє   на   підставі   Статуту   (надалі   іменується «Організатор» та/або ГО «ШВИДКИЙ БІГ»), пропонує фізичним особам (надалі іменується «Учасник») отримати послуги з організації участі у спортивно-масовому заході, на умовах викладених у цьому Договорі та інших документах, на які у ньому є посилання.</p>

                        <p>Даний Договір є публічним договором у розумінні ст. 633 Цивільного кодексу України (надалі – ЦК) та договором приєднання, у розумінні умов, викладених у ч. 1 ст. 634 ЦК.</p>

                        <p>Подання заявки на участь у спортивно-масовому заході у будь-якій формі є свідченням беззастережного прийняття умов, викладених у даному Договорі, та вважаються акцептуванням цієї оферти Учасником. Умови даного Договору є однаковими для всіх Учасників та полягають у наступному:</p>

                        <h3>1. ЗАГАЛЬНІ ПОЛОЖЕННЯ</h3>

                        <h4 class="text-decoration-underline">1.1 Основні поняття та визначення термінів:</h4>

                        <p>1.1.1.	Публічний договір – це правочин про надання та отримання послуг з організації участі у спортивно-масовому розважальному заході, який встановлює однакові для всіх Учасників умови надання цих послуг на умовах публічної оферти з моменту її акцептування Учасником (надалі –
                            «Договір»).
                        </p>

                        <p>1.1.2.	Публічна оферта (пропозиція) - пропозиція Організатора (викладена на його інтернет-сторінці), адресована будь-якій фізичній особі у відповідності зі статтею 641 Цивільного кодексу України, укласти з ним договір на умовах, визначених у ній.</p>

                        <p>1.1.3.	Акцепт (прийняття пропозиції) - повне й беззастережне прийняття Учасником умов Публічної оферти, викладених в цьому Договорі, шляхом заповнення заявки на сайті Організатора та/або оплати стартового внеску. Договір, укладений Учасником за допомогою акцепту публічної оферти, має юридичну чинність згідно ст. 642 Цивільного кодексу України і прирівнюється до договору, укладеному сторонами у письмовій формі. При поданні заявки та/або здійснення повної чи часткової оплати Учасник вважається таким, що ознайомлений та згідний з умовами цієї публічної оферти.</p>

                        <p>1.1.4.	Договір – цей Договір регулює взаємні відносини між Виконавцем та Замовником у процесі надання послуг. Згідно умов Договору ГО «Швидкий біг», як Виконавець, зобов’язується надавати, за умови наявності у нього таких можливостей, послуги з організації участі у спортивно-масовому розважальному заході кожному Замовнику, який до нього звернеться, а Замовник зобов’язується своєчасно та у повному обсязі оплачувати їхню вартість та неухильно дотримуватись вимог участі. Виконавець встановлює однакові для всіх Замовників умови надання цих послуг, крім тих, кому за законом надані відповідні пільги. Договір доводиться до відома усіх Учасників шляхом його розміщення (оприлюднення) на офіційному сайті Організатор https://flashrun.org/. Даний Договір прирівнюється до укладання Сторонами двостороннього письмового Договору на умовах, що викладені в цій публічній оферті.</p>

                        <p>1.1.5.	Реєстрація на участь у Заході (далі - Реєстрація) – добровільне волевиявлення Учасника, що полягає в ознайомленні із інформацією наведеною на сайті, умовами Заходу та умовами цього Договору, згодою із ними та вчиненням дій із подання Заявки та здійснення оплати у розміри та строки, зазначені на сайті для їх вчинення. Реєстрація передбачає попереднє обрання виду Заходу, з переліку наведеного на сайті, відповідно до реєстраційних тарифів, встановлених Організатором та зазначених на сайті, та дистанційної оплати стартового внеску. Факт реєстрації Учасником забігу на сайті Організатора означає, що Учасник підтверджує факт прийняття ним публічної оферти (пропозиції) про приєднання до цього Договору, ознайомлений з його змістом, повністю погоджується з усіма його умовами та свідомо без жодного примусу уклав цей Договір. Будь-яка особа допущена до участі у Заході вважається його Учасником, а отже, такою, що повністю приймає умови цього Договору та умови участі у Заході. Обов’язок ознайомитись із повними умовами участі у Заході та умовами цього Договору покладається на Учасника.</p>

                        <p>1.1.6.	Послуги – організаційні, інформаційні, посередницькі та інші послуги, перелік яких встановлений цим Договором, Регламентом Заходу та іншими нормативними документами Організатора, інформація про зміст яких наводиться на сайті Організатора, які відкриті для публічного ознайомлення, а отже, до яких Учасник має вільний доступ.</p>

                        <p>1.1.7.	Додаткові послуги – послуги, які можуть надаватися на території проведення Заходу на підставі окремих договорів Організатором чи третіми особами.</p>

                        <p>1.1.8.	Захід – спортивно-масові змагання, що проводяться у формі забігів з перешкодами, з метою популяризації та пропаганди спорту та здорового способу життя в Україні, розвитку масового спорту в Україні. Фактичними організаторами Заходів виступають ГО «Швидкий Біг» та/або інші особи.</p>

                        <p>1.1.9.	Учасник – фізична особа, яка виявила бажання взяти участь в спортивно-масовому Заході, з переліку, що наведений на сайті Організатора, та уклала Договір з Організатором шляхом Реєстрації на сайті Організатора та сплати стартового внеску дистанційним способом.</p>

                        <p>1.1.10.	Оргкомітет – орган сформований Організатором та/або організатором Заходів з метою оцінювання результатів його проведення.</p>

                        <p>1.1.11.	Правила реєстрації та участі – документ який регламентує умови реєстрації та участі у конкретному Заході.</p>

                        <p>1.1.12.	Гід учасника забігу – документ, у якому викладені детальні інструкції для Учасника, стосовно участі у Заході.</p>

                        <p>1.1.13.	Регламент проведення Заходу – документ, розміщений на сайті організатора, у якому детально визначені правила, умови участі та інша необхідна інформація про конкретний спортивно-розважальний Захід. Дотримання умов Регламенту проведення Заходу є обов’язковим для всіх його Учасників. Регламент затверджується Оргкомітетом, який може вносити в нього зміни та доповнення, які доводяться до Учасників шляхом розміщення відповідної інформації на сайті.</p>

                        <p>1.1.14.	Відмова Учасника від претензій – документ, обов’язковий для підписання Учасником перед допуском до участі у будь-якому із Заходів, що містить вираження його поінформованості стосовно можливих наслідків такої участі.</p>

                        <p>1.1.15.	Договір страхування від нещасного випадку – угода, що укладається між Учасником та страховою компанією на умовах, що узгоджуються між ними самостійно, стосовно страхових виплат у разі настання нещасного випадку під час участі у Заході, що може призвести до розладу здоров`я (травмування, ушкодження, порушення функцій організму тощо) або спричинити смерть.</p>

                        <p>1.1.16.	Стартовий внесок – оплата послуг Організатора для організації участі у Заході, яку Учасник має сплатити при Реєстрації на участь у Заході.</p>

                        <p>1.1.17.	Стартовий пакет учасника – набір послуг який отримує Учасник після Реєстрації.</p>

                        <p>1.1.18.	Квиток про реєстрацію –документ, що підтверджує Реєстрацію та оплату Стартового пакету Учасником.</p>

                        <p>1.1.19.	Співорганізатори (співвиконавці) – треті особи, які надають додаткові послуги, а також спонсори, промоутери та їх агенти, ГО «ШВИДКИЙ БІГ» та інші.</p>

                        <p>1.1.20.	Офіційний сайт Організатора (чи просто – сайт) – офіційна веб-сторінка Організатора в мережі Інтернет, яка знаходиться за адресою: https://flashrun.org/ (постійно доступна для ознайомлення), та є джерелом інформування Учасників.</p>

                        <p>1.1.21.	Сторона — Організатор або Учасник в залежності від контексту.</p>

                        <p>1.1.22.	Сторони — Організатор та Учасник.</p>

                        <h3>2.	АКЦЕПТУВАННЯ ДОГОВОРУ</h3>

                        <p>2.1.	Для фізичних осіб підтвердженням повного та безумовного акцептування даної публічної оферти є подання Заявки на участь у заході, оплата стартового внеску та оформлення Реєстрації на участь у спортивно-масовому Заході.</p>

                        <p>2.2.	Договір вважається укладеним з моменту отримання Організатором Реєстраційних даних від Учасника повної оплати вартості зазначеної на Офіційному сайті Організатора Учасником замовлених Послуг чи вчинення інших дій, передбачених договором, що свідчать про згоду дотримуватися умов Договору. Оформлення Договору у вигляді окремого письмового документу не вимагається. Договір має юридичну силу відповідно до ст. 633 ЦК України і є рівносильним Договору, підписаному сторонами.</p>

                        <p>2.3.	Учасник дає згоду дотримуватися умов Договору та згоду отримувати Послуги на встановлених Організатором умовах з моменту надання Організатору реєстраційних даних та оплати замовлених Послуг.</p>

                        <p>2.4.	Укладаючи Договір, Учасник автоматично погоджується з повним та безумовним прийняттям положень Договору, зокрема, стосовно вартості участі у Заході.</p>

                        <p>2.5.	Кожна Сторона гарантує іншій Стороні, що володіє необхідною дієздатністю, а рівно всіма правами і повноваженнями, необхідними і достатніми для укладання і виконання даного Договору відповідно до його умов.</p>

                        <p>2.6.	Всі умови Договору, викладені в цій Публічній оферті, є обов’язковими для Сторін. Перед початком користування Послугами кожний Учасник зобов’язаний ознайомитися з умовами цього Договору, Регламентом Заходу, Відмовою Учасника від претензій, Договором страхування від нещасного випадку, що розміщені (оприлюднені) на Офіційному сайті Організатора.</p>

                        <p>2.7.	Особа не згодна з умовами Договору не може бути його Стороною та повинна утриматися від Реєстрації на участь у Заході. Особа, яка здійснила Акцепт Договору, підтверджує своє ознайомлення та згоду з усіма умовами даного Договору та вважається Учасником відповідно до його положень.</p>

                        <p>2.8.	Учасник може самостійно у будь-який момент ознайомитись із умовами Договору на Офіційному сайті Організатора та зобов’язаний періодично перечитувати інформацію із сайту, зокрема, з метою ознайомлення із важливою інформацією стосовно участі у Заході, яка може періодично вноситись.</p>

                        <h3>3.	ПРЕДМЕТ ДОГОВОРУ</h3>

                        <p>3.1.	Організатор, згідно умов цього Договору, а також інформації, зазначеної на сайті Організатора, зобов’язується надати комплекс послуг з організації участі у спортивно-масовому розважальному Заході, обраному Учасником, а Учасник зобов’язується прийняти та оплатити ці послуги в обсязі та на умовах визначених цим Договором та інформації, зазначеної на сайті Організатора щодо обраного Заходу.</p>

                        <p>3.2.	Загальні умови та порядок надання Послуг встановлюються законодавством України, цим Договором та Регламентом конкретного Заходу.</p>

                        <p>3.3.	Під комплексом Послуг за цим Договором Сторони розуміють надання Учаснику можливості прийняти участь у змаганнях (забігах), зазначених на Офіційному сайті Організатора, користування кімнатою для переодягання, отримання «пакету учасника» у який входить: номер учасника, а також та медаль фінішера, у разі досягнення Учасником фінішу.</p>

                        <h3>4.	УМОВИ НАДАННЯ ПОСЛУГ</h3>

                        <p>4.1.	Для отримання та користування Послугами передбаченими цим Договором, Учасник зобов’язаний ознайомитися з умовами цього Договору, Правилами реєстрації та участі, Регламентом Заходу та пройти процедуру Реєстрації для участі у Заході через сервіс Офіційного сайту Організатора.</p>

                        <p>4.2.	При Реєстрації на сайті Організатора Учасник забігу зобов’язаний:</p>

                        <p>4.2.1.	обрати Захід в якому він бажає прийняти участь (обрати вид забігу та час його старту);</p>

                        <p>4.2.2.	заповнити анкетні дані:</p>
                        <p>	прізвище, ім'я Учасника забігу або вказаної ним особи (одержувача реєстрації);</p>
                        <p>	адреса електронної пошти, на яку слід доставити Квиток про реєстрацію;</p>
                        <p>	контактний телефон Учасника забігу;</p>
                        <p>	ім'я та контактний телефон особи-поручителя (на випадок, якщо немає зв'язку з Учасником забігу),</p>
                        <p>	стать Учасника забігу та біометричні характеристики Учасника забігу, які необхідні Організатору для дотримання всіх умов і регламенту проведення самого заходу.</p>
                        <p>4.3.	Якщо Організатору необхідна додаткова інформація, він має право запросити її у Учасника забігу. У разі ненадання необхідної інформації Учасником забігу, Організатор має право відмовити Учаснику в подальшій реєстрації.</p>
                        <p>4.4.	Організатор не несе відповідальності за зміст і достовірність інформації, наданої Учасником забігу при оформленні Реєстрації. Організатор залишає за собою право здійснювати запис телефонних розмов із Учасником і протоколювання даних про хід Реєстрації, а також, має право вільно використовувати отриману інформацію у разі виникнення можливих спірних ситуацій.</p>
                        <p>4.5.	Учасник забігу несе самостійну відповідальність за достовірність наданої інформації при оформленні Реєстрації.</p>
                        <p>4.6.	Зміна часу старту забігу та/або анкетних даних Учасника після проходження процедури Реєстрації можлива лише за погодженням із Організатором та можлива виключно до закінчення часу наданого Організатором для відкритої Реєстрації на конкретний Захід. Організатор залишає за собою право встановлення та стягнення додаткової оплати за проведення такої зміни.</p>
                        <p>4.7.	У разі, якщо зареєстрований Учасник з будь-яких причин не може взяти участь у Заході, Стартовий внесок поверненню не підлягає.</p>
                        <p>4.8.	Оргкомітет має право призупинити або повністю припинити Реєстрацію без попередження, в разі досягнення ліміту кількості Учасників, змінити час старту та кількість Учасників забігу, що не вважається істотними змінами умов Договору та не тягне за собою штрафних санкцій.</p>
                        <p>4.9.	Реєстрація Учасника автоматично анулюється, якщо при Реєстрації ним були надані неточні та/або помилкові чи недостовірні дані. В разі анулювання Реєстрації з причин зазначених у даному пункті Договору, грошові кошти поверненню не підлягають.</p>

                        4.10.	Після проходження Реєстрації Учасник отримує на електронну пошту, вказану при реєстрації, підтвердження про оплату у вигляді Квитка про реєстрацію.
                        <p>4.11.	Учасник вважається зареєстрованим, якщо він належним чином оформив Реєстрацію та сплатив Стартовий внесок.</p>
                        <p>4.12.	Після Реєстрації Учасник отримує Стартовий пакет Учасника відповідно до обраного Заходу та підписує обов’язкову Відмову Учасника від претензій.</p>
                        <p>4.13.    Організатор не несе відповідальності за будь-які додаткові витрати, пов’язані з підготовкою Учасника до заходу, включаючи витрати на проїзд та проживання.</p>
                        <p>4.14.	Зареєстровані учасники не мають права передавати (продавати) своє право на участь у Заході іншим особам.</p>
                        <p>4.15.	Організатор залишає за собою право відмовити у реєстрації Учаснику, без пояснення причин такої відмови.</p>
                        <p>4.16.	Всі ризики, пов’язані з участю в забігах з перешкодами, що проводяться із використанням Знаку для товарів і послуг «ШВИДКИЙ БІГ», Учасник несе самостійно. Організатор не несе відповідальності за смерть, травми, інші фізичні чи психологічні ушкодження Учасника. Організатор не здійснює жодних компенсацій збитки, понесених Учасником чи іншими особами унаслідок участі в Заходах.</p>
                        <p>4.17.	Організатор не несе відповідальності за затримки, перенесення або відміну забігів у випадку «несприятливих погодних умов» чи «надзвичайних ситуацій». Визначення «несприятливих погодних умов» та «надзвичайних ситуацій» належить виключно до компетенції Організатора. При цьому грошові кошти, отримані від Учасників не повертаються, а зараховуються у якості платежу на нову дату організації аналогічного Заходу.</p>

                        <h3>5.	ПРАВА ТА ОБОВЯЗКИ СТОРІН</h3>
                        <h4>5.1.	Учасник має право:</h4>

                        <p>5.1.1.	Отримати Послуги на умовах та в порядку передбаченими даним Договором.</p>
                        <p>5.1.2.	Вимагати від Організатора належного виконання своїх зобов’язань за цим Договором.</p>
                        <p>5.1.3.	Прийняти участь у обраному Заході згідно умов Договору та Регламенту Заходу після Реєстрації.</p>
                        <p>5.1.4.	Користуватися, додатковими послугами Організатора, у разі їх наявності, відповідно до прейскуранту цін Організатора.</p>
                        <p>5.1.5.	Повідомляти Організатора про свої побажання, пропозиції, зауваження щодо проведення Заходу.</p>
                        <p>5.1.6.	За власним бажанням приймати участь, або відмовитися від участі у Заході, на умовах визначених цим Договором та/або на додаткових умовах запропонованих Організатором.</p>
                        <p>5.1.7.	Отримати Стартовий пакет учасника на місці проведення Заходу.</p>

                        <h4>5.2.	Учасник зобов’язаний:</h4>
                        <p>5.2.1.	Належно виконувати взяті на себе зобов’язання за цим Договором.</p>
                        <p>5.2.2.	Прийняти та оплатити надані Організатором послуги в порядку та на умовах визначеними цим Договором.</p>
                        <p>5.2.3.	Перед початком Реєстрації на обраний Захід, ознайомитися з переліком послуг, що надаються Організатором, ознайомитися з умовами їх надання, Регламентом Заходу, Відмовою Учасника від претензій, Договором страхування від нещасного випадку, що розміщені (оприлюднені) на Офіційному веб-сайті Організатора, а в разі виникнення додаткових запитань – до оформлення Реєстрації звернутися до Організатора за додатковою інформацією.</p>
                        <p>5.2.4.	Неухильно дотримуватися вимог даного Договору, правил безпеки та вимог елементарної розумності.</p>
                        <p>5.2.5.	Користуватися Послугами особисто, не передавати (продавати) права отримані за даним Договором третім особам.</p>
                        <p>5.2.6.	Своєчасно та в повному обсязі оплачувати додаткові послуги, у разі виявлення бажання скористатись ними.</p>
                        <p>5.2.7.	Відвідувати Захід у визначений час згідно з Регламентом заходу та обраного виду та часу забігу.</p>
                        <p>5.2.8.	Дбайливо та охайно ставитися до майна, що знаходиться на території проведення Заходу, під час користування Послугами, визначеними даним Договором.</p>
                        <p>5.2.9.	Нести матеріальну та моральну відповідальність за нанесену шкоду Організатору, його персоналу, Оргкомітету чи іншим учасникам заходу та їх майну.</p>
                        <p>5.2.10.	До початку користування Послугами визначеними даним Договором, пройти медичне обстеження та отримати консультації лікаря щодо можливості зайняття фізичними вправами та навантаженням.</p>
                        <p>5.2.11.	За наявності хронічних, інфекційних, дерматологічних захворювань, захворювань внутрішніх органів, захворювань кровоносної, нервової системи, опорно-рухового апарату та/або інших захворювань, що можуть призвести до погіршення стану здоров’я під час фізичних навантажень або після них, а також у разі, якщо вони можуть становити загрозу життю чи здоров’ю третіх осіб, - утриматись від участі у Заході.</p>
                        <p>5.2.12.	Самостійно і відповідально контролювати стан свого здоров’я, не ставити під загрозу здоров’я та життя своє та оточуючих.</p>
                        <p>5.2.13.	Перед участю у Заході надавати адміністрації Заходу посвідчення особи, що підтверджує вік та особу Учасника. Громадяни іноземних держав зобов’язані надати медичну страховку, яка має покривати можливі травми отримані від участі у спортивно-розважальних заходах.</p>

                        <h4>5.3.	Організатор має право:</h4>
                        <p>5.3.1.	Вимагати від Учасника належного та повного виконання взятих на себе зобов’язань за цим Договором.</p>
                        <p>5.3.2.	Отримати своєчасну та в повному обсязі оплату наданих Послуг.</p>
                        <p>5.3.3.	Вимагати від Учасника відшкодування матеріальної та моральної шкоди в разі завдання збитків Організатору, майну Організатора, його працівникам, волонтерам чи іншим особам.</p>
                        <p>5.3.4.	Не допускати Учасника на територію проведення Заходу і припинити надання Послуг, якщо зовнішній вигляд останнього дає підстави вважати, що Замовник знаходиться під впливом алкогольних, наркотичних, сильнодіючих лікарських засобів, здатних впливати на його поведінку та стан свідомості.</p>
                        <p>5.3.5.	Не допускати Учасника на територію проведення Заходу і припинити надання Послуг, якщо Учасник своїми діями порушує правила поведінки, загрожує життю та здоров’ю, честі та гідності інших Учасників та/або працівників Організатора, чи третіх осіб.</p>
                        <p>5.3.6.	В односторонньому порядку відмовитися від виконання цього Договору, або призупинити його виконання за наявності підстав вважати, що надання Послуг може заподіяти шкоду Учаснику або спричинити інші несприятливі для нього самого або третіх осіб наслідки, що буде вважатись неможливістю виконання цього Договору з вини Учасника та не потягне будь-якої відповідальності для Організатора.</p>
                        <p>5.3.7.	У випадку припинення надання Послуг Учаснику з причин передбачених п.п. 5.3.5., 5.3.6. цього Договору, Учасник вважається дискваліфікованим. Дискваліфікований Учасник не отримує «пакету учасника», а при наступних забігах такому учаснику буде відмовлено у Реєстрації.</p>
                        <p>5.3.8.	Змінити умови цього Договору, а також вартість організації участі в Заходах у односторонньому порядку попередньо розмістивши інформацію на офіційному сайті Організатора. </p>
                        <p>5.3.9.	Обмежувати використання Учасником будь-якого обладнання та доступ Учасника до будь- якого приміщення.</p>
                        <p>5.3.10.	Без погодження із Учасником самостійно встановлювати і скасовувати різноманітні знижки, маркетингові акції, пільги, засновувати дисконтні програми тощо.</p>
                        <p>5.3.11.	З метою безпечного і ефективного надання послуг, вимагати від Учасника надання будь- якої інформації та документів, у тому числі медичних, що мають відношення до надання Послуг за цим Договором.</p>
                        <p>5.3.12.	Без узгодження із Учасником самостійно, з метою безпечного і ефективного надання послуг та контролю за якістю Послуг що надаються, здійснювати відео та фото зйомку під час проведення Заходу.</p>
                        <p>5.3.13.	Виконавець не несе відповідальності за шкоду, заподіяну життю та здоров’ю Учасника під час користування Послугами, визначеними даним Договором.</p>

                        <h4>5.4.	Організатор зобов’язаний :</h4>

                        <p>5.4.1.	Надавати Учаснику Послуги згідно умов цього Договору.</p>
                        <p>5.4.2.	Після Реєстрації та здійснення оплати Стартового внеску Учасником, надіслати йому на електронну пошту, вказану при реєстрації, квиток про реєстрацію, яка підтверджує права Учасника на отримання Послуг відповідно до цього Договору.</p>
                        <p>5.4.3.	Доводити до відома Учасника про всі акції, знижки, зміни умов Договору, зміни дати та часу проведення Заходу, тощо шляхом розміщення відповідної інформації на сайті https://flashrun.org/.</p>
                        <p>5.4.5.	В разі виявлення порушень будь-яким з Учасників чи третіх осіб правил поведінки під час проведення Заходу, умов Регламенту Заходу чи умов цього Договору, вжити всіх можливих заходів щодо припинення цього порушення.</p>
                        <p>5.4.6.	Організатор зобов'язується організувати участь Учасника у обраному Заході на умовах цього Договору.</p>

                        <p>5.4.7.	Організатор надає Учаснику Заходу повну і достовірну інформацію про умови реєстрації, включаючи інформацію про супутні товари, що можуть бути придбані під час проведення Заходу, та за наявності змоги, розмістити в описі кожного Заходу на сайті: http://www.racenation.ua/.</p>

                        <h3>6.	ВАРТІСТЬ ПОСЛУГ ТА ПОРЯДОК РОЗРАХУНКІВ</h3>
                        <p>6.1.	Вартість Послуг за цим Договором встановлюється відповідно до обраного Учасником Заходу, виду забігу, терміну реєстрації та визначається у Регламенті проведення конкретного Заходу та вказана на сайті: https://flashrun.org/. </p>
                        <p>6.2.	Оплата Послуг здійснюється Учасником в день проведення Реєстрації в розмірі 100 % від вартості Стартового внеску обраного виду забігу.</p>
                        <p>6.3.	Всі розрахунки за цим Договором здійснюються у національній валюті України - гривні - в безготівковій формі, шляхом переказу грошових коштів на банківський рахунок Організатора.</p>
                        <p>6.4.	Кошти сплачені Учасником відповідно до даного розділу Договору поверненню не підлягають, за виключенням випадків передбачених даним Договором, Регламентом Заходу чи за додатковою узгодженістю Сторін.</p>
                        <p>6.5.	Організатор має право в односторонньому порядку змінити вартість послуг з організації участі у будь-якому Заході.</p>
                        <p>6.6. Зміна Організатором вартості вже оплаченого у повному розмірі Учасником Стартового внеску не допускається.</p>
                        <p>6.7.	Зобов'язання Учасника забігу з оплати Стартового внеску вважаються виконаними з моменту надходження грошових коштів на розрахунковий рахунок, вказаний Організатором.</p>

                        <h3>7.	СТРОК ДІЇ ДОГОВОРУ, ЗМІНИ ТА ДОПОВНЕННЯ.</h3>

                        <p>7.1.	Термін дії оферти не обмежений і співпадає зі строком її розміщення на Офіційному сайті Організатора, якщо інше не зазначено на самому сайті.</p>
                        <p>7.2.	Для Учасника цей Договір набуває чинності з моменту його Реєстрації на обраний Захід та оплати повного розміру Стартового внеску Учасником відповідно до вартості обраного забігу.</p>
                        <p>7.3.	Строк дії Договору з Учасником, який акцептував дану оферту, закінчується в момент закінчення участі Учасника в обраному Заході.</p>
                        <p>7.4.	В разі порушення умов Договору зі сторони Учасника, Договір може бути достроково припинений/розірваний Організатором в односторонньому порядку без повернення сплачених коштів Учаснику, при цьому послуги вважаються наданими в повному обсязі та належним чином.</p>
                        <p>7.5.	Договір може бути достроково припинений/розірваний за ініціативи Учасника з підстав передбачених чинним законодавством України.</p>
                        <p>7.6.	Організатор самостійно у відповідності та на виконання вимог чинного законодавства України визначає умови Договору. Організатор самостійно має право змінити умови Договору з обов’язковим повідомленням про це Учасника на Офіційному сайті Організатора.</p>
                        <p>7.7.	При внесенні змін до цього Договору, Організатор розміщує повідомлення про такі зміни на своєму Сайті не менше ніж за 10 (десять) календарних днів до вступу змін в силу, окрім випадків, для яких Договором встановлений інший строк та/або порядок повідомлення про внесення змін, а також випадків, у яких Організатор не зобов’язаний повідомляти Учасника про внесення змін. При цьому Організатор гарантує та підтверджує, що розміщена на Сайті Організатора поточна редакція тексту цього Договору є дійсною.</p>
                        <p>7.8.	В договір можуть бути внесені зміни та доповнення шляхом розміщення відповідної інформації на сайті https://flashrun.org/. Учасник зобов’язаний слідкувати за змінами, розміщеними на зазначеному сайті та періодично відвідувати його.</p>

                        <h3>8.	ВІДПОВІДАЛЬНІСТЬ СТОРІН</h3>

                        <p></p>8.1.	За невиконання або неналежне виконання зобов’язань за цим Договором Сторони несуть відповідальність згідно чинного законодавства України.
                        <p></p>8.2.	Сторони не несуть відповідальності за порушення своїх зобов’язань за цим Договором, якщо воно сталося не з їх вини. Сторона вважається не винуватою, якщо вона доведе, що вжила всіх необхідних заходів для належного виконання свого зобов’язання за цим Договором.
                        <p></p>8.3.	Організатор не несе відповідальності в разі вчинення дії/бездіяльності третіх осіб, що не є працівниками ГО «ШВИДКИЙ БІГ» (власників території на якій має відбутися чи відбувається Захід, представників органів державної влади, органів місцевого самоврядування, комунальних служб, Співорганізаторів, громадських організацій тощо), внаслідок яких Виконавець не зміг виконати свої зобов’язання за цим Договором.
                        <p></p>8.4.	Учасник несе самостійну і особисту відповідальність за своє життя і здоров’я.
                        <p></p>8.5.	Організатор не несе відповідальність за шкоду, нанесену життю та здоров’ю Учасника.

                        <p>8.6.	Організатор не несе відповідальність за стан здоров'я Учасника під час споживання Послуг визначених даним Договором.</p>
                        <p>8.7.	Виконавець не несе відповідальність за шкоду завдану здоров’ю або майну Учасника діями третіх осіб або діями самого Учасника.</p>
                        <p>8.8.	У разі нанесення матеріального збитку, псування або втрати майна з вини Учасника, останній зобов'язаний відшкодувати повну вартість нанесеного збитку на підставі рахунку наданому Організатором.</p>
                        <p>8.9.	Учасник повинен дбати про збереження своїх особистих речей. Організатор не несе відповідальність за збереження особистих речей Учасника.</p>
                        <p>8.10.	Усі спірні ситуації, суперечки й розбіжності, що виникли з приводу укладення чи виконання умов даного Договору, підлягають вирішенню шляхом переговорів. Якщо Сторони під час переговорів не досягли згоди, всі спірні відносини вирішуються у судовому порядку встановленому законодавством України.</p>

                        <h3>9.	ФОРС-МАЖОР</h3>

                        <p>9.1.	Сторона звільняється від відповідальності за невиконання або неналежне виконання обов’язків по цьому Договору, якщо воно стало слідством дії обставин непереборної сили, а саме: стихійного лиха, війни і військові дії, страйку (-ів), диверсії, аварії, пожежі, масового безладдя і заворушень, актів органів державної влади або управління, і т.д., при умові, що дані обставини безпосередньо вплинули на виконання цього Договору. При цьому строк виконання зобов’язань за цим Договором продовжується на час дії вказаних обставин та їх наслідків.</p>
                        <p>9.2.	Сторона яка не може виконати свої зобов’язання в силу обставин визначених п. 9.1. цього Договору повинна в строк не більше 15 календарних днів повідомити про це іншу Сторону в письмовій формі. Несвоєчасне (пізніше 15 календарних днів) повідомлення про обставини непереборної сили позбавляє відповідну сторону права посилатися на них для виправдання невиконаних своїх зобов’язань. Повідомлення Організатора про настання форс-мажорних обставин можливе, поміж інших, шляхом розміщення відповідної інформації на Офіційному сайті Організатора.</p>
                        <p>9.3.	Підтвердженням наявності та тривалості форс-мажорних обставин є довідки, видані відповідними органами державної влади України.</p>

                        <h3>10.	ОБМЕЖЕННЯ ВІДПОВІДАЛЬНОСТІ</h3>

                        <p>10.1.	ГО «ШВИДКИЙ БІГ» не є медичним або іншим закладом, що надає послуги з медичного забезпечення, не оцінює, не спостерігає та не контролює стан здоров’я Учасника.</p>
                        <p>10.2.	Учасник несе самостійну відповідальність за своє життя, стан здоров’я під час участі у Заході.</p>
                        <p>10.3.	Виконавець надає послуги виходячи з того, що Замовник до початку споживання Послуг та участі у Заході пройшов медичне обстеження і не має протипоказань до заняття спортом.</p>
                        <p>10.4.	Учасник приймає участь у Заході відповідно до дати та часу його проведення, зазначеного Організатором на сайті і/та/або обраної Учасником категорії та виду забігу.</p>
                        <p>10.5.	Участь у спортивно-масовому Заході можлива лише за наявності Квитка про реєстрацію.</p>
                        <p>10.6.	Учаснику слід пильно стежити за своїми особистими речами та одягом і не залишати їх без нагляду. За загублені та/або залишені без нагляду речі, Організатор відповідальності не несе.</p>
                        <p>10.7.	Перебування в службових приміщеннях без відповідного дозволу Організатора категорично забороняється.</p>
                        <p>10.8.	У разі поганого самопочуття або отримання травми Учасник зобов’язаний негайно припинити участь у змаганнях та звернутися по медичну допомогу.</p>
                        <p>10.9.	Організатор не несе відповідальності за дії третіх осіб та взаєморозрахунки між Учасником та такими третіми особами, у томі числі і з Співвиконавцями, а також не відповідає за зобов’язаннями стороною яких він не є.</p>

                        <h3>11.	ІНШІ УМОВИ</h3>

                        <p></p>11.1.	Організатором можуть надаватися Учасникам додаткові послуги, які не передбачені п. 3.1. даного Договору та не входять до предмету цього Договору.
                        <p></p>11.2.	Додаткові послуги можуть надаватися Організатором на підставі окремих договорів.
                        <p></p>11.3.	Усі правовідносини, що виникають з цього Договору або пов'язані із ним, у тому числі пов'язані із дійсністю, укладенням, виконанням, зміною та припиненням цього Договору, тлумаченням його умов, визначенням наслідків недійсності або порушення Договору, регламентуються цим Договором та відповідними нормами чинного в Україні законодавства, а також застосовними до таких правовідносин звичаями ділового обороту на підставі принципів добросовісності, розумності та справедливості.

                        <p>11.4.	Заповненням відповідної анкети при Реєстрації та оплатою послуг, а саме оплатою Стартового внеску, Замовник підтверджує, що він ознайомлений в повному обсязі зі своїми правами та обов’язками передбаченими даним Договором, Регламентом обраного Заходу, а також з правами і обов’язками визначеними Законом України «Про захист прав споживачів».</p>
                        <p>11.5.	Сторони засвідчують, що цей Договір укладений при повному розумінні Сторонами його умов та термінології із дотриманням всіх загальних вимог, що є необхідними для чинності правочину згідно ст. 203 Цивільного кодексу України.</p>
                        <p>11.6.	Учасник гарантує, що має належний стан здоров’я для користування Послугами передбаченими цим Договором і несе повну, самостійну відповідальність за погіршення стану здоров’я під час та після користування Послугами та під час дії даного Договору.</p>
                        <p>11.7.	Учасник погоджується з тим, що участь у Заході можлива лише після оформлення страхування свого життя та здоров’я та надання підтвердження здійснення такого страхування Організатору чи його представнику. Відсутність чи ненадання підтвердження такого страхування є істотним порушенням умов Договору, що тягне за собою неможливість участі Учасника у Заході з його вини. Грошові кошти сплачені Учасником за надання Послуг поверненню не підлягають.</p>
                        <p>11.8.	Заповненням анкети при Реєстрації на сайті Організатора із зазначенням персональних даних  та  оплатою  послуг  (Стартового  внеску)  Організатора,  Учасник  надає  свою  згоду  та  дозвіл Організатору та Співорганізаторам  на збір та обробку своїх персональних даних відповідно  до п. 6 ст. 6 та П.1.1. ст. 11 Закону України «Про захист персональних даних» з метою надання Послуг. Наведена вище інформація також може надаватись третім особам, безпосередньо задіяним в обробці цих даних, а також в інших випадках прямо передбачених законодавством.</p>
                        <p>11.9.	З метою забезпечення безпеки на території проведення Заходу Учасник надає свою безумовну згоду на проведення фото та відео зйомки під час його участі у Заході (крім санітарних зон: душових, туалету та роздягалень). Також Учасник надає дозвіл використовувати Організатором та Співорганізаторами, їх працівниками та контрагентами фотографій, відеозаписів, звукозаписів або будь-яких інші записів знятих під час проведення Заходу, у тому числі і у рекламних цілях без оплат та будь-яких компенсацій.</p>
                        <p>11.10.	Належним повідомленням та доведенням інформації до споживачів Послуг визначених цим Договором вважається розміщення відповідної інформації на сайті: https://flashrun.org/.</p>
                        <p>11.11.	Датою укладення цього Договору вважається дата проведення Реєстрації Учасника та повна оплата Послуг.</p>
                        <p>11.12.	Місцем укладення цього Договору є місто Київ.</p>
                        <p>11.13.	Знак для товарів і послуг «ШВИДКИЙ БІГ». Будь-яке використання, відтворення, повне або часткове копіювання, а також компонування елементів чи видозміна ТМ у будь-якій формі чи спосіб, без згоди Правовласника – забороняється.</p>


                        <h3>12.	РЕКВІЗИТИ ОРГАНІЗАТОРА</h3>

                        <p>Громадська організація «ШВИДКИЙ БІГ», код ЄДРПОУ 44225232.</p>
                        <p>Адреса для надсилання скарг (заяв, звернень) до Організатора, порядок і терміни розгляду заяв та скарг, а також поштові та електронні адреси, за якими Учасник може звернутися з питань надання послуг до Організатора можна дізнатись на сайті https://flashrun.org/ або за т. (097) 9355098 в робочі дні з 10:00 до 18:00.</p>
                        <p>У випадку звернення Клієнта до Організатора за допомогою телефону Клієнт погоджується із тим, що телефонна розмова може бути записана з метою контролю якості обслуговування Клієнта.</p>
                        <p>Юридична адреса: 03056, м. Київ, вулиця Виборзька, будинок 22-А, квартира 32. Найменування отримувача: ГО ШВИДКИЙ БІГ Код отримувача: 44225232 Рахунок отримувача: UA033154050000026009052337925 Назва банка: ХМЕЛЬНИЦЬКА ФIЛIЯ АТ КБ "ПРИВАТБАНК" Платник єдиного податку.</p>
                        <p>Голова ГО «ШВИДКИЙ БІГ»: Кріль Сніжана Василівна</p>

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
