<div class="col-lg-6">
    <div class="categories-card">
        <div class="row">
            <div class="col-sm-5">
                <div class="img-wrap">
                    <img src="{{ asset('/images/races/volya-fest-online.jpg') }}" alt="category" class="bg-image-pos">
                </div>
            </div>
            <div class="col-sm-7">
                <h3 class="title">Воля.fest.online</h3>
                <div class="descr custom-color">1 лютого - 1 квітня</div>
                <button type="button" class="btn" data-toggle="modal" data-target="#registr_modal-volyaFestOnline">ЗАРЕЄСТРУВАТИСЬ</button>
                <a class="mt-2 text-decoration-underline" href="{{ route('race-participants', ['raceId' => \App\Models\Race::getIdBySlug('freedom-fest-2024-online')]) }}">Список учасників</a>
            </div>
        </div>
    </div>
</div>
