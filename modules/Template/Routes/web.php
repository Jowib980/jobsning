<?php
use Illuminate\Support\Facades\Route;


// Get states by country ID
Route::get('/get-states/{country_id}', function ($country_id) {
    $country = \Nnjeim\World\Models\Country::with('states')->find($country_id);
    return $country ? $country->states : [];
});

// Get cities by state ID
Route::get('/get-cities/{state_id}', function ($state_id) {
    $state = \Nnjeim\World\Models\State::with('cities')->find($state_id);
    return $state ? $state->cities : [];
});

// Route::get('/get-cities/{country_id}', function ($country_id) {
//     $country = \Nnjeim\World\Models\Country::with('states.cities')->find($country_id);
//     return $country ? $country->states->flatMap->cities : [];
// });