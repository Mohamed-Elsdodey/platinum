<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Language;
use App\Models\RecruitmentTrip;
use Illuminate\Http\Request;

class AdminRecruitmentTripController extends Controller
{
    //
    public function index(){
        if (!checkPermission(29))
            return view('admin.permission');
        $trip=RecruitmentTrip::first();
        $languages= Language::where('is_active', 'active')->get();

        return view('admin.recruitmentTrip.index',compact('trip','languages'));
    }
    public function updateRecruitmentTrip(Request $request){

        $validator=\Validator::make($request->all(),
            [
                'recruitment_contract_title'=>'required|array',
                'recruitment_contract_title.*'=>'required',
                'recruitment_contract_desc'=>'required|array',
                'recruitment_contract_desc.*'=>'required',
                'recruitment_trip_title'=>'required|array',
                'recruitment_trip_title.*'=>'required',

                'recruitment_trip_desc'=>'required|array',
                'recruitment_trip_desc.*'=>'required',

                'employment_arrival_title'=>'required|array',
                'employment_arrival_title.*'=>'required',

                'employment_arrival_desc'=>'required|array',
                'employment_arrival_desc.*'=>'required',

                'customers_service_title'=>'required|array',
                'customers_service_title.*'=>'required',

                'customers_service_desc'=>'required|array',
                'customers_service_desc.*'=>'required',

            ]);
        if ($validator->fails()) {
            return response()->json(['status'=>'error','errors'=>$validator->errors()]);
        }
        $trip=RecruitmentTrip::first();

        $recruitment_contract_title=[];
        $recruitment_contract_desc=[];
        $recruitment_trip_title=[];
        $recruitment_trip_desc=[];
        $employment_arrival_title=[];
        $employment_arrival_desc=[];
        $customers_service_title=[];
        $customers_service_desc=[];


        foreach (Language::where('is_active', 'active')->get() as $index => $language) {
            $recruitment_contract_title[$language->title] = $request->recruitment_contract_title[$index];
            $recruitment_contract_desc[$language->title] = $request->recruitment_contract_desc[$index];
            $recruitment_trip_title[$language->title] = $request->recruitment_trip_title[$index];

            $recruitment_trip_desc[$language->title] = $request->recruitment_trip_desc[$index];
            $employment_arrival_title[$language->title] = $request->employment_arrival_title[$index];
            $employment_arrival_desc[$language->title] = $request->employment_arrival_desc[$index];

            $customers_service_title[$language->title] = $request->customers_service_title[$index];
            $customers_service_desc[$language->title] = $request->customers_service_desc[$index];

        }

        $data['recruitment_contract_title']=$recruitment_contract_title;
        $data['recruitment_contract_desc']=$recruitment_contract_desc;
        $data['recruitment_trip_title']=$recruitment_trip_title;
        $data['recruitment_trip_desc']=$recruitment_trip_desc;
        $data['employment_arrival_title']=$employment_arrival_title;
        $data['employment_arrival_desc']=$employment_arrival_desc;
        $data['customers_service_title']=$customers_service_title;
        $data['customers_service_desc']=$customers_service_desc;


        $trip->update($data);


        return response()->json(['status'=>true]);

    }











}
