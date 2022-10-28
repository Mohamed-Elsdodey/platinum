<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\OurService;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    //

    public function index(){
        $ourServices = OurService::latest()->take(5)->get();
        return view('frontend.newPages.services.index',compact('ourServices'));

    }

}
