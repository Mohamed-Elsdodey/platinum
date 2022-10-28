<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Nationalitie;
use Illuminate\Http\Request;

class NationalityController extends Controller
{
    //
    public function nationalities(){
        $nationalities=Nationalitie::take(6)->get();
        return view('frontend.newPages.nationalities.index',compact('nationalities'));


    }
}
