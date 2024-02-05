@extends('layouts.app', ['activePage' => 'table', 'titlePage' => __('Промокоди')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Промокоди</h4>
                            <p class="card-category">Таблиця наявних промокодів</p>
                            <a href="#" data-toggle="modal" data-target="#new-promocode-modal" class="btn btn-secondary btn-sm">Створити новий промокод</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class=" text-primary">
                                    <th>ID</th>
                                    <th>Назва</th>
                                    <th>Тип знижки</th>
                                    <th></th>
                                    </thead>
                                    <tbody>
                                    @foreach($promocodes as $promocode)
                                        <tr>
                                            <td>{{ $promocode->id }}</td>
                                            <td>{{ $promocode->code }}</td>
                                            <td>{{ $promocode->discount_value . $promocode->getDiscountTypeForAdmin() }}</td>
                                            <td>
                                                <a href="#">
                                                    <i class="material-icons">edit_note</i>
                                                </a>
                                                <a href="#">
                                                    <i class="material-icons">delete</i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" id="new-promocode-modal" tabindex="-1" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Новий Промокод</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('promocodes.store') }}" id="promocodes.store" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="promocode-name">Промокод</label>
                            <input type="text" class="form-control" required id="promocode-name" name="code" aria-describedby="emailHelp">
                            <small id="emailHelp" class="form-text text-muted">Унікальний промокод</small>
                        </div>
                        <div class="form-group">
                            <label for="promocode-type">Тип промокоду (безлімітний/обмежений)</label>
                            <br>
                            <input type="radio" checked name="type" value="{{ \App\Models\Promocode::TYPE_UNLIMITED }}" class="" id="promocode-type-unlimited" aria-describedby="promocode-type-help"> Безлімітний
                            <br>
                            <input type="radio" name="type" value="{{ \App\Models\Promocode::TYPE_LIMITED_ACTUATIONS }}" class="" id="promocode-type-unlimited" aria-describedby="promocode-type-help"> Обмежена кількість спрацювань
                        </div>
                        <div class="form-group">
                            <label for="promocode-name">Кількість використань</label>
                            <input type="number" class="form-control">
                            <small class="form-text text-muted">Кількість можлививх використань промокоду</small>
                        </div>

                        <div class="form-group">
                            <label for="promocode-from">Дата початку активності промокоду</label>
                            <input type="datetime-local" class="form-control">
                            <small class="form-text text-muted">Дата і час початку активності</small>
                        </div>

                        <div class="form-group">
                            <label for="promocode-to">Дата завершення активності промокоду</label>
                            <input type="datetime-local" class="form-control">
                            <small class="form-text text-muted">Дата і час завершення активності</small>
                        </div>

                        <div class="form-group">
                            <label for="promocode-discount-type">Вид знижки (% або сума)</label>
                            <select class="form-control" name="discount_type" id="discount_type" required>
                                <option value="{{ \App\Models\Promocode::DISCOUNT_TYPE_PERCENT }}">%</option>
                                <option value="{{ \App\Models\Promocode::DISCOUNT_TYPE_PERCENT }}">Сума (грн.)</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="promocode-discount-value">Значення знижки промокоду</label>
                            <input type="number" class="form-control" name="discount_value" required>
                            <small class="form-text text-muted">Значення знижки</small>
                        </div>

                        <button type="submit">Go</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
@endsection
