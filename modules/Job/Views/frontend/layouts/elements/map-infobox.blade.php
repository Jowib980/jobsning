
<div class="map-box">
    <div class="map-listing-item">
        <div class="inner-box">
            <div class="infoBox-close"><i class="fa fa-times"></i></div>
            @if($row->company && $company_logo = $row->getThumbnailUrl())
                <div class="image-box">
                    <a class="image" href="{{ $row->company->getDetailUrl() }}"><img src="{{ $company_logo }}" alt="{{ $row->company ? $row->company->name : 'company' }}"></a>
                </div>
            @endif
            <div class="content">
                <h3><a href="{{ $row->getDetailUrl() }}">{{ $row->title }}</a></h3>
                <ul class="job-info">
                    <li><span class="icon flaticon-briefcase"></span> {{ $row->name }}</li>
                   <li><span class="icon flaticon-map-locator"></span> {{ $row->name }}</li>
                    
                </ul>
            </div>
        </div>
    </div>
</div>
