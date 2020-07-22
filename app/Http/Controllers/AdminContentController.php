<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Content;

class AdminContentController extends Controller
{
    public function index()
    {
        $contents=Content::all();
        return view("admin.content.index",["contents"=>$contents]);
    }


    public function create()
    {
        return view("admin.content.create");
    }

    public function store()
    {
        $content=new Content();

        $content->page=request("page");
        $content->content=request("content");
        $content->save();

        return redirect("/admin/content/create")->with("success","Added Successfully");
        
    }

    public function show($id)
    {
        $content=Content::findorfail($id);

        return view("admin.content.show",["content"=>$content]);
    }

    public function update($id)
    {
        $page=request("page");
        $content=request("content");
        $city=request("city");

        Content::where("id",$id)->update(["page"=>$page,"content"=>$content]);

        return redirect("/admin/content/");
    }

    public function destroy($id)
    {
        $content=Content::findorfail($id);
        $content->delete();

        return redirect("/admin/content/");
    }
}


