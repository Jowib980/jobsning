<style>
.currency-toggle {
    display: flex;
    gap: 6px;
}
.currency-toggle label {
    border: 1px solid #ccc;
    border-radius: 6px;
    padding: 10px 12px;
    cursor: pointer;
    text-align: center;
    flex: 1;
    user-select: none;
}
.currency-toggle input[type="radio"] {
    display: none;
}

.currency-option.selected {
    background-color: #e7e7e7 !important;
    color: white;
    border-color: #007bff;
}
.price-value {
    color: black;
}
label.btn.btn-outline-primary.currency-option:hover {
    background-color: #e2e2e2;
}

</style>


<div class="sec-title text-center">
    <h2>{{ setting_item_with_lang('user_plans_page_title', app()->getLocale()) ?? __("Pricing Packages")}}</h2>
    <div class="text">{{ setting_item_with_lang('user_plans_page_sub_title', app()->getLocale()) ?? __("Choose your pricing plan") }}</div>
</div>
<div class="pricing-tabs tabs-box">
    <div class="tab-buttons">
        <h4>{{ setting_item_with_lang('user_plans_sale_text', app()->getLocale()) ?? __('Save up to 10%') }}</h4>
        <ul class="tab-btns">
            <li data-tab="#monthly" class="tab-btn active-btn">{{__('Monthly')}}</li>
            <li data-tab="#annual" class="tab-btn">{{__('Annual')}}</li>
        </ul>
    </div>
    <div class="tabs-content">
        <div class="tab active-tab" id="monthly">
            <div class="content">
                <div class="row">
                    @foreach($plans as $plan)
                        @php 
                            $currency = request('currency') ?? 'inr';
                            $price = $plan->getCurrencyPrice($currency, false);
                            $annualPrice = $plan->getCurrencyPrice($currency, true); // Annual
                            $currencySymbol = [
                                'inr' => '₹',
                                'usd' => '$',
                                'eur' => '€'
                            ][$currency] ?? '$';
                        @endphp
                        @php
                            $translate = $plan->translateOrOrigin(app()->getLocale());
                        @endphp
                        <div class="pricing-table col-lg-4 col-md-6 col-sm-12">
                            <div class="inner-box">
                                @if($plan->is_recommended)
                                    <span class="tag">{{__('Recommended')}}</span>
                                @endif
                                <div class="title">{{$translate->title}}</div>

                                <div class="btn-group currency-toggle" role="group" aria-label="Currency selector">
                                    @php
                                        $dur = $plan->duration . ' ' . $plan->duration_type_text;
                                        $prices = [
                                            'inr' => ['symbol' => '₹', 'value' => $plan->price_inr],
                                            'usd' => ['symbol' => '$', 'value' => $plan->price_usd],
                                            'eur' => ['symbol' => '€', 'value' => $plan->price_eur],
                                        ];
                                    @endphp

                                    @foreach($prices as $key => $data)
                                        <label class="btn btn-outline-primary currency-option">
                                            <input type="radio" name="currency_{{ $plan->id }}" value="{{ $key }}" autocomplete="off" {{ $loop->first ? 'checked' : '' }}>
                                            <span class="price-value">
                                                {{ $data['symbol'] }} {{ number_format($data['value'], 2) }}<br>
                                                <small>/ {{ $dur }}</small>
                                            </span>
                                        </label>
                                    @endforeach
                                </div>

                                <form id="currency-form-{{ $plan->id }}" method="GET" action="{{ route('user.plan.buy', ['id' => $plan->id]) }}">
                                    <input type="hidden" name="currency" id="selected-currency-{{ $plan->id }}" value="inr">
                                </form>
<!-- 
                                <div class="price">{{$plan->price ? format_money($plan->price) : __('Free')}}
                                    @if($plan->price)
                                    <span class="duration">/ {{$plan->duration > 1 ? $plan->duration : ''}} {{$plan->duration_type_text}}</span>
                                    @endif
                                </div> -->
                                <div class="table-content">
                                    {!! clean($translate->content) !!}
                                </div>
                                <div class="table-footer">
                                    @if($user and $user_plan = $user->user_plan and $user_plan->plan_id == $plan->id)
                                        @if($user_plan->is_valid)
                                            <div class="d-flex text-center">
                                                <a href="{{ route('user.plan') }}" class="theme-btn btn-style-one mr-2">{{__("Current Plan")}}</a>
                                                @if(setting_item_with_lang('enable_multi_user_plans'))
                                                    <a href="{{route('user.plan.buy',['id'=>$plan->id])}}" class="theme-btn btn-style-two">{{__('Repurchase')}}</a>
                                                @endif
                                            </div>
                                        @else
                                            <a href="{{route('user.plan.buy',['id'=>$plan->id])}}" class="theme-btn btn-style-two">{{__('Repurchase')}}</a>
                                        @endif
                                    @else
                                        <a href="#" onclick="event.preventDefault(); submitCurrency({{ $plan->id }});" class="theme-btn btn-style-three">
                                            {{ __('Select') }}
                                        </a>

                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="tab" id="annual">
            <div class="content">
                <div class="row">
                    @foreach($plans as $plan)
                        <?php if(!$plan->annual_price) continue;?>
                        <div class="pricing-table col-lg-4 col-md-6 col-sm-12">
                            <div class="inner-box">
                                @if($plan->is_recommended)
                                    <span class="tag">{{__('Recommended')}}</span>
                                @endif
                                <div class="title">{{$plan->title}}</div>
                                <div class="price">{{format_money($plan->annual_price)}} <span class="duration">/ {{__("year")}}</span></div>
                                <div class="table-content">
                                    {!! clean($plan->content) !!}
                                </div>
                                <div class="table-footer">
                                    @if($user and $user_plan = $user->user_plan and $user_plan->plan_id == $plan->id)
                                        @if($user_plan->is_valid)
                                            <div class="d-flex text-center">
                                                <a href="{{ route('user.plan') }}" class="theme-btn btn-style-one mr-2">{{__("Current Plan")}}</a>
                                                @if(setting_item_with_lang('enable_multi_user_plans'))
                                                    <a href="{{route('user.plan.buy',['id'=>$plan->id])}}" class="theme-btn btn-style-two">{{__('Repurchase')}}</a>
                                                @endif
                                            </div>
                                        @else
                                            <a href="{{route('user.plan.buy',['id'=>$plan->id,'annual'=>1])}}" class="theme-btn btn-style-two">{{__('Repurchase')}}</a>
                                        @endif
                                    @else
                                        <a href="{{route('user.plan.buy',['id'=>$plan->id,'annual'=>1])}}" class="theme-btn btn-style-three">{{__('Select')}}</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>


<script>
function submitCurrency(planId) {
    const selectedCurrency = document.querySelector('input[name="currency_' + planId + '"]:checked');
    if (selectedCurrency) {
        document.getElementById('selected-currency-' + planId).value = selectedCurrency.value;
        document.getElementById('currency-form-' + planId).submit();
    }
}

// Highlight selected currency visually
document.querySelectorAll('.currency-toggle input[type="radio"]').forEach(radio => {
    radio.addEventListener('change', function () {
        const all = this.closest('.currency-toggle').querySelectorAll('.currency-option');
        all.forEach(label => label.classList.remove('selected'));
        this.closest('label').classList.add('selected');
    });

    // Initialize default selection
    if (radio.checked) {
        radio.closest('label').classList.add('selected');
    }
});
</script>
