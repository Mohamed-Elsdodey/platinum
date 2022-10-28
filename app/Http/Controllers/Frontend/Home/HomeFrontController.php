<?php

namespace App\Http\Controllers\Frontend\Home;

use App\Http\Controllers\Controller;
use App\Models\Biography;
use App\Models\Contact;
use App\Models\FrequentlyQuestion;
use App\Models\Nationalitie;
use App\Models\OurService;
use App\Models\RecruitmentRequirement;
use App\Models\Setting;
use App\Models\Slider;
use App\Models\Sponsor;
use App\Models\Statistic;
use Illuminate\Http\Request;

class HomeFrontController extends Controller
{

    public function index()
    {

        $row1=RecruitmentRequirement::where('id',1)->first();
        $row2=RecruitmentRequirement::where('id',2)->first();
        $nationalities=Nationalitie::take(6)->get();

        $sliders = Slider::latest()->take(4)->get();
        $ourServices = OurService::latest()->take(5)->get();
        $statistics = Statistic::latest()->take(4)->get();
        $sponsors = Sponsor::latest()->take(5)->get();
        $questions = FrequentlyQuestion::take(5)->get();
        $cvs = Biography::where('status','new')
            ->where('order_type','normal')
            ->with('recruitment_office','nationalitie','language_title',
            'religion','job','social_type','admin','images','skills')
            ->take(5)->get();
        $setting=Setting::first();
        return view('frontend.pages.home.home',[
            'sliders'=>$sliders,
            'ourServices'=>$ourServices,
            'statistics'=>$statistics,
            'sponsors'=>$sponsors,
            'questions'=>$questions,
            'cvs'=>$cvs,
            'setting'=>$setting,
            'row1'=>$row1,
            'row2'=>$row2,
            'nationalities'=>$nationalities,
        ]);
    }//end fun



    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     *
     * Save Contact us
     *
     */
    public function contact_us_action(Request $request)
    {
        $data = $request->validate([
            'name'=>'required',
            'subject'=>'required',
            'phone'=>'required',
            'message'=>'required',
        ]);
        Contact::create($data);
        return response()->json([],200);
    }//end fun


}//end class
