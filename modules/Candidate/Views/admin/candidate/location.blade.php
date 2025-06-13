    @php
        $candidate = $row->candidate;
        $selectedCountry = $selectedCountry ?? old('country_id');
        $selectedState = $selectedState ?? old('state_id');
        $selectedCity = $selectedCity ?? old('location_id');
        $states = $states ?? collect();
        $cities = $cities ?? collect();
    @endphp
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label class="">{{__("Country")}}</label>
                <!-- <select name="country" class="form-control" id="country-sms-testing">
                    <option value="">{{__('-- Select --')}}</option>
                    @foreach(get_country_lists() as $id=>$name)
                        <option @if(@$candidate->country==$id) selected @endif value="{{$id}}">{{$name}}</option>
                    @endforeach
                </select>-->  
                <select id="country_select" name="country" class="form-control">
                    <option value="">{{ __("Select Country") }}</option>
                        @foreach($countries as $country)
                            <option value="{{ $country->id }}" {{ old('country', $selectedCountry) == $country->id ? 'selected' : '' }}>
                                {{ $country->name }}
                            </option>
                        @endforeach
                </select>          
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>{{__("State")}}</label>
                <!-- <input type="text" value="{{old('city',@$candidate->city)}}" name="city" placeholder="{{__("City")}}" class="form-control"> -->
                <select id="state_select" name="city" class="form-control">
                    <option value="">{{ __("Select State") }}</option>
                        {{-- Options will be populated dynamically --}}
                        @foreach($states as $state)
                            <option value="{{ $state->id }}" {{ old('city', $selectedState) == $state->id ? 'selected' : '' }}>
                               {{ $state->name }}
                            </option>
                        @endforeach
                </select>
            </div>
        </div>
         <div class="col-md-4">
            <div class="form-group">
                <label>{{__("City")}}</label>
                <select id="city_select" name="location_id" class="form-control">
                    <option value="">{{ __("Select City") }}</option>
                        {{-- Options will be populated dynamically --}}
                        @foreach($cities as $city)
                            <option value="{{ $city->id }}" {{ old('location_id', $selectedCity) == $city->id ? 'selected' : '' }}>
                                {{ $city->name }}
                            </option>
                         @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label>{{ __('Address Line')}}</label>
                <input type="text" value="{{old('address',@$candidate->address)}}" placeholder="{{ __('Address')}}" name="address" class="form-control">
            </div>
        </div>
    </div>
   
    <div class="form-group">
        <label class="control-label">{{__("The geographic coordinate")}}</label>
        <div class="control-map-group">
            <div id="map_content"></div>
            <input type="text" placeholder="{{__("Search by name...")}}" class="bravo_searchbox form-control" autocomplete="off" onkeydown="return event.key !== 'Enter';">
            <div class="g-control">
                <div class="form-group">
                    <label>{{__("Map Latitude")}}:</label>
                    <input type="text" name="map_lat" class="form-control" value="{{@$candidate->map_lat ?? "51.505"}}" onkeydown="return event.key !== 'Enter';">
                </div>
                <div class="form-group">
                    <label>{{__("Map Longitude")}}:</label>
                    <input type="text" name="map_lng" class="form-control" value="{{@$candidate->map_lng ?? "-0.09"}}" onkeydown="return event.key !== 'Enter';">
                </div>
                <div class="form-group">
                    <label>{{__("Map Zoom")}}:</label>
                    <input type="text" name="map_zoom" class="form-control" value="{{@$candidate->map_zoom ?? "8"}}" onkeydown="return event.key !== 'Enter';">
                </div>
            </div>
        </div>
    </div>


<script type="text/javascript">
document.addEventListener('DOMContentLoaded', function () {
    const selectedState = '{{ $selectedState }}';
    const selectedCity = '{{ $selectedCity }}';

    const $country = $('#country_select');
    const $state = $('#state_select');
    const $city = $('#city_select');

    function loadStates(countryId, preselect = null) {
        $state.html('<option value="">{{ __("Select State") }}</option>');
        $city.html('<option value="">{{ __("Select City") }}</option>');

        if (countryId) {
            fetch(`/get-states/${countryId}`)
                .then(res => res.json())
                .then(states => {
                    states.forEach(state => {
                        let selected = preselect == state.id ? 'selected' : '';
                        $state.append(`<option value="${state.id}" ${selected}>${state.name}</option>`);
                    });

                    if (preselect) {
                        loadCities(preselect, selectedCity);
                    }
                });
        }
    }

    function loadCities(stateId, preselect = null) {
        $city.html('<option value="">{{ __("Select City") }}</option>');
        if (stateId) {
            fetch(`/get-cities/${stateId}`)
                .then(res => res.json())
                .then(cities => {
                    cities.forEach(city => {
                        let selected = preselect == city.id ? 'selected' : '';
                        $city.append(`<option value="${city.id}" ${selected}>${city.name}</option>`);
                    });
                });
        }
    }

    // On change
    $country.on('change', function () {
        loadStates(this.value);
    });

    $state.on('change', function () {
        loadCities(this.value);
    });

    // On edit page load
    if ($country.val()) {
        loadStates($country.val(), selectedState);
    }
});
</script>
