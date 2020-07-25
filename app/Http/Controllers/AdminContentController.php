<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Content;

class AdminContentController extends Controller
{
    public function index()
    {
        $contents = Content::all();
        return view("admin.content.index", ["contents" => $contents]);
    }


    public function create()
    {
        return view("admin.content.create");
    }

    public function store(Request $request)
    {

        $page = request("page");
        $content_one = request("content");

        $heading=null;
        $content_third=null;

        if ($request->has("heading")) {
            $heading = request("heading");
        }
        if ($request->has("content-third")) {
            $content_third = request("content-third");
        }
    
        $exist=Content::where('page','=',$page)->first();

        if ($exist!="") {
           
            Content::where("page", $page)->update(["page" => $page, "content" => $content_one,"heading"=>$heading,"content_third"=>$content_third]);
        }
        else{
            $content = new Content();
            $content->page=$page;
            $content->content=$content_one;
            $content->heading=$heading;
            $content->content_third=$content_third;
            $content->save();
        }

        return redirect("/admin/content/create")->with("success", "Added Successfully");
    }

    public function show($id)
    {
        $content = Content::findorfail($id);

        return view("admin.content.show", ["content" => $content]);
    }

    public function update($id)
    {
        $page = request("page");
        $content = request("content");
        $city = request("city");

        Content::where("id", $id)->update(["page" => $page, "content" => $content]);

        return redirect("/admin/content/");
    }

    public function destroy($id)
    {
        $content = Content::findorfail($id);
        $content->delete();

        return redirect("/admin/content/");
    }
}
