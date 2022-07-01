<?php

namespace App\Http\Controllers;

use App\Models\banner;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class BannerController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }
    function banner() {
        return view('admin.banner');
    }
    function banner_post(Request $request){
        $image = $request->image;
        $extension = $image->getClientoriginalExtension();
        $new_banner_image = $request->id . '.' . $extension;
        image::make($image)->save(base_path('public/uploads/banners/' . $new_banner_image));
        banner::insert([
            'category_name' =>$request->category_name,
            'first_title' =>$request->first_title,
            'second_title' =>$request->second_title,
            'description' =>$request->description,
            'product_price' =>$request->product_price,
            'discount' =>$request->discount,
            'discout_price' =>($request->product_price*100)-$request->discount,
            'btn' =>$request->btn,
            'image' => $new_banner_image,
            'created_at' => Carbon::now(),
        ]);

    }

}
