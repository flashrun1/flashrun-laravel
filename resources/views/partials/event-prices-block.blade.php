<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="register-event-price-block py-3 @php echo (!\Carbon\Carbon::parse('2022-08-07')->isPast())?'':'text-muted'@endphp" style="font-size: 14px;border: 1px solid rgba(0, 0, 0, 0.1);display: flex;align-items: center;justify-content: center;">
                ДО 07.08 -&nbsp;<span class="event-date-price">400грн</span>
            </div>
        </div>
        <div class="col-md-3">
            <div class="register-event-price-block py-3 @php echo (!\Carbon\Carbon::now()->betweenIncluded(\Carbon\Carbon::parse('2022-08-08'), \Carbon\Carbon::parse('2022-08-14'))) ? 'text-muted' : '' @endphp" style="font-size: 14px;border: 1px solid rgba(0, 0, 0, 0.1);display: flex;align-items: center;justify-content: center;">
                8.08 - 14.08 - <span class="event-date-price">500грн</span>
            </div>
        </div>
        <div class="col-md-3">
            <div class="register-event-price-block py-3 @php echo (!\Carbon\Carbon::now()->betweenIncluded(\Carbon\Carbon::parse('2022-08-15'), \Carbon\Carbon::parse('2022-08-19'))) ? 'text-muted' : '' @endphp" style="font-size: 14px;border: 1px solid rgba(0, 0, 0, 0.1);display: flex;align-items: center;justify-content: center;">
                15.08 - 19.08 - <span class="event-date-price">600грн</span>
            </div>
        </div>
        <div class="col-md-3">
            <div class="register-event-price-block py-3 @php echo (\Carbon\Carbon::now()->isBefore(\Carbon\Carbon::parse('2022-08-21'))) ? 'text-muted':''@endphp" style="font-size: 14px;border: 1px solid rgba(0, 0, 0, 0.1);;display: flex;align-items: center;justify-content: center;">
                21.08 - <span class="event-date-price">700грн</span>
            </div>
        </div>
    </div>
</div>
