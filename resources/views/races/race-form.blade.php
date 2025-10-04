@if(array_key_exists('forms', $race))
    <head>
        <script src="https://www.google.com/recaptcha/api.js?render={{ config('services.recaptcha_v3.siteKey') }}"></script>
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
                    </form>

                    @foreach($race['forms'] as $form)
                        <div class="type-{{ $form['type_id'] }}-subtype-wrapper" style="display: none;">
                            <form action="{{ route('race-register') }}" method="POST" class="race-registration-form"
                                  id="race_registration_form_{{ $form['type_id'] }}">
                                @csrf
                                <input type="hidden" name="race_id" value="{{ $race['id'] }}">
                                <input type="hidden" name="type_id" value="{{ $form['type_id'] }}">

                                {{-- Базові поля, які завжди мають бути --}}
                                <div class="form-group">
                                    <label for="register_modal_form_cb_name_{{ $form['type_id'] }}">Ім’я</label>
                                    <input id="register_modal_form_cb_name_{{ $form['type_id'] }}" type="text"
                                           name="name" placeholder="Введіть ім’я" required class="form-control">
                                    <div class="invalid-feedback">Будь ласка, введіть ім'я.</div>
                                </div>
                                <div class="form-group">
                                    <label for="register_modal_form_cb_surname_{{ $form['type_id'] }}">Прізвище</label>
                                    <input id="register_modal_form_cb_surname_{{ $form['type_id'] }}" type="text"
                                           name="surname" placeholder="Введіть прізвище" required class="form-control">
                                    <div class="invalid-feedback">Будь ласка, введіть прізвище.</div>
                                </div>
                                <div class="form-group">
                                    <label for="register_modal_form_cb_sex_{{ $form['type_id'] }}">Стать</label>
                                    <select id="register_modal_form_cb_sex_{{ $form['type_id'] }}" name="sex" required
                                            class="form-control">
                                        <option value="">--Оберіть стать--</option>
                                        <option value="0">Жіноча</option>
                                        <option value="1">Чоловіча</option>
                                    </select>
                                    <div class="invalid-feedback">Будь ласка, оберіть стать.</div>
                                </div>
                                <div class="form-group">
                                    <label for="register_modal_form_cb_dob_{{ $form['type_id'] }}">Дата народження</label>
                                    <input id="register_modal_form_cb_dob_{{ $form['type_id'] }}" type="date"
                                           name="dob" required class="form-control">
                                    <div class="invalid-feedback">Будь ласка, введіть дату народження.</div>
                                </div>
                                <div class="form-group">
                                    <label for="email_{{ $form['type_id'] }}">Електронна пошта</label>
                                    <input id="email_{{ $form['type_id'] }}" type="email" name="email"
                                           placeholder="Введіть електронну пошту" required class="form-control">
                                    <div class="invalid-feedback">Будь ласка, введіть коректну електронну пошту.</div>
                                </div>
                                <div class="form-group">
                                    <label for="register_modal_form_cb_phone_{{ $form['type_id'] }}">Номер телефону</label>
                                    <input id="register_modal_form_cb_phone_{{ $form['type_id'] }}" type="tel" required
                                           name="phone" class="form-control" placeholder="Введіть номер телефону">
                                    <div class="invalid-feedback">Будь ласка, введіть номер телефону.</div>
                                </div>
                                <div class="form-group">
                                    <label for="register_modal_form_cb_clubname_{{ $form['type_id'] }}">Ваш клуб</label>
                                    <input id="register_modal_form_cb_clubname_{{ $form['type_id'] }}" type="text"
                                           name="club" class="form-control" placeholder="Введіть клуб">
                                </div>
                                <div class="form-group">
                                    <label for="register_modal_form_cb_city_{{ $form['type_id'] }}">Ваше місто</label>
                                    <input id="register_modal_form_cb_city_{{ $form['type_id'] }}" type="text"
                                           name="city" required class="form-control" placeholder="Введіть Ваше місто">
                                    <div class="invalid-feedback">Будь ласка, введіть місто.</div>
                                </div>
                                <div class="form-group">
                                    <label for="register_modal_form_cb_promocode_{{ $form['type_id'] }}">Промокод</label>
                                    <input id="register_modal_form_cb_promocode_{{ $form['type_id'] }}" type="text"
                                           name="promocode" class="form-control" placeholder="Введіть промокод">
                                </div>

                                {{-- Опціональні поля --}}
                                @php($extraFields = $form['extra_fields'])

                                {{-- Нік у Telegram --}}
                                @if(isset($extraFields['show_telegram_nick']) && $extraFields['show_telegram_nick'])
                                    <div class="form-group">
                                        <label for="telegram_nick_{{ $form['type_id'] }}">Нік у Telegram</label>
                                        <input id="telegram_nick_{{ $form['type_id'] }}" type="text" required
                                               name="extra_fields[telegram_nick]" placeholder="Введіть нік у Telegram" class="form-control">
                                        <div class="invalid-feedback">Будь ласка, введіть нік у Telegram.</div>
                                    </div>
                                @endif

                                {{-- Розмір футболки (нове опціональне поле) --}}
                                @if(isset($extraFields['show_tshirt_size']) && $extraFields['show_tshirt_size'])
                                    <div class="form-group">
                                        <label for="register_modal_form_cb_tshirtsize_{{ $form['type_id'] }}">Розмір футболки</label>
                                        <select id="register_modal_form_cb_tshirtsize_{{ $form['type_id'] }}"
                                                name="extra_fields[tsize]" class="form-control" required>
                                            <option value="">--Оберіть розмір--</option>
                                            <option value="0">XS</option>
                                            <option value="1">S</option>
                                            <option value="2">M</option>
                                            <option value="3">L</option>
                                            <option value="4">XL</option>
                                        </select>
                                        <div class="invalid-feedback">Будь ласка, оберіть розмір футболки.</div>
                                    </div>
                                @endif

                                {{-- Чи маєте страйкбольний привід? --}}
                                @if(isset($extraFields['show_airsoft_gun']) && $extraFields['show_airsoft_gun'])
                                    <div class="form-group">
                                        <label>Чи маєте страйкбольний привід?</label>
                                        <div class="custom-radio-group">
                                            <input type="radio" id="has_airsoft_gun_yes_{{ $form['type_id'] }}"
                                                   name="extra_fields[has_airsoft_gun]" value="own" class="custom-radio-btn" required>
                                            <label for="has_airsoft_gun_yes_{{ $form['type_id'] }}">Маю власний (вказати модель)</label>
                                            <input type="text" id="airsoft_gun_model_{{ $form['type_id'] }}"
                                                   name="extra_fields[airsoft_gun_model]" class="form-control mt-2"
                                                   placeholder="Вкажіть модель приводу" style="display: none;">
                                            <div class="invalid-feedback">Будь ласка, оберіть опцію та, за потреби, вкажіть модель.
                                            </div>

                                            <input type="radio" id="has_airsoft_gun_no_{{ $form['type_id'] }}" required
                                                   name="extra_fields[has_airsoft_gun]" value="rent" class="custom-radio-btn">
                                            <label for="has_airsoft_gun_no_{{ $form['type_id'] }}">Потрібна оренда</label>
                                        </div>
                                    </div>
                                @endif

                                {{-- Чи вже грали раніше? --}}
                                @if(isset($extraFields['show_played_before']) && $extraFields['show_played_before'])
                                    <div class="form-group">
                                        <label>Чи вже грали раніше?</label>
                                        <div class="custom-radio-group">
                                            <input type="radio" id="played_before_yes_{{ $form['type_id'] }}"
                                                   name="extra_fields[played_before]" value="yes" class="custom-radio-btn" required>
                                            <label for="played_before_yes_{{ $form['type_id'] }}">Так</label>

                                            <input type="radio" id="played_before_no_{{ $form['type_id'] }}"
                                                   name="extra_fields[played_before]" value="no" class="custom-radio-btn" required>
                                            <label for="played_before_no_{{ $form['type_id'] }}">Ні</label>
                                        </div>
                                        <div class="invalid-feedback">Будь ласка, оберіть опцію.</div>
                                    </div>
                                @endif

                                {{-- До якої групи бажаєте приєднатися? --}}
                                @if(isset($extraFields['show_desired_group']) && $extraFields['show_desired_group'])
                                    <div class="form-group">
                                        <label>До якої групи бажаєте приєднатися?</label>
                                        <div class="custom-radio-group">
                                            <input type="radio" id="group_a_{{ $form['type_id'] }}" name="extra_fields[desired_group]"
                                                   value="A" class="custom-radio-btn" required>
                                            <label for="group_a_{{ $form['type_id'] }}">Група А</label>

                                            <input type="radio" id="group_b_{{ $form['type_id'] }}" name="extra_fields[desired_group]"
                                                   value="B" class="custom-radio-btn" required>
                                            <label for="group_b_{{ $form['type_id'] }}">Група Б</label>

                                            <input type="radio" id="group_no_preference_{{ $form['type_id'] }}" required
                                                   name="extra_fields[desired_group]" value="no_preference" class="custom-radio-btn">
                                            <label for="group_no_preference_{{ $form['type_id'] }}">Без різниці (готовий/готова приєднатися куди визначать організатори)</label>
                                        </div>
                                        <div class="invalid-feedback">Будь ласка, оберіть бажану групу.</div>
                                    </div>
                                @endif

                                {{-- Добирання на локацію --}}
                                @if(isset($extraFields['show_transport_option']) && $extraFields['show_transport_option'])
                                    <div class="form-group">
                                        <label>Добирання на локацію</label>
                                        <div class="custom-radio-group">
                                            <input type="radio" id="transport_own_{{ $form['type_id'] }}" required
                                                   name="extra_fields[transport_option]" value="own" class="custom-radio-btn">
                                            <label for="transport_own_{{ $form['type_id'] }}">Доберуся сам/сама</label>

                                            <input type="radio" id="transport_pickup_{{ $form['type_id'] }}" required
                                                   name="extra_fields[transport_option]" value="pickup" class="custom-radio-btn">
                                            <label for="transport_pickup_{{ $form['type_id'] }}">Потрібно забрати з міста (вказати точку підбору)</label>
                                            <input type="text" id="pickup_point_{{ $form['type_id'] }}"
                                                   name="extra_fields[pickup_point]" class="form-control mt-2" style="display: none;"
                                                   placeholder="Вкажіть точку підбору">
                                        </div>
                                        <div class="invalid-feedback">Будь ласка, оберіть опцію добирання та, за потреби, вкажіть точку підбору.</div>
                                    </div>
                                @endif

                                {{-- Чи маєте GoPro? --}}
                                @if(isset($extraFields['show_has_gopro']) && $extraFields['show_has_gopro'])
                                    <div class="form-group">
                                        <label>Чи маєте GoPro?</label>
                                        <div class="custom-radio-group">
                                            <input type="radio" id="has_gopro_yes_{{ $form['type_id'] }}"
                                                   name="extra_fields[has_gopro]" value="yes" class="custom-radio-btn" required>
                                            <label for="has_gopro_yes_{{ $form['type_id'] }}">Так (візьму з собою)</label>

                                            <input type="radio" id="has_gopro_no_{{ $form['type_id'] }}"
                                                   name="extra_fields[has_gopro]" value="no" class="custom-radio-btn" required>
                                            <label for="has_gopro_no_{{ $form['type_id'] }}">Ні</label>
                                        </div>
                                        <div class="invalid-feedback">Будь ласка, оберіть опцію.</div>
                                    </div>
                                @endif

                                {{-- З ким плануєте приїхати на локацію? --}}
                                @if(isset($extraFields['show_companion_type']) && $extraFields['show_companion_type'])
                                    <div class="form-group">
                                        <label>З ким плануєте приїхати на локацію?</label>
                                        <div class="custom-radio-group">
                                            <input type="radio" id="companion_alone_{{ $form['type_id'] }}" required
                                                   name="extra_fields[companion_type]" value="alone" class="custom-radio-btn">
                                            <label for="companion_alone_{{ $form['type_id'] }}">Сам/сама</label>

                                            <input type="radio" id="companion_spouse_{{ $form['type_id'] }}" required
                                                   name="extra_fields[companion_type]" value="spouse" class="custom-radio-btn">
                                            <label for="companion_spouse_{{ $form['type_id'] }}">З дружиною / чоловіком</label>

                                            <input type="radio" id="companion_children_{{ $form['type_id'] }}" required
                                                   name="extra_fields[companion_type]" value="children" class="custom-radio-btn">
                                            <label for="companion_children_{{ $form['type_id'] }}">З дітьми</label>

                                            <input type="radio" id="companion_friends_{{ $form['type_id'] }}" required
                                                   name="extra_fields[companion_type]" value="friends" class="custom-radio-btn">
                                            <label for="companion_friends_{{ $form['type_id'] }}">З друзями</label>

                                            <input type="radio" id="companion_other_{{ $form['type_id'] }}" required
                                                   name="extra_fields[companion_type]" value="other" class="custom-radio-btn">
                                            <label for="companion_other_{{ $form['type_id'] }}">Інше (вказати)</label>
                                            <input type="text" id="companion_other_text_{{ $form['type_id'] }}"
                                                   name="extra_fields[companion_other_text]" class="form-control mt-2"
                                                   placeholder="Вкажіть" style="display: none;">
                                        </div>
                                        <div class="invalid-feedback">Будь ласка, оберіть опцію та, за потреби, вкажіть деталі.
                                        </div>
                                    </div>
                                @endif

                                @if ($form['notes'])
                                    <div class="form-group">
                                        <label for="notes_{{ $form['type_id'] }}">Додаткова інформація</label>
                                        <textarea name="notes" id="notes_{{ $form['type_id'] }}" cols="30" rows="5"
                                                  class="form-control"
                                                  placeholder="{{ $form['notes'] }}" required></textarea>
                                        <div class="invalid-feedback">Будь ласка, заповніть додаткову інформацію.</div>
                                    </div>
                                @endif

                                {{-- Угоди (завжди мають бути) --}}
                                <div class="form-group mt-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="1"
                                               id="agree_rules_{{ $form['type_id'] }}" name="agree_rules" required>
                                        <label class="form-check-label" for="agree_rules_{{ $form['type_id'] }}">
                                            Погоджуюсь з правилами та технікою безпеки
                                        </label>
                                        <div class="invalid-feedback">Ви повинні погодитись з правилами.</div>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="1"
                                               id="agree_data_processing_{{ $form['type_id'] }}" required
                                               name="agree_data_processing">
                                        <label class="form-check-label"
                                               for="agree_data_processing_{{ $form['type_id'] }}">
                                            Надаю згоду на обробку персональних даних
                                        </label>
                                        <div class="invalid-feedback">Ви повинні погодитись на обробку персональних даних.</div>
                                    </div>
                                </div>

                                {{-- Original distance and notes fields --}}
                                @if(isset($extraFields['show_airsoft_gun']))
                                    <div class="form-group">
                                        <div class="custom-radio-group airsoft_gun">
                                            @foreach($form['distance'] as $key => $distance)
                                                <input id="register_{{ $form['id'] }}_{{ $form['type_id'] }}_form_cb_option_{{ $distance }}"
                                                       type="radio" name="distance" value="{{ $distance }}"
                                                       class="custom-radio-btn"
                                                        {{ array_key_first($form['distance']) === $key ? 'checked' : null }}>
                                                <label for="register_{{ $form['id'] }}_{{ $form['type_id'] }}_form_cb_option_{{ $distance }}" style="display: none;">
                                                    @if(is_array($form['payments']))
                                                        Ціна: {{ $form['payments'][$key] }} грн.
                                                    @endif</label>
                                            @endforeach
                                        </div>
                                        <div class="invalid-feedback">Будь ласка, оберіть дистанцію.</div>
                                    </div>
                                    <div class="form-group">
                                        @foreach($form['distance'] as $key => $distance)
                                            <label class="price-option price-{{ $distance }}" style="display: none;">@if(is_array($form['payments']))Ціна: {{ $form['payments'][$key] }} грн. @endif</label>
                                        @endforeach
                                    </div>
                                @else
                                    <div class="form-group">
                                        <div class="label-wrap">
                                            <label>Дистанції @if(!is_array($form['payments']))
                                                    - {{ $form['payments'] }} грн.
                                                @endif
                                            </label>
                                        </div>
                                        <div class="custom-radio-group">
                                            @foreach($form['distance'] as $key => $distance)
                                                <input id="register_{{ $form['id'] }}_{{ $form['type_id'] }}_form_cb_option_{{ $key }}"
                                                       type="radio" name="distance" value="{{ $distance }}" required
                                                       class="custom-radio-btn"
                                                        {{ array_key_first($form['distance']) === $key ? 'checked' : null }}>
                                                <label for="register_{{ $form['id'] }}_{{ $form['type_id'] }}_form_cb_option_{{ $key }}">{{ $distance }}
                                                    м @if(is_array($form['payments']))
                                                        - {{ $form['payments'][$key] }} грн.
                                                    @endif</label>
                                            @endforeach
                                        </div>
                                        <div class="invalid-feedback">Будь ласка, оберіть дистанцію.</div>
                                    </div>
                                @endif

                                <div class="form-group">
                                    <div class="btn-wrap text-center">
                                        <button type="submit" class="g-recaptcha btn btn-primary btn-lg"
                                                data-callback="onSubmit"
                                                data-sitekey="{{ config('services.recaptcha_v3.siteKey') }}"
                                                data-action="raceRegister">ЗАРЕЄСТРУВАТИСЬ</button>
                                        @if ($race['document'])
                                            <a href="{{ asset('files/' . $race['document']) }}" target="_blank"
                                               class="btn btn-invert">Положення змагань</a>
                                        @endif
                                    </div>
                                </div>
                            </form>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <script>
        document.querySelector('#race_form_{{ $race['id'] }}').addEventListener('submit', function(e) {
            e.preventDefault();

            const form = this;

            grecaptcha.ready(function() {
                grecaptcha.execute('{{ config('services.recaptcha_v3.siteKey') }}', {action: 'raceRegister'})
                    .then(function(token) {
                        let tokenInput = form.querySelector('input[name="g-recaptcha-response"]');
                        if (!tokenInput) {
                            tokenInput = document.createElement('input');
                            tokenInput.type = 'hidden';
                            tokenInput.name = 'g-recaptcha-response';
                            form.appendChild(tokenInput);
                        }
                        tokenInput.value = token;
                        form.submit();
                    });
            });
        });
        document.addEventListener('DOMContentLoaded', function () {
            const modalSelector = "#register_modal_{{ $race['id'] }}";

            function loadRecaptchaScriptOnce(siteKey, cb) {
                if (typeof grecaptcha !== 'undefined') {
                    return cb();
                }

                const existing = Array.from(document.getElementsByTagName('script')).find(s => s.src && s.src.indexOf('https://www.google.com/recaptcha/api.js') === 0);

                if (existing) {
                    const wait = setInterval(function () {
                        if (typeof grecaptcha !== 'undefined') {
                            clearInterval(wait);
                            cb();
                        }
                    }, 200);
                    return;
                }
                const script = document.createElement('script');
                script.src = 'https://www.google.com/recaptcha/api.js?render=' + encodeURIComponent(siteKey);
                script.async = true;
                script.defer = true;
                script.onload = function () {
                    const wait = setInterval(function () {
                        if (typeof grecaptcha !== 'undefined') {
                            clearInterval(wait);
                            cb();
                        }
                    }, 200);
                };
                document.head.appendChild(script);
            }

            function loadSubtypeContentByType(type) {
                const wrapper = document.querySelector(modalSelector + ' .' + type + '-subtype-wrapper');
                if (wrapper) {
                    document.querySelector(modalSelector + ' .race-subtype-content').innerHTML = wrapper.innerHTML;
                    attachDynamicFieldListeners();
                    attachFormValidationListeners();
                }
            }

            const firstFormType = document.querySelector(modalSelector + ' .event-subtype.active-brand-color') || document.querySelector(modalSelector + ' .event-subtype');
            if (firstFormType) {
                loadSubtypeContentByType(firstFormType.dataset.type);
            }

            document.querySelectorAll(modalSelector + ' .event-subtype').forEach(function (e) {
                e.addEventListener('click', function (event) {
                    document.querySelectorAll(modalSelector + ' .event-subtype').forEach(function (elm) {
                        elm.classList.remove('active-brand-color');
                    });
                    e.classList.add('active-brand-color');
                    loadSubtypeContentByType(e.dataset.type);
                });
            });

            function attachDynamicFieldListeners() {
                const container = document.querySelector(modalSelector + ' .race-subtype-content');
                if (!container) return;

                // airsoft gun radios
                container.querySelectorAll('input[name="extra_fields[has_airsoft_gun]"]').forEach(function (radio) {
                    radio.addEventListener('change', function () {
                        const modelInput = container.querySelector('input[name="extra_fields[airsoft_gun_model]"]');
                        const distanceRadios = container.querySelectorAll('.custom-radio-group.airsoft_gun input[type="radio"]');
                        const distanceLabels = container.querySelectorAll('.custom-radio-group.airsoft_gun label');

                        if (this.value === 'own') {
                            modelInput.style.display = 'block';
                            modelInput.setAttribute('required', 'required');

                            // показуємо тільки першу дистанцію і її ціну
                            distanceRadios.forEach((r, idx) => {
                                r.style.display = idx === 0 ? 'inline-block' : 'none';
                                r.checked = idx === 0;
                            });
                            distanceLabels.forEach((l, idx) => {
                                l.style.display = idx === 0 ? 'inline-block' : 'none';
                            });
                        } else {
                            modelInput.style.display = 'none';
                            modelInput.removeAttribute('required');
                            modelInput.value = '';
                            modelInput.classList.remove('is-invalid', 'is-valid');

                            // показуємо тільки другу дистанцію і її ціну
                            distanceRadios.forEach((r, idx) => {
                                r.style.display = idx === 1 ? 'inline-block' : 'none';
                                r.checked = idx === 1;
                            });
                            distanceLabels.forEach((l, idx) => {
                                l.style.display = idx === 1 ? 'inline-block' : 'none';
                            });
                        }
                    });
                });

                // transport_option radios
                container.querySelectorAll('input[name="extra_fields[transport_option]"]').forEach(function (radio) {
                    radio.addEventListener('change', function () {
                        const pickupInput = container.querySelector('input[name="extra_fields[pickup_point]"]');
                        if (!pickupInput) return;
                        if (this.value === 'pickup') {
                            pickupInput.style.display = 'block';
                            pickupInput.setAttribute('required', 'required');
                        } else {
                            pickupInput.style.display = 'none';
                            pickupInput.removeAttribute('required');
                            pickupInput.value = '';
                            pickupInput.classList.remove('is-invalid', 'is-valid');
                        }
                    });
                });

                // companion_type radios
                container.querySelectorAll('input[name="extra_fields[companion_type]"]').forEach(function (radio) {
                    radio.addEventListener('change', function () {
                        const otherInput = container.querySelector('input[name="extra_fields[companion_other_text]"]');
                        if (!otherInput) return;
                        if (this.value === 'other') {
                            otherInput.style.display = 'block';
                            otherInput.setAttribute('required', 'required');
                        } else {
                            otherInput.style.display = 'none';
                            otherInput.removeAttribute('required');
                            otherInput.value = '';
                            otherInput.classList.remove('is-invalid', 'is-valid');
                        }
                    });
                });

                container.querySelectorAll('input[name="extra_fields[has_airsoft_gun]"]:checked').forEach(radio => {
                    radio.dispatchEvent(new Event('change'));
                });
            }

            // Валідація форми — повертає true/false
            function validateForm(form) {
                let ok = true;

                // очистити попередні стани
                form.querySelectorAll('.is-invalid, .is-valid').forEach(el => el.classList.remove('is-invalid', 'is-valid'));
                form.querySelectorAll('.is-invalid-group').forEach(el => el.classList.remove('is-invalid-group'));

                // input/select/textarea required
                form.querySelectorAll('input[required], select[required], textarea[required]').forEach(function (input) {
                    if (input.offsetParent !== null && !String(input.value || '').trim()) {
                        input.classList.add('is-invalid');
                        ok = false;
                    } else if (input.offsetParent !== null) {
                        input.classList.add('is-valid');
                    }
                });

                // radio groups
                form.querySelectorAll('.custom-radio-group').forEach(function (group) {
                    const radios = group.querySelectorAll('input[type="radio"][required]');
                    if (radios.length > 0) {
                        let checked = false;
                        radios.forEach(r => { if (r.checked) checked = true; });
                        if (!checked) {
                            group.classList.add('is-invalid-group');
                            ok = false;
                        } else {
                            group.classList.remove('is-invalid-group');
                        }
                    }
                });

                // checkboxes required
                form.querySelectorAll('input[type="checkbox"][required]').forEach(function (cb) {
                    if (!cb.checked) {
                        cb.classList.add('is-invalid');
                        ok = false;
                    } else {
                        cb.classList.add('is-valid');
                    }
                });

                // custom checks for dynamic fields (airsoft model, pickup point, companion_other_text)
                const hasAirsoft = form.querySelectorAll('input[name="extra_fields[has_airsoft_gun]"]');
                if (hasAirsoft.length > 0) {
                    let selected = false;
                    hasAirsoft.forEach(r => {
                        if (r.checked) {
                            selected = true;
                            if (r.value === 'own') {
                                const model = form.querySelector('input[name="extra_fields[airsoft_gun_model]"]');
                                if (model && model.offsetParent !== null && !String(model.value || '').trim()) {
                                    model.classList.add('is-invalid');
                                    ok = false;
                                } else if (model && model.offsetParent !== null) {
                                    model.classList.add('is-valid');
                                }
                            }
                        }
                    });
                    if (!selected) {
                        const fb = hasAirsoft[0].closest('.form-group').querySelector('.invalid-feedback');
                        if (fb) fb.style.display = 'block';
                        ok = false;
                    } else {
                        const fb = hasAirsoft[0].closest('.form-group').querySelector('.invalid-feedback');
                        if (fb) fb.style.display = 'none';
                    }
                }

                const transport = form.querySelectorAll('input[name="extra_fields[transport_option]"]');
                if (transport.length > 0) {
                    let selected = false;
                    transport.forEach(r => {
                        if (r.checked) {
                            selected = true;
                            if (r.value === 'pickup') {
                                const p = form.querySelector('input[name="extra_fields[pickup_point]"]');
                                if (p && p.offsetParent !== null && !String(p.value || '').trim()) {
                                    p.classList.add('is-invalid');
                                    ok = false;
                                } else if (p && p.offsetParent !== null) {
                                    p.classList.add('is-valid');
                                }
                            }
                        }
                    });
                    if (!selected) {
                        const fb = transport[0].closest('.form-group').querySelector('.invalid-feedback');
                        if (fb) fb.style.display = 'block';
                        ok = false;
                    } else {
                        const fb = transport[0].closest('.form-group').querySelector('.invalid-feedback');
                        if (fb) fb.style.display = 'none';
                    }
                }

                const companion = form.querySelectorAll('input[name="extra_fields[companion_type]"]');
                if (companion.length > 0) {
                    let selected = false;
                    companion.forEach(r => {
                        if (r.checked) {
                            selected = true;
                            if (r.value === 'other') {
                                const oth = form.querySelector('input[name="extra_fields[companion_other_text]"]');
                                if (oth && oth.offsetParent !== null && !String(oth.value || '').trim()) {
                                    oth.classList.add('is-invalid');
                                    ok = false;
                                } else if (oth && oth.offsetParent !== null) {
                                    oth.classList.add('is-valid');
                                }
                            }
                        }
                    });
                    if (!selected) {
                        const fb = companion[0].closest('.form-group').querySelector('.invalid-feedback');
                        if (fb) fb.style.display = 'block';
                        ok = false;
                    } else {
                        const fb = companion[0].closest('.form-group').querySelector('.invalid-feedback');
                        if (fb) fb.style.display = 'none';
                    }
                }

                if (!ok) {
                    const firstInvalid = form.querySelector('.is-invalid, .is-invalid-group');
                    if (firstInvalid) firstInvalid.scrollIntoView({behavior: 'smooth', block: 'center'});
                }

                return ok;
            }

            function executeRecaptchaAndSubmit(form, siteKey, action) {
                if (!siteKey) {
                    form.submit();
                    return;
                }
                loadRecaptchaScriptOnce(siteKey, function () {
                    try {
                        grecaptcha.ready(function () {
                            grecaptcha.execute(siteKey, {action: action || 'raceRegister'}).then(function (token) {
                                let tokenInput = form.querySelector('input[name="g-recaptcha-response"]');
                                if (!tokenInput) {
                                    tokenInput = document.createElement('input');
                                    tokenInput.type = 'hidden';
                                    tokenInput.name = 'g-recaptcha-response';
                                    form.appendChild(tokenInput);
                                }
                                tokenInput.value = token;
                                // submit
                                form.submit();
                            }).catch(function (err) {
                                console.error('grecaptcha.execute error', err);
                                // фолбек — сабмітимо без токена
                                form.submit();
                            });
                        });
                    } catch (e) {
                        console.error('Recaptcha error', e);
                        form.submit();
                    }
                });
            }

            function attachFormValidationListeners() {
                const form = document.querySelector(modalSelector + ' .race-subtype-content form.race-registration-form');
                if (!form) return;

                attachDynamicFieldListeners();

                const gBtn = form.querySelector('button.g-recaptcha');

                if (gBtn) {
                    gBtn.addEventListener('click', function (e) {
                        e.preventDefault();
                        // валідую
                        if (!validateForm(form)) return;
                        // виконуємо reCAPTCHA та сабмітимо
                        const siteKey = gBtn.dataset.sitekey || '{{ config('services.recaptcha_v3.siteKey') }}';
                        const action = gBtn.dataset.action || 'raceRegister';
                        executeRecaptchaAndSubmit(form, siteKey, action);
                    });
                }

                form.addEventListener('submit', function (e) {
                    const tokenField = form.querySelector('input[name="g-recaptcha-response"]');
                    if (tokenField && tokenField.value) {
                        return;
                    }

                    e.preventDefault();
                    if (!validateForm(form)) return;
                    const btn = form.querySelector('button.g-recaptcha');
                    const siteKey = btn ? (btn.dataset.sitekey || '{{ config('services.recaptcha_v3.siteKey') }}') : '{{ config('services.recaptcha_v3.siteKey') }}';
                    const action = btn ? (btn.dataset.action || 'raceRegister') : 'raceRegister';
                    executeRecaptchaAndSubmit(form, siteKey, action);
                });
            }

            // initial attach for any already loaded content
            attachDynamicFieldListeners();
            attachFormValidationListeners();
        });
    </script>
@endif
