@extends('layouts.app', ['activePage' => 'orders', 'titlePage' => __('Реєстрація учасника')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form method="post" action="{{ route('orders.store') }}" autocomplete="off"
                          class="form-horizontal">
                        @csrf
                        <input type="hidden" name="race_name" value="Воля FEST">
                        <div class="card ">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">{{ __('Учасник') }}</h4>
                                <p class="card-category">{{ __('Інформація') }}</p>
                            </div>
                            <div class="card-body ">
                                @if (session('status'))
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="alert alert-success">
                                                <button type="button" class="close" data-dismiss="alert"
                                                        aria-label="Close">
                                                    <i class="material-icons">close</i>
                                                </button>
                                                <span>{{ session('status') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('П.І.П.') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                                   name="name" id="input-name" type="text"
                                                   placeholder="{{ __('Прізвище Ім\'я') }}"
                                                   value="" required
                                                   aria-required="true"/>
                                            @if ($errors->has('name'))
                                                <span id="name-error" class="error text-danger"
                                                      for="input-name">{{ $errors->first('name') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Email') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                                   name="email" id="input-email" type="email"
                                                   placeholder="{{ __('Email') }}"
                                                   value="" required/>
                                            @if ($errors->has('email'))
                                                <span id="email-error" class="error text-danger"
                                                      for="input-email">{{ $errors->first('email') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Номер телефону') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('phone') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}"
                                                   name="phone" id="input-phone" type="text"
                                                   placeholder="{{ __('Телефон') }}"
                                                   value="" required/>
                                            @if ($errors->has('phone'))
                                                <span id="email-error" class="error text-danger"
                                                      for="input-phone">{{ $errors->first('phone') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Клуб') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('club') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('club') ? ' is-invalid' : '' }}"
                                                   name="club" id="input-club" type="text"
                                                   placeholder="{{ __('Клуб') }}"
                                                   value=""/>
                                            @if ($errors->has('club'))
                                                <span id="club-error" class="error text-danger"
                                                      for="input-club">{{ $errors->first('club') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Місто') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('city') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('city') ? ' is-invalid' : '' }}"
                                                   name="city" id="input-city" type="text"
                                                   placeholder="{{ __('Місто') }}"
                                                   value="" required/>
                                            @if ($errors->has('city'))
                                                <span id="city-error" class="error text-danger"
                                                      for="input-city">{{ $errors->first('city') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Тип забігу') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('type') ? ' has-danger' : '' }}">
                                            <select class="form-control{{ $errors->has('type') ? ' is-invalid' : '' }}"
                                                    name="type" id="types" required >
                                                <option class="form-control" value="" disabled selected>{{ __('Оберіть тип забігу') }}</option>
                                                <option value="running with obstacles">Біг з перешкодами</option>
                                                <option value="bicycle">Велокрос</option>
                                                <option value="duathlon">Дуатлон</option>
                                                <option value="walking">Скандинавська ходьба</option>
                                            </select>

                                            @if ($errors->has('type'))
                                                <span id="type-error" class="error text-danger"
                                                      for="input-type">{{ $errors->first('type') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                    <div class="row">
                                        <label class="col-sm-2 col-form-label">{{ __('Дистанція') }}</label>
                                        <div class="col-sm-7">
                                            <div class="form-group{{ $errors->has('distance') ? ' has-danger' : '' }}">
                                                <select class="form-control{{ $errors->has('distance') ? ' is-invalid' : '' }}"
                                                        name="distance" id="distance" required >
                                                    <option class="form-control" value="" disabled selected>{{ __('Оберіть дистанцію') }}</option>
                                                    <option value="100">100 м</option>
                                                    <option value="1000">1 км</option>
                                                    <option value="3000">3 км</option>
                                                    <option value="5000">5 км</option>
                                                    <option value="10000">10 км</option>
                                                    <option value="15000">15 км</option>
                                                    <option value="15000">20 км</option>
                                                    <option value="3000/10000/1000">3км/10км/1км</option>
                                                </select>

                                                @if ($errors->has('distance'))
                                                    <span id="distance-error" class="error text-danger"
                                                          for="input-distance">{{ $errors->first('distance') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                            </div>
                            <div class="card-footer ml-auto mr-auto">
                                <button type="submit" class="btn btn-primary">{{ __('Зареєструвати') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection