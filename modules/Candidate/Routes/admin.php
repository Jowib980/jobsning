<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 7/1/2019
 * Time: 10:02 AM
 */
use Illuminate\Support\Facades\Route;

Route::get('/','CandidateController@index')->name('candidate.admin.index');
Route::get('/create','CandidateController@create')->name('candidate.admin.create');
Route::get('/edit/{id}', 'CandidateController@edit')->name('candidate.admin.edit');
Route::post('/bulkEdit','CandidateController@bulkEdit')->name('candidate.admin.bulkEdit');
Route::post('/store/{id}','CandidateController@store')->name('candidate.admin.store');
Route::get('/getForSelect2','CandidateController@getForSelect2')->name('candidate.admin.getForSelect2');

Route::get('/category','CategoryController@index')->name('candidate.admin.category.index');
Route::get('/category/getForSelect2','CategoryController@getForSelect2')->name('candidate.admin.category.getForSelect2');
Route::get('/category/edit/{id}','CategoryController@edit')->name('candidate.admin.category.edit');
Route::post('/category/store/{id}','CategoryController@store')->name('candidate.admin.category.store');
Route::post('/category/bulkEdit','CategoryController@bulkEdit')->name('candidate.admin.category.bulkEdit');

Route::get('/my-applied','CandidateController@myApplied')->name('candidate.admin.myApplied');
Route::get('/my-applied/delete/{id}','CandidateController@deleteJobApplied')->name('candidate.admin.myApplied.delete');

Route::get('/my-contact','CandidateController@myContact')->name('candidate.admin.myContact');


Route::get('/resume-build','ResumeController@resumeBuild')->name('candidate.admin.resume.form');
Route::post('/resume-create','ResumeController@resumeStore')->name('candidate.admin.resume.create');
Route::get('/resume','ResumeController@index')->name('candidate.admin.resume.index');
Route::get('/resume/download', 'ResumeController@downloadPdf')->name('candidate.admin.resume.download');
Route::get('/resume-edit/{id}','ResumeController@edit')->name('candidate.admin.resume.edit');
Route::post('/resume-update/{id}','ResumeController@update')->name('candidate.admin.resume.update');
