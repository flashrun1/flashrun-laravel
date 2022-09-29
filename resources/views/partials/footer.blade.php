<footer class="footer">
    <div class="footer-main">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-2 col-md-3 text-center text-md-left">
                    <div class="copy">©2022 @php echo \Illuminate\Support\Str::upper(env('APP_NAME')) @endphp</div>
                </div>
                <div class="col-lg-8 col-md-6">
                    <ul class="nav nav-menu navbar-wrap justify-content-center">
                        <li>
                            <a href="#registration" class="nav-link">РЕЄСТРАЦІЯ</a>
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
                            <a href="{{ asset('/files/oferta.docx') }}" class="nav-link oferta">ОФЕРТА</a>
                        </li>
                        <li>
                            <a href="#rules" data-toggle="modal" data-target="#rules" class="nav-link">ПРАВИЛА ТА УМОВИ</a>
                        </li>
                        <li>
                            <a href="#policy" data-toggle="modal" data-target="#policy" class="nav-link">ПОЛІТИКА КОНФІДЕНЦІЙНОСТІ</a>
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
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <img height="30" src="{{ asset('/images/visa-logo.svg') }}" alt="">
                    <img height="30" src="{{ asset('/images/mastercard-logo.svg') }}" alt="">
                </div>
            </div>
        </div>
    </div>
</footer>
