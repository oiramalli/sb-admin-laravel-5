<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\question_type;
class QuestionTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $question_types = question_type::all(); 
        return view('question_types')->with('question_types',$question_types);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('question_type');
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
        ]);
        $question_type = new question_type;
        $question_type->name = $request->input('name');
        $question_type->description = $request->input('description');
        $question_type->save();
        return redirect('question_types')->with('success', 'Agregado exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $question_type = question_type::find($id);
        return view('question_type')->with('question_type',$question_type);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return redirect('question_types/'.$id);
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
         ]);
         $question_type = question_type::find($id);
         $question_type->name = $request->input('name');
         $question_type->description = $request->input('description');
         $question_type->save();
         return redirect('question_types')->with('success', 'Actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $question_type = question_type::find($id);
        try{
            $question_type->delete();
            return redirect('question_types')->with('success', 'Eliminado exitosamente');
        }catch(\Exception $e){
            return redirect('question_types')->with('error', $e->getMessage());
        }
    }
}
