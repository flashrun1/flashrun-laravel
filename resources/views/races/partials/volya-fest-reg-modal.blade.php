<div class="modal fade" id="registr_modal-volyaFest" tabindex="-1" aria-labelledby="registr_modal-volyaFest" aria-modal="true"
     role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="section-title">РЕЄСТРАЦІЯ <span class="sub-title">«Воля.FEST»</span></h2>
                <h3 class="title">ЛІСОГРИНІВЕЦЬКИЙ ЛІС</h3>
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
                    <input type="hidden" name="race_id" value="{{\App\Models\Race::getIdBySlug('freedom-fest-2023')}}">
                    <input type="hidden" name="race_name" value="{{\App\Models\Race::getNameBySlug('freedom-fest-2023')}}">

                    <div class="race-subtype-content">

                    </div>

                    <div class="form-group">
                        <div class="btn-wrap text-center">
                            <button type="submit" class="btn">ЗАРЕЄСТРУВАТИСЬ</button>
                            <a href="{{ asset('/files/freedom-fest-2023-polozhennya.pdf') }}" target="_blank" class="btn btn-invert">Положення змагань</a>
                        </div>
                    </div>
                </form>


                <div class="ocr-subtype-wrapper d-none">
                    <input type="hidden" name="type" value="ocr">
                    <input type="hidden" name="price" value="{{\App\Models\Race::getPriceById(\App\Models\Race::getIdBySlug('freedom-fest-2023'))}}">
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
                            <input id="registr_modal5_ocr_form_cb_option1" type="radio" name="distance" value="1000"  class="custon-radio-btn" checked>
                            <label for="registr_modal5_ocr_form_cb_option1">1 км</label>
                            <input id="registr_modal5_ocr_form_cb_option2" type="radio" name="distance" value="5000"  class="custon-radio-btn" >
                            <label for="registr_modal5_ocr_form_cb_option2">5 км</label>
                            <input id="registr_modal5_ocr_form_cb_option3" type="radio" name="distance" value="10000"  class="custon-radio-btn">
                            <label for="registr_modal5_ocr_form_cb_option3">10 км</label>
                        </div>
                    </div>
                </div>


                <div class="scandi-walk-subtype-wrapper d-none">
                    <input type="hidden" name="type" value="scandi-walk">
                    <input type="hidden" name="distance" value="3000">
                    <input type="hidden" name="price" value="500">
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
                            <input id="registr_modal5_ocr_form_cb_option1" type="radio" name="distance" value="1500"  class="custon-radio-btn" checked>
                            <label for="registr_modal5_ocr_form_cb_option1">1,5 км</label>
                            <input id="registr_modal5_ocr_form_cb_option2" type="radio" name="distance" value="3000"  class="custon-radio-btn" >
                            <label for="registr_modal5_ocr_form_cb_option2">3 км</label>
                        </div>
                    </div>
                </div>

                <div class="cross-duathlon-subtype-wrapper d-none">
                    <input type="hidden" name="type" value="cross-duathlon">
                    <input type="hidden" name="distance" value="0">
                    <input type="hidden" name="price" value="{{\App\Models\Race::getPriceById(\App\Models\Race::getIdBySlug('freedom-fest-2023'))}}">
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
                    <!--<div class="form-group">
                        <div class="label-wrap">
                            <label for="">Дистанції</label>
                        </div>
                        <div class="custon-radio-group">
                            <input id="registr_modal5_ocr_form_cb_option1" type="radio" name="distance" value="1000"  class="custon-radio-btn" checked>
                            <label for="registr_modal5_ocr_form_cb_option1">1 км</label>
                            <input id="registr_modal5_ocr_form_cb_option2" type="radio" name="distance" value="5000"  class="custon-radio-btn" >
                            <label for="registr_modal5_ocr_form_cb_option2">5 км</label>
                            <input id="registr_modal5_ocr_form_cb_option3" type="radio" name="distance" value="10000"  class="custon-radio-btn">
                            <label for="registr_modal5_ocr_form_cb_option3">10 км</label>
                        </div>
                    </div>-->
                </div>

                <div class="crossfit-beginners-subtype-wrapper d-none">
                    <input type="hidden" name="type" value="crossfit-beginners">
                    <input type="hidden" name="distance" value="0">
                    <input type="hidden" name="price" value="{{\App\Models\Race::getPriceById(\App\Models\Race::getIdBySlug('freedom-fest-2023'))}}">
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
                    <!--<div class="form-group">
                        <div class="label-wrap">
                            <label for="">Дистанції</label>
                        </div>
                        <div class="custon-radio-group">
                            <input id="registr_modal5_ocr_form_cb_option1" type="radio" name="distance" value="1000"  class="custon-radio-btn" checked>
                            <label for="registr_modal5_ocr_form_cb_option1">1 км</label>
                            <input id="registr_modal5_ocr_form_cb_option2" type="radio" name="distance" value="5000"  class="custon-radio-btn" >
                            <label for="registr_modal5_ocr_form_cb_option2">5 км</label>
                            <input id="registr_modal5_ocr_form_cb_option3" type="radio" name="distance" value="10000"  class="custon-radio-btn">
                            <label for="registr_modal5_ocr_form_cb_option3">10 км</label>
                        </div>
                    </div>-->
                </div>





                <div class="kids-subtype-wrapper d-none">
                    <input type="hidden" name="type" value="kids">
                    <input type="hidden" name="price" value="0">
                    <div class="form-group">
                        <label for="registr_modal_form_cb_name">Ім’я та прізвище дитини</label>
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
                        <div class="label-wrap">
                            <label for="">Дистанції</label>
                        </div>
                        <div class="custon-radio-group">
                            <input id="registr_modal5_form_cb_option1" type="radio" name="distance" value="100"  class="custon-radio-btn" checked>
                            <label for="registr_modal5_form_cb_option1">100м</label>
                            <input id="registr_modal5_form_cb_option2" type="radio" name="distance" value="500"  class="custon-radio-btn" >
                            <label for="registr_modal5_form_cb_option2">500м</label>
                        </div>
                    </div>
                </div>



            </div>

        </div>
    </div>
</div>
