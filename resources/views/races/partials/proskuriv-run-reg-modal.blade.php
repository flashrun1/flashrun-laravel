<div class="modal fade" id="registr_modal_proskuriv_run_2024" tabindex="-1" aria-labelledby="registr_modal_proskuriv_run_2024" aria-modal="true"
     role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="section-title">РЕЄСТРАЦІЯ <span class="sub-title">«ПроскурівRUN»</span></h2>
                <h3 class="title">Дендропарк</h3>
                <button type="button" class="close" aria-label="Close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="{{ route('race-register') }}" method="post" enctype="multipart/form-data">

                    <div class="form-group prices my-4">
                        @include('partials.event-subtype-switcher')
                    </div>

                    {{ csrf_field() }}
                    <input type="hidden" name="race_id" value="{{\App\Models\Race::getIdBySlug('proskuriv-run-2024')}}">
                    <input type="hidden" name="race_name" value="{{\App\Models\Race::getNameBySlug('proskuriv-run-2024')}}">

                    <div class="race-subtype-content">

                    </div>

                    <div class="form-group">
                        <div class="btn-wrap text-center">
                            <button type="submit" class="btn">ЗАРЕЄСТРУВАТИСЬ</button>
                            <!--<a href="{{ asset('/files/freedom-fest-2023-polozhennya.pdf') }}" target="_blank" class="btn btn-invert">Положення змагань</a>-->
                        </div>
                    </div>
                </form>


                <div class="regular-subtype-wrapper d-none">

                    <div class="form-group prices my-4">
                        @include(' partials.event-prices-block')
                    </div>

                    <input type="hidden" name="type" value="regular">
                    <input type="hidden" name="price" value="{{\App\Models\Race::getPriceById(\App\Models\Race::getIdBySlug('proskuriv-run-2024'))}}">
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
                            <input id="registr_modal5_ocr_form_cb_option1" type="radio" name="distance" value="2000"  class="custon-radio-btn" checked>
                            <label for="registr_modal5_ocr_form_cb_option1">2 км</label>
                            <input id="registr_modal5_ocr_form_cb_option2" type="radio" name="distance" value="6000"  class="custon-radio-btn" >
                            <label for="registr_modal5_ocr_form_cb_option2">6 км</label>
                            <input id="registr_modal5_ocr_form_cb_option3" type="radio" name="distance" value="10000"  class="custon-radio-btn">
                            <label for="registr_modal5_ocr_form_cb_option3">10 км</label>

{{--                            <input id="proskuriv_run_2024_regular_form_cb_option3" type="radio" name="distance" value="10000"  class="custon-radio-btn">--}}
{{--                            <label for="proskuriv_run_2024_regular_form_cb_option3">Командний естафетний забіг на 10 км</label>--}}
                        </div>
                    </div>
                </div>

                <div class="regular-team-subtype-wrapper d-none">

                    <div class="container my-4">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="register-event-price-block py-3 @php echo (!\Carbon\Carbon::parse('2024-03-15')->isPast())?'':'text-muted'@endphp" style="font-size: 14px;border: 1px solid rgba(0, 0, 0, 0.1);display: flex;align-items: center;justify-content: center;">
                                    ДО 15.03 -&nbsp;<span class="event-date-price">4000грн</span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="register-event-price-block py-3 @php echo (!\Carbon\Carbon::now()->betweenIncluded(\Carbon\Carbon::parse('2024-03-16'), \Carbon\Carbon::parse('2024-03-30'))) ? 'text-muted' : '' @endphp" style="font-size: 14px;border: 1px solid rgba(0, 0, 0, 0.1);display: flex;align-items: center;justify-content: center;">
                                    16.03 - 30.03 - <span class="event-date-price">4500грн</span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="register-event-price-block py-3 @php echo (!\Carbon\Carbon::now()->betweenIncluded(\Carbon\Carbon::parse('2024-04-01'), \Carbon\Carbon::parse('2024-04-19'))) ? 'text-muted' : '' @endphp" style="font-size: 14px;border: 1px solid rgba(0, 0, 0, 0.1);display: flex;align-items: center;justify-content: center;">
                                    1.04 - 19.04 - <span class="event-date-price">5000грн</span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="register-event-price-block py-3 @php echo (!\Carbon\Carbon::now()->betweenIncluded(\Carbon\Carbon::parse('2024-04-19'), \Carbon\Carbon::parse('2024-04-21'))) ? 'text-muted' : '' @endphp" style="font-size: 14px;border: 1px solid rgba(0, 0, 0, 0.1);;display: flex;align-items: center;justify-content: center;">
                                    21.04 - <span class="event-date-price">6000грн</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <input type="hidden" name="type" value="regular-team">
                    <input type="hidden" name="price" value="{{\App\Models\Race::getPriceById(\App\Models\Race::getIdBySlug('proskuriv-run-2024'), true)}}">
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
                        <input id="registr_modal_form_cb_promocode" type="text" name="code" placeholder="Введіть промокод" value="" class="form-control">
                    </div>
                    <div class="form-group">
                        <div class="label-wrap">
                            <label for="">Дистанції</label>
                        </div>
                        <div class="custon-radio-group">
                            <input id="registr_modal5_ocr_form_cb_option3" checked type="radio" name="distance" value="10000"  class="custon-radio-btn">
                            <label for="registr_modal5_ocr_form_cb_option3">10 км</label>

                            {{--                            <input id="proskuriv_run_2024_regular_form_cb_option3" type="radio" name="distance" value="10000"  class="custon-radio-btn">--}}
                            {{--                            <label for="proskuriv_run_2024_regular_form_cb_option3">Командний естафетний забіг на 10 км</label>--}}
                        </div>
                    </div>
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
                            <input id="registr_modal5_kids_form_cb_option1" type="radio" name="distance" value="100"  class="custon-radio-btn" checked>
                            <label for="registr_modal5_kids_form_cb_option1">100м</label>
                            <input id="registr_modal5_kids_form_cb_option2" type="radio" name="distance" value="500"  class="custon-radio-btn" >
                            <label for="registr_modal5_kids_form_cb_option2">500м</label>
                        </div>
                    </div>
                </div>



            </div>

        </div>
    </div>
</div>
