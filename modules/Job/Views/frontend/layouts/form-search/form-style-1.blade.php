<form method="get" action="{{ (!empty($category) || !empty($location)) ? route('job.search') : request()->fullUrl() }}" >
    @php
    $job_sidebar_search_fields = setting_item_array('job_sidebar_search_fields');
    $job_sidebar_search_fields = array_values(\Illuminate\Support\Arr::sort($job_sidebar_search_fields, function ($value) {
        return $value['position'] ?? 0;
    }));
    @endphp
    @if($job_sidebar_search_fields)
        @foreach($job_sidebar_search_fields as $key => $val)
            @php $val['title'] = $val['title_'.app()->getLocale()] ?? $val['title'] ?? "" @endphp
            @if(request()->get('_layout') == 'v2' && in_array($val['type'], ['location', 'keyword', 'category', 'country', 'city'])) @continue @endif
            @includeIf("Job::frontend.layouts.form-search.fields.form-style-1." . $val['type'])
        @endforeach
    @endif
    <div class="form-group col-lg-3">
                                    <select id="country_select" name="country" class="form-control">
                                        <option value="">{{ __("Select Country") }}</option>
                                        @foreach($countries as $country)
                                            <option value="{{ $country->id }}">{{ $country->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group col-lg-3">
                                    <select id="city_select" name="location" class="form-control">
                                        <option value="">{{ __("Select City") }}</option>
                                        {{-- Options will be populated dynamically --}}
                                    </select>
                                </div>
    <div class="wrapper-submit flex-middle col-xs-12 col-md-12">
        @if(isset($_GET['_layout']))
            <input type="hidden" name="_layout" value="{{ $_GET['_layout'] }}">
        @endif
        <button type="submit" class="theme-btn btn-style-one bg-blue">{{ __("Find Jobs") }}</button>
    </div>
</form>
