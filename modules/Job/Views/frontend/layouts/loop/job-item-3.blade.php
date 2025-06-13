@php
    $country = Nnjeim\World\Models\Country::find($row->country_id);
    $city = Nnjeim\World\Models\City::find($row->location_id);
@endphp

<!-- Job Block-three -->

<div class="inner-box">
    <div class="content">
        @if($row->company && $company_logo = $row->getThumbnailUrl())
            <span class="company-logo">
                <a href="{{ $row->company->getDetailUrl() }}"><img src="{{ $company_logo }}" alt="{{ $row->company ? $row->company->name : 'company' }}"></a>
            </span>
        @endif
        <h4><a href="{{ $row->getDetailUrl() }}">{{ $row->title }}</a></h4>
        <ul class="job-info">
           <li><span class="icon flaticon-briefcase"></span> {{ $row->name }}</li>
            @if($country || $city)
                <li><span class="icon flaticon-map-locator"></span>{{ $country->name ?? ''}}, {{ $city->name ?? '' }}</li>
            @endif
            
        </ul>
    </div>
    <ul class="job-other-info">
        <li class="time">{{ $row->name }}</li>
        
        @if($row->is_featured)
            <li class="privacy">{{ __("Featured") }}</li>
        @endif
        @if($row->is_urgent)
            <li class="required">{{ __("Urgent") }}</li>
        @endif
    </ul>
    <button class="bookmark-btn @if($row->wishlist) active @endif service-wishlist" data-id="{{$row->id}}" data-type="{{$row->type}}">
        <img src="{{ asset('images/loading.gif') }}" class="loading-icon" alt="loading" />
        <span class="flaticon-bookmark"></span>
    </button>
</div>
