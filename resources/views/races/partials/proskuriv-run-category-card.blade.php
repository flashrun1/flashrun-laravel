<div class="col-lg-6">
    <div class="categories-card">
        <div class="row">
            <div class="col-sm-5">
                <div class="img-wrap">
                    <img src="{{ asset('/images/races/proskuriv_run_2024.jpg') }}" alt="category" class="bg-image-pos">
                </div>
            </div>
            <div class="col-sm-7">
                <h3 class="title" style="text-transform: none;">ПроскурівRUN</h3>
                <div class="descr custom-color">Весняний крос, який відбудеться 21 квітня 2024 року в дендропарку.</div>
                <button type="button" class="btn" data-toggle="modal" data-target="#registr_modal_proskuriv_run_2024">ЗАРЕЄСТРУВАТИСЬ</button>
                <a class="mt-2 text-decoration-underline" href="{{ route('race-participants', ['raceId' => \App\Models\Race::getIdBySlug('proskuriv-run-2024')]) }}">Список учасників</a>
            </div>
        </div>
    </div>
</div>
