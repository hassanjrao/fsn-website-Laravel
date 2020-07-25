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
       
        return view("about",["ctis"=>$this->cities]);
    }

    public function blogs()
    {
       
        return view("blog-list",["ctis"=>$this->cities]);
    }  
    //  Home ends



    //  Companies starts
    public function carGurus()
    {
        return view("car-gurus",["ctis"=>$this->cities]);   
    }
    public function autozone()
    {
        return view("autozone",["ctis"=>$this->cities]);
    }
    public function autozoneNearMe()
    {
        return view("autozone-near-me",["ctis"=>$this->cities]);
    }
    public function autotrader()
    {
        return view("autotrader",["ctis"=>$this->cities]);
    }
    public function trulia()
    {
        return view("trulia",["ctis"=>$this->cities]);
    }
    // Companies ends


    // Homes & Houses starts
    public function homes()
    {
        return view("homes",["ctis"=>$this->cities]);
    }
    public function homesForSale()
    {
        return view("homes-for-sale",["ctis"=>$this->cities]);
    }
    public function homesForSaleNearMe()
    {
        return view("homes-for-sale-near-me",["ctis"=>$this->cities]);
    }
    public function houseForSale()
    {
        return view("house-for-sale",["ctis"=>$this->cities]);
    }
    public function houseForSaleNearMe()
    {
        return view("house-for-sale-near-me",["ctis"=>$this->cities]);   
    }
    // Homes & Houses ends


    // cars starts
    public function carsForSale()
    {
        return view("cars-for-sale",["ctis"=>$this->cities]);
    }
    public function usedCars()
    {
        return view("used-cars",["ctis"=>$this->cities]);
    }
    public function bikesShop()
    {
        return view("bikes-shop",["ctis"=>$this->cities]);
    }
    public function usedCarsForSale()
    {
        return view("used-cars-for-sale",["ctis"=>$this->cities]);
    }
    public function motorcycleSale()
    {
        return view("motorcycle-sale",["ctis"=>$this->cities]);
    }
    // cars ends


    // Bikes & Shops Starts
    public function bikesShopNearMe()
    {
        return view("bikes-shop-near-me",["ctis"=>$this->cities]);
    }
    public function carGurusUsedCars()
    {
        return view("car-gurus-used-cars",["ctis"=>$this->cities]);
    }
    public function carForSaleNearMe()
    {
        return view("car-for-sale-near-me",["ctis"=>$this->cities]);
    }
    public function usedCarsForSaleNearMe()
    {
        return view("used-cars-for-sale-near-me",["ctis"=>$this->cities]);
    }
    public function classicCarsForSale()
    {
        return view("classic-cars-for-sale",["ctis"=>$this->cities]);
    }
    // Bikes & Shops Ends




    // Cities pages starts
    public function carsForSaleCities($ct)
    {
        $city = strtolower(preg_replace('/-/', ' ', $ct)); 
        $city_info = City::where("city", $city)->get();
        $content = Content::where("page", "cars for sale")->get();

        return view("car-gurus", ["ctis" => $this->cities, "infos" => $city_info, "content" => $content]);
    }
    public function carGurusCities($ct)
    {
        $city = strtolower(preg_replace('/-/', ' ', $ct)); 
        $city_info = City::where("city", $city)->get();
        $content = Content::where("page", "cargurus city")->get();

        return view("cities-pages.car-gurus-city", ["ctis" => $this->cities, "infos" => $city_info, "content" => $content]);
    }
    public function carGurusUsedCarsCities($ct)
    {
        $city = strtolower(preg_replace('/-/', ' ', $ct));
        $city_info = City::where("city", $city)->get();
        $content = Content::where("page", "cargurus used cars")->get();

        return view("car-gurus-used-cars-cities", ["ctis" => $this->cities, "infos" => $city_info, "content" => $content]);
    }
   
}
