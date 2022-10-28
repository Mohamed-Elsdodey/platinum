<?php

namespace App\Http\Controllers\Admin\CRUD;

use App\Http\Traits\Upload_Files;
use App\Http\Controllers\Controller;
use App\Models\BiographyImage;
use App\Models\BiographySkill;
use App\Models\Job;
use App\Models\LanguageTitle;
use App\Models\Nationalitie;
use App\Models\RecruitmentOffice;
use App\Models\Religion;
use App\Models\Biography;
use App\Models\Skill;
use App\Models\SocialType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;
use App\Models\Language;

class AdminBiographiesController extends Controller
{

    use Upload_Files;

    // use CheckPermission;


    public function __construct()
    {
        /* $this->middleware([('permission:siteTexts index,admin')])->only(['index']);*/
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (!checkPermission(18))
            return view('admin.permission');

        if ($request->ajax()) {
            $biographies = Biography::where("order_type", "normal")->orderBy("id", "DESC")->get();
            return DataTables::of($biographies)
                ->editColumn('cv_file', function ($row) {
                    return ' <img src="' . get_file($row->cv_file) . '" class="rounded" style="height:60px;width:60px;"
                             onclick="window.open(this.src)">';
                })
                ->editColumn('image', function ($row) {
                    return ' <img src="' . get_file($row->image) . '" class="rounded" style="height:60px;width:60px;"
                             onclick="window.open(this.src)">';
                })
                ->editColumn('created_at', function ($row) {
                    return date('Y/m/d', strtotime($row->created_at));
                })
                ->addColumn('delete_all', function ($row) {
                    return "<input type='checkbox' class=' delete-all form-check-input' data-tablesaw-checkall name='delete_all' id='" . $row->id . "'>";
                })
                ->editColumn('status', function ($row) {
                    if ($row->status == "new") {
                        return "غير محجوز";
                    } elseif ($row->status == "under_work") {
                        return "جارة التعاقد ";
                    } elseif ($row->status == "finished") {
                        return "تم التعاقد ";
                    } else {
                        return "غير محجوز";
                    }

                })
                ->editColumn('nationalitie_id', function ($row) {
                    return $row->nationalitie->title ?? '';
                })
                ->addColumn('actions', function ($row) {
                    $edit = '';
                    $delete = '';
                    if (!checkPermission(19))
                        $edit = 'hidden';
                    if (!checkPermission(20))
                        $delete = 'hidden';
                    return "<a $edit href='" . route('biographies.edit', $row->id) . "'  class='btn btn-info editButton' id='" . $row->id . "'> <i class='fa fa-edit'></i></button>
                   <a $delete style='margin-right: 10px;' href='#' class='btn btn-danger  delete mr-2' id='" . $row->id . "'><i class='fa fa-trash'></i> </a>";
                })->rawColumns(['actions', 'image', 'delete_all', 'nationalitie_id', 'cv_file', 'status'])->make(true);
        }
        return view('admin.crud.biographies.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $data = [
            'languages' => Language::where('is_active', 'active')->get(),
            'recruitment_office' => RecruitmentOffice::get(),
            'nationalitie' => Nationalitie::get(),
            'religion' => Religion::get(),
            'job' => Job::get(),
            'social_type' => SocialType::get(),
            'skills' => Skill::get(),
            'language_title' => LanguageTitle::get(),
        ];
        return view('admin.crud.biographies.create', $data);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'cv_file' => 'required',
            'recruitment_office_id' => 'required',
            'nationalitie_id' => 'required',
            'language_title_id' => 'required',
            'religion_id' => 'required',
            'job_id' => 'required',
            'social_type_id' => 'required',
            'age' => 'required',
            'salary' => 'required',
//            'biography_number' => 'required',
            'passport_number' => 'required|max:255|unique:biographies,passport_number',
            'skills' => 'nullable|array',
            'certificates.*' => 'required|file|image',
            'name' => 'required',
            'passport_created_at' => 'required',
            'passport_ended_at' => 'required',
            'passport_place' => 'required',
            'weight' => 'required',
            'height' => 'required',
            'skin_colour' => 'required',
            'childern_number' => 'required',
            'high_degree' => 'required',
            'living_location' => 'required',
            'arabic_degree' => 'required',
            'english_degree' => 'required',
            'video' => 'required',
            'prior_experiences'=>'required',
            'type'=>'required',



        ]);

        $data = [

            'recruitment_office_id' => $request->recruitment_office_id,
            'nationalitie_id' => $request->nationalitie_id,
            'language_title_id' => $request->language_title_id,
            'religion_id' => $request->religion_id,
            'job_id' => $request->job_id,
            'social_type_id' => $request->social_type_id,
            'age' => $request->age,
            'salary' => $request->salary,
//            'biography_number' => $request->biography_number,
            'passport_number' => $request->passport_number,
            'name' => $request->name,
            'passport_created_at' => $request->passport_created_at,
            'passport_ended_at' => $request->passport_ended_at,
            'passport_place' => $request->passport_place,
            'weight' => $request->weight,
            'height' => $request->height,
            'skin_colour' => $request->skin_colour,
            'childern_number' => $request->childern_number,
            'high_degree' => $request->high_degree,
            'living_location' => $request->living_location,
            'arabic_degree' => $request->arabic_degree,
            'english_degree' => $request->english_degree,
            'video' => $request->video,
            'prior_experiences'=>$request->prior_experiences,
            'type'=>$request->type,

        ];


        try {
            DB::beginTransaction();

            $data["cv_file"] = $this->uploadFiles('biographies', $request->file('cv_file'), null);
            $data["image"] = $this->uploadFiles('biographies', $request->file('image'), null);

            $biography = Biography::create($data);

            //skills
            if ($request->skills) {
                foreach ($request->skills as $index => $skillid) {

                    BiographySkill::create([
                        'biography_id' => $biography->id,
                        'degree' => $request[$skillid],
                        'skill_id' => $skillid,
                    ]);
                }
            }
            //biography galary
            if (isset($request->images)) {
                foreach ($request->images as $index => $single_image) {
                    BiographyImage::create([
                        'biography_id' => $biography->id,
                        'image' => $this->uploadFiles('biographies', $single_image, null)
                    ]);
                }
            }

            DB::commit();

        } catch (\Exception $exception) {
            DB::rollBack();
        }
        return response()->json([], 200);
    }//end fun

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $biography = Biography::with('images', 'skills')->findOrFail($id);

        $images = [];
        if (!is_null($biography->images()->get())) {
            foreach ($biography->images()->get() as $index => $image) {
                $images[$index]['id'] = $image->id;
                $images[$index]['src'] = get_file($image->image);
            }
        }

        $data = [
            'languages' => Language::where('is_active', 'active')->get(),
            'recruitment_office' => RecruitmentOffice::get(),
            'nationalitie' => Nationalitie::get(),
            'religion' => Religion::get(),
            'job' => Job::get(),
            'social_type' => SocialType::get(),
            'skills' => Skill::get(),
            'language_title' => LanguageTitle::get(),
            'images' => $images,
            'biography' => $biography,

        ];
        return view('admin.crud.biographies.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $this->validate($request, [
            'cv_file' => 'nullable',
            'recruitment_office_id' => 'required',
            'nationalitie_id' => 'required',
            'language_title_id' => 'required',
            'religion_id' => 'required',
            'job_id' => 'required',
            'social_type_id' => 'required',
            'age' => 'required',
            'salary' => 'required',
//            'biography_number' => 'required',
            'passport_number' => 'required|max:255|unique:biographies,passport_number,'.$id,
            'skills' => 'nullable|array',
            'certificates.*' => 'required|file|image',
            'name' => 'required',
            'passport_created_at' => 'required',
            'passport_ended_at' => 'required',
            'passport_place' => 'required',
            'weight' => 'required',
            'height' => 'required',
            'skin_colour' => 'required',
            'childern_number' => 'required',
            'high_degree' => 'required',
            'living_location' => 'required',
            'arabic_degree' => 'required',
            'english_degree' => 'required',
            'video' => 'required',
            'prior_experiences'=>'required',
            'type'=>'required',

        ]);

        $data = [

            'recruitment_office_id' => $request->recruitment_office_id,
            'nationalitie_id' => $request->nationalitie_id,
            'language_title_id' => $request->language_title_id,
            'religion_id' => $request->religion_id,
            'job_id' => $request->job_id,
            'social_type_id' => $request->social_type_id,
            'age' => $request->age,
            'salary' => $request->salary,
//            'biography_number' => $request->biography_number,
            'passport_number' => $request->passport_number,
            'name' => $request->name,
            'passport_created_at' => $request->passport_created_at,
            'passport_ended_at' => $request->passport_ended_at,
            'passport_place' => $request->passport_place,
            'weight' => $request->weight,
            'height' => $request->height,
            'skin_colour' => $request->skin_colour,
            'childern_number' => $request->childern_number,
            'high_degree' => $request->high_degree,
            'living_location' => $request->living_location,
            'arabic_degree' => $request->arabic_degree,
            'english_degree' => $request->english_degree,
            'video' => $request->video,
            'prior_experiences'=>$request->prior_experiences,
            'type'=>$request->type,

        ];
        try {
            DB::beginTransaction();


            Biography::find($id)->update($data);
            $cv = Biography::find($id);


            //categories
            BiographySkill::where('biography_id', $id)->delete();

            //skills
            if ($request->skills) {
                foreach ($request->skills as $index => $skillid) {
                    BiographySkill::create([
                        'biography_id' => $id,
                        'degree' => $request[$skillid],
                        'skill_id' => $skillid,
                    ]);
                }
            }
            //product galary
            //product galary
            if ($request->old) {
                BiographyImage::where('biography_id', $id)
                    ->whereNotIn('id', $request->old)
                    ->delete();
            } else {
                BiographyImage::where('biography_id', $id)
                    ->delete();
            }
            if (isset($request->images) && count($request->images) > 0) {
                foreach ($request->images as $single_image) {
                    BiographyImage::create([
                        'biography_id' => $id,
                        'image' => $this->uploadFiles('biographies', $single_image, null)
                    ]);
                }
            }

            if ($request->image) {
                $cv->image = $this->uploadFiles('biographies', $request->file('image'), null);
                $cv->update();

            }
            if ($request->cv_file) {
                $cv->cv_file = $this->uploadFiles('biographies', $request->file('cv_file'), null);
                $cv->update();
            }


            DB::commit();

        } catch (\Exception $exception) {

            DB::rollBack();
        }
        return response()->json([], 200);
    }//end fun

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return response()->json(Biography::destroy($id), 200);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */

    public function delete_all(Request $request)
    {
        Biography::destroy($request->id);
        return response()->json(1, 200);
    }


}//end
