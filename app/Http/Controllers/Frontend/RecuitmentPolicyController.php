<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\PDF;
use Illuminate\Http\Request;

class RecuitmentPolicyController extends Controller
{
    //
    public function getEmployerRight(){
        $pdf=PDF::first();
        return view('frontend.newPages.recuitmentPolicy.employerRight',compact('pdf'));
    }
    public function getDomesticWorkerRight(){
        $pdf=PDF::first();
        return view('frontend.newPages.recuitmentPolicy.domesticWorkerRight',compact('pdf'));
    }

}
