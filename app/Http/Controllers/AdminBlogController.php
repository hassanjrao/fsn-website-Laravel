<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use Illuminate\Support\Facades\Storage;


class AdminBlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::all();

        return view("admin.blog.index", ["blogs" => $blogs]);
    }

    public function create()
    {
        return view("admin.blog.create");
    }

    public function store(Request $request)
    {
        if ($request->hasFile("img")) {
            //get filename with extension
            $fileNameWithExt = $request->file("img")->getClientOriginalName();

            //get just filename
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

            //get just extension
            $extension = $request->file("img")->getClientOriginalExtension();

            // filename to store
            $fileNameToStore = $filename . "_" . time() . "." . $extension;
        } else {
            $fileNameToStore = "noimage.jpg";
        }

        //upload image
        $path = $request->file("img")->storeAs("public/images/blog/", $fileNameToStore);

        //save blog to database
        $blog = new Blog;
        $blog->title = request("title");
        $blog->body = request("body__");
        $blog->caption = request("caption");
        $blog->image = $fileNameToStore;

        $blog->save();

        return redirect("/admin/blog/create")->with("success", 'Added Successfully');
    }


    public function show($id)
    {
        $blog = Blog::findorfail($id);
        return view("admin.blog.show", ["blog" => $blog]);
    }

    public function update($id, Request $request)
    {
        $blog=Blog::findorfail($id);

        Storage::delete("public/images/blog/".$blog->image);

        if ($request->hasFile("image")) {

            //filename with extension
            $fileNameWithExt = $request->file("image")->getClientOriginalName();

            //get only filename
            $filename=pathinfo("$fileNameWithExt",PATHINFO_FILENAME);

            //get file extension
            $extension=$request->file("image")->getClientOriginalExtension();

            $fileNameToStore=$filename."_".time().".".$extension;

        } else {
            $fileNameToStore = "noimage.jpg";
        }

        $path=$request->file("image")->storeAs("public/images/blog/",$fileNameToStore);



        $title = request("title");
        $body = request("body");
        $caption = request("caption");
        $image = $fileNameToStore;

        Blog::where("id",$id)->update(["title"=>$title,"body"=>$body,"caption"=>$caption,"image"=>$image]);

        return redirect("admin/blog/");

    }


    public function destroy($id)
    {
        $blog=Blog::findorfail($id);
        Storage::delete("public/images/blog/".$blog->image);
        $blog->delete();
        
        return redirect("admin/blog/");
    }
}
