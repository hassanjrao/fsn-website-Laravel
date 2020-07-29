<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\City;
use App\Content;
use App\Blog;

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

        $this->cities = Footer::footer();
        // require_once 'controllers/html_dom/simple_html_dom.php';



    }

    public function index()
    {

        return view('welcome', ["ctis" => $this->cities]);
    }

    // Home starts
    public function about()
    {
        $content = Content::where("page", "about")->get();
        return view("about", ["ctis" => $this->cities, "content" => $content]);
    }
    public function disclaimer()
    {
        $content = Content::where("page", "disclaimer")->get();
        return view("disclaimer", ["ctis" => $this->cities, "content" => $content]);
    }
    public function tos()
    {
        $content = Content::where("page", "tos")->get();
        return view("tos", ["ctis" => $this->cities, "content" => $content]);
    }
    public function privacyPolicy()
    {
        $content = Content::where("page", "privacy policy")->get();
        return view("privacy-policy", ["ctis" => $this->cities, "content" => $content]);
    }
    public function blogs()
    {
        $blogs = blog::paginate(10);
        return view("blog-list", ["ctis" => $this->cities, "blogs" => $blogs]);
    }
    public function blog($title, $id)
    {
        $blog = blog::findorfail($id);
        return view("blog-details", ["ctis" => $this->cities, "blog" => $blog]);
    }

    //  Home ends



    //  Companies starts
    public function carGurus()
    {
        $content = Content::where("page", "cargurus")->get();
        return view("car-gurus", ["ctis" => $this->cities, "content" => $content]);
    }
    public function autozone()
    {
        $content = Content::where("page", "autozone")->get();
        return view("autozone", ["ctis" => $this->cities, "content" => $content]);
    }
    public function autozoneNearMe()
    {
        $content = Content::where("page", "autozone near me")->get();
        return view("autozone-near-me", ["ctis" => $this->cities, "content" => $content]);
    }
    public function autotrader()
    {
        $content = Content::where("page", "autotrader")->get();
        return view("autotrader", ["ctis" => $this->cities, "content" => $content]);
    }
    public function trulia()
    {
        $content = Content::where("page", "trulia")->get();
        return view("trulia", ["ctis" => $this->cities, "content" => $content]);
    }
    // Companies ends


    // Homes & Houses starts
    public function homes()
    {
        $content = Content::where("page", "homes")->get();
        return view("homes", ["ctis" => $this->cities, "content" => $content]);
    }
    public function homesForSale()
    {
        $content = Content::where("page", "homes for sale")->get();
        return view("homes-for-sale", ["ctis" => $this->cities, "content" => $content]);
    }
    public function homesForSaleNearMe()
    {
        $content = Content::where("page", "homes for sale near me")->get();
        return view("homes-for-sale-near-me", ["ctis" => $this->cities, "content" => $content]);
    }
    public function houseForSale()
    {
        $content = Content::where("page", "house for sale")->get();
        return view("house-for-sale", ["ctis" => $this->cities, "content" => $content]);
    }
    public function houseForSaleNearMe()
    {
        $content = Content::where("page", "house for sale near me")->get();
        return view("house-for-sale-near-me", ["ctis" => $this->cities, "content" => $content]);
    }
    // Homes & Houses ends


    // cars starts
    public function carsForSale()
    {
        $content = Content::where("page", "cars for sale")->get();
        return view("cars-for-sale", ["ctis" => $this->cities, "content" => $content]);
    }
    public function usedCars()
    {
        $content = Content::where("page", "used cars")->get();
        return view("used-cars", ["ctis" => $this->cities, "content" => $content]);
    }
    public function bikesShop()
    {
        $content = Content::where("page", "bikes shop")->get();
        return view("bikes-shop", ["ctis" => $this->cities, "content" => $content]);
    }
    public function usedCarsForSale()
    {
        $content = Content::where("page", "used cars for sale")->get();
        return view("used-cars-for-sale", ["ctis" => $this->cities, "content" => $content]);
    }
    public function motorcycleSale()
    {
        $content = Content::where("page", "motorcycle sale")->get();
        return view("motorcycle-sale", ["ctis" => $this->cities, "content" => $content]);
    }
    // cars ends


    // Bikes & Shops Starts
    public function bikesShopNearMe()
    {
        $content = Content::where("page", "bikes shop near me")->get();
        return view("bikes-shop-near-me", ["ctis" => $this->cities, "content" => $content]);
    }
    public function carGurusUsedCars()
    {
        $content = Content::where("page", "cargurus used cars")->get();
        return view("car-gurus-used-cars", ["ctis" => $this->cities, "content" => $content]);
    }
    public function carForSaleNearMe()
    {
        $content = Content::where("page", "car for sale near me")->get();
        return view("car-for-sale-near-me", ["ctis" => $this->cities, "content" => $content]);
    }
    public function usedCarsForSaleNearMe()
    {
        $content = Content::where("page", "used cars for sale near me")->get();
        return view("used-cars-for-sale-near-me", ["ctis" => $this->cities, "content" => $content]);
    }
    public function classicCarsForSale()
    {
        $content = Content::where("page", "classic cars for sale")->get();
        return view("classic-cars-for-sale", ["ctis" => $this->cities, "content" => $content]);
    }
    // Bikes & Shops Ends




    // Cities pages starts
    public function carsForSaleCity($ct)
    {

        $dom = "";
        // scrapping starts
        include('app/functions/simple_html_dom.php');

        try {
            $dom = file_get_html("https://en.wikipedia.org/wiki/$ct", false);
        } catch (\Throwable $th) {
            $dom = "";
        }

        $answer = array();
        if (!empty($dom)) {

            $divClass = $content = "";
            $i = 0;

            error_log("inside dom");
            foreach ($dom->find(".mw-parser-output") as $divClass) {

                error_log("inside 1st for");

                foreach ($divClass->find("p") as $desc) {

                    $text = html_entity_decode($desc->plaintext);
                    $text = preg_replace('/\[.*?\]/', "", $text);
                    $text = preg_replace('/\&#39;/', "", $text);
                    $answer[$i] = html_entity_decode($text);

                    error_log($answer[$i]);

                    $i++;

                    if ($i > 2) {
                        break;
                    }
                }
                error_log($i);
            }
        }
        // scrapping ends


        $city = strtolower(preg_replace('/-/', ' ', $ct));
        $city_info = City::where("city", $city)->first();
        $content = Content::where("page", "cars for sale city")->first();



        return view("cities-pages.cars-for-sale-city", ["ctis" => $this->cities, "infos" => $city_info, "content" => $content, "content2" => $answer]);
    }
    public function carGurusCity($ct)
    {
        // scrapping starts
        include(app_path() . '\functions\simple_html_dom.php');

        $dom = "";
        
        $dom = file_get_html("https://en.wikipedia.org/wiki/$ct", false);

        $answer = array();
        if (!empty($dom)) {

            $divClass = $content = "";
            $i = 0;

            error_log("inside dom");
            foreach ($dom->find(".mw-parser-output") as $divClass) {

                error_log("inside 1st for");

                foreach ($divClass->find("p") as $desc) {

                    $text = html_entity_decode($desc->plaintext);
                    $text = preg_replace('/\[.*?\]/', "", $text);
                    $text = preg_replace('/\&#39;/', "", $text);
                    $answer[$i] = html_entity_decode($text);

                    error_log($answer[$i]);

                    $i++;

                    if ($i > 4) {
                        break;
                    }
                }
                error_log($i);
            }
        }

        // ----------------------------

        $dom2 = file_get_html("https://www.google.com/search?q=pakistan&tbm=nws", false);

        $news = array();
        if (!empty($dom2)) {

            

            $divClass = $news = "";
            $i = 0;

            error_log("inside dom2");
            foreach ($dom2->find(".KWQBje") as $divClass) {

                error_log("inside 1st for");

                // link
                foreach ($divClass->find(".JheGif") as $title) {

                   $news[$i]["title"]=$title->plaintext;
                }

                foreach ($divClass->find(".Y3v8qd") as $caption) {

                    $news[$i]["caption"]=$caption->plaintext;
                 }

                $i++;

                
                error_log("news-title=".$news[$i]["title"]);
                error_log("news-caption=".$news[$i]["caption"]);

                
            }
        }

        // scrapping ends

        $city = strtolower(preg_replace('/-/', ' ', $ct));
        $city_info = City::where("city", $city)->first();
        $content = Content::where("page", "cargurus city")->first();



        return view("cities-pages.car-gurus-city", ["ctis" => $this->cities, "infos" => $city_info, "content" => $content, "content2" => $answer]);
    }
    public function carGurusUsedCarsCity($ct)
    {
        // scrapping starts
        include(app_path() . '\functions\simple_html_dom.php');

        $dom = "";
        try {
            $dom = file_get_html("https://en.wikipedia.org/wiki/$ct", false);
        } catch (\Throwable $th) {
            $dom = "";
        }

        $answer = array();
        if (!empty($dom)) {

            $divClass = $content = "";
            $i = 0;

            error_log("inside dom");
            foreach ($dom->find(".mw-parser-output") as $divClass) {

                error_log("inside 1st for");

                foreach ($divClass->find("p") as $desc) {

                    $text = html_entity_decode($desc->plaintext);
                    $text = preg_replace('/\[.*?\]/', "", $text);
                    $text = preg_replace('/\&#39;/', "", $text);
                    $answer[$i] = html_entity_decode($text);

                    error_log($answer[$i]);

                    $i++;

                    if ($i > 2) {
                        break;
                    }
                }
                error_log($i);
            }
        }
        // scrapping ends

        $city = strtolower(preg_replace('/-/', ' ', $ct));
        $city_info = City::where("city", $city)->first();
        $content = Content::where("page", "cargurus used cars city")->first();

        return view("cities-pages.car-gurus-used-cars-city", ["ctis" => $this->cities, "infos" => $city_info, "content" => $content, "content2" => $answer]);
    }
    public function autozoneCity($ct)
    {

        // scrapping starts
        include(app_path() . '\functions\simple_html_dom.php');

        $dom = "";
        try {
            $dom = file_get_html("https://en.wikipedia.org/wiki/$ct", false);
        } catch (\Throwable $th) {
            $dom = "";
        }

        $answer = array();
        if (!empty($dom)) {

            $divClass = $content = "";
            $i = 0;

            error_log("inside dom");
            foreach ($dom->find(".mw-parser-output") as $divClass) {

                error_log("inside 1st for");

                foreach ($divClass->find("p") as $desc) {

                    $text = html_entity_decode($desc->plaintext);
                    $text = preg_replace('/\[.*?\]/', "", $text);
                    $text = preg_replace('/\&#39;/', "", $text);
                    $answer[$i] = html_entity_decode($text);

                    error_log($answer[$i]);

                    $i++;

                    if ($i > 2) {
                        break;
                    }
                }
                error_log($i);
            }
        }
        // scrapping ends
        
        $city = strtolower(preg_replace('/-/', ' ', $ct));
        $city_info = City::where("city", $city)->first();
        $content = Content::where("page", "autozone city")->first();

        return view("cities-pages.autozone-city", ["ctis" => $this->cities, "infos" => $city_info, "content" => $content, "content2" => $answer]);
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
