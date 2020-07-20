<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// site starts

Route::get('/', "SiteController@index")->name("/");


// cities pages routes starts
Route::get('/mlm-in-{city}', "SiteController@mlmCities")->name("mlm-cities");
Route::get('/network-marketing-in-{city}', "SiteController@networkMarketingCities")->name("network-marketing-cities");
Route::get('/mlm-companies-in-{city}', "SiteController@mlmCompaniesCities")->name("mlm-companies-cities");
// cities pages routes ends


// normal pages routes start
Route::get('/mlm', "SiteController@mlm")->name("mlm");
Route::get('/mlm-companies', "SiteController@mlmCompanies")->name("mlm-companies");
// normal pages routes end


// site ends



Auth::routes();




// admin starts

Route::get('/admin', function () {
    return view('admin.index');
})->middleware("auth");


// admin/city starts
Route::get('/admin/city',"AdminCityController@index")->name("admin.city.index")->middleware("auth");
Route::get('/admin/city/create',"AdminCityController@create")->name("admin.city.create")->middleware("auth");
Route::post('/admin/city/store',"AdminCityController@store")->name("admin.city.store")->middleware("auth");
Route::get('/admin/city/update/{id}',"AdminCityController@show")->name("admin.city.show")->middleware("auth");
Route::post('/admin/city/update/{id}',"AdminCityController@update")->name("admin.city.update")->middleware("auth");
Route::delete('/admin/city/destroy/{id}',"AdminCityController@destroy")->name("admin.city.destroy")->middleware("auth");
// admin/city ends


//  admin/blog starts
Route::get('/admin/blog',"AdminBlogController@index")->name("admin.blog.index")->middleware("auth");
Route::get('/admin/blog/create',"AdminBlogController@create")->name("admin.blog.create")->middleware("auth");
Route::post('/admin/blog/store',"AdminBlogController@store")->name("admin.blog.store")->middleware("auth");
Route::get('/admin/blog/update/{id}',"AdminBlogController@show")->name("admin.blog.show")->middleware("auth");
Route::post('/admin/blog/update/{id}',"AdminBlogController@update")->name("admin.blog.update")->middleware("auth");
Route::delete("/admin/blog/destroy/{id}","AdminBlogController@destroy")->name("admin.blog.destroy")->middleware("auth");
// admin/blog ends



// admin/content starts
Route::get('/admin/content',"AdminContentController@index")->name("admin.content.index")->middleware("auth");
Route::get("/admin/content/create","AdminContentController@create")->name("admin.content.create")->middleware("auth");
Route::post("/admin/content/store","AdminContentController@store")->name("admin.content.store")->middleware("auth");
Route::get("/admin/content/update/{id}","AdminContentController@show")->name("admin.content.show")->middleware("auth");
Route::post('/admin/content/update/{id}',"AdminContentController@update")->name("admin.content.update")->middleware("auth");
Route::delete("/admin/content/destroy/{id}","AdminContentController@destroy")->name("admin.content.destroy")->middleware("auth");
// admin/content ends




