<div class="col-lg-6">
    <div class="categories-card">
        <div class="row">
            <div class="col-sm-5">
                <div class="img-wrap">
                    <img src="{{ asset('/images/category3.jpg') }}" alt="category" class="bg-image-pos">
                </div>
            </div>
            <div class="col-sm-7">
                <h3 class="title">Воля.fest</h3>
                <div class="descr custom-color">25.08.23 - забіг, який відбудеться в Лісогринівецькому лісі.</div>
                <button type="button" class="btn" data-toggle="modal" data-target="#registr_modal-volyaFest">ЗАРЕЄСТРУВАТИСЬ</button>
                <a class="mt-2 text-decoration-underline" href="{{ route('race-participants', ['raceId' => \App\Models\Race::getIdBySlug('freedom-fest-2023')]) }}">Список учасників</a>
            </div>
        </div>
    </div>
</div>
