<?php

namespace App\Http\Controllers;

use App\Models\Evaluation;
use Illuminate\Http\Request;
use App\Http\Requests\CreateEvaluationRequest;
use Alert;


class EvaluationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('welcome');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateEvaluationRequest $request)
    {

        $rating = $request->rating;
        $request = $request->validated();

        $eval = new Evaluation;
        $eval->name = $request['name'];
        $eval->title = $request['title'];
        $eval->evaluation = $request['eval'];

        if ( $rating ){
            $eval->rating = $rating;
        }

        $eval->save();

        Alert::success('Evaluación guardada', 'Gracias por participar, deja otra evaluación.');
        return view('welcome');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Evaluation  $evaluation
     * @return \Illuminate\Http\Response
     */
    public function destroy($evaluation)
    {
        $item = Evaluation::find($evaluation);
        $item->delete();

        Alert::success('Evaluación eliminadaa', 'Evaluación eliminada con exito.');
        return redirect()->route('dashboard');

    }
}
