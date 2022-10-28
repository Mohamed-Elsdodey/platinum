<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Biography;
use Illuminate\Http\Request;

class WorkerController extends Controller
{

    public function show($id,$type=''){

        $worker=Biography::findOrFail($id);

        return view('frontend.newPages.worker.parts.details',compact('worker','type'));

    }
    public function allWorkers(){
        $workers=Biography::paginate(10);
        return view('frontend.newPages.worker.parts.allWorker',compact('workers'));

    }

}
