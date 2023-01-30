<?php

namespace App\Http\Controllers;

use App\Models\HomeSlider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeSliderController extends Controller
{
    public function HomeSlider(){
        $HomeSlider=HomeSlider::find(1);
        return view('admin.home_slide.home_slide_all',compact('HomeSlider'));
    }

    public function updateSlider(Request $request){
         $HomeSlider=DB::table('home_sliders')->where('title', $request->title)->first();
        //  dd($HomeSlider);
        //  $HomeSlider->update([
        // 'title'=>$request->title,
        // 'short_title'=>$request->short_title,
        // 'home_slid'=>'',
        // 'video_url'=>$request->video_url,
        // ]);
        return redirect()->back()->with([
            'success'=>'slide updatred'
        ]);
    }
   
}
