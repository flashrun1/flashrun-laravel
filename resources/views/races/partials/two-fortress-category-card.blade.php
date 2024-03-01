<div class="col-lg-6">
    <div class="categories-card">
        <div class="row">
            <div class="col-sm-5">
                <div class="img-wrap">
                    <img src="{{ asset('/images/two-fortress.jpg') }}" alt="category" class="bg-image-pos">
                </div>
            </div>
            <div class="col-sm-7">
                <h3 class="title">2 Фортеці</h3>
                <div class="descr custom-color">09.06.24 - Хотин - Камʼянець подільський</div>
                <button type="button" class="btn" data-toggle="modal" data-target="#registr_modal-two-fortress">ЗАРЕЄСТРУВАТИСЬ</button>
                <a class="mt-2 text-decoration-underline" href="{{ route('race-participants', ['raceId' => \App\Models\Race::getIdBySlug('two-fortress')]) }}">Список учасників</a>
            </div>
        </div>
    </div>
</div>
