<?php

namespace App\Http\Controllers\Admin;

use App\Http\Traits\CheckPermission;
use App\Http\Traits\Upload_Files;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;


class AdminUserController extends Controller
{

    use Upload_Files,CheckPermission;


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

        if (!\checkPermission(22))
            return view('admin.permission');
        if ($request->ajax()) {
            $users = User::normalUser()->orderBy('id',"DESC")->get();


            return DataTables::of($users)
                ->editColumn('logo', function ($user) {
                    return ' <img src="'.get_file($user->logo).'" class=" rounded" style="height:50px;width:50px"
                             onclick="window.open(this.src)">';
                })
                ->editColumn('created_at', function ($user) {
                    return date('Y/m/d',strtotime($user->created_at));
                })

                ->editColumn('is_blocked', function ($user) {
                    $re_block = '';
                    if ($user->is_blocked == 'not_blocked') {
                        $re_block = '<span class=" badge bg-primary">'.trans('admin.active').'</span>';
                    }else{
                        $re_block = '<span class="badge bg-danger">'.trans('admin.not_active').'</span>';

                    }
                    return $re_block;
                })
                ->editColumn('created_at', function ($user) {
                    return date('Y/m/d',strtotime($user->created_at));
                })

                ->addColumn('delete_all', function ($row) {
                    return "<input type='checkbox' class=' delete-all form-check-input' data-tablesaw-checkall name='delete_all' id='" . $row->id . "'>";
                })
                ->addColumn('actions', function ($user) {
                    $block='';
                    $delete='';
                    if (!\checkPermission(25))
                        $block='hidden';
                    if (!\checkPermission(26))
                        $delete='hidden';
                    return "<button $block title='يمكنك التنشيط أو  الغاء التنشيط من هنا'  class='btn btn-info status' id='" . $user->id . "'> <span class='fa fa-user-clock'></span></button>
                   <button $delete class='btn btn-danger  delete' id='" . $user->id . "'><span class='fa fa-trash'></span> </button>";
                })->rawColumns(['actions','logo','delete_all','is_blocked'])->make(true);
        }
        return view('admin.users.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request , $id)
    {


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return response()->json(User::destroy($id),200);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */

    public function delete_all(Request $request)
    {

        User::destroy($request->id);
        return response()->json(1,200);
    }


    public function changeBlock($id)
    {
        $row = User::findOrFail($id);
        $status = $row->is_blocked == 'blocked'?'not_blocked':'blocked';
        $row->update(['is_blocked' => $status]);
        return response()->json(1,200);
    }



}//end
