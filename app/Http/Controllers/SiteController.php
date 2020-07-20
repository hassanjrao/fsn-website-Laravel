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
        $cities = [
            "Istanbul",
            "Moscow",
            "London",
            "Saint Petersburg",
            "Berlin",
            "Madrid",
            "Kiev",
            "Rome",
            "Paris",
            "Bucharest",
            "Minsk",
            "Hamburg",
            "Vienna",
            "Warsaw",
            "Budapest",
            "Barcelona",
            "Munich",
            "Kharkiv",
            "Milan",
            "Belgrade",
            "Prague",
            "Nizhny Novgorod",
            "Kazan",
            "Sofia",
            "Birmingham",
            "Brussels",
            "Samara",
            "Ufa",
            "Rostov-on-Don",
            "Cologne",
            "Tekirdağ",
            "Voronezh",
            "Perm",
            "Volgograd",
            "Odessa",
            "New York",
            "Los Angeles",
            "Chicago",
            "Houston",
            "Phoenix",
            "Philadelphia",
            "San Antonio",
            "San Diego",
            "Dallas",
            "San Jose",
            "Austin",
            "Jacksonville",
            "Fort Worth",
            "Columbus",
            "Charlotte",
            "San Francisco",
            "Indianapolis",
            "Seattle",
            "Denver",
            "Washington",
            "Boston",
            "El Paso",
            "Nashville",
            "Detroit",
            "Oklahoma City",
            "Portland",
            "Las Vegas",
            "Memphis",
            "Louisville",
            "Baltimore",
            "Milwaukee",
            "Albuquerque",
            "Tucson",
            "Fresno",
            "Mesa",
            "Sacramento",
            "Atlanta",
            "Kansas City",
            "Colorado Springs",
            "Omaha",
            "Raleigh",
            "Miami",
            "Long Beach",
            "Virginia Beach",
            "Oakland",
            "Minneapolis",
            "Tulsa",
            "Tampa",
            "Arlington",
            "New Orleans",
            "Wichita",
            "Bakersfield",
            "Cleveland",
            "Aurora",
            "Anaheim",
            "Honolulu",
            "Santa Ana",
            "Riverside",
            "Corpus Christi",
            "Lexington",
            "Henderson",
            "Stockton",
            "Saint Paul",
            "Cincinnati",
            "St. Louis",
            "Pittsburgh",
            "Greensboro",
            "Lincoln",
            "Anchorage",
            "Plano",
            "Orlando",
            "Irvine",
            "Newark",
            "Durham",
            "Chula Vista",
            "Toledo",
            "Fort Wayne",
            "St. Petersburg",
            "Laredo",
            "Jersey City",
            "Chandler",
            "Madison",
            "Lubbock",
            "Scottsdale",
            "Reno",
            "Buffalo",
            "Gilbert",
            "Glendale",
            "North Las Vegas",
            "Winston–Salem",
            "Chesapeake",
            "Norfolk",
            "Fremont",
            "Garland",
            "Irving",
            "Hialeah",
            "Richmond",
            "Boise",
            "Spokane",
            "Baton Rouge",
            "China",
            "India",
            "United States",
            "Indonesia",
            "Brazil",
            "Pakistan",
            "Nigeria",
            "Bangladesh",
            "Russia",
            "Japan",
            "Mexico",
            "Philippines",
            "Ethiopia",
            "Vietnam",
            "Egypt",
            "Iran",
            "Congo",
            "Germany",
            "Turkey",
            "Thailand",
            "France",
            "United Kingdom",
            "Italy",
            "Burma",
            "South Africa",
            "Tanzania",
            "South Korea",
            "Spain",
            "Colombia",
            "Kenya",
            "Ukraine",
            "Argentina",
            "Algeria",
            "Poland",
            "Uganda",
            "Iraq",
            "Sudan",
            "Canada",
            "Morocco",
            "Afghanistan",
            "Malaysia",
            "Venezuela",
            "Peru",
            "Uzbekistan",
            "Nepal",
            "Saudi Arabia",
            "Yemen",
            "Ghana",
            "Mozambique",
            "USA"
        ];

        $email = "rickson7@yahoo.com";
        $phone = "00919820920509";
        $url = " www.ricksonrodricks.com";

        foreach ($cities as $city1) {
            $city = new City();
            $city->city=$city1;
            $city->email=$email;
            $city->phone=$phone;
            $city->url=$url;
            $city->moreinfo="more info";

            $city->save();
        }


        // $cities=Footer::footer();
        return view('welcome');
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
