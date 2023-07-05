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
