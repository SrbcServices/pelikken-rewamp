<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\CondinentController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\TagsController;
use App\Http\Controllers\SourceController;
use App\Http\Controllers\AdsController;
use App\Http\Controllers\frontentController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\NewsArrangmentController;

Route::get('/admin', function () {
    return view('layouts.admin_layout');
});


//category

Route::post('/category',[CategoryController::class,'store']);

Route::get('/category',[CategoryController::class,'index']);

Route::post('/categoryupdate/{id}',[CategoryController::class,'update']);

Route::get('/categorydelete/{id}',[CategoryController::class,'delete']);


//sub-category

Route::post('/sub_category',[SubCategoryController::class,'store']);

Route::get('/sub_category',[SubCategoryController::class, 'index']);

Route::post('/sub_categoryupdate/{id}',[SubCategoryController::class,'update']);

Route::get('/sub_categorydelete/{id}',[SubCategoryController::class,'delete']);

//Condinent

Route::post('/condinent',[CondinentController::class,'store']);

Route::get('/condinent',[CondinentController::class,'index']);

Route::post('/condinentupdate/{id}',[CondinentController::class,'update']);

Route::get('/condinentdelete/{id}',[CondinentController::class,'delete']);

//country

Route::post('/country',[CountryController::class,'store']);

Route::get('/country',[CountryController::class,'index']);

Route::post('/countryupdate/{id}',[CountryController::class,'update']);

//tags

Route::post('/tags',[TagsController::class,'store']);

Route::get('/tags',[TagsController::class,'index']);

Route::post('/tagsupdate/{id}',[TagsController::class,'update']);

Route::get('/tagsdelete/{id}',[TagsController::class,'delete']);

//sources

Route::post('/source',[SourceController::class,'store']);

Route::get('/source',[SourceController::class,'index']);

Route::post('/sourceupdate/{id}',[SourceController::class,'update']);

Route::get('/sourcedelete/{id}',[SourceController::class,'delete']);

//ads

Route::post('/ads',[AdsController::class,'store']);

Route::get('/ads',[AdsController::class,'index']);

Route::get('/adsdelete/{id}',[AdsController::class,'delete']);


//news

Route::get('/fetch_sub_category/{id}',[NewsController::class,'fetch_sub_category']);

Route::get('/fetch_country/{id}',[NewsController::class,'fetch_country']);

//header
Route::get('/fetch_sub_category/{id}',[NewsController::class,'fetch_sub_category']);
Route::get('/fetch_country/{id}',[NewsController::class,'fetch_country']);
Route::get('/edit-news/{id}',[NewsController::class,'edit'] );
Route::post('/edit-news/{id}',[NewsController::class,'update'] );
//update options using ajx
Route::get('/news/change_status/{id}/{name}/{status?}',[NewsController::class,'update_options']);
//update thumbnail image
Route::post('news/update/thumbnail',[NewsController::class,'update_thumb']);
//update basic banner image
Route::post('/news/update/multimedia',[NewsController::class,'update_multimedia']);


Route::get('/all-news', function(){
    return view('admin.all-news');
});
Route::get('/add-news', function(){
    return view('admin.form');
});

Route::get('/all-news',[NewsController::class,'get_all_news'] );
Route::get('/add-news',[NewsController::class,'index'] );
Route::post('/add-news',[NewsController::class,'store']);
Route::post('/news/delete',[NewsController::class,'delete_news']);
Route::post('news/update/options/view',[NewsController::class,'update_single_all']);

Route::get('/arrange-news',[NewsArrangmentController::class,'index']);
Route::post('/arrange-news',[NewsArrangmentController::class,'store']);
Route::post('/delete-section',[NewsArrangmentController::class,'delete']);



//frontent news showing area users****************************************************************************
//************************************************************************************************************
Route::get('/', [frontentController::class,'index']); 
Route::get('/latest-news',[frontentController::class,'latest_news']);

Route::get('/news/{category}/{sub_category?}',[frontentController::class,'category_wise']);

//world loop

Route::get('/world',[frontentController::class,'world']);

// Route::get('/world',[frontentController::class,'country']);

Route::get('/world/{condinent}/{country?}',[frontentController::class,'country_wise']);




