<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\City;
use App\Content;

class Footer
{
    public static function footer()
    {
        $cts = City::all("city");

        return $cts;
    }
}

class SiteController extends Controller
{
    //
    private $cities;

    public function __construct()
    {
        
        $this->cities=Footer::footer();
    
    }
    
    public function index()
    {

        return view('welcome', ["ctis" => $this->cities]);
    }

    // Home starts
    public function about()
    {
        $content = Content::where("page", "about")->get();
        return view("about",["ctis"=>$this->cities,"content"=>$content]);
    }

    public function blogs()
    {
        $content = Content::where("page", "blogs")->get();
        return view("blog-list",["ctis"=>$this->cities,"content"=>$content]);
    }  
    //  Home ends



    //  Companies starts
    public function carGurus()
    {
        $content = Content::where("page", "cargurus")->get();
        return view("car-gurus",["ctis"=>$this->cities,"content"=>$content]);   
    }
    public function autozone()
    {
        $content = Content::where("page", "autozone")->get();
        return view("autozone",["ctis"=>$this->cities,"content"=>$content]);
    }
    public function autozoneNearMe()
    {
        $content = Content::where("page", "autozone near me")->get();
        return view("autozone-near-me",["ctis"=>$this->cities,"content"=>$content]);
    }
    public function autotrader()
    {
        $content = Content::where("page", "autotrader")->get();
        return view("autotrader",["ctis"=>$this->cities,"content"=>$content]);
    }
    public function trulia()
    {
        $content = Content::where("page", "trulia")->get();
        return view("trulia",["ctis"=>$this->cities,"content"=>$content]);
    }
    // Companies ends


    // Homes & Houses starts
    public function homes()
    {
        $content = Content::where("page", "homes")->get();
        return view("homes",["ctis"=>$this->cities,"content"=>$content]);
    }
    public function homesForSale()
    {
        $content = Content::where("page", "homes for sale")->get();
        return view("homes-for-sale",["ctis"=>$this->cities,"content"=>$content]);
    }
    public function homesForSaleNearMe()
    {
        $content = Content::where("page", "homes for sale near me")->get();
        return view("homes-for-sale-near-me",["ctis"=>$this->cities,"content"=>$content]);
    }
    public function houseForSale()
    {
        $content = Content::where("page", "house for sale")->get();
        return view("house-for-sale",["ctis"=>$this->cities,"content"=>$content]);
    }
    public function houseForSaleNearMe()
    {
        $content = Content::where("page", "house for sale near me")->get();
        return view("house-for-sale-near-me",["ctis"=>$this->cities,"content"=>$content]);   
    }
    // Homes & Houses ends


    // cars starts
    public function carsForSale()
    {
        $content = Content::where("page", "cars for sale")->get();
        return view("cars-for-sale",["ctis"=>$this->cities,"content"=>$content]);
    }
    public function usedCars()
    {
        $content = Content::where("page", "used cars")->get();
        return view("used-cars",["ctis"=>$this->cities,"content"=>$content]);
    }
    public function bikesShop()
    {
        $content = Content::where("page", "bikes shop")->get();
        return view("bikes-shop",["ctis"=>$this->cities,"content"=>$content]);
    }
    public function usedCarsForSale()
    {
        $content = Content::where("page", "used cars for sale")->get();
        return view("used-cars-for-sale",["ctis"=>$this->cities,"content"=>$content]);
    }
    public function motorcycleSale()
    {
        $content = Content::where("page", "motorcycle sale")->get();
        return view("motorcycle-sale",["ctis"=>$this->cities,"content"=>$content]);
    }
    // cars ends


