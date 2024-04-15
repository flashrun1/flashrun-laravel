@php
    use App\Models\Promocode;
@endphp

@extends('layouts.app', ['activePage' => 'table', 'titlePage' => __('Редагування промокода')])

@section('content')
    <div id="edit-promocode">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Редагування промокоду</h5>
                </div>
                <div class="modal-body">
                    <form action="{{ route('promocodes.edit-post', ['id' => $promocode->id]) }}" id="promocodes.edit-post" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="promocode-status">Статус</label>
                            <input type="checkbox" class="form-control" id="promocode-status" name="status"
                                   {{ $promocode->status ? 'checked' : null }}>
                        </div>
                        <div class="form-group">
                            <label for="promocode-name">Промокод</label>
                            <input type="text" class="form-control" required id="promocode-name" name="code"
                                   aria-describedby="emailHelp" value="{{ $promocode->code }}">
                            <small id="emailHelp" class="form-text text-muted">Унікальний промокод</small>
                        </div>
                        <div class="form-group">
                            <label for="promocode-type">Тип промокоду (безлімітний/обмежений)</label>
                            <br>
                            <input type="radio" {{ $promocode->type === Promocode::TYPE_UNLIMITED ? 'checked' : null }}
                                   name="type" value="{{ Promocode::TYPE_UNLIMITED }}" class="" id="promocode-type-unlimited"
                                   aria-describedby="promocode-type-help"> Безлімітний
                            <br>
                            <input type="radio" {{ $promocode->type === Promocode::TYPE_LIMITED_ACTUATIONS ? 'checked' : null }}
                                   name="type" value="{{ Promocode::TYPE_LIMITED_ACTUATIONS }}"
                                   class="" id="promocode-type-unlimited" aria-describedby="promocode-type-help">
                            Обмежена кількість спрацювань
                        </div>
                        <div class="form-group">
                            <label for="promocode-name">Кількість використань</label>
                            <input type="number" class="form-control" name="actuations" value="{{ $promocode->actuations }}">
                            <small class="form-text text-muted">Кількість можлививх використань промокоду</small>
                        </div>

                        <div class="form-group">
                            <label for="promocode-from">Дата початку активності промокоду</label>
                            <input type="datetime-local" class="form-control" name="from" value="{{ $promocode->from ? date('Y-m-d\TH:i:s', strtotime($promocode->from)) : null  }}">
                            <small class="form-text text-muted">Дата і час початку активності</small>
                        </div>

                        <div class="form-group">
                            <label for="promocode-to">Дата завершення активності промокоду</label>
                            <input type="datetime-local" class="form-control" name="to" value="{{ $promocode->to ? date('Y-m-d\TH:i:s', strtotime($promocode->to)) : null }}">
                            <small class="form-text text-muted">Дата і час завершення активності</small>
                        </div>

                        <div class="form-group">
                            <label for="promocode-discount-type">Вид знижки (% або сума)</label>
                            <select class="form-control" name="discount_type" id="discount_type" required>
                                <option {{ $promocode->discount_type === Promocode::DISCOUNT_TYPE_PERCENT ? 'selected' : null }} value="{{ Promocode::DISCOUNT_TYPE_PERCENT }}">%</option>
                                <option {{ $promocode->discount_type === Promocode::DISCOUNT_TYPE_VALUE ? 'selected' : null }} value="{{ Promocode::DISCOUNT_TYPE_VALUE }}">Сума (грн.)</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="promocode-discount-value">Значення знижки промокоду</label>
                            <input type="number" class="form-control" name="discount_value" required value="{{ $promocode->discount_value }}">
                            <small class="form-text text-muted">Значення знижки</small>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary"><a href="{{ route('promocodes') }}">Close</a></button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
