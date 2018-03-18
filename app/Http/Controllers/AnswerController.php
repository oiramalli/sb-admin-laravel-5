<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\answer;

class AnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $answers = answer::all(); 
        return view('answers')->with('answers',$answers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('answer');
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
        $answer = new answer;
        $answer->name = $request->input('name');
        $answer->description = $request->input('description');
        $answer->save();
        return redirect('answers')->with('success', 'Agregado exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $answer = answer::find($id);
        return view('answer')->with('answer',$answer);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return redirect('answers/'.$id);
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
        $answer = answer::find($id);
        $answer->name = $request->input('name');
        $answer->description = $request->input('description');
        $answer->save();
        return redirect('answers')->with('success', 'Actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $answer = answer::find($id);
        try{
            $answer->delete();
            return redirect('answers')->with('success', 'Eliminado exitosamente');
        }catch(\Exception $e){
            return redirect('answers')->with('error', $e->getMessage());
        }
    }
}
