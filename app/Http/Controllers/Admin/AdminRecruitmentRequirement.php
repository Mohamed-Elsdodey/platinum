<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Language;
use App\Models\RecruitmentRequirement;
use App\Models\Setting;
use Illuminate\Http\Request;

class AdminRecruitmentRequirement extends Controller
{
    //
    public function index(){
        if (!checkPermission(36))
            return view('admin.permission');

        $row1=RecruitmentRequirement::where('id',1)->first();
        $row2=RecruitmentRequirement::where('id',2)->first();

        $settings = Setting::firstOrNew();



        return view('admin.recruitmentRequirement.index',[
            'settings' => $settings,
            'languages' => Language::where('is_active', 'active')->get(),
            'row1'=>$row1,
            'row2'=>$row2,
        ]);
    }

    public function updateRecruitmentRequirement(Request $request,$id){

        $row=RecruitmentRequirement::findORFail($id);

        $title = $copy_of_the_national_IDor_residence_for_residents = $qutstanding_customer_service=$salary_definition_from_the_employer_or_bank_statement =$original_visa=$signing_recruitment_contract = [];
        foreach (Language::where('is_active', 'active')->get() as $index => $language) {
            $title[$language->title] = $request->title[$index];
            $copy_of_the_national_IDor_residence_for_residents[$language->title] = $request->copy_of_the_national_IDor_residence_for_residents[$index];
            $qutstanding_customer_service[$language->title] = $request->qutstanding_customer_service[$index];
            $salary_definition_from_the_employer_or_bank_statement[$language->title] = $request->salary_definition_from_the_employer_or_bank_statement[$index];
            $original_visa[$language->title] = $request->original_visa[$index];
            $signing_recruitment_contract[$language->title] = $request->signing_recruitment_contract[$index];

        }

        $row->update(
            [
                'title'=>$title,
                'copy_of_the_national_IDor_residence_for_residents'=>$copy_of_the_national_IDor_residence_for_residents,
                'qutstanding_customer_service'=>$qutstanding_customer_service,
                'salary_definition_from_the_employer_or_bank_statement'=>$salary_definition_from_the_employer_or_bank_statement,
                'original_visa'=>$original_visa,
                'signing_recruitment_contract'=>$signing_recruitment_contract,

            ]
        );
        $settings = Setting::first();
        return response()->json(['settings' => $settings, 'logo' => get_file($settings->header_logo)], 200);






    }


}
