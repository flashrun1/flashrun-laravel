@php use Carbon\Carbon; @endphp
@if(array_key_exists('forms', $race))
    <head>
        <script>
            function on{{ $race['id'] }}FormSubmit(token) {
                document.getElementById("race_form_{{ $race['id'] }}").submit();
            }
        </script>
    </head>
    <div class="modal fade" id="register_modal_{{ $race['id'] }}" tabindex="-1"
         aria-labelledby="register_modal_{{ $race['id'] }}" aria-modal="true" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="section-title">РЕЄСТРАЦІЯ <span class="sub-title">{{ $race['title'] }}</span></h2>
                    <h3 class="title">{{ $race['race_description'] }}</h3>
                    <button type="button" class="close" aria-label="Close" data-dismiss="modal">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="race_form_{{ $race['id'] }}" action="{{ route('race-register') }}" method="post"
                          enctype="multipart/form-data">
                        <div class="form-group prices my-4">
                            <div class="event-subtypes">
                                <div class="container">
                                    <div class="row">
                                        @foreach($race['forms'] as $form)
                                            <div class="col-md-6">
                                                <div data-type="type-{{ $form['type_id'] }}"
                                                     class="text-center event-subtype register-event-price-block active-brand-color py-3">
                                                    {{ $form['type_label'] }}
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="race-subtype-content"></div>

                        {{ csrf_field() }}
                        <input type="hidden" name="race_id" value="{{ $race['id'] }}">

                        <div class="form-group">
                            <div class="btn-wrap text-center">
                                <button class="g-recaptcha btn btn-primary btn-lg"
                                        data-callback="on{{ $race['id'] }}FormSubmit"
                                        data-sitekey="{{ config('services.recaptcha_v3.siteKey') }}"
                                        data-action="raceRegister">ЗАРЕЄСТРУВАТИСЬ
                                </button>
                                @if ($race['document'])
                                    <a href="{{ asset('/files/' . $race['document']) }}" target="_blank"
                                       class="btn btn-invert">Положення змагань</a>
                                @endif
                            </div>
                        </div>
                    </form>

                    @foreach($race['forms'] as $form)
                        <div class="type-{{ $form['type_id'] }}-subtype-wrapper d-none">
                            <input type="hidden" name="type_id" value="{{ $form['type_id'] }}">

                            <div class="form-group">
                                <label for="register_modal_form_cb_name">Ім’я та прізвище</label>
                                <input id="register_modal_form_cb_name" type="text" name="name"
                                       placeholder="Введіть ім’я та прізвище" required class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="email">E-mail</label>
                                <input id="email" type="email" name="email" placeholder="Введіть електронну пошту"
                                       required class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="register_modal_form_cb_phone">Номер телефону</label>
                                <input id="register_modal_form_cb_phone" type="tel" name="phone" required
                                       class="form-control" placeholder="Введіть номер телефону">
                            </div>
                            <div class="form-group">
                                <label for="register_modal_form_cb_clubname">Ваш клуб</label>
                                <input id="register_modal_form_cb_clubname" type="text" name="club" class="form-control"
                                       placeholder="Введіть клуб">
                            </div>
                            <div class="form-group">
                                <label for="register_modal_form_cb_city">Ваше місто</label>
                                <input id="register_modal_form_cb_city" type="text" name="city" required
                                       class="form-control" placeholder="Введіть Ваше місто">
                            </div>
                            <div class="form-group">
                                <label for="register_modal_form_cb_promocode">Промокод</label>
                                <input id="register_modal_form_cb_promocode" type="text" name="promocode"
                                       class="form-control"
                                       placeholder="Введіть промокод">
                            </div>

                            <div class="form-group">
                                <div class="label-wrap">
                                    <label>Дистанції @if(!is_array($form['payments'])) - {{ $form['payments'] }} грн.@endif</label>
                                </div>
                                <div class="custom-radio-group">
                                    @foreach($form['distance'] as $key => $distance)
                                        <input id="register_{{ $form['id'] }}_{{ $form['type_id'] }}_form_cb_option_{{ $key }}" type="radio"
                                               name="distance" value="{{ $distance }}" class="custom-radio-btn"
                                            {{ array_key_first($form['distance']) === $key ? 'checked' : null }} >
                                        <label for="register_{{ $form['id'] }}_{{ $form['type_id'] }}_form_cb_option_{{ $key }}">{{ $distance }}м @if(is_array($form['payments'])) - {{ $form['payments'][$key] }} грн.@endif</label>
                                    @endforeach
                                </div>
                            </div>
                                @if ($form['notes'])
                                    <div class="form-group">
                                        <label for="notes">Додаткова інформація</label>
                                        <textarea name="notes" id="" cols="30" rows="5" class="form-control"
                                                  placeholder="{{ $form['notes'] }}" required></textarea>
                                    </div>
                                @endif
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <script>
        document.querySelectorAll('#register_modal_{{ $race['id'] }} .event-subtype').forEach(function (e) {
            e.onclick = function (event) {
                // remove active class
                document.querySelectorAll('#register_modal_{{ $race['id'] }} .event-subtype').forEach(function (elm) {
                    elm.classList.remove('active-brand-color');
                });

                // assign active class to clicked element
                event.target.classList.add('active-brand-color');
                let selectedType = event.target.dataset.type;
                document.querySelector('#register_modal_{{ $race['id'] }} .race-subtype-content').innerHTML = document.querySelector('#register_modal_{{ $race['id'] }} .' + selectedType + '-subtype-wrapper').innerHTML;
            }
        })
    </script>
@endif
