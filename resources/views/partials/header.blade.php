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
