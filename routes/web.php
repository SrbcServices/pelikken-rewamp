<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\CondinentController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\TagsController;
use App\Http\Controllers\SourceController;
use App\Http\Controllers\AdsController;
use App\Http\Controllers\NewsController;



Route::get('/', function () {
   
    return view('layouts.header-frontent');
});

Route::get('/admin', function () {
    return view('layouts.admin_layout');
});

Route::get('/sub_category', function () {
    return view('admin.sub-category');
});
Route::get('/tags', function () {
    return view('admin.tags');
});
Route::get('/condinent', function () {
    return view('admin.condinent');
});
Route::get('/country', function () {
    return view('admin.country');
});
Route::get('/source', function () {
    return view('admin.source');
});
Route::get('/ads', function () {
    return view('admin.ads');
});
Route::get('/news_video', function () {
    return view('admin.news_video');
});

Route::get('/comments', function () {
    return view('admin.comments');
});

Route::get('/edit_news', function(){
    return view('admin.edit_news');
});

Route::get('/all-news', function(){
    return view('admin.all-news');
});
Route::get('/add-news', function(){
    return view('admin.form');
});

Route::get('/all-news',[NewsController::class,'get_all_news'] );

Route::get('/add-news',[NewsController::class,'index'] );

Route::post('/add-news',[NewsController::class,'store']);

//category

Route::post('/category',[CategoryController::class,'store']);

Route::get('/category',[CategoryController::class,'index']);

Route::post('/categoryupdate/{id}',[CategoryController::Class,'update']);

Route::get('/categorydelete/{id}',[CategoryController::Class,'delete']);


//sub-category

Route::post('/sub_category',[SubCategoryController::class,'store']);

Route::get('/sub_category',[SubCategoryController::Class,'index']);

Route::post('/sub_categoryupdate/{id}',[SubCategoryController::Class,'update']);

Route::get('/sub_categorydelete/{id}',[SubCategoryController::Class,'delete']);

//Condinent

Route::post('/condinent',[CondinentController::class,'store']);

Route::get('/condinent',[CondinentController::Class,'index']);

Route::post('/condinentupdate/{id}',[CondinentController::Class,'update']);

Route::get('/condinentdelete/{id}',[CondinentController::Class,'delete']);

//country

Route::post('/country',[CountryController::class,'store']);

Route::get('/country',[CountryController::Class,'index']);

Route::post('/countryupdate/{id}',[CountryController::Class,'update']);

//tags

Route::post('/tags',[TagsController::class,'store']);

Route::get('/tags',[TagsController::Class,'index']);

Route::post('/tagsupdate/{id}',[TagsController::Class,'update']);

Route::get('/tagsdelete/{id}',[TagsController::Class,'delete']);

//sources

Route::post('/source',[SourceController::class,'store']);

Route::get('/source',[SourceController::class,'index']);

Route::post('/sourceupdate/{id}',[SourceController::Class,'update']);

Route::get('/sourcedelete/{id}',[SourceController::Class,'delete']);

//ads

Route::post('/ads',[AdsController::Class,'store']);

Route::get('/ads',[AdsController::Class,'index']);

Route::get('/adsdelete/{id}',[AdsController::Class,'delete']);


//news

Route::get('/fetch_sub_category/{id}',[NewsController::Class,'fetch_sub_category']);

Route::get('/fetch_country/{id}',[NewsController::Class,'fetch_country']);









