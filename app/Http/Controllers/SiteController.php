<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\City;
use App\Content;
use App\Blog;
use App\Slider;
use App\MovingImage;
use Illuminate\Support\Facades\Log;
use SimpleXMLElement;

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
    private $slider;
    private $blogs_titles;

    public function blog_titles()
    {
        $tit = Blog::all("id", "title");

        $total_titles = count($tit);

        $tit_arr = range(0, $total_titles - 1);

        shuffle($tit_arr);


        $titles = array();

        $i = 0;

        for ($x = 0; $x < $total_titles; $x++) {
            $i = $tit_arr[$x];

            $titles[$x] = $tit[$i];



            if ($x == 10) {
                break;
            }
        }


        return $titles;
    }

    public function __construct()
    {

        $this->cities = Footer::footer();
        $this->slider = Slider::all();
        $this->blogs_titles = $this->blog_titles();
    }

    public function index()
    {

        $moving_imgs = MovingImage::all();
        return view('welcome', ["titles" => $this->blogs_titles, "ctis" => $this->cities, "slider" => $this->slider, "moving_imgs" => $moving_imgs, "titles" => $this->blogs_titles]);
    }

    public function contact()
    {

        $to = "hassanjrao@gmail.com";
        $subject = request("subject");
        $txt = "Name: " . request("name") . "\nMobile: " . request("mobile") . "\nCity: " . request("city") . "\nComment: " . request("comment");
        $from = request("email");

        $headers = "From: $from" . "\r\n" . "Reply-To: $from" . "\r\n" . "X-Mailer: PHP/" . phpversion();

        if (mail($to, $subject, $txt, $headers)) {
            echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                Email sent <strong>successfully!</strong>
               
             </div>";
        } else {
            echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
        Email does not send!
     </div>";
        }
    }

    // Home starts
    public function about()
    {
        $content = Content::where("page", "about")->get();
        return view("about", ["titles" => $this->blogs_titles, "ctis" => $this->cities, "content" => $content, "slider" => $this->slider]);
    }
    public function disclaimer()
    {
        $content = Content::where("page", "disclaimer")->get();
        return view("disclaimer", ["titles" => $this->blogs_titles, "ctis" => $this->cities, "content" => $content, "slider" => $this->slider]);
    }
    public function tos()
    {
        $content = Content::where("page", "tos")->get();
        return view("tos", ["titles" => $this->blogs_titles, "ctis" => $this->cities, "content" => $content, "slider" => $this->slider]);
    }
    public function privacyPolicy()
    {
        $content = Content::where("page", "privacy policy")->get();
        return view("privacy-policy", ["titles" => $this->blogs_titles, "ctis" => $this->cities, "content" => $content, "slider" => $this->slider]);
    }
    public function blogs()
    {
        $blogs = blog::paginate(10);
        return view("blog-list", ["titles" => $this->blogs_titles, "ctis" => $this->cities, "blogs" => $blogs, "slider" => $this->slider]);
    }
    public function blog($title, $id)
    {
        $title_arr = explode("-", $title);
        $city = end($title_arr);

        error_log($city);

        $blog = blog::findorfail($id);
        return view("blog-details", ["titles" => $this->blogs_titles, "city" => $city, "ctis" => $this->cities, "blog" => $blog, "slider" => $this->slider]);
    }

    //  Home ends



    //  Companies starts
    public function carGurus()
    {
        $content = Content::where("page", "cargurus")->get();
        return view("car-gurus", ["titles" => $this->blogs_titles, "ctis" => $this->cities, "content" => $content, "slider" => $this->slider]);
    }
    public function autozone()
    {
        $content = Content::where("page", "autozone")->get();
        return view("autozone", ["titles" => $this->blogs_titles, "ctis" => $this->cities, "content" => $content, "slider" => $this->slider]);
    }
    public function autozoneNearMe()
    {
        $content = Content::where("page", "autozone near me")->get();
        return view("autozone-near-me", ["titles" => $this->blogs_titles, "ctis" => $this->cities, "content" => $content, "slider" => $this->slider]);
    }
    public function autotrader()
    {
        $content = Content::where("page", "autotrader")->get();
        return view("autotrader", ["titles" => $this->blogs_titles, "ctis" => $this->cities, "content" => $content, "slider" => $this->slider]);
    }
    public function trulia()
    {
        $content = Content::where("page", "trulia")->get();
        return view("trulia", ["titles" => $this->blogs_titles, "ctis" => $this->cities, "content" => $content, "slider" => $this->slider]);
    }
    // Companies ends


    // Homes & Houses starts
    public function homes()
    {
        $content = Content::where("page", "homes")->get();
        return view("homes", ["titles" => $this->blogs_titles, "ctis" => $this->cities, "content" => $content, "slider" => $this->slider]);
    }
    public function homesForSale()
    {
        $content = Content::where("page", "homes for sale")->get();
        return view("homes-for-sale", ["titles" => $this->blogs_titles, "ctis" => $this->cities, "content" => $content, "slider" => $this->slider]);
    }
    public function homesForSaleNearMe()
    {
        $content = Content::where("page", "homes for sale near me")->get();
        return view("homes-for-sale-near-me", ["titles" => $this->blogs_titles, "ctis" => $this->cities, "content" => $content, "slider" => $this->slider]);
    }
    public function houseForSale()
    {
        $content = Content::where("page", "house for sale")->get();
        return view("house-for-sale", ["titles" => $this->blogs_titles, "ctis" => $this->cities, "content" => $content, "slider" => $this->slider]);
    }
    public function houseForSaleNearMe()
    {
        $content = Content::where("page", "house for sale near me")->get();
        return view("house-for-sale-near-me", ["titles" => $this->blogs_titles, "ctis" => $this->cities, "content" => $content, "slider" => $this->slider]);
    }
    // Homes & Houses ends


    // cars starts
    public function carsForSale()
    {
        $content = Content::where("page", "cars for sale")->get();
        return view("cars-for-sale", ["titles" => $this->blogs_titles, "ctis" => $this->cities, "content" => $content, "slider" => $this->slider]);
    }
    public function usedCars()
    {
        $content = Content::where("page", "used cars")->get();
        return view("used-cars", ["titles" => $this->blogs_titles, "ctis" => $this->cities, "content" => $content, "slider" => $this->slider]);
    }
    public function bikesShop()
    {
        $content = Content::where("page", "bikes shop")->get();
        return view("bikes-shop", ["titles" => $this->blogs_titles, "ctis" => $this->cities, "content" => $content, "slider" => $this->slider]);
    }
    public function usedCarsForSale()
    {
        $content = Content::where("page", "used cars for sale")->get();
        return view("used-cars-for-sale", ["titles" => $this->blogs_titles, "ctis" => $this->cities, "content" => $content, "slider" => $this->slider]);
    }
    public function motorcycleSale()
    {
        $content = Content::where("page", "motorcycle sale")->get();
        return view("motorcycle-sale", ["titles" => $this->blogs_titles, "ctis" => $this->cities, "content" => $content, "slider" => $this->slider]);
    }
    // cars ends


    // Bikes & Shops Starts
    public function bikesShopNearMe()
    {
        $content = Content::where("page", "bikes shop near me")->get();
        return view("bikes-shop-near-me", ["titles" => $this->blogs_titles, "ctis" => $this->cities, "content" => $content, "slider" => $this->slider]);
    }
    public function carGurusUsedCars()
    {
        $content = Content::where("page", "cargurus used cars")->get();
        return view("car-gurus-used-cars", ["titles" => $this->blogs_titles, "ctis" => $this->cities, "content" => $content, "slider" => $this->slider]);
    }
    public function carForSaleNearMe()
    {
        $content = Content::where("page", "car for sale near me")->get();
        return view("car-for-sale-near-me", ["titles" => $this->blogs_titles, "ctis" => $this->cities, "content" => $content, "slider" => $this->slider]);
    }
    public function usedCarsForSaleNearMe()
    {
        $content = Content::where("page", "used cars for sale near me")->get();
        return view("used-cars-for-sale-near-me", ["titles" => $this->blogs_titles, "ctis" => $this->cities, "content" => $content, "slider" => $this->slider]);
    }
    public function classicCarsForSale()
    {
        $content = Content::where("page", "classic cars for sale")->get();
        return view("classic-cars-for-sale", ["titles" => $this->blogs_titles, "ctis" => $this->cities, "content" => $content, "slider" => $this->slider]);
    }
    // Bikes & Shops Ends


    function getTypos($str)
    {

        $typosArr = array();

        $strArr = str_split($str);

        //Proximity of keys on keyboard
        $arr_prox = array();
        $arr_prox['a'] = array('q', 'w', 'z', 'x');
        $arr_prox['b'] = array('v', 'f', 'g', 'h', 'n');
        $arr_prox['c'] = array('x', 's', 'd', 'f', 'v');
        $arr_prox['d'] = array('x', 's', 'w', 'e', 'r', 'f', 'v', 'c');
        $arr_prox['e'] = array('w', 's', 'd', 'f', 'r');
        $arr_prox['f'] = array('c', 'd', 'e', 'r', 't', 'g', 'b', 'v');
        $arr_prox['g'] = array('r', 'f', 'v', 't', 'b', 'y', 'h', 'n');
        $arr_prox['h'] = array('b', 'g', 't', 'y', 'u', 'j', 'm', 'n');
        $arr_prox['i'] = array('u', 'j', 'k', 'l', 'o');
        $arr_prox['j'] = array('n', 'h', 'y', 'u', 'i', 'k', 'm');
        $arr_prox['k'] = array('u', 'j', 'm', 'l', 'o');
        $arr_prox['l'] = array('p', 'o', 'i', 'k', 'm');
        $arr_prox['m'] = array('n', 'h', 'j', 'k', 'l');
        $arr_prox['n'] = array('b', 'g', 'h', 'j', 'm');
        $arr_prox['o'] = array('i', 'k', 'l', 'p');
        $arr_prox['p'] = array('o', 'l');
        $arr_prox['r'] = array('e', 'd', 'f', 'g', 't');
        $arr_prox['s'] = array('q', 'w', 'e', 'z', 'x', 'c');
        $arr_prox['t'] = array('r', 'f', 'g', 'h', 'y');
        $arr_prox['u'] = array('y', 'h', 'j', 'k', 'i');
        $arr_prox['v'] = array('', 'c', 'd', 'f', 'g', 'b');
        $arr_prox['w'] = array('q', 'a', 's', 'd', 'e');
        $arr_prox['x'] = array('z', 'a', 's', 'd', 'c');
        $arr_prox['y'] = array('t', 'g', 'h', 'j', 'u');
        $arr_prox['z'] = array('x', 's', 'a');
        $arr_prox['1'] = array('q', 'w');
        $arr_prox['2'] = array('q', 'w', 'e');
        $arr_prox['3'] = array('w', 'e', 'r');
        $arr_prox['4'] = array('e', 'r', 't');
        $arr_prox['5'] = array('r', 't', 'y');
        $arr_prox['6'] = array('t', 'y', 'u');
        $arr_prox['7'] = array('y', 'u', 'i');
        $arr_prox['8'] = array('u', 'i', 'o');
        $arr_prox['9'] = array('i', 'o', 'p');
        $arr_prox['0'] = array('o', 'p');

        try {
            //code...
            foreach ($strArr as $key => $value) {
                $temp = $strArr;
                foreach ($arr_prox[$value] as $proximity) {
                    $temp[$key] = $proximity;
                    $typosArr[] = join("", $temp);
                }
            }
        } catch (\Throwable $th) {
            //throw $th;

            $typosArr = [];
        }


        return $typosArr;
    }



    // Cities pages starts
    public function carsForSaleCity($ct)
    {
        $city = strtolower(preg_replace('/-/', ' ', $ct));
        $city_info = City::where("city", $city)->first();

        $st = strtolower(preg_replace('/-/;', '%20', $ct));


        $dom = "";
        include(app_path() . '\functions\simple_html_dom.php');

        // ------------------------
        try {
            $dom = file_get_html("$city_info->wiki_link", false);
        } catch (\Throwable $th) {
            $dom = "";
        }

        $answer = array();
        if (!empty($dom)) {

            $divClass = $content = "";
            $i = 0;


            foreach ($dom->find(".mw-parser-output") as $divClass) {


                foreach ($divClass->find("p") as $desc) {

                    $text = html_entity_decode($desc->plaintext);
                    $text = preg_replace('/\[.*?\]/', "", $text);
                    $text = preg_replace('/\&#39;/', "", $text);

                    if (strlen($text) < 100) {


                        continue;
                    } else {
                        $answer[$i] = html_entity_decode($text);


                        $i++;

                        if ($i > 3) {
                            break;
                        }
                    }
                }
            }
        }
        // scrapping ends


        //news scrapping starts

        // $news = array();
        // // From URL to get webpage contents. 
        // $date = date("Y-m-d");

        // $url = "https://newsapi.org/v2/everything?apiKey=43eafa20d07146328aad5219ee823535&qInTitle=+$ct&q=$ct&from=$date";

        // // Initialize a CURL session. 
        // $ch = curl_init();

        // // Return Page contents. 
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        // //grab URL and pass it to the variable. 
        // curl_setopt($ch, CURLOPT_URL, $url);
        // $n = json_decode(curl_exec($ch), true);

        // for ($i = 0; $i < sizeof($n["articles"]); $i++) {

        //     $news[$i] = ($n["articles"][$i]);
        //     if ($i == 8) {
        //         break;
        //     }
        // }


        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://contextualwebsearch-websearch-v1.p.rapidapi.com/api/Search/NewsSearchAPI?autoCorrect=true&pageNumber=1&pageSize=10&q=$st&safeSearch=false",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "x-rapidapi-host: contextualwebsearch-websearch-v1.p.rapidapi.com",
                "x-rapidapi-key: d11a245335msh08002a18cb6f46cp15cd57jsnb231156803bf"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {


            $news = json_decode($response, true);
        }

        //  news scrapping ends



        // autocomplete api starts

        //first starts

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://contextualwebsearch-websearch-v1.p.rapidapi.com/api/spelling/AutoComplete?text=$st",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "x-rapidapi-host: contextualwebsearch-websearch-v1.p.rapidapi.com",
                "x-rapidapi-key: d11a245335msh08002a18cb6f46cp15cd57jsnb231156803bf"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $suggestions_one = json_decode($response, true);
        }

        //first ends


        //Second Starts

        $curl = curl_init();

        $st2 = $st . "%20" . "homes";

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://contextualwebsearch-websearch-v1.p.rapidapi.com/api/spelling/AutoComplete?text=$st2",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "x-rapidapi-host: contextualwebsearch-websearch-v1.p.rapidapi.com",
                "x-rapidapi-key: d11a245335msh08002a18cb6f46cp15cd57jsnb231156803bf"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $suggestions_two = json_decode($response, true);
        }

        // Second Ends

        // autocomplete api ends

        // typo script starts
        $sti = strtolower(preg_replace('/-/', '', $ct));
        $typos = $this->getTypos($sti);
        // type script ends



        $content = Content::where("page", "cars for sale city")->first();





        return view("cities-pages.cars-for-sale-city", ["titles" => $this->blogs_titles, "ctis" => $this->cities, "infos" => $city_info, "content" => $content, "content2" => $answer, "slider" => $this->slider, "news" => $news, "suggestions_one" => $suggestions_one, "suggestions_two" => $suggestions_two, "typos" => $typos]);
    }
    public function carGurusCity($ct)
    {
        // scrapping starts
        $city = strtolower(preg_replace('/-/', ' ', $ct));
        $city_info = City::where("city", $city)->first();

        $st = strtolower(preg_replace('/-/;', '%20', $ct));

    

        $dom = "";
        include(app_path() . '\functions\simple_html_dom.php');

        // ------------------------
        try {
            $dom = file_get_html("$city_info->wiki_link", false);
        } catch (\Throwable $th) {
            $dom = "";
        }

        $answer = array();
        if (!empty($dom)) {

            $divClass = $content = "";
            $i = 0;


            foreach ($dom->find(".mw-parser-output") as $divClass) {



                foreach ($divClass->find("p") as $desc) {

                    $text = html_entity_decode($desc->plaintext);
                    $text = preg_replace('/\[.*?\]/', "", $text);
                    $text = preg_replace('/\&#39;/', "", $text);

                    if (strlen($text) < 100) {


                        continue;
                    } else {
                        $answer[$i] = html_entity_decode($text);


                        $i++;

                        if ($i > 3) {
                            break;
                        }
                    }
                }
            }
        }
        // scrapping ends


        //news scrapping starts

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://contextualwebsearch-websearch-v1.p.rapidapi.com/api/Search/NewsSearchAPI?autoCorrect=true&pageNumber=1&pageSize=10&q=$ct&safeSearch=false",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "x-rapidapi-host: contextualwebsearch-websearch-v1.p.rapidapi.com",
                "x-rapidapi-key: d11a245335msh08002a18cb6f46cp15cd57jsnb231156803bf"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {


            $news = json_decode($response, true);
        }


        //  news scrapping ends

     
        // autocomplete api starts

        //first starts

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://contextualwebsearch-websearch-v1.p.rapidapi.com/api/spelling/AutoComplete?text=$st",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "x-rapidapi-host: contextualwebsearch-websearch-v1.p.rapidapi.com",
                "x-rapidapi-key: d11a245335msh08002a18cb6f46cp15cd57jsnb231156803bf"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $suggestions_one = json_decode($response, true);
        }

        //first ends


        //Second Starts

        $curl = curl_init();

        $st2 = $st . "%20" . "homes";

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://contextualwebsearch-websearch-v1.p.rapidapi.com/api/spelling/AutoComplete?text=$st2",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "x-rapidapi-host: contextualwebsearch-websearch-v1.p.rapidapi.com",
                "x-rapidapi-key: d11a245335msh08002a18cb6f46cp15cd57jsnb231156803bf"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $suggestions_two = json_decode($response, true);
        }

        // Second Ends

        // autocomplete api ends

        // typo script starts
        $sti = strtolower(preg_replace('/-/', '', $ct));
        $typos = $this->getTypos($sti);
        // type script ends



        $content = Content::where("page", "cargurus city")->first();

       

        return view("cities-pages.car-gurus-city", ["titles" => $this->blogs_titles, "ctis" => $this->cities, "infos" => $city_info, "content" => $content, "content2" => $answer, "slider" => $this->slider, "news" => $news, "suggestions" => $suggestions]);
    }
    public function carGurusUsedCarsCity($ct)
    {
        // scrapping starts
        $city = strtolower(preg_replace('/-/', ' ', $ct));
        $city_info = City::where("city", $city)->first();

        $dom = "";
        
        $st = strtolower(preg_replace('/-/', '%20', $ct));

        include(app_path() . '\functions\simple_html_dom.php');

        // ------------------------
        try {
            $dom = file_get_html("$city_info->wiki_link", false);
        } catch (\Throwable $th) {
            $dom = "";
        }

        $answer = array();
        if (!empty($dom)) {

            $divClass = $content = "";
            $i = 0;


            foreach ($dom->find(".mw-parser-output") as $divClass) {



                foreach ($divClass->find("p") as $desc) {

                    $text = html_entity_decode($desc->plaintext);
                    $text = preg_replace('/\[.*?\]/', "", $text);
                    $text = preg_replace('/\&#39;/', "", $text);

                    if (strlen($text) < 100) {


                        continue;
                    } else {
                        $answer[$i] = html_entity_decode($text);


                        $i++;

                        if ($i > 3) {
                            break;
                        }
                    }
                }
            }
        }
        // scrapping ends


        //news scrapping starts

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://contextualwebsearch-websearch-v1.p.rapidapi.com/api/Search/NewsSearchAPI?autoCorrect=true&pageNumber=1&pageSize=10&q=$ct&safeSearch=false",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "x-rapidapi-host: contextualwebsearch-websearch-v1.p.rapidapi.com",
                "x-rapidapi-key: d11a245335msh08002a18cb6f46cp15cd57jsnb231156803bf"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {


            $news = json_decode($response, true);
        }


        //  news scrapping ends

      
        // autocomplete api starts

        //first starts

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://contextualwebsearch-websearch-v1.p.rapidapi.com/api/spelling/AutoComplete?text=$st",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "x-rapidapi-host: contextualwebsearch-websearch-v1.p.rapidapi.com",
                "x-rapidapi-key: d11a245335msh08002a18cb6f46cp15cd57jsnb231156803bf"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $suggestions_one = json_decode($response, true);
        }

        //first ends


        //Second Starts

        $curl = curl_init();

        $st2 = $st . "%20" . "homes";

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://contextualwebsearch-websearch-v1.p.rapidapi.com/api/spelling/AutoComplete?text=$st2",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "x-rapidapi-host: contextualwebsearch-websearch-v1.p.rapidapi.com",
                "x-rapidapi-key: d11a245335msh08002a18cb6f46cp15cd57jsnb231156803bf"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $suggestions_two = json_decode($response, true);
        }

        // Second Ends

        // autocomplete api ends

        // typo script starts
        $sti = strtolower(preg_replace('/-/', '', $ct));
        $typos = $this->getTypos($sti);
        // type script ends




        return view("cities-pages.cars-for-sale-city", ["titles" => $this->blogs_titles, "ctis" => $this->cities, "infos" => $city_info, "content" => $content, "content2" => $answer, "slider" => $this->slider, "news" => $news, "suggestions_one" => $suggestions_one, "suggestions_two" => $suggestions_two, "typos" => $typos]);



        $content = Content::where("page", "cargurus used cars city")->first();

        return view("cities-pages.car-gurus-used-cars-city", ["titles" => $this->blogs_titles, "ctis" => $this->cities, "infos" => $city_info, "content" => $content, "content2" => $answer, "slider" => $this->slider, "news" => $news, "suggestions_one" => $suggestions_one, "suggestions_two" => $suggestions_two, "typos" => $typos]);
    }
    public function autozoneCity($ct)
    {

        // scrapping starts
        $city = strtolower(preg_replace('/-/', ' ', $ct));
        $city_info = City::where("city", $city)->first();

        $dom = "";
        
        $st = strtolower(preg_replace('/-/', '%20', $ct));

        include(app_path() . '\functions\simple_html_dom.php');

        // ------------------------
        try {
            $dom = file_get_html("$city_info->wiki_link", false);
        } catch (\Throwable $th) {
            $dom = "";
        }

        $answer = array();
        if (!empty($dom)) {

            $divClass = $content = "";
            $i = 0;


            foreach ($dom->find(".mw-parser-output") as $divClass) {



                foreach ($divClass->find("p") as $desc) {

                    $text = html_entity_decode($desc->plaintext);
                    $text = preg_replace('/\[.*?\]/', "", $text);
                    $text = preg_replace('/\&#39;/', "", $text);

                    if (strlen($text) < 100) {


                        continue;
                    } else {
                        $answer[$i] = html_entity_decode($text);


                        $i++;

                        if ($i > 3) {
                            break;
                        }
                    }
                }
            }
        }
        // scrapping ends


        //news scrapping starts

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://contextualwebsearch-websearch-v1.p.rapidapi.com/api/Search/NewsSearchAPI?autoCorrect=true&pageNumber=1&pageSize=10&q=$ct&safeSearch=false",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "x-rapidapi-host: contextualwebsearch-websearch-v1.p.rapidapi.com",
                "x-rapidapi-key: d11a245335msh08002a18cb6f46cp15cd57jsnb231156803bf"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {


            $news = json_decode($response, true);
        }

       
        // autocomplete api starts

        //first starts

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://contextualwebsearch-websearch-v1.p.rapidapi.com/api/spelling/AutoComplete?text=$st",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "x-rapidapi-host: contextualwebsearch-websearch-v1.p.rapidapi.com",
                "x-rapidapi-key: d11a245335msh08002a18cb6f46cp15cd57jsnb231156803bf"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $suggestions_one = json_decode($response, true);
        }

        //first ends


        //Second Starts

        $curl = curl_init();

        $st2 = $st . "%20" . "homes";

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://contextualwebsearch-websearch-v1.p.rapidapi.com/api/spelling/AutoComplete?text=$st2",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "x-rapidapi-host: contextualwebsearch-websearch-v1.p.rapidapi.com",
                "x-rapidapi-key: d11a245335msh08002a18cb6f46cp15cd57jsnb231156803bf"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $suggestions_two = json_decode($response, true);
        }

        // Second Ends

        // autocomplete api ends

        // typo script starts
        $sti = strtolower(preg_replace('/-/', '', $ct));
        $typos = $this->getTypos($sti);
        // type script ends



        return view("cities-pages.cars-for-sale-city", ["titles" => $this->blogs_titles, "ctis" => $this->cities, "infos" => $city_info, "content" => $content, "content2" => $answer, "slider" => $this->slider, "news" => $news, "suggestions_one" => $suggestions_one, "suggestions_two" => $suggestions_two, "typos" => $typos]);


        //  news scrapping ends
        $content = Content::where("page", "autozone city")->first();

        return view("cities-pages.autozone-city", ["titles" => $this->blogs_titles, "ctis" => $this->cities, "infos" => $city_info, "content" => $content, "content2" => $answer, "slider" => $this->slider, "news" => $news, "suggestions_one" => $suggestions_one, "suggestions_two" => $suggestions_two, "typos" => $typos]);
    }


    public function autotraderCity($ct)
    {

        // scrapping starts
        $city = strtolower(preg_replace('/-/', ' ', $ct));
        $city_info = City::where("city", $city)->first();

        $dom = "";
        
        $st = strtolower(preg_replace('/-/', '%20', $ct));

        include(app_path() . '\functions\simple_html_dom.php');

        // ------------------------
        try {
            $dom = file_get_html("$city_info->wiki_link", false);
        } catch (\Throwable $th) {
            $dom = "";
        }

        $answer = array();
        if (!empty($dom)) {

            $divClass = $content = "";
            $i = 0;


            foreach ($dom->find(".mw-parser-output") as $divClass) {



                foreach ($divClass->find("p") as $desc) {

                    $text = html_entity_decode($desc->plaintext);
                    $text = preg_replace('/\[.*?\]/', "", $text);
                    $text = preg_replace('/\&#39;/', "", $text);

                    if (strlen($text) < 100) {


                        continue;
                    } else {
                        $answer[$i] = html_entity_decode($text);


                        $i++;

                        if ($i > 3) {
                            break;
                        }
                    }
                }
            }
        }
        // scrapping ends


        //news scrapping starts

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://contextualwebsearch-websearch-v1.p.rapidapi.com/api/Search/NewsSearchAPI?autoCorrect=true&pageNumber=1&pageSize=10&q=$ct&safeSearch=false",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "x-rapidapi-host: contextualwebsearch-websearch-v1.p.rapidapi.com",
                "x-rapidapi-key: d11a245335msh08002a18cb6f46cp15cd57jsnb231156803bf"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {


            $news = json_decode($response, true);
        }



        //  news scrapping ends

        
        // autocomplete api starts

        //first starts

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://contextualwebsearch-websearch-v1.p.rapidapi.com/api/spelling/AutoComplete?text=$st",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "x-rapidapi-host: contextualwebsearch-websearch-v1.p.rapidapi.com",
                "x-rapidapi-key: d11a245335msh08002a18cb6f46cp15cd57jsnb231156803bf"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $suggestions_one = json_decode($response, true);
        }

        //first ends


        //Second Starts

        $curl = curl_init();

        $st2 = $st . "%20" . "homes";

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://contextualwebsearch-websearch-v1.p.rapidapi.com/api/spelling/AutoComplete?text=$st2",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "x-rapidapi-host: contextualwebsearch-websearch-v1.p.rapidapi.com",
                "x-rapidapi-key: d11a245335msh08002a18cb6f46cp15cd57jsnb231156803bf"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $suggestions_two = json_decode($response, true);
        }

        // Second Ends

        // autocomplete api ends

        // typo script starts
        $sti = strtolower(preg_replace('/-/', '', $ct));
        $typos = $this->getTypos($sti);
        // type script ends


        $content = Content::where("page", "autotrader city")->first();

        return view("cities-pages.autotrader-city", ["titles" => $this->blogs_titles, "ctis" => $this->cities, "infos" => $city_info, "content" => $content, "content2" => $answer, "slider" => $this->slider, "news" => $news, "suggestions_one" => $suggestions_one, "suggestions_two" => $suggestions_two, "typos" => $typos]);
    }
    public function autozoneNearMeCity($ct)
    {
        // scrapping starts
        $city = strtolower(preg_replace('/-/', ' ', $ct));
        $city_info = City::where("city", $city)->first();

        $dom = "";
        
        $st = strtolower(preg_replace('/-/', '%20', $ct));

        include(app_path() . '\functions\simple_html_dom.php');

        // ------------------------
        try {
            $dom = file_get_html("$city_info->wiki_link", false);
        } catch (\Throwable $th) {
            $dom = "";
        }

        $answer = array();
        if (!empty($dom)) {

            $divClass = $content = "";
            $i = 0;


            foreach ($dom->find(".mw-parser-output") as $divClass) {



                foreach ($divClass->find("p") as $desc) {

                    $text = html_entity_decode($desc->plaintext);
                    $text = preg_replace('/\[.*?\]/', "", $text);
                    $text = preg_replace('/\&#39;/', "", $text);

                    if (strlen($text) < 100) {


                        continue;
                    } else {
                        $answer[$i] = html_entity_decode($text);


                        $i++;

                        if ($i > 3) {
                            break;
                        }
                    }
                }
            }
        }
        // scrapping ends


        //news scrapping starts

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://contextualwebsearch-websearch-v1.p.rapidapi.com/api/Search/NewsSearchAPI?autoCorrect=true&pageNumber=1&pageSize=10&q=$ct&safeSearch=false",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "x-rapidapi-host: contextualwebsearch-websearch-v1.p.rapidapi.com",
                "x-rapidapi-key: d11a245335msh08002a18cb6f46cp15cd57jsnb231156803bf"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {


            $news = json_decode($response, true);
        }



        //  news scrapping ends

        
        // autocomplete api starts

        //first starts

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://contextualwebsearch-websearch-v1.p.rapidapi.com/api/spelling/AutoComplete?text=$st",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "x-rapidapi-host: contextualwebsearch-websearch-v1.p.rapidapi.com",
                "x-rapidapi-key: d11a245335msh08002a18cb6f46cp15cd57jsnb231156803bf"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $suggestions_one = json_decode($response, true);
        }

        //first ends


        //Second Starts

        $curl = curl_init();

        $st2 = $st . "%20" . "homes";

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://contextualwebsearch-websearch-v1.p.rapidapi.com/api/spelling/AutoComplete?text=$st2",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "x-rapidapi-host: contextualwebsearch-websearch-v1.p.rapidapi.com",
                "x-rapidapi-key: d11a245335msh08002a18cb6f46cp15cd57jsnb231156803bf"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $suggestions_two = json_decode($response, true);
        }

        // Second Ends

        // autocomplete api ends

        // typo script starts
        $sti = strtolower(preg_replace('/-/', '', $ct));
        $typos = $this->getTypos($sti);
        // type script ends



        $content = Content::where("page", "autozone near me city")->first();

        return view("cities-pages.autozone-near-me-city", ["titles" => $this->blogs_titles, "ctis" => $this->cities, "infos" => $city_info, "content" => $content, "content2" => $answer, "slider" => $this->slider, "news" => $news, "suggestions_one" => $suggestions_one, "suggestions_two" => $suggestions_two, "typos" => $typos]);
    }
    public function bikesShopNearMeCity($ct)
    {

        // scrapping starts
        $city = strtolower(preg_replace('/-/', ' ', $ct));
        $city_info = City::where("city", $city)->first();

        $dom = "";
        
        $st = strtolower(preg_replace('/-/', '%20', $ct));

        include(app_path() . '\functions\simple_html_dom.php');

        // ------------------------
        try {
            $dom = file_get_html("$city_info->wiki_link", false);
        } catch (\Throwable $th) {
            $dom = "";
        }

        $answer = array();
        if (!empty($dom)) {

            $divClass = $content = "";
            $i = 0;


            foreach ($dom->find(".mw-parser-output") as $divClass) {



                foreach ($divClass->find("p") as $desc) {

                    $text = html_entity_decode($desc->plaintext);
                    $text = preg_replace('/\[.*?\]/', "", $text);
                    $text = preg_replace('/\&#39;/', "", $text);

                    if (strlen($text) < 100) {


                        continue;
                    } else {
                        $answer[$i] = html_entity_decode($text);


                        $i++;

                        if ($i > 3) {
                            break;
                        }
                    }
                }
            }
        }
        // scrapping ends


        //news scrapping starts

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://contextualwebsearch-websearch-v1.p.rapidapi.com/api/Search/NewsSearchAPI?autoCorrect=true&pageNumber=1&pageSize=10&q=$ct&safeSearch=false",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "x-rapidapi-host: contextualwebsearch-websearch-v1.p.rapidapi.com",
                "x-rapidapi-key: d11a245335msh08002a18cb6f46cp15cd57jsnb231156803bf"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {


            $news = json_decode($response, true);
        }


        //  news scrapping ends

        
        // autocomplete api starts

        //first starts

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://contextualwebsearch-websearch-v1.p.rapidapi.com/api/spelling/AutoComplete?text=$st",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "x-rapidapi-host: contextualwebsearch-websearch-v1.p.rapidapi.com",
                "x-rapidapi-key: d11a245335msh08002a18cb6f46cp15cd57jsnb231156803bf"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $suggestions_one = json_decode($response, true);
        }

        //first ends


        //Second Starts

        $curl = curl_init();

        $st2 = $st . "%20" . "homes";

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://contextualwebsearch-websearch-v1.p.rapidapi.com/api/spelling/AutoComplete?text=$st2",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "x-rapidapi-host: contextualwebsearch-websearch-v1.p.rapidapi.com",
                "x-rapidapi-key: d11a245335msh08002a18cb6f46cp15cd57jsnb231156803bf"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $suggestions_two = json_decode($response, true);
        }

        // Second Ends

        // autocomplete api ends

        // typo script starts
        $sti = strtolower(preg_replace('/-/', '', $ct));
        $typos = $this->getTypos($sti);
        // type script ends



        $content = Content::where("page", "bikes shop near me city")->first();

        return view("cities-pages.bikes-shop-near-me-city", ["titles" => $this->blogs_titles, "ctis" => $this->cities, "infos" => $city_info, "content" => $content, "content2" => $answer, "slider" => $this->slider, "news" => $news, "suggestions_one" => $suggestions_one, "suggestions_two" => $suggestions_two, "typos" => $typos]);
    }
    public function bikesShopCity($ct)
    {

        // scrapping starts
        $city = strtolower(preg_replace('/-/', ' ', $ct));
        $city_info = City::where("city", $city)->first();

        $dom = "";
        
        $st = strtolower(preg_replace('/-/', '%20', $ct));

        include(app_path() . '\functions\simple_html_dom.php');

        // ------------------------
        try {
            $dom = file_get_html("$city_info->wiki_link", false);
        } catch (\Throwable $th) {
            $dom = "";
        }

        $answer = array();
        if (!empty($dom)) {

            $divClass = $content = "";
            $i = 0;


            foreach ($dom->find(".mw-parser-output") as $divClass) {



                foreach ($divClass->find("p") as $desc) {

                    $text = html_entity_decode($desc->plaintext);
                    $text = preg_replace('/\[.*?\]/', "", $text);
                    $text = preg_replace('/\&#39;/', "", $text);

                    if (strlen($text) < 100) {


                        continue;
                    } else {
                        $answer[$i] = html_entity_decode($text);


                        $i++;

                        if ($i > 3) {
                            break;
                        }
                    }
                }
            }
        }
        // scrapping ends


        //news scrapping starts

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://contextualwebsearch-websearch-v1.p.rapidapi.com/api/Search/NewsSearchAPI?autoCorrect=true&pageNumber=1&pageSize=10&q=$ct&safeSearch=false",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "x-rapidapi-host: contextualwebsearch-websearch-v1.p.rapidapi.com",
                "x-rapidapi-key: d11a245335msh08002a18cb6f46cp15cd57jsnb231156803bf"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {


            $news = json_decode($response, true);
        }



        //  news scrapping ends

        
        // autocomplete api starts

        //first starts

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://contextualwebsearch-websearch-v1.p.rapidapi.com/api/spelling/AutoComplete?text=$st",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "x-rapidapi-host: contextualwebsearch-websearch-v1.p.rapidapi.com",
                "x-rapidapi-key: d11a245335msh08002a18cb6f46cp15cd57jsnb231156803bf"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $suggestions_one = json_decode($response, true);
        }

        //first ends


        //Second Starts

        $curl = curl_init();

        $st2 = $st . "%20" . "homes";

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://contextualwebsearch-websearch-v1.p.rapidapi.com/api/spelling/AutoComplete?text=$st2",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "x-rapidapi-host: contextualwebsearch-websearch-v1.p.rapidapi.com",
                "x-rapidapi-key: d11a245335msh08002a18cb6f46cp15cd57jsnb231156803bf"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $suggestions_two = json_decode($response, true);
        }

        // Second Ends

        // autocomplete api ends

        // typo script starts
        $sti = strtolower(preg_replace('/-/', '', $ct));
        $typos = $this->getTypos($sti);
        // type script ends




        $content = Content::where("page", "bikes shop city")->first();

        return view("cities-pages.bikes-shop-city", ["titles" => $this->blogs_titles, "ctis" => $this->cities, "infos" => $city_info, "content" => $content, "content2" => $answer, "slider" => $this->slider, "news" => $news, "suggestions_one" => $suggestions_one, "suggestions_two" => $suggestions_two, "typos" => $typos]);
    }
    public function carForSaleNearMeCity($ct)
    {
        // scrapping starts
        $city = strtolower(preg_replace('/-/', ' ', $ct));
        $city_info = City::where("city", $city)->first();

        $dom = "";
        
        $st = strtolower(preg_replace('/-/', '%20', $ct));

        include(app_path() . '\functions\simple_html_dom.php');

        // ------------------------
        try {
            $dom = file_get_html("$city_info->wiki_link", false);
        } catch (\Throwable $th) {
            $dom = "";
        }

        $answer = array();
        if (!empty($dom)) {

            $divClass = $content = "";
            $i = 0;


            foreach ($dom->find(".mw-parser-output") as $divClass) {



                foreach ($divClass->find("p") as $desc) {

                    $text = html_entity_decode($desc->plaintext);
                    $text = preg_replace('/\[.*?\]/', "", $text);
                    $text = preg_replace('/\&#39;/', "", $text);

                    if (strlen($text) < 100) {


                        continue;
                    } else {
                        $answer[$i] = html_entity_decode($text);


                        $i++;

                        if ($i > 3) {
                            break;
                        }
                    }
                }
            }
        }
        // scrapping ends


        //news scrapping starts

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://contextualwebsearch-websearch-v1.p.rapidapi.com/api/Search/NewsSearchAPI?autoCorrect=true&pageNumber=1&pageSize=10&q=$ct&safeSearch=false",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "x-rapidapi-host: contextualwebsearch-websearch-v1.p.rapidapi.com",
                "x-rapidapi-key: d11a245335msh08002a18cb6f46cp15cd57jsnb231156803bf"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {


            $news = json_decode($response, true);
        }


        //  news scrapping ends

        
        // autocomplete api starts

        //first starts

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://contextualwebsearch-websearch-v1.p.rapidapi.com/api/spelling/AutoComplete?text=$st",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "x-rapidapi-host: contextualwebsearch-websearch-v1.p.rapidapi.com",
                "x-rapidapi-key: d11a245335msh08002a18cb6f46cp15cd57jsnb231156803bf"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $suggestions_one = json_decode($response, true);
        }

        //first ends


        //Second Starts

        $curl = curl_init();

        $st2 = $st . "%20" . "homes";

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://contextualwebsearch-websearch-v1.p.rapidapi.com/api/spelling/AutoComplete?text=$st2",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "x-rapidapi-host: contextualwebsearch-websearch-v1.p.rapidapi.com",
                "x-rapidapi-key: d11a245335msh08002a18cb6f46cp15cd57jsnb231156803bf"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $suggestions_two = json_decode($response, true);
        }

        // Second Ends

        // autocomplete api ends

        // typo script starts
        $sti = strtolower(preg_replace('/-/', '', $ct));
        $typos = $this->getTypos($sti);
        // type script ends


        $content = Content::where("page", "car for sale near me city")->first();

        return view("cities-pages.car-for-sale-near-me-city", ["titles" => $this->blogs_titles, "ctis" => $this->cities, "infos" => $city_info, "content" => $content, "content2" => $answer, "slider" => $this->slider, "news" => $news, "suggestions_one" => $suggestions_one, "suggestions_two" => $suggestions_two, "typos" => $typos]);
    }
    public function classicCarsForSaleCity($ct)
    {

        // scrapping starts
        $city = strtolower(preg_replace('/-/', ' ', $ct));
        $city_info = City::where("city", $city)->first();

        $dom = "";
        
        $st = strtolower(preg_replace('/-/', '%20', $ct));

        include(app_path() . '\functions\simple_html_dom.php');

        // ------------------------
        try {
            $dom = file_get_html("$city_info->wiki_link", false);
        } catch (\Throwable $th) {
            $dom = "";
        }

        $answer = array();
        if (!empty($dom)) {

            $divClass = $content = "";
            $i = 0;


            foreach ($dom->find(".mw-parser-output") as $divClass) {



                foreach ($divClass->find("p") as $desc) {

                    $text = html_entity_decode($desc->plaintext);
                    $text = preg_replace('/\[.*?\]/', "", $text);
                    $text = preg_replace('/\&#39;/', "", $text);

                    if (strlen($text) < 100) {


                        continue;
                    } else {
                        $answer[$i] = html_entity_decode($text);


                        $i++;

                        if ($i > 3) {
                            break;
                        }
                    }
                }
            }
        }
        // scrapping ends


        //news scrapping starts

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://contextualwebsearch-websearch-v1.p.rapidapi.com/api/Search/NewsSearchAPI?autoCorrect=true&pageNumber=1&pageSize=10&q=$ct&safeSearch=false",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "x-rapidapi-host: contextualwebsearch-websearch-v1.p.rapidapi.com",
                "x-rapidapi-key: d11a245335msh08002a18cb6f46cp15cd57jsnb231156803bf"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {


            $news = json_decode($response, true);
        }


        //  news scrapping ends

        
        // autocomplete api starts

        //first starts

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://contextualwebsearch-websearch-v1.p.rapidapi.com/api/spelling/AutoComplete?text=$st",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "x-rapidapi-host: contextualwebsearch-websearch-v1.p.rapidapi.com",
                "x-rapidapi-key: d11a245335msh08002a18cb6f46cp15cd57jsnb231156803bf"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $suggestions_one = json_decode($response, true);
        }

        //first ends


        //Second Starts

        $curl = curl_init();

        $st2 = $st . "%20" . "homes";

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://contextualwebsearch-websearch-v1.p.rapidapi.com/api/spelling/AutoComplete?text=$st2",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "x-rapidapi-host: contextualwebsearch-websearch-v1.p.rapidapi.com",
                "x-rapidapi-key: d11a245335msh08002a18cb6f46cp15cd57jsnb231156803bf"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $suggestions_two = json_decode($response, true);
        }

        // Second Ends

        // autocomplete api ends

        // typo script starts
        $sti = strtolower(preg_replace('/-/', '', $ct));
        $typos = $this->getTypos($sti);
        // type script ends




        $content = Content::where("page", "classic cars for sale city")->first();

        return view("cities-pages.classic-cars-for-sale-city", ["titles" => $this->blogs_titles, "ctis" => $this->cities, "infos" => $city_info, "content" => $content, "content2" => $answer, "slider" => $this->slider, "news" => $news, "suggestions_one" => $suggestions_one, "suggestions_two" => $suggestions_two, "typos" => $typos]);
    }
    public function homesForSaleNearMeCity($ct)
    {
        // scrapping starts
        $city = strtolower(preg_replace('/-/', ' ', $ct));
        $city_info = City::where("city", $city)->first();

        $dom = "";
        
        $st = strtolower(preg_replace('/-/', '%20', $ct));

        include(app_path() . '\functions\simple_html_dom.php');

        // ------------------------
        try {
            $dom = file_get_html("$city_info->wiki_link", false);
        } catch (\Throwable $th) {
            $dom = "";
        }

        $answer = array();
        if (!empty($dom)) {

            $divClass = $content = "";
            $i = 0;


            foreach ($dom->find(".mw-parser-output") as $divClass) {



                foreach ($divClass->find("p") as $desc) {

                    $text = html_entity_decode($desc->plaintext);
                    $text = preg_replace('/\[.*?\]/', "", $text);
                    $text = preg_replace('/\&#39;/', "", $text);

                    if (strlen($text) < 100) {


                        continue;
                    } else {
                        $answer[$i] = html_entity_decode($text);


                        $i++;

                        if ($i > 3) {
                            break;
                        }
                    }
                }
            }
        }
        // scrapping ends


        //news scrapping starts

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://contextualwebsearch-websearch-v1.p.rapidapi.com/api/Search/NewsSearchAPI?autoCorrect=true&pageNumber=1&pageSize=10&q=$ct&safeSearch=false",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "x-rapidapi-host: contextualwebsearch-websearch-v1.p.rapidapi.com",
                "x-rapidapi-key: d11a245335msh08002a18cb6f46cp15cd57jsnb231156803bf"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {


            $news = json_decode($response, true);
        }


        //  news scrapping ends

        
        // autocomplete api starts

        //first starts

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://contextualwebsearch-websearch-v1.p.rapidapi.com/api/spelling/AutoComplete?text=$st",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "x-rapidapi-host: contextualwebsearch-websearch-v1.p.rapidapi.com",
                "x-rapidapi-key: d11a245335msh08002a18cb6f46cp15cd57jsnb231156803bf"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $suggestions_one = json_decode($response, true);
        }

        //first ends


        //Second Starts

        $curl = curl_init();

        $st2 = $st . "%20" . "homes";

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://contextualwebsearch-websearch-v1.p.rapidapi.com/api/spelling/AutoComplete?text=$st2",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "x-rapidapi-host: contextualwebsearch-websearch-v1.p.rapidapi.com",
                "x-rapidapi-key: d11a245335msh08002a18cb6f46cp15cd57jsnb231156803bf"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $suggestions_two = json_decode($response, true);
        }

        // Second Ends

        // autocomplete api ends

        // typo script starts
        $sti = strtolower(preg_replace('/-/', '', $ct));
        $typos = $this->getTypos($sti);
        // type script ends



        $content = Content::where("page", "homes for sale near me city")->first();

        return view("cities-pages.homes-for-sale-near-me-city", ["titles" => $this->blogs_titles, "ctis" => $this->cities, "infos" => $city_info, "content" => $content, "content2" => $answer, "slider" => $this->slider, "news" => $news, "suggestions_one" => $suggestions_one, "suggestions_two" => $suggestions_two, "typos" => $typos]);
    }
    public function homesForSaleCity($ct)
    {

        // scrapping starts
        $city = strtolower(preg_replace('/-/', ' ', $ct));
        $city_info = City::where("city", $city)->first();

        $dom = "";
        
        $st = strtolower(preg_replace('/-/', '%20', $ct));

        include(app_path() . '\functions\simple_html_dom.php');

        // ------------------------
        try {
            $dom = file_get_html("$city_info->wiki_link", false);
        } catch (\Throwable $th) {
            $dom = "";
        }

        $answer = array();
        if (!empty($dom)) {

            $divClass = $content = "";
            $i = 0;


            foreach ($dom->find(".mw-parser-output") as $divClass) {



                foreach ($divClass->find("p") as $desc) {

                    $text = html_entity_decode($desc->plaintext);
                    $text = preg_replace('/\[.*?\]/', "", $text);
                    $text = preg_replace('/\&#39;/', "", $text);

                    if (strlen($text) < 100) {


                        continue;
                    } else {
                        $answer[$i] = html_entity_decode($text);


                        $i++;

                        if ($i > 3) {
                            break;
                        }
                    }
                }
            }
        }
        // scrapping ends


        //news scrapping starts

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://contextualwebsearch-websearch-v1.p.rapidapi.com/api/Search/NewsSearchAPI?autoCorrect=true&pageNumber=1&pageSize=10&q=$ct&safeSearch=false",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "x-rapidapi-host: contextualwebsearch-websearch-v1.p.rapidapi.com",
                "x-rapidapi-key: d11a245335msh08002a18cb6f46cp15cd57jsnb231156803bf"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {


            $news = json_decode($response, true);
        }

        //  news scrapping ends

        
        // autocomplete api starts

        //first starts

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://contextualwebsearch-websearch-v1.p.rapidapi.com/api/spelling/AutoComplete?text=$st",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "x-rapidapi-host: contextualwebsearch-websearch-v1.p.rapidapi.com",
                "x-rapidapi-key: d11a245335msh08002a18cb6f46cp15cd57jsnb231156803bf"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $suggestions_one = json_decode($response, true);
        }

        //first ends


        //Second Starts

        $curl = curl_init();

        $st2 = $st . "%20" . "homes";

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://contextualwebsearch-websearch-v1.p.rapidapi.com/api/spelling/AutoComplete?text=$st2",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "x-rapidapi-host: contextualwebsearch-websearch-v1.p.rapidapi.com",
                "x-rapidapi-key: d11a245335msh08002a18cb6f46cp15cd57jsnb231156803bf"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $suggestions_two = json_decode($response, true);
        }

        // Second Ends

        // autocomplete api ends

        // typo script starts
        $sti = strtolower(preg_replace('/-/', '', $ct));
        $typos = $this->getTypos($sti);
        // type script ends




        $content = Content::where("page", "homes for sale city")->first();

        return view("cities-pages.homes-for-sale-city", ["titles" => $this->blogs_titles, "ctis" => $this->cities, "infos" => $city_info, "content" => $content, "content2" => $answer, "slider" => $this->slider, "news" => $news, "suggestions_one" => $suggestions_one, "suggestions_two" => $suggestions_two, "typos" => $typos]);
    }
    public function homesCity($ct)
    {

        // scrapping starts
        $city = strtolower(preg_replace('/-/', ' ', $ct));
        $city_info = City::where("city", $city)->first();

        $dom = "";
        
        $st = strtolower(preg_replace('/-/', '%20', $ct));

        include(app_path() . '\functions\simple_html_dom.php');

        // ------------------------
        try {
            $dom = file_get_html("$city_info->wiki_link", false);
        } catch (\Throwable $th) {
            $dom = "";
        }

        $answer = array();
        if (!empty($dom)) {

            $divClass = $content = "";
            $i = 0;


            foreach ($dom->find(".mw-parser-output") as $divClass) {



                foreach ($divClass->find("p") as $desc) {

                    $text = html_entity_decode($desc->plaintext);
                    $text = preg_replace('/\[.*?\]/', "", $text);
                    $text = preg_replace('/\&#39;/', "", $text);

                    if (strlen($text) < 100) {


                        continue;
                    } else {
                        $answer[$i] = html_entity_decode($text);


                        $i++;

                        if ($i > 3) {
                            break;
                        }
                    }
                }
            }
        }
        // scrapping ends


        //news scrapping starts

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://contextualwebsearch-websearch-v1.p.rapidapi.com/api/Search/NewsSearchAPI?autoCorrect=true&pageNumber=1&pageSize=10&q=$ct&safeSearch=false",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "x-rapidapi-host: contextualwebsearch-websearch-v1.p.rapidapi.com",
                "x-rapidapi-key: d11a245335msh08002a18cb6f46cp15cd57jsnb231156803bf"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {


            $news = json_decode($response, true);
        }

        //  news scrapping ends

        
        // autocomplete api starts

        //first starts

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://contextualwebsearch-websearch-v1.p.rapidapi.com/api/spelling/AutoComplete?text=$st",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "x-rapidapi-host: contextualwebsearch-websearch-v1.p.rapidapi.com",
                "x-rapidapi-key: d11a245335msh08002a18cb6f46cp15cd57jsnb231156803bf"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $suggestions_one = json_decode($response, true);
        }

        //first ends


        //Second Starts

        $curl = curl_init();

        $st2 = $st . "%20" . "homes";

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://contextualwebsearch-websearch-v1.p.rapidapi.com/api/spelling/AutoComplete?text=$st2",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "x-rapidapi-host: contextualwebsearch-websearch-v1.p.rapidapi.com",
                "x-rapidapi-key: d11a245335msh08002a18cb6f46cp15cd57jsnb231156803bf"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $suggestions_two = json_decode($response, true);
        }

        // Second Ends

        // autocomplete api ends

        // typo script starts
        $sti = strtolower(preg_replace('/-/', '', $ct));
        $typos = $this->getTypos($sti);
        // type script ends



        $content = Content::where("page", "homes city")->first();

        return view("cities-pages.homes-city", ["titles" => $this->blogs_titles, "ctis" => $this->cities, "infos" => $city_info, "content" => $content, "content2" => $answer, "slider" => $this->slider, "news" => $news, "suggestions_one" => $suggestions_one, "suggestions_two" => $suggestions_two, "typos" => $typos]);
    }
    public function houseForSaleNearMeCity($ct)
    {

        // scrapping starts
        $city = strtolower(preg_replace('/-/', ' ', $ct));
        $city_info = City::where("city", $city)->first();

        $dom = "";
        
        $st = strtolower(preg_replace('/-/', '%20', $ct));

        include(app_path() . '\functions\simple_html_dom.php');

        // ------------------------
        try {
            $dom = file_get_html("$city_info->wiki_link", false);
        } catch (\Throwable $th) {
            $dom = "";
        }

        $answer = array();
        if (!empty($dom)) {

            $divClass = $content = "";
            $i = 0;


            foreach ($dom->find(".mw-parser-output") as $divClass) {



                foreach ($divClass->find("p") as $desc) {

                    $text = html_entity_decode($desc->plaintext);
                    $text = preg_replace('/\[.*?\]/', "", $text);
                    $text = preg_replace('/\&#39;/', "", $text);

                    if (strlen($text) < 100) {


                        continue;
                    } else {
                        $answer[$i] = html_entity_decode($text);


                        $i++;

                        if ($i > 3) {
                            break;
                        }
                    }
                }
            }
        }
        // scrapping ends


        //news scrapping starts
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://contextualwebsearch-websearch-v1.p.rapidapi.com/api/Search/NewsSearchAPI?autoCorrect=true&pageNumber=1&pageSize=10&q=$ct&safeSearch=false",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "x-rapidapi-host: contextualwebsearch-websearch-v1.p.rapidapi.com",
                "x-rapidapi-key: d11a245335msh08002a18cb6f46cp15cd57jsnb231156803bf"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {


            $news = json_decode($response, true);
        }


        //  news scrapping ends

        
        // autocomplete api starts

        //first starts

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://contextualwebsearch-websearch-v1.p.rapidapi.com/api/spelling/AutoComplete?text=$st",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "x-rapidapi-host: contextualwebsearch-websearch-v1.p.rapidapi.com",
                "x-rapidapi-key: d11a245335msh08002a18cb6f46cp15cd57jsnb231156803bf"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $suggestions_one = json_decode($response, true);
        }

        //first ends


        //Second Starts

        $curl = curl_init();

        $st2 = $st . "%20" . "homes";

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://contextualwebsearch-websearch-v1.p.rapidapi.com/api/spelling/AutoComplete?text=$st2",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "x-rapidapi-host: contextualwebsearch-websearch-v1.p.rapidapi.com",
                "x-rapidapi-key: d11a245335msh08002a18cb6f46cp15cd57jsnb231156803bf"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $suggestions_two = json_decode($response, true);
        }

        // Second Ends

        // autocomplete api ends

        // typo script starts
        $sti = strtolower(preg_replace('/-/', '', $ct));
        $typos = $this->getTypos($sti);
        // type script ends


        $content = Content::where("page", "house for sale near me city")->first();

        return view("cities-pages.house-for-sale-near-me-city", ["titles" => $this->blogs_titles, "ctis" => $this->cities, "infos" => $city_info, "content" => $content, "content2" => $answer, "slider" => $this->slider, "news" => $news, "suggestions_one" => $suggestions_one, "suggestions_two" => $suggestions_two, "typos" => $typos]);
    }
    public function houseForSaleCity($ct)
    {

        // scrapping starts
        $city = strtolower(preg_replace('/-/', ' ', $ct));
        $city_info = City::where("city", $city)->first();

        $dom = "";
        
        $st = strtolower(preg_replace('/-/', '%20', $ct));

        include(app_path() . '\functions\simple_html_dom.php');

        // ------------------------
        try {
            $dom = file_get_html("$city_info->wiki_link", false);
        } catch (\Throwable $th) {
            $dom = "";
        }

        $answer = array();
        if (!empty($dom)) {

            $divClass = $content = "";
            $i = 0;


            foreach ($dom->find(".mw-parser-output") as $divClass) {



                foreach ($divClass->find("p") as $desc) {

                    $text = html_entity_decode($desc->plaintext);
                    $text = preg_replace('/\[.*?\]/', "", $text);
                    $text = preg_replace('/\&#39;/', "", $text);

                    if (strlen($text) < 100) {


                        continue;
                    } else {
                        $answer[$i] = html_entity_decode($text);


                        $i++;

                        if ($i > 3) {
                            break;
                        }
                    }
                }
            }
        }
        // scrapping ends


        //news scrapping starts

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://contextualwebsearch-websearch-v1.p.rapidapi.com/api/Search/NewsSearchAPI?autoCorrect=true&pageNumber=1&pageSize=10&q=$ct&safeSearch=false",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "x-rapidapi-host: contextualwebsearch-websearch-v1.p.rapidapi.com",
                "x-rapidapi-key: d11a245335msh08002a18cb6f46cp15cd57jsnb231156803bf"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {


            $news = json_decode($response, true);
        }

        //  news scrapping ends

        
        // autocomplete api starts

        //first starts

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://contextualwebsearch-websearch-v1.p.rapidapi.com/api/spelling/AutoComplete?text=$st",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "x-rapidapi-host: contextualwebsearch-websearch-v1.p.rapidapi.com",
                "x-rapidapi-key: d11a245335msh08002a18cb6f46cp15cd57jsnb231156803bf"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $suggestions_one = json_decode($response, true);
        }

        //first ends


        //Second Starts

        $curl = curl_init();

        $st2 = $st . "%20" . "homes";

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://contextualwebsearch-websearch-v1.p.rapidapi.com/api/spelling/AutoComplete?text=$st2",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "x-rapidapi-host: contextualwebsearch-websearch-v1.p.rapidapi.com",
                "x-rapidapi-key: d11a245335msh08002a18cb6f46cp15cd57jsnb231156803bf"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $suggestions_two = json_decode($response, true);
        }

        // Second Ends

        // autocomplete api ends

        // typo script starts
        $sti = strtolower(preg_replace('/-/', '', $ct));
        $typos = $this->getTypos($sti);
        // type script ends


        $content = Content::where("page", "house for sale city")->first();

        return view("cities-pages.house-for-sale-city", ["titles" => $this->blogs_titles, "ctis" => $this->cities, "infos" => $city_info, "content" => $content, "content2" => $answer, "slider" => $this->slider, "news" => $news, "suggestions_one" => $suggestions_one, "suggestions_two" => $suggestions_two, "typos" => $typos]);
    }
    public function motorcycleSaleCity($ct)
    {

        // scrapping starts
        $city = strtolower(preg_replace('/-/', ' ', $ct));
        $city_info = City::where("city", $city)->first();

        $dom = "";
        
        $st = strtolower(preg_replace('/-/', '%20', $ct));

        include(app_path() . '\functions\simple_html_dom.php');

        // ------------------------
        try {
            $dom = file_get_html("$city_info->wiki_link", false);
        } catch (\Throwable $th) {
            $dom = "";
        }

        $answer = array();
        if (!empty($dom)) {

            $divClass = $content = "";
            $i = 0;


            foreach ($dom->find(".mw-parser-output") as $divClass) {



                foreach ($divClass->find("p") as $desc) {

                    $text = html_entity_decode($desc->plaintext);
                    $text = preg_replace('/\[.*?\]/', "", $text);
                    $text = preg_replace('/\&#39;/', "", $text);

                    if (strlen($text) < 100) {


                        continue;
                    } else {
                        $answer[$i] = html_entity_decode($text);


                        $i++;

                        if ($i > 3) {
                            break;
                        }
                    }
                }
            }
        }
        // scrapping ends


        //news scrapping starts

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://contextualwebsearch-websearch-v1.p.rapidapi.com/api/Search/NewsSearchAPI?autoCorrect=true&pageNumber=1&pageSize=10&q=$ct&safeSearch=false",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "x-rapidapi-host: contextualwebsearch-websearch-v1.p.rapidapi.com",
                "x-rapidapi-key: d11a245335msh08002a18cb6f46cp15cd57jsnb231156803bf"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {


            $news = json_decode($response, true);
        }


        //  news scrapping ends

        
        // autocomplete api starts

        //first starts

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://contextualwebsearch-websearch-v1.p.rapidapi.com/api/spelling/AutoComplete?text=$st",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "x-rapidapi-host: contextualwebsearch-websearch-v1.p.rapidapi.com",
                "x-rapidapi-key: d11a245335msh08002a18cb6f46cp15cd57jsnb231156803bf"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $suggestions_one = json_decode($response, true);
        }

        //first ends


        //Second Starts

        $curl = curl_init();

        $st2 = $st . "%20" . "homes";

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://contextualwebsearch-websearch-v1.p.rapidapi.com/api/spelling/AutoComplete?text=$st2",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "x-rapidapi-host: contextualwebsearch-websearch-v1.p.rapidapi.com",
                "x-rapidapi-key: d11a245335msh08002a18cb6f46cp15cd57jsnb231156803bf"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $suggestions_two = json_decode($response, true);
        }

        // Second Ends

        // autocomplete api ends

        // typo script starts
        $sti = strtolower(preg_replace('/-/', '', $ct));
        $typos = $this->getTypos($sti);
        // type script ends


        $content = Content::where("page", "motorcycle sale city")->first();

        return view("cities-pages.motorcycle-sale-city", ["titles" => $this->blogs_titles, "ctis" => $this->cities, "infos" => $city_info, "content" => $content, "content2" => $answer, "slider" => $this->slider, "news" => $news, "suggestions_one" => $suggestions_one, "suggestions_two" => $suggestions_two, "typos" => $typos]);
    }
    public function truliaCity($ct)
    {
        // scrapping starts
        $city = strtolower(preg_replace('/-/', ' ', $ct));
        $city_info = City::where("city", $city)->first();

        $dom = "";
        
        $st = strtolower(preg_replace('/-/', '%20', $ct));

        include(app_path() . '\functions\simple_html_dom.php');

        // ------------------------
        try {
            $dom = file_get_html("$city_info->wiki_link", false);
        } catch (\Throwable $th) {
            $dom = "";
        }

        $answer = array();
        if (!empty($dom)) {

            $divClass = $content = "";
            $i = 0;


            foreach ($dom->find(".mw-parser-output") as $divClass) {



                foreach ($divClass->find("p") as $desc) {

                    $text = html_entity_decode($desc->plaintext);
                    $text = preg_replace('/\[.*?\]/', "", $text);
                    $text = preg_replace('/\&#39;/', "", $text);

                    if (strlen($text) < 100) {


                        continue;
                    } else {
                        $answer[$i] = html_entity_decode($text);


                        $i++;

                        if ($i > 3) {
                            break;
                        }
                    }
                }
            }
        }
        // scrapping ends


        //news scrapping starts

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://contextualwebsearch-websearch-v1.p.rapidapi.com/api/Search/NewsSearchAPI?autoCorrect=true&pageNumber=1&pageSize=10&q=$ct&safeSearch=false",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "x-rapidapi-host: contextualwebsearch-websearch-v1.p.rapidapi.com",
                "x-rapidapi-key: d11a245335msh08002a18cb6f46cp15cd57jsnb231156803bf"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {


            $news = json_decode($response, true);
        }

        //  news scrapping ends

        
        // autocomplete api starts

        //first starts

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://contextualwebsearch-websearch-v1.p.rapidapi.com/api/spelling/AutoComplete?text=$st",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "x-rapidapi-host: contextualwebsearch-websearch-v1.p.rapidapi.com",
                "x-rapidapi-key: d11a245335msh08002a18cb6f46cp15cd57jsnb231156803bf"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $suggestions_one = json_decode($response, true);
        }

        //first ends


        //Second Starts

        $curl = curl_init();

        $st2 = $st . "%20" . "homes";

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://contextualwebsearch-websearch-v1.p.rapidapi.com/api/spelling/AutoComplete?text=$st2",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "x-rapidapi-host: contextualwebsearch-websearch-v1.p.rapidapi.com",
                "x-rapidapi-key: d11a245335msh08002a18cb6f46cp15cd57jsnb231156803bf"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $suggestions_two = json_decode($response, true);
        }

        // Second Ends

        // autocomplete api ends

        // typo script starts
        $sti = strtolower(preg_replace('/-/', '', $ct));
        $typos = $this->getTypos($sti);
        // type script ends



        $content = Content::where("page", "trulia city")->first();

        return view("cities-pages.trulia-city", ["titles" => $this->blogs_titles, "ctis" => $this->cities, "infos" => $city_info, "content" => $content, "content2" => $answer, "slider" => $this->slider, "news" => $news, "suggestions_one" => $suggestions_one, "suggestions_two" => $suggestions_two, "typos" => $typos]);
    }
    public function usedCarsForSaleNearMeCity($ct)
    {

        // scrapping starts
        $city = strtolower(preg_replace('/-/', ' ', $ct));
        $city_info = City::where("city", $city)->first();

        $dom = "";
        
        $st = strtolower(preg_replace('/-/', '%20', $ct));

        include(app_path() . '\functions\simple_html_dom.php');

        // ------------------------
        try {
            $dom = file_get_html("$city_info->wiki_link", false);
        } catch (\Throwable $th) {
            $dom = "";
        }

        $answer = array();
        if (!empty($dom)) {

            $divClass = $content = "";
            $i = 0;


            foreach ($dom->find(".mw-parser-output") as $divClass) {



                foreach ($divClass->find("p") as $desc) {

                    $text = html_entity_decode($desc->plaintext);
                    $text = preg_replace('/\[.*?\]/', "", $text);
                    $text = preg_replace('/\&#39;/', "", $text);

                    if (strlen($text) < 100) {


                        continue;
                    } else {
                        $answer[$i] = html_entity_decode($text);


                        $i++;

                        if ($i > 3) {
                            break;
                        }
                    }
                }
            }
        }
        // scrapping ends


        //news scrapping starts

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://contextualwebsearch-websearch-v1.p.rapidapi.com/api/Search/NewsSearchAPI?autoCorrect=true&pageNumber=1&pageSize=10&q=$ct&safeSearch=false",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "x-rapidapi-host: contextualwebsearch-websearch-v1.p.rapidapi.com",
                "x-rapidapi-key: d11a245335msh08002a18cb6f46cp15cd57jsnb231156803bf"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {


            $news = json_decode($response, true);
        }

        //  news scrapping ends


        
        // autocomplete api starts

        //first starts

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://contextualwebsearch-websearch-v1.p.rapidapi.com/api/spelling/AutoComplete?text=$st",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "x-rapidapi-host: contextualwebsearch-websearch-v1.p.rapidapi.com",
                "x-rapidapi-key: d11a245335msh08002a18cb6f46cp15cd57jsnb231156803bf"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $suggestions_one = json_decode($response, true);
        }

        //first ends


        //Second Starts

        $curl = curl_init();

        $st2 = $st . "%20" . "homes";

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://contextualwebsearch-websearch-v1.p.rapidapi.com/api/spelling/AutoComplete?text=$st2",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "x-rapidapi-host: contextualwebsearch-websearch-v1.p.rapidapi.com",
                "x-rapidapi-key: d11a245335msh08002a18cb6f46cp15cd57jsnb231156803bf"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $suggestions_two = json_decode($response, true);
        }

        // Second Ends

        // autocomplete api ends

        // typo script starts
        $sti = strtolower(preg_replace('/-/', '', $ct));
        $typos = $this->getTypos($sti);
        // type script ends


        $content = Content::where("page", "used cars for sale near me city")->first();

        return view("cities-pages.used-cars-for-sale-near-me-city", ["titles" => $this->blogs_titles, "ctis" => $this->cities, "infos" => $city_info, "content" => $content, "content2" => $answer, "slider" => $this->slider, "news" => $news, "suggestions_one" => $suggestions_one, "suggestions_two" => $suggestions_two, "typos" => $typos]);
    }
    public function usedCarsForSaleCity($ct)
    {

        // scrapping starts
        $city = strtolower(preg_replace('/-/', ' ', $ct));
        $city_info = City::where("city", $city)->first();

        $dom = "";
        
        $st = strtolower(preg_replace('/-/', '%20', $ct));

        include(app_path() . '\functions\simple_html_dom.php');

        // ------------------------
        try {
            $dom = file_get_html("$city_info->wiki_link", false);
        } catch (\Throwable $th) {
            $dom = "";
        }

        $answer = array();
        if (!empty($dom)) {

            $divClass = $content = "";
            $i = 0;


            foreach ($dom->find(".mw-parser-output") as $divClass) {



                foreach ($divClass->find("p") as $desc) {

                    $text = html_entity_decode($desc->plaintext);
                    $text = preg_replace('/\[.*?\]/', "", $text);
                    $text = preg_replace('/\&#39;/', "", $text);

                    if (strlen($text) < 100) {


                        continue;
                    } else {
                        $answer[$i] = html_entity_decode($text);


                        $i++;

                        if ($i > 3) {
                            break;
                        }
                    }
                }
            }
        }
        // scrapping ends


        //news scrapping starts

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://contextualwebsearch-websearch-v1.p.rapidapi.com/api/Search/NewsSearchAPI?autoCorrect=true&pageNumber=1&pageSize=10&q=$ct&safeSearch=false",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "x-rapidapi-host: contextualwebsearch-websearch-v1.p.rapidapi.com",
                "x-rapidapi-key: d11a245335msh08002a18cb6f46cp15cd57jsnb231156803bf"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {


            $news = json_decode($response, true);
        }

        //  news scrapping ends

        
        // autocomplete api starts

        //first starts

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://contextualwebsearch-websearch-v1.p.rapidapi.com/api/spelling/AutoComplete?text=$st",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "x-rapidapi-host: contextualwebsearch-websearch-v1.p.rapidapi.com",
                "x-rapidapi-key: d11a245335msh08002a18cb6f46cp15cd57jsnb231156803bf"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $suggestions_one = json_decode($response, true);
        }

        //first ends


        //Second Starts

        $curl = curl_init();

        $st2 = $st . "%20" . "homes";

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://contextualwebsearch-websearch-v1.p.rapidapi.com/api/spelling/AutoComplete?text=$st2",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "x-rapidapi-host: contextualwebsearch-websearch-v1.p.rapidapi.com",
                "x-rapidapi-key: d11a245335msh08002a18cb6f46cp15cd57jsnb231156803bf"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $suggestions_two = json_decode($response, true);
        }

        // Second Ends

        // autocomplete api ends

        // typo script starts
        $sti = strtolower(preg_replace('/-/', '', $ct));
        $typos = $this->getTypos($sti);
        // type script ends




        $content = Content::where("page", "used cars for sale city")->first();

        return view("cities-pages.used-cars-for-sale-city", ["titles" => $this->blogs_titles, "ctis" => $this->cities, "infos" => $city_info, "content" => $content, "content2" => $answer, "slider" => $this->slider, "news" => $news, "suggestions_one" => $suggestions_one, "suggestions_two" => $suggestions_two, "typos" => $typos]);
    }
    public function usedCarsCity($ct)
    {
        // scrapping starts
        $city = strtolower(preg_replace('/-/', ' ', $ct));
        $city_info = City::where("city", $city)->first();

        $dom = "";
        
        $st = strtolower(preg_replace('/-/', '%20', $ct));

        include(app_path() . '\functions\simple_html_dom.php');

        // ------------------------
        try {
            $dom = file_get_html("$city_info->wiki_link", false);
        } catch (\Throwable $th) {
            $dom = "";
        }

        $answer = array();
        if (!empty($dom)) {

            $divClass = $content = "";
            $i = 0;


            foreach ($dom->find(".mw-parser-output") as $divClass) {



                foreach ($divClass->find("p") as $desc) {

                    $text = html_entity_decode($desc->plaintext);
                    $text = preg_replace('/\[.*?\]/', "", $text);
                    $text = preg_replace('/\&#39;/', "", $text);

                    if (strlen($text) < 100) {


                        continue;
                    } else {
                        $answer[$i] = html_entity_decode($text);


                        $i++;

                        if ($i > 3) {
                            break;
                        }
                    }
                }
            }
        }
        // scrapping ends


        //news scrapping starts

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://contextualwebsearch-websearch-v1.p.rapidapi.com/api/Search/NewsSearchAPI?autoCorrect=true&pageNumber=1&pageSize=10&q=$ct&safeSearch=false",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "x-rapidapi-host: contextualwebsearch-websearch-v1.p.rapidapi.com",
                "x-rapidapi-key: d11a245335msh08002a18cb6f46cp15cd57jsnb231156803bf"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {


            $news = json_decode($response, true);
        }


        //  news scrapping ends

        
        // autocomplete api starts

        //first starts

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://contextualwebsearch-websearch-v1.p.rapidapi.com/api/spelling/AutoComplete?text=$st",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "x-rapidapi-host: contextualwebsearch-websearch-v1.p.rapidapi.com",
                "x-rapidapi-key: d11a245335msh08002a18cb6f46cp15cd57jsnb231156803bf"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $suggestions_one = json_decode($response, true);
        }

        //first ends


        //Second Starts

        $curl = curl_init();

        $st2 = $st . "%20" . "homes";

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://contextualwebsearch-websearch-v1.p.rapidapi.com/api/spelling/AutoComplete?text=$st2",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "x-rapidapi-host: contextualwebsearch-websearch-v1.p.rapidapi.com",
                "x-rapidapi-key: d11a245335msh08002a18cb6f46cp15cd57jsnb231156803bf"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $suggestions_two = json_decode($response, true);
        }

        // Second Ends

        // autocomplete api ends

        // typo script starts
        $sti = strtolower(preg_replace('/-/', '', $ct));
        $typos = $this->getTypos($sti);
        // type script ends



        $content = Content::where("page", "used cars city")->first();

        return view("cities-pages.used-cars-city", ["titles" => $this->blogs_titles, "ctis" => $this->cities, "infos" => $city_info, "content" => $content, "content2" => $answer, "slider" => $this->slider, "news" => $news, "suggestions_one" => $suggestions_one, "suggestions_two" => $suggestions_two, "typos" => $typos]);
    }


    // cities pages ends

}
