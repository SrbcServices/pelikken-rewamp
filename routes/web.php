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
use App\Http\Controllers\settingsController;
use App\Http\Controllers\aboutController;
use App\Http\Controllers\CommendsController;
use App\Http\Controllers\termsController;
use App\Http\Controllers\privacyController;
use App\Http\Controllers\contactController;
use App\Http\Controllers\SubscriberController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\FrontentcontactController;
use App\Http\Controllers\authController;

Route::get('/admin', function () {
    return view('layouts.admin_layout');
});

//category

Route::post('/admin/category',[CategoryController::class,'store']);

Route::get('/admin/category',[CategoryController::class,'index']);

Route::post('/admin/categoryupdate/{id}',[CategoryController::class,'update']);

Route::get('/admin/categorydelete/{id}',[CategoryController::class,'delete']);


//sub-category

Route::post('/admin/sub_category',[SubCategoryController::class,'store']);

Route::get('/admin/sub_category',[SubCategoryController::class, 'index']);

Route::post('/admin/sub_categoryupdate/{id}',[SubCategoryController::class,'update']);

Route::get('/admin/sub_categorydelete/{id}',[SubCategoryController::class,'delete']);

//Condinent

Route::post('/admin/condinent',[CondinentController::class,'store']);

Route::get('/admin/condinent',[CondinentController::class,'index']);

Route::post('/admin/condinentupdate/{id}',[CondinentController::class,'update']);

Route::get('/admin/condinentdelete/{id}',[CondinentController::class,'delete']);

//country

Route::post('/admin/country',[CountryController::class,'store']);

Route::get('/admin/country',[CountryController::class,'index']);

Route::post('/admin/countryupdate/{id}',[CountryController::class,'update']);

Route::get('/admin/countrydelete/{id}',[CountryController::class,'delete']);
//tags

Route::post('/admin/tags',[TagsController::class,'store']);

Route::get('/admin/tags',[TagsController::class,'index']);

Route::post('/admin/tagsupdate/{id}',[TagsController::class,'update']);

Route::get('/admin/tagsdelete/{id}',[TagsController::class,'delete']);

//sources

Route::post('/admin/source',[SourceController::class,'store']);

Route::get('/admin/source',[SourceController::class,'index']);

Route::post('/admin/sourceupdate/{id}',[SourceController::class,'update']);

Route::get('/admin/sourcedelete/{id}',[SourceController::class,'delete']);

//ads

Route::post('/admin/ads',[AdsController::class,'store']);

Route::get('/admin/ads',[AdsController::class,'index']);

Route::get('/admin/adsdelete/{id}',[AdsController::class,'delete']);


//news

Route::get('/fetch_sub_category/{id}',[NewsController::class,'fetch_sub_category']);

Route::get('/fetch_country/{id}',[NewsController::class,'fetch_country']);

//header

//settings

Route::get('/admin/settings',[settingsController::class,'settings']);

Route::post('/admin/settings',[settingsController::class,'store']);

//about page

Route::get('admin/about',[aboutController::class,'about']);

Route::post('admin/about',[aboutController::class,'store']); 

//news

Route::get('/news',[frontentController::class,'newses']);

//Terms and condition

Route::get('/admin/terms',[termsController::class,'terms']);
Route::post('/admin/terms',[termsController::class,'terms_store']);
Route::get('/terms&condition',[frontentController::class,'terms_condition']);

//privacy Policy

Route::get('/admin/privacy',[privacyController::class,'privacy']);

Route::post('/admin/privacy',[privacyController::class,'privacy_store']);

//contact as

Route::get('/admin/contact',[contactController::class,'contact']);

Route::post('/admin/contact',[contactController::class,'store']);

Route::get('/contacts',[frontentController::class,'contacts']);

//user blade

Route::get('/admin/user',[contactController::class,'users']);


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




Route::get('/', [frontentController::class,'index']); 
Route::get('/latest-news',[frontentController::class,'latest_news']);

Route::get('/news/{category}/{sub_category?}',[frontentController::class,'category_wise']);

//world loop

Route::get('/world',[frontentController::class,'world']);

// Route::get('/world',[frontentController::class,'country']);

Route::get('/world/{condinent}/{country?}',[frontentController::class,'country_wise']);
Route::get('/pelikken/news/{news}',[frontentController::class,'newses']);
Route::get('/pelikken/news/topics/related/tag',[frontentController::class,'tag']);

//search routes

Route::get('/search',[frontentController::class,'search']);
Route::get('/about',[frontentController::class,'about']);
Route::get('/privacy&policy',[frontentController::class,'privacy']);

//comment routes

Route::post('/comment',[CommendsController::class,'store']);
Route::post('/subscribe',[SubscriberController::class,'store']);
Route::get('/admin/subsciber_update/{id}/{status}',[SubscriberController::class,'update']);

//admin
Route::get('/admin/subscriber',[subscriberController::class,'index']);
Route::get('/admin/dashboard',[dashboardController::class,'dash']);
// Route::get('/admin/dashboard',[dashboardController::class,'register']);

Route::post('/comment',[CommendsController::class,'store']);

Route::get('/admin/comment',[CommendsController::class,'comment_admin']);

Route::get('/admin/comment/{id}/{status?}',[CommendsController::class,'update']);
//Contact Form

Route::post('/contacts',[FrontentcontactController::class,'store']);

Route::get('/admin/message',[contactController::class,'message']);

Route::get('/admin/message/{id}',[frontentcontactController::class,'update']);


//auth

Route::get('/register',[authController::class,'register']);

Route::get('/login',[authController::Class,'login']);




Route::get('/dash',[dashboardController::class,'graph']);

