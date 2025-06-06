<?php
use Illuminate\Support\Facades\Route;

Route::group(['prefix'=>config('job.job_route_prefix')],function(){
    Route::get('/','JobController@index')->name('job.search');
    Route::get('/{slug}','JobController@detail');

    Route::post('/apply-job', 'JobController@applyJob')->name('job.apply-job');
    Route::get('/'.config('job.job_category_route_prefix').'/{slug}', 'JobController@categoryIndex')->name('job.category.index');
    Route::get('/'.config('job.job_location_route_prefix').'/{slug}', 'JobController@locationIndex')->name('job.location.index');
    Route::get('/{cat_slug}/{location_slug}', 'JobController@categoryLocationIndex')->name('job.category.location.index');
});

// Route::get('/get-cities/{country_id}', function ($country_id) {
//     $country = \Nnjeim\World\Models\Country::with('states.cities')->find($country_id);
//     return $country ? $country->states->flatMap->cities : [];
// });

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
