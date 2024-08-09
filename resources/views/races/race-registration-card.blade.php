<div class="col-lg-6">
    <div class="categories-card">
        <div class="row">
            <div class="col-sm-5">
                <div class="img-wrap">
                    <img src="{{ asset('images/logo/' . $race["logo"]) }}" alt="category" class="bg-image-pos">
                </div>
            </div>
            <div class="col-sm-7">
                <h3 class="title">{{ $race['title'] }}</h3>
                <div class="descr custom-color">{{ $race['front_description'] }}</div>
                <button @php echo $race['is_active'] ? null : 'disabled' @endphp type="button" class="btn" data-toggle="modal" data-target="#register_modal_{{ $race['id'] }}">ЗАРЕЄСТРУВАТИСЬ</button>
                @if ($race['document'])
                    <a href="{{ asset('/files/' . $race['document']) }}" target="_blank"
                       class="btn btn-invert document">Положення змагань</a>
                @endif
                <a class="mt-2 text-decoration-underline" href="{{ route('race-participants', ['raceId' => $race['id']]) }}">Список учасників</a>
            </div>
        </div>
    </div>
</div>
