<?php

use Illuminate\Support\Facades\Route;

Route::get('/','JobController@index')->name('job.admin.index');
Route::get('/create','JobController@create')->name('job.admin.create');
Route::get('/edit/{id}', 'JobController@edit')->name('job.admin.edit');
Route::post('/bulkEdit','JobController@bulkEdit')->name('job.admin.bulkEdit');
Route::post('/store/{id}','JobController@store')->name('job.admin.store');
Route::get('/getForSelect2','JobController@getForSelect2')->name('job.admin.getForSelect2');

//Job Types
Route::get('/job-type','JobTypeController@index')->name('job.admin.type.index');
Route::get('/job-type/edit/{id}','JobTypeController@edit')->name('job.admin.type.edit');
Route::post('/job-type/store/{id}','JobTypeController@store')->name('job.admin.type.store');
Route::post('/job-type/editBulk','JobTypeController@editBulk')->name('job.admin.type.bulkEdit');

Route::get('/all-applicants','JobController@allApplicants')->name('job.admin.allApplicants');
Route::get('/all-applicants/{status}/{id}','JobController@applicantsChangeStatus')->name('job.admin.applicants.changeStatus');
Route::post('/all-applicants/bulkEdit','JobController@applicantsBulkEdit')->name('job.admin.applicants.bulkEdit');
Route::get('/all-applicants/export','JobController@applicantsExport')->name('job.admin.applicants.export');

Route::get('/category','JobCategoryController@index')->name('job.admin.category.index');
Route::get('/category/getForSelect2','JobCategoryController@getForSelect2')->name('job.admin.category.getForSelect2');
Route::get('/category/edit/{id}','JobCategoryController@edit')->name('job.admin.category.edit');
Route::post('/category/store/{id}','JobCategoryController@store')->name('job.admin.category.store');
Route::post('/category/bulkEdit','JobCategoryController@bulkEdit')->name('job.admin.category.bulkEdit');


Route::delete('/applicant/{id}','JobController@removeApplicant')->name('job.admin.removeApplicant');

Route::delete('/remove-job/{id}','JobController@removeExpireJob')->name('job.admin.removeJob');
Route::get('/job/{status}/{id}','JobController@jobStatusChange')->name('job.admin.job.changeStatus');

Route::post('/interview-setup/{id}','JobController@interviewSetup')->name('job.admin.interviewSetup');


Route::get('/overview','JobController@jobOverview')->name('job.admin.overview');
Route::get('/shortlisted','JobController@jobShortlisted')->name('job.admin.shortlisted');
Route::get('/hired','JobController@jobHired')->name('job.admin.hired');
Route::get('/not-interested','JobController@jobNotInterested')->name('job.admin.not-interested');

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