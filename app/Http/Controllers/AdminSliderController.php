<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slider;

class AdminSliderController extends Controller
{
    public function index()
    {
        $sliders=Slider::all();

        return view("admin.slider.index",["sliders"=>$sliders]);
    }
    public function create()
    {
        return view("admin.slider.create");
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
        $path = $request->file("img")->storeAs("public/images/slider/", $fileNameToStore);

        //save blog to database
        $slider = new Slider;
        $slider->image = $fileNameToStore;

        $slider->save();

        return redirect("/admin/slider/create")->with("success", 'Added Successfully');
    }


    public function destroy($id)
    {
        $slider=Slider::findorfail($id);

        $slider->delete();

        return redirect('/admin/slider/');
    }

}
