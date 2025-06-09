
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>{{__("Company name")}}</label>
                <input type="text" value="{{old('name',$translation->name)}}" name="name" placeholder="{{__("Company name")}}" class="form-control">
            </div>
        </div>
        @if(is_default_lang())
        <div class="col-md-6">
            <div class="form-group">
                <label>{{ __('E-mail')}}</label>
                <input type="email" required value="{{old('email',$row->email)}}" placeholder="{{ __('Email')}}" name="email" class="form-control"  >
            </div>
        </div>
        @endif
        <div class="col-md-6">
            <div class="form-group">
                <label>{{ __('Phone Number')}}</label>
                <input type="text" value="{{old('phone',$row->phone)}}" placeholder="{{ __('Phone')}}" name="phone" class="form-control" required   >
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>{{__("Website")}}</label>
                <input type="text" value="{{old('website',$row->website)}}" name="website" placeholder="{{__("Website")}}" class="form-control">
            </div>
        </div>
        @if(is_default_lang())
        <div class="col-md-6">
            <div class="form-group">
                <label>{{ __('Est. Since')}}</label>
                <input type="text" value="{{ old('founded_in',$row->founded_in ? date("Y/m/d",strtotime($row->founded_in)) :'') }}" placeholder="{{ __('Est. Since')}}" name="founded_in" class="form-control has-datepicker input-group date">
            </div>
        </div>
        @endif
        @php
            $selectedCountry = $selectedCountry ?? old('country');
            $selectedState = $selectedState ?? old('state');
            $selectedCity = $selectedCity ?? old('city');
            $states = $states ?? collect();
            $cities = $cities ?? collect();
        @endphp
        <div class="col-md-6">
            <div class="form-group">
                <label>{{ __('Address')}}</label>
                <input type="text" value="{{old('address',$row->address)}}" placeholder="{{ __('Address')}}" name="address" class="form-control">
            </div>
        </div>
        <!-- <div class="col-md-6">
            <div class="form-group">
                <label>{{__("City")}}</label>
                <input type="text" value="{{old('city',$row->city)}}" name="city" placeholder="{{__("City")}}" class="form-control">
            </div>
        </div> -->
        <div class="col-md-6">
            <div class="form-group">
                <label>{{__("Country")}}</label>
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
        <div class="col-md-6">
            <!-- <div class="form-group">
                <label>{{__("State")}}</label>
                <input type="text" value="{{old('state',$row->state)}}" name="state" placeholder="{{__("State")}}" class="form-control">
            </div> -->
            <div class="form-group">
                <label>{{__("State")}}</label>
                <select id="state_select" name="state" class="form-control">
                    <option value="">{{ __("Select State") }}</option>
                       {{-- Options will be populated dynamically --}}
                        @foreach($states as $state)
                            <option value="{{ $state->id }}" {{ old('state', $selectedState) == $state->id ? 'selected' : '' }}>
                                {{ $state->name }}
                            </option>
                        @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>{{__("City")}}</label>
                <select id="city_select" name="city" class="form-control">
                    <option value="">{{ __("Select City") }}</option>
                       {{-- Options will be populated dynamically --}}
                        @foreach($cities as $city)
                            <option value="{{ $city->id }}" {{ old('city', $selectedCity) == $city->id ? 'selected' : '' }}>
                                {{ $city->name }}
                            </option>
                        @endforeach
                </select>
            </div>
        </div>
        <!-- <div class="col-md-6">
            <div class="form-group">
                <label class="">{{__("Country")}}</label>
                <select name="country" class="form-control" id="country-sms-testing">
                    <option value="">{{__('-- Select --')}}</option>
                    @foreach(get_country_lists() as $id=>$name)
                        <option @if($row->country==$id) selected @endif value="{{$id}}">{{$name}}</option>
                    @endforeach
                </select>
            </div>
        </div> -->
        <div class="col-md-6">
            <div class="form-group">
                <label>{{__("Zip Code")}}</label>
                <input type="text" value="{{old('zip_code',$row->zip_code)}}" name="zip_code" placeholder="{{__("Zip Code")}}" class="form-control">
            </div>
        </div>
        @if(is_default_lang())
        <div class="col-md-6">
            <div class="form-group">
                <input @if($row->allow_search) checked @endif type="checkbox" name="allow_search" value="1" class="form-control">
                <label>{{__("Allow In Search & Listing")}}</label>
            </div>
        </div>
        @endif
        <div class="col-md-12">
            <div class="form-group">
                <label class="control-label">{{ __('About Company')}}</label>
                <div class="">
                    <textarea name="about" class="d-none has-ckeditor" cols="30" rows="10">{{old('about',$translation->about)}}</textarea>
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