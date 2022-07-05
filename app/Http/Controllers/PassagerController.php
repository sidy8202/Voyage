<?php

namespace App\Http\Controllers;

use App\Models\Passager;
use Illuminate\Http\Request;

class PassagerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $passa = Passager::all();
        return view('passamodel')->with('passa',$passa);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'npiece' => 'required',
            'fname' => 'required',
            'lname' => 'required',
            'nums' => 'required',
            'gender' =>'required',
            
        ]);

        $pass = new Passager ;
        $pass->no_piece = $request->input('npiece');
        $pass->prenom = $request->input('fname');
        $pass->nom = $request->input('lname');
        $pass->telephone = $request->input('nums');
        $pass->genre = $request->input('gender');
        $pass->save();
        return redirect('/passager')->with('success', 'Passager Ajouté');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
