<?php

namespace App\Http\Controllers\Admin\CRUD;

use App\Http\Traits\Upload_Files;
use App\Http\Controllers\Controller;
use App\Models\Language;
use App\Models\Nationalitie;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;


class AdminNationalitiesController extends Controller
{

    use Upload_Files;


    public function __construct()
    {

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if (!checkPermission(10))
            return view('admin.permission');
        if ($request->ajax()) {
            $dataTables = Nationalitie::query()->latest();

            return DataTables::of($dataTables)
                /* ->editColumn('desc', function ($row) {
                     return $row->desc;
                 })*/
                ->editColumn('created_at', function ($row) {
                    return date('Y/m/d', strtotime($row->created_at));
                })
                ->editColumn('image', function ($row) {
                    return ' <img src="' . get_file($row->image) . '" class="rounded" style="height:60px;width:60px;"
                             onclick="window.open(this.src)">';
                })
                ->editColumn('title', function ($row) {
                    return $row->title;
                })
                ->editColumn('country_name', function ($row) {
                    return $row->country_name;
                })
                ->editColumn('desc', function ($row) {
                    return $row->desc;
                })
                ->addColumn('delete_all', function ($row) {
                    return "<input type='checkbox' class=' delete-all form-check-input' data-tablesaw-checkall name='delete_all' id='" . $row->id . "'>";
                })
                ->addColumn('actions', function ($row) {
                    $edit='';
                    $delete='';
                    if(!checkPermission(12))
                        $edit='hidden';
                    if(!checkPermission(13))
                        $delete='hidden';
                    return "<button $edit  class='btn btn-info editButton' id='" . $row->id . "'> <i class='fa fa-edit'></i></button>
                   <button $delete class='btn btn-danger  delete' id='" . $row->id . "'><i class='fa fa-trash'></i> </button>";
                })
                ->rawColumns(['actions',/* 'desc',*/ 'delete_all', 'title', 'image','country_name','desc'])->make(true);
        }
        return view('admin.crud.nationalities.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if ($request->ajax()) {
            $returnHTML = view("admin.crud.nationalities.parts.add_form")->with([
                'languages' => Language::where('is_active', 'active')->get(),
            ])->render();
            return response()->json(array('success' => true, 'html' => $returnHTML));
        }
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->validate($request, [
            /* 'image'=>'required|file|image',*/
            'title' => 'required|array',
            'title.*' => 'required',
            // 'recruitment_price'=>'required',
            'image' => 'required|file|image',
            'desc' => 'required|array',
            'desc.*' => 'required',

            'country_name' => 'required|array',
            'country_name.*' => 'required',

            'price' => 'required',
            /* 'desc'=>'required|array',
             'desc.*'=>'required',*/
        ]);
        //$data = $request->except(['title','desc']);
        $name = [];
        $desc = [];
        $country = [];
        foreach (Language::where('is_active', 'active')->get() as $index => $language) {
            $name[$language->title] = $request->title[$index];
            $desc[$language->title] = $request->desc[$index];
            $country[$language->title] = $request->country_name[$index];


        }
        $data['title'] = $name;
        $data['desc'] = $desc;
        $data['country_name'] = $country;

        $data['price'] = $request->price;
        $data ['image'] = $this->uploadFiles('countries', $request->file('image'), null);

        /*  $data ['image'] = $this->uploadFiles('our_services',$request->file('image'),null );*/
        Nationalitie::create($data);
        return response()->json(1, 200);

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        if ($request->ajax()) {
            $returnHTML = view("admin.crud.nationalities.parts.edit_form")
                ->with([
                    'obj' => Nationalitie::findOrFail($id),
                    'languages' => Language::where('is_active', 'active')->get(),
                ])
                ->render();
            return response()->json(array('success' => true, 'html' => $returnHTML));
        }
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
        $slider = Nationalitie::findOrFail($id);
        $data = $this->validate($request, [
            /* 'image'=>'nullable|file|image',*/
            'title' => 'required|array',
            'title.*' => 'required',
            'image' => 'nullable|file|image',
            'desc' => 'required',
            'country_name' => 'required',
            'price' => 'required',
            /* 'desc'=>'required|array',
             'desc.*'=>'required',*/
        ]);
        try {
            if ($request->hasFile('image')) {
                $data ['image'] = $this->uploadFiles('countries', $request->file('image'), $slider->image);
            } else {
                $data ['image'] = $slider->image;
            }
            $name = [];
            /* $desc = [];*/
            foreach (Language::where('is_active', 'active')->get() as $index => $language) {
                $name[$language->title] = $request->title[$index];
                /*   $desc[$language->title] = $request->desc[$index];*/
            }
            $data['title'] = $name;
            /*  $data['desc'] = $desc;*/
            $data['price'] = $request->price;
            $slider->update($data);
            return response()->json(1, 200);
        } catch (\Exception $exception) {
            return response()->json($exception->getMessage(), 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return response()->json(Nationalitie::destroy($id), 200);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */

    public function delete_all(Request $request)
    {
        Nationalitie::destroy($request->id);
        return response()->json(1, 200);
    }


}//end
