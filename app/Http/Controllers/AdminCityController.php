<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\City;

class AdminCityController extends Controller
{
    //

    public function index()
    {
        
        $cities=City::all();

        return view("admin.city.index",["cities"=>$cities]);
    }

    public function create()
    {
        return view("admin.city.create");
    }

    public function store()
    {
        $city=new City();

        $city->city=request("city");
        $city->email=request("email");
        $city->phone=request("phone");
        $city->url=request("url");
        $city->moreinfo=request("moreinfo");
        

        $city->save();

        return redirect("/admin/city/create")->with("success",'Added Successfully');
    }

    public function show($id){

        $city=City::findorfail($id);
        return view("admin.city.show",["city"=>$city]);
    }

    public function update($id)
    {
        $city=request("city");
        $email=request("email");
        $phone=request("phone");
        $url=request("url");
        $moreinfo=request("moreinfo");
        City::where("id",$id)->update(["city"=>$city,"email"=>$email,"phone"=>$phone,"url"=>$url,"moreinfo"=>$moreinfo]);

        return redirect("/admin/city/");
    }

    public function destroy($id)
    {
        $pizza=City::findorfail($id);

        $pizza->delete();

        return redirect('/admin/city/');
    }
   
}
