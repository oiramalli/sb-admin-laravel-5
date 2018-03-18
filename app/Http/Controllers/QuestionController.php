<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\question;
use App\question_type;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = question::all(); 
        return view('questions')->with('questions', $questions);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $question_types = question_type::all(); 
        return view('question')->with('question_types',$question_types);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'question_type' => 'required',
        ]);
        $question = new question;
        $question->name = $request->input('name');
        $question->description = $request->input('description');
        $question->question_type = $request->input('question_type');
        $question->save();
        return redirect('questions')->with('success', 'Agregado exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $question = question::find($id);
        $question_types = question_type::all(); 
        return view('question',compact(['question', 'question_types']));//)->with('question',$question);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return redirect('questions/'.$id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'question_type' => 'required',
        ]);
        $question = question::find($id);
        $question->name = $request->input('name');
        $question->description = $request->input('description');
        $question->question_type = $request->input('question_type');
        $question->save();
        return redirect('questions')->with('success', 'Guardado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $question = question::find($id);
        try{
            $question->delete();
            return redirect('questions')->with('success', 'Eliminado exitosamente');
        }catch(\Exception $e){
            return redirect('questions')->with('error', $e->getMessage());
        }
    }
}
