<?php

namespace App\Http\Controllers;
use App\Models\Vol;



use Illuminate\Http\Request;

class VolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bouger = Vol::all();
        return view('volmodal')->with('bouger',$bouger);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
        $this->validate($request,[
            'cod' => 'required',
            'dest' => 'required',
            'dates' => 'required',
            'heures' => 'required',
            'classa' =>'required',
            'pclassa' =>'required',
            'classb' =>'required',
            'pclassb' =>'required',   
        ]);

        $boug = new Vol ;
        $boug->code = $request->input('cod');
        $boug->destination = $request->input('dest');
        $boug->date_depart = $request->input('dates');
        $boug->heure_depart = $request->input('heures');
        $boug->nb_class_a = $request->input('classa');
        $boug->prix_a = $request->input('pclassa');
        $boug->nb_class_b = $request->input('classb');
        $boug->prix_b = $request->input('pclassb');
        $boug->save();
        return redirect('/vol')->with('success', 'Vol Programmé avec Succes!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$id)
    {
        $this->validate($request,[
            'cod' => 'required',
            'dest' => 'required',
            'dates' => 'required',
            'heures' => 'required',
            'classa' =>'required',
            'pclassa' =>'required',
            'classb' =>'required',
            'pclassb' =>'required',   
        ]);
       
        $boug = Vol::find($id) ;
        // return view('volmodal', compact('boug'));

        $boug->code = $request->input('cod');
        $boug->destination = $request->input('dest');
        $boug->date_depart = $request->input('dates');
        $boug->heure_depart = $request->input('heures');
        $boug->nb_class_a = $request->input('classa');
        $boug->prix_a = $request->input('pclassa');
        $boug->nb_class_b = $request->input('classb');
        $boug->prix_b = $request->input('pclassb');
        $boug->save();
        

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
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
        
        $this->validate($request,[
            'cod' => 'required',
            'dest' => 'required',
            'dates' => 'required',
            'heures' => 'required',
            'classa' =>'required',
            'pclassa' =>'required',
            'classb' =>'required',
            'pclassb' =>'required',   
        ]);

        $boug = Vol::find($id) ;
        $boug->code = $request->input('cod');
        $boug->destination = $request->input('dest');
        $boug->date_depart = $request->input('dates');
        $boug->heure_depart = $request->input('heures');
        $boug->nb_class_a = $request->input('classa');
        $boug->prix_a = $request->input('pclassa');
        $boug->nb_class_b = $request->input('classb');
        $boug->prix_b = $request->input('pclassb');
        $boug->save();
        return redirect('/vol')->with('success', 'Vol Modifié avec Succes!!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $boug = Vol::find($id) ;
        $boug->delete();
        // dd($boug);
        return redirect('/vol')->with('success', 'Vol Supprimé avec Succes!!');

    }
}
