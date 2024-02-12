<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="register-event-price-block py-3 @php echo (!\Carbon\Carbon::parse('2024-03-15')->isPast())?'':'text-muted'@endphp" style="font-size: 14px;border: 1px solid rgba(0, 0, 0, 0.1);display: flex;align-items: center;justify-content: center;">
                ДО 15.03 -&nbsp;<span class="event-date-price">800грн</span>
            </div>
        </div>
        <div class="col-md-3">
            <div class="register-event-price-block py-3 @php echo (!\Carbon\Carbon::now()->betweenIncluded(\Carbon\Carbon::parse('2024-03-16'), \Carbon\Carbon::parse('2024-03-30'))) ? 'text-muted' : '' @endphp" style="font-size: 14px;border: 1px solid rgba(0, 0, 0, 0.1);display: flex;align-items: center;justify-content: center;">
                16.03 - 30.03 - <span class="event-date-price">900грн</span>
            </div>
        </div>
        <div class="col-md-3">
            <div class="register-event-price-block py-3 @php echo (!\Carbon\Carbon::now()->betweenIncluded(\Carbon\Carbon::parse('2024-04-01'), \Carbon\Carbon::parse('2024-04-19'))) ? 'text-muted' : '' @endphp" style="font-size: 14px;border: 1px solid rgba(0, 0, 0, 0.1);display: flex;align-items: center;justify-content: center;">
                1.04 - 19.04 - <span class="event-date-price">1000грн</span>
            </div>
        </div>
        <div class="col-md-3">
            <div class="register-event-price-block py-3 @php echo (!\Carbon\Carbon::now()->betweenIncluded(\Carbon\Carbon::parse('2024-04-19'), \Carbon\Carbon::parse('2024-04-21'))) ? 'text-muted' : '' @endphp" style="font-size: 14px;border: 1px solid rgba(0, 0, 0, 0.1);;display: flex;align-items: center;justify-content: center;">
                21.04 - <span class="event-date-price">1200грн</span>
            </div>
        </div>
    </div>
</div>
