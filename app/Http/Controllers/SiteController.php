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


    public function index()
    {
        $cities=Footer::footer();
        return view('welcome',["ctis"=>$cities]);
    }

    public function mlmCities($ct)
    {
        $city = strtolower(preg_replace('/-/', ' ', $ct));
        $cities = Footer::footer();
        $city_info = City::where("city", $city)->get();
        $content = Content::where("page", "mlm cities")->get();

        return view("mlm-cities", ["ctis" => $cities, "infos" => $city_info, "content" => $content]);
    }

    public function networkMarketingCities($ct)
    {
        $city = strtolower(preg_replace('/-/', ' ', $ct));
        $cities = Footer::footer();
        $city_info = City::where("city", $city)->get();

        return view("network-marketing-cities", ["ctis" => $cities, "infos" => $city_info]);
    }

    public function mlmCompaniesCities($ct)
    {
        $city = strtolower(preg_replace('/-/', ' ', $ct));
        $cities = Footer::footer();
        $city_info = City::where("city", $city)->get();

        return view("mlm-companies-cities", ["ctis" => $cities, "infos" => $city_info]);
    }


    public function mlm()
    {
        $cities = Footer::footer();

        return view("mlm", ["ctis" => $cities]);
    }

    public function mlmCompanies()
    {
        $cities = Footer::footer();

        return view("mlm-companies", ["ctis" => $cities]);
    }
}