    // Bikes & Shops Starts
    public function bikesShopNearMe()
    {
        $content = Content::where("page", "bikes shop near me")->get();
        return view("bikes-shop-near-me",["ctis"=>$this->cities,"content"=>$content]);
    }
    public function carGurusUsedCars()
    {
        $content = Content::where("page", "cargurus used cars")->get();
        return view("car-gurus-used-cars",["ctis"=>$this->cities,"content"=>$content]);
    }
    public function carForSaleNearMe()
    {
        $content = Content::where("page", "car for sale near me")->get();
        return view("car-for-sale-near-me",["ctis"=>$this->cities,"content"=>$content]);
    }
    public function usedCarsForSaleNearMe()
    {
        $content = Content::where("page", "used cars for sale near me")->get();
        return view("used-cars-for-sale-near-me",["ctis"=>$this->cities,"content"=>$content]);
    }
    public function classicCarsForSale()
    {
        $content = Content::where("page", "classic cars for sale")->get();
        return view("classic-cars-for-sale",["ctis"=>$this->cities,"content"=>$content]);
    }
    // Bikes & Shops Ends




    // Cities pages starts
    public function carsForSaleCity($ct)
    {
        $city = strtolower(preg_replace('/-/', ' ', $ct)); 
        $city_info = City::where("city", $city)->get();
        $content = Content::where("page", "cars for sale city")->get();

        return view("cities-pages.cars-for-sale-city", ["ctis" => $this->cities, "infos" => $city_info, "content" => $content]);
    }
    public function carGurusCity($ct)
    {
        $city = strtolower(preg_replace('/-/', ' ', $ct)); 
        $city_info = City::where("city", $city)->get();
        $content = Content::where("page", "cargurus city")->get();

        return view("cities-pages.car-gurus-city", ["ctis" => $this->cities, "infos" => $city_info, "content" => $content]);
    }
    public function carGurusUsedCarsCity($ct)
    {
        $city = strtolower(preg_replace('/-/', ' ', $ct));
        $city_info = City::where("city", $city)->get();
        $content = Content::where("page", "cargurus used cars city")->get();

        return view("cities-pages.car-gurus-used-cars-city", ["ctis" => $this->cities, "infos" => $city_info, "content" => $content]);
    }
    public function autozoneCity($ct)
    {
        $city = strtolower(preg_replace('/-/', ' ', $ct)); 
        $city_info = City::where("city", $city)->get();
        $content = Content::where("page", "autozone city")->get();

        return view("cities-pages.autozone-city", ["ctis" => $this->cities, "infos" => $city_info, "content" => $content]);
    }
    public function autotraderCity($ct)
    {
        $city = strtolower(preg_replace('/-/', ' ', $ct)); 
        $city_info = City::where("city", $city)->get();
        $content = Content::where("page", "autotrader city")->get();

        return view("cities-pages.autotrader-city", ["ctis" => $this->cities, "infos" => $city_info, "content" => $content]);
    }
    public function autozoneNearMeCity($ct)
    {
        $city = strtolower(preg_replace('/-/', ' ', $ct)); 
        $city_info = City::where("city", $city)->get();
        $content = Content::where("page", "autozone near me city")->get();

        return view("cities-pages.autozone-near-me-city", ["ctis" => $this->cities, "infos" => $city_info, "content" => $content]);
    }
    public function bikesShopNearMeCity($ct)
    {
        $city = strtolower(preg_replace('/-/', ' ', $ct)); 
        $city_info = City::where("city", $city)->get();
        $content = Content::where("page", "bikes shop near me city")->get();

        return view("cities-pages.bikes-shop-near-me-city", ["ctis" => $this->cities, "infos" => $city_info, "content" => $content]);
    }
    public function bikesShopCity($ct)
    {
        $city = strtolower(preg_replace('/-/', ' ', $ct)); 
        $city_info = City::where("city", $city)->get();
        $content = Content::where("page", "bikes shop city")->get();

        return view("cities-pages.bikes-shop-city", ["ctis" => $this->cities, "infos" => $city_info, "content" => $content]);
    }
    public function carForSaleNearMeCity($ct)
    {
        $city = strtolower(preg_replace('/-/', ' ', $ct)); 
        $city_info = City::where("city", $city)->get();
        $content = Content::where("page", "car for sale near me city")->get();

        return view("cities-pages.car-for-sale-near-me-city", ["ctis" => $this->cities, "infos" => $city_info, "content" => $content]);
    }
    public function classicCarsForSaleCity($ct)
    {
        $city = strtolower(preg_replace('/-/', ' ', $ct)); 
        $city_info = City::where("city", $city)->get();
        $content = Content::where("page", "classic cars for sale city")->get();

        return view("cities-pages.classic-cars-for-sale-city", ["ctis" => $this->cities, "infos" => $city_info, "content" => $content]);
    }
    public function homesForSaleNearMeCity($ct)
    {
        $city = strtolower(preg_replace('/-/', ' ', $ct)); 
        $city_info = City::where("city", $city)->get();
        $content = Content::where("page", "homes for sale near me city")->get();

        return view("cities-pages.homes-for-sale-near-me-city", ["ctis" => $this->cities, "infos" => $city_info, "content" => $content]);
    }
    public function homesForSaleCity($ct)
    {
        $city = strtolower(preg_replace('/-/', ' ', $ct)); 
        $city_info = City::where("city", $city)->get();
        $content = Content::where("page", "homes for sale city")->get();

        return view("cities-pages.homes-for-sale-city", ["ctis" => $this->cities, "infos" => $city_info, "content" => $content]);
    }
    public function homesCity($ct)
    {
        $city = strtolower(preg_replace('/-/', ' ', $ct)); 
        $city_info = City::where("city", $city)->get();
        $content = Content::where("page", "homes city")->get();

        return view("cities-pages.homes-city", ["ctis" => $this->cities, "infos" => $city_info, "content" => $content]);
    }
    public function houseForSaleNearMeCity($ct)
    {
        $city = strtolower(preg_replace('/-/', ' ', $ct)); 
        $city_info = City::where("city", $city)->get();
        $content = Content::where("page", "house for sale near me city")->get();

        return view("cities-pages.house-for-sale-near-me-city", ["ctis" => $this->cities, "infos" => $city_info, "content" => $content]);
    }
    public function houseForSaleCity($ct)
    {
        $city = strtolower(preg_replace('/-/', ' ', $ct)); 
        $city_info = City::where("city", $city)->get();
        $content = Content::where("page", "house for sale city")->get();

        return view("cities-pages.house-for-sale-city", ["ctis" => $this->cities, "infos" => $city_info, "content" => $content]);
    }
    public function motorcycleSaleCity($ct)
    {
        $city = strtolower(preg_replace('/-/', ' ', $ct)); 
        $city_info = City::where("city", $city)->get();
        $content = Content::where("page", "motorcycle sale city")->get();

        return view("cities-pages.motorcycle-sale-city", ["ctis" => $this->cities, "infos" => $city_info, "content" => $content]);
    }
    public function truliaCity($ct)
    {
        $city = strtolower(preg_replace('/-/', ' ', $ct)); 
        $city_info = City::where("city", $city)->get();
        $content = Content::where("page", "trulia city")->get();

        return view("cities-pages.trulia-city", ["ctis" => $this->cities, "infos" => $city_info, "content" => $content]);
    }
    public function usedCarsForSaleNearMeCity($ct)
    {
        $city = strtolower(preg_replace('/-/', ' ', $ct)); 
        $city_info = City::where("city", $city)->get();
        $content = Content::where("page", "used cars for sale near me city")->get();

        return view("cities-pages.used-cars-for-sale-near-me-city", ["ctis" => $this->cities, "infos" => $city_info, "content" => $content]);
    }
    public function usedCarsForSaleCity($ct)
    {
        $city = strtolower(preg_replace('/-/', ' ', $ct)); 
        $city_info = City::where("city", $city)->get();
        $content = Content::where("page", "used cars for sale city")->get();

        return view("cities-pages.used-cars-for-sale-city", ["ctis" => $this->cities, "infos" => $city_info, "content" => $content]);
    }
    public function usedCarsCity($ct)
    {
        $city = strtolower(preg_replace('/-/', ' ', $ct)); 
        $city_info = City::where("city", $city)->get();
        $content = Content::where("page", "used cars city")->get();

        return view("cities-pages.used-cars-city", ["ctis" => $this->cities, "infos" => $city_info, "content" => $content]);
    }


    // cities pages ends
   
}
