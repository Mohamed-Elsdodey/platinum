<?php

use Illuminate\Support\Facades\Route;


Route::group(['prefix' => 'admin'], function () {

    Config::set('auth.defines', 'admin');

    /*==================== Auth System  ==================*/

    Route::get('/', 'AdminLoginController@showLoginForm')->name('admin.login');
    Route::get('login', 'AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('login', 'AdminLoginController@login')->name('admin.login.submit');

    /*==================== Admin Panel ==================*/

    Route::group(['middleware' => 'admin:admin'], function () {

        /*================LogOut===========*/
        Route::get('logout', 'AdminLoginController@logout')->name('admin.logout');


        Route::get('/home', 'AdminController@index')->name('admin.dashboard');
        Route::get('calender', 'AdminController@calender')->name('admin.calender');


        //Profile
        Route::resource('profileControl', 'Profile\AdminProfileController');

        /*================Admin Setting control =========================*/

        Route::resource('settings', 'AdminSettingController');//setting

        /*================Admin Contact us control =========================*/

        Route::resource('contacts', 'AdminContactUsController');
        Route::get('deleteContact/{id}',[\App\Http\Controllers\Admin\AdminContactUsController::class,'delete'])->name('admin.deleteContact');


        /*================Admin send firebase control =========================*/

        Route::resource('firebaseNotification', 'AdminFirebaseNotificationController');

        /*================Admin Profile control =========================*/

        Route::resource('profile', 'AdminProfileController');

        /*================Admin Admin control =========================*/
        Route::resource('admins', 'AdminAdminController');
        Route::delete('admins/delete/bulk', 'AdminAdminController@delete_all')->name('admins.delete.bulk');

        /*================Admin Users control =========================*/
        Route::resource('users', 'AdminUserController');
        Route::delete('users/delete/bulk', 'AdminUserController@delete_all')
            ->name('users.delete.bulk');
        Route::get('users/changeBlock/{id}', 'AdminUserController@changeBlock')
            ->name('users.changeBlock');


        ####    Recruitment trip

        Route::get('getRecruitmentTrip',[\App\Http\Controllers\Admin\AdminRecruitmentTripController::class,'index'])->name('admin.getRecruitmentTrip');

        Route::post('updateRecruitmentTrip',[\App\Http\Controllers\Admin\AdminRecruitmentTripController::class,'updateRecruitmentTrip'])->name('admin.updateRecruitmentTrip');

        #PDF
        Route::get('getPDF',[\App\Http\Controllers\Admin\AdminPDFController::class,'index'])->name('admin.getPDF');

        Route::post('updatePDF',[\App\Http\Controllers\Admin\AdminPDFController::class,'updatePDF'])->name('admin.updatePDF');


        #AdminRecruitmentRequirement

        Route::get('getRecruitmentRequirement',[\App\Http\Controllers\Admin\AdminRecruitmentRequirement::class,'index'])->name('admin.getRecruitmentRequirement');
        Route::post('updateRecruitmentRequirement/{id}',[\App\Http\Controllers\Admin\AdminRecruitmentRequirement::class,'updateRecruitmentRequirement'])->name('admin.updateRecruitmentRequirement');



        ####   LaborDemand

        Route::resource('laborDemands', 'AdminLaborDemandController');
        Route::delete('laborDemands/delete/bulk', 'AdminLaborDemandController@delete_all')
            ->name('laborDemands.delete.bulk');

        #PDF
        Route::get('getPDF',[\App\Http\Controllers\Admin\AdminPDFController::class,'index'])->name('admin.getPDF');

        Route::post('updatePDF',[\App\Http\Controllers\Admin\AdminPDFController::class,'updatePDF'])->name('admin.updatePDF');


        #### maps
        Route::get('getMapAddress','AdminSettingController@getMapAddress')->name('setting.getMapAddress');
        Route::post('updateMapAddress','AdminSettingController@updateMapAddress')->name('setting.updateMapAddress');



        /*====================Start CRUD==================*/

        Route::group(['namespace' => 'CRUD'], function () {

            //البانر
            Route::resource('sliders', 'AdminSlidersController');
            Route::delete('sliders/delete/bulk', 'AdminSlidersController@delete_all')
                ->name('sliders.delete.bulk');

            //خدماتنا
            Route::resource('our-services', 'AdminOurServicesController');
            Route::delete('our-services/delete/bulk', 'AdminOurServicesController@delete_all')
                ->name('our-services.delete.bulk');
            //الاسئلة الشائعة
            Route::resource('frequently-questions', 'AdminFrequentlyQuestionsController');
            Route::delete('frequently-questions/delete/bulk', 'AdminFrequentlyQuestionsController@delete_all')
                ->name('frequently-questions.delete.bulk');

            ### subjects
            Route::resource('frequently-subjects', 'AdminFrequentlySubjectController');
            Route::delete('frequently-subjects/delete/bulk', 'AdminFrequentlyQuestionsController@delete_all')
                ->name('frequently-subjects.delete.bulk');






            //الخبرة للسيرة الذاتية
            Route::resource('experiences', 'AdminExperiencesController');
            Route::delete('experiences/delete/bulk', 'AdminExperiencesController@delete_all')
                ->name('experiences.delete.bulk');


            //مسميات الوظائف للسيرة الذاتية
            Route::resource('jobs', 'AdminJobsController');
            Route::delete('jobs/delete/bulk', 'AdminJobsController@delete_all')
                ->name('jobs.delete.bulk');


// اللغات للسيرة الذاتية
            Route::resource('language-titles', 'AdminLanguageTitlesController');
            Route::delete('language-titles/delete/bulk', 'AdminLanguageTitlesController@delete_all')
                ->name('language-titles.delete.bulk');


// اللغات للسيرة الذاتية
            Route::resource('nationalities', 'AdminNationalitiesController');
            Route::delete('nationalities/delete/bulk', 'AdminNationalitiesController@delete_all')
                ->name('nationalities.delete.bulk');


            // مكاتب الاستقدام
            Route::resource('recruitment-offices', 'AdminRecruitmentOfficesController');
            Route::delete('recruitment-offices/delete/bulk', 'AdminRecruitmentOfficesController@delete_all')
                ->name('recruitment-offices.delete.bulk');

            // -------------------------------------
            Route::resource('religions', 'AdminReligionsController');
            Route::delete('religions/delete/bulk', 'AdminReligionsController@delete_all')
                ->name('religions.delete.bulk');

            // -------------------------------------
            Route::resource('skills', 'AdminSkillsController');
            Route::delete('skills/delete/bulk', 'AdminSkillsController@delete_all')
                ->name('skills.delete.bulk');

            // -------------------------------------
            Route::resource('social-types', 'AdminSocialTypesController');
            Route::delete('social-types/delete/bulk', 'AdminSocialTypesController@delete_all')
                ->name('social-types.delete.bulk');

            // -------------------------------------
            Route::resource('cities', 'AdminCitiesController');
            Route::delete('cities/delete/bulk', 'AdminCitiesController@delete_all')
                ->name('cities.delete.bulk');

            // -------------------------------------
            Route::resource('age-ranges', 'AdminAgeRangesController');
            Route::delete('age-ranges/delete/bulk', 'AdminAgeRangesController@delete_all')
                ->name('age-ranges.delete.bulk');

            // -------------------------------------
            Route::resource('sponsors', 'AdminSponsorsController');
            Route::delete('sponsors/delete/bulk', 'AdminSponsorsController@delete_all')
                ->name('sponsors.delete.bulk');

            // -------------------------------------
            Route::resource('statistics', 'AdminStatisticsController');
            Route::delete('statistics/delete/bulk', 'AdminStatisticsController@delete_all')
                ->name('statistics.delete.bulk');

            // -------------------------------------
            Route::resource('biographies', 'AdminBiographiesController');
            Route::delete('biographies/delete/bulk', 'AdminBiographiesController@delete_all')
                ->name('biographies.delete.bulk');

            // -------------------------------------
            Route::resource('biographies-special', 'AdminBiographiesSpecialController');
            Route::delete('biographies-special/delete/bulk', 'AdminBiographiesSpecialController@delete_all')
                ->name('biographies-special.delete.bulk');

            // -------------------------------------
            Route::resource('admin-orders', 'AdminOrderController');
            Route::delete('admin-orders/delete/bulk', 'AdminOrderController@delete_all')
                ->name('admin-orders.delete.bulk');

            Route::resource('roles', 'AdminRoleController');



//            Route::resource('admin-countries', 'CountryController');
//            Route::delete('admin-countries/delete/bulk', 'CountryController@delete_all')
//                ->name('admin-orders.delete.bulk');












        });


        /*====================End Admin Panel==================*/


    });//end middleware admin


});
