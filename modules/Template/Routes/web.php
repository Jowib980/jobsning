<?php
use Illuminate\Support\Facades\Route;


Route::get('/get-cities/{country_id}', function ($country_id) {
    $country = \Nnjeim\World\Models\Country::with('states.cities')->find($country_id);
    return $country ? $country->states->flatMap->cities : [];
});