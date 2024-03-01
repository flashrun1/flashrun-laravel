<div class="modal fade" id="registr_modal-two-fortress" tabindex="-1" aria-labelledby="registr_modal-two-fortress" aria-modal="true"
     role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="section-title">РЕЄСТРАЦІЯ <span class="sub-title">2 Фортеці</span></h2>
                <h3 class="title">Хотин - Камʼянець подільський</h3>
                <button type="button" class="close" aria-label="Close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="{{ route('race-register') }}" method="post" enctype="multipart/form-data">

                    <div class="form-group prices my-4">
                        <div class="event-subtypes">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="text-center event-subtype register-event-price-block active-brand-color py-3" data-type="regular">
                                            ДОРОСЛІ ІНДИВІДУАЛЬНИЙ
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="text-center event-subtype register-event-price-block py-3" data-type="kids">
                                            ДИТЯЧІ ЗАБІГИ
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{ csrf_field() }}
                    <input type="hidden" name="race_id" value="{{\App\Models\Race::getIdBySlug('two-fortress')}}">
                    <input type="hidden" name="race_name" value="{{\App\Models\Race::getNameBySlug('two-fortress')}}">

                    <div class="race-subtype-content">

                    </div>

                    <div class="form-group">
                        <div class="btn-wrap text-center">
                            <button type="submit" class="btn">ЗАРЕЄСТРУВАТИСЬ</button>
                            <a href="{{ asset('/files/two-fortress-polozhennya.pdf') }}" target="_blank" class="btn btn-invert">Положення змагань</a>
                        </div>
                    </div>
                </form>


                <div class="regular-subtype-wrapper d-none">

                    <div class="form-group prices my-4">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="register-event-price-block py-3 @php echo (!\Carbon\Carbon::parse('2024-03-15')->isPast())?'':'text-muted'@endphp" style="font-size: 14px;border: 1px solid rgba(0, 0, 0, 0.1);display: flex;align-items: center;justify-content: center;">
                                        ДО 15.03 -&nbsp;<span class="event-date-price">800грн</span>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="register-event-price-block py-3 @php echo (!\Carbon\Carbon::now()->betweenIncluded(\Carbon\Carbon::parse('2024-03-16'), \Carbon\Carbon::parse('2024-05-30'))) ? 'text-muted' : '' @endphp" style="font-size: 14px;border: 1px solid rgba(0, 0, 0, 0.1);display: flex;align-items: center;justify-content: center;">
                                        16.03 - 30.05 -&nbsp;<span class="event-date-price">900грн</span>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="register-event-price-block py-3 @php echo (!\Carbon\Carbon::now()->betweenIncluded(\Carbon\Carbon::parse('2024-06-01'), \Carbon\Carbon::parse('2024-06-9'))) ? 'text-muted' : '' @endphp" style="font-size: 14px;border: 1px solid rgba(0, 0, 0, 0.1);display: flex;align-items: center;justify-content: center;">
                                        1.06 - 9.06 -&nbsp;<span class="event-date-price">1200грн</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <input type="hidden" name="type" value="regular">
                    <input type="hidden" name="price" value="{{\App\Models\Race::getPriceById(\App\Models\Race::getIdBySlug('two-fortress'))}}">
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
                            <input id="registr_modal5_ocr_form_cb_option1" type="radio" name="distance" value="24000" class="custon-radio-btn" checked>
                            <label for="registr_modal5_ocr_form_cb_option1">24 км</label>
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
                            <input id="registr_modal5_kids_form_cb_option_1" type="radio" name="distance" value="100"  class="custon-radio-btn" checked>
                            <label for="registr_modal5_kids_form_cb_option_1">100м</label>
                            <input id="registr_modal5_kids_form_cb_option_2" type="radio" name="distance" value="500"  class="custon-radio-btn" >
                            <label for="registr_modal5_kids_form_cb_option_2">500м</label>
                            <input id="registr_modal5_kids_form_cb_option_3" type="radio" name="distance" value="1000"  class="custon-radio-btn" >
                            <label for="registr_modal5_kids_form_cb_option_3">1000м</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
