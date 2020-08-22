<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MovingImage;
use Illuminate\Support\Facades\Storage;

class AdminMovingImgController extends Controller
{
    public function index()
    {
        $images=MovingImage::all();

        return view("admin.moving-imgs.index",["images"=>$images]);
    }
    public function create()
    {
        return view("admin.moving-imgs.create");
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
        $path = $request->file("img")->storeAs("public/images/moving-imgs", $fileNameToStore);

        //save blog to database
        $moving_img = new MovingImage;
        $moving_img->image = $fileNameToStore;
        $moving_img->caption=$request->caption;

        $moving_img->save();

        return redirect("/admin/moving-images/create")->with("success", 'Added Successfully');
    }


    public function show($id)
    {
        $moving_img = MovingImage::findorfail($id);
        return view("admin.moving-imgs.show", ["moving_img" => $moving_img]);
    }

    public function update($id, Request $request)
    {
        $moving_img=MovingImage::findorfail($id);

        Storage::delete("public/images/blog/".$moving_img->image);

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

        $path=$request->file("image")->storeAs("public/images/moving-imgs/",$fileNameToStore);



       
        $caption = request("caption");
        $image = $fileNameToStore;

        MovingImage::where("id",$id)->update(["caption"=>$caption,"image"=>$image]);

        return redirect("admin/moving-images/");

    }



    public function destroy($id)
    {
        $moving_img=MovingImage::findorfail($id);
        Storage::delete("public/images/moving-imgs/".$moving_img->image);
        $moving_img->delete();
        
        return redirect("admin/moving-images/");
    }
}
