<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evaluation;
use Yajra\Datatables\Datatables;
use Log;
use Auth;

class EvaluationDatatable extends Controller
{
    public function getEvaluations(){

        $evaluation = Evaluation::all();

        Log::debug("que cono", ['evaluation'=>$evaluation]);

        return Datatables::of($evaluation)
                        ->editColumn('evaluationShort', function($request){

                            $max = 70;

                            if (strlen($request->evaluation) > $max) {
                            $evaluation = substr($request->evaluation, 0, $max + 1);
                            } else {
                            $evaluation = $request->evaluation;
                            }

                            return  $evaluation . ' ...';


                        })
                        ->editColumn('created_at', function ($request) {
                return $request->created_at->format('d/m/Y H:m');
            })->make(true);

    }
}
