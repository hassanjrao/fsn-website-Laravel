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

// Home starts
Route::get("/about","SiteController@about")->name("about");
Route::get("/blogs","SiteController@blogs")->name("blog-list");
// Home ends


// companies starts
Route::get("/cargurus","SiteController@carGurus")->name("car-gurus");
Route::get("/autozone","SiteController@autozone")->name("autozone");
Route::get("/autozone-near-me","SiteController@autozoneNearMe")->name("autozone-near-me");
Route::get("/autotrader","SiteController@autotrader")->name("autotrader");
Route::get("/trulia","SiteController@trulia")->name("trulia");
// companies ends


// Homes & Houses starts
Route::get("/homes","SiteController@homes")->name("homes");
Route::get("/homes-for-sale","SiteController@homesForSale")->name("homes-for-sale");
Route::get("/homes-for-sale-near-me","SiteController@homesForSaleNearMe")->name("homes-for-sale-near-me");
Route::get("/house-for-sale","SiteController@houseForSale")->name("house-for-sale");
Route::get("/house-for-sale-near-me","SiteController@houseForSaleNearMe")->name("house-for-sale-near-me");
// Homes & Houses ends


// Cars starts
Route::get("/cars-for-sale","SiteController@carsForSale")->name("cars-for-sale");
Route::get("/used-cars","SiteController@usedCars")->name("used-cars");
Route::get("/bikes-shop","SiteController@bikesShop")->name("bikes-shop");
Route::get("used-cars-for-sale","SiteController@usedCarsForSale")->name("used-cars-for-sale");
Route::get("motorcycle-sale","SiteController@motorcycleSale")->name("motorcycle-sale");
// Cars ends


// Bikes & Shops starts
Route::get("/bikes-shop-near-me","SiteController@bikesShopNearMe")->name("bikes-shop-near-me");
Route::get("/car-gurus-used-cars","SiteController@carGurusUsedCars")->name("car-gurus-used-cars");
Route::get("/car-for-sale-near-me","SiteController@carForSaleNearMe")->name("car-for-sale-near-me");
Route::get("/used-cars-for-sale-near-me","SiteController@usedCarsForSaleNearMe")->name("used-cars-for-sale-near-me");
Route::get("/classic-cars-for-sale","SiteController@classicCarsForSale")->name("classic-cars-for-sale");
// Bikes & Shops ends



// cities pages routes starts
Route::get('/cars-for-sale-in-{city}', "SiteController@carsForSaleCities")->name("cars-for-sale-cities");
Route::get('/cargurus-in-{city}', "SiteController@carGurusCities")->name("car-gurus-city");
Route::get('/car-gurus-used-cars-in-{city}', "SiteController@carGurusUsedCarsCities")->name("car-gurus-used-cars-cities");
// cities pages routes ends





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




