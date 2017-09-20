<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Phase;
use Laracasts\Flash\Flash;

class PhasesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $phases = Phase::orderBy('id','DESC')->paginate(10);

        return view('admin.phases.index')->with('phases',$phases);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.phases.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $phase = new Phase($request->all());
        $phase->user_id = \Auth::user()->id;
        $phase->save();
        Flash::success("Se ha registrado la " . $phase->name ." de forma exitosa!");
        return redirect()->route('admin.phases.index');
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
        $phase = Phase::find($id);
        return view('admin.phases.edit')->with('phase',$phase);
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
        $phase = Phase::find($id);
        $phase->fill($request->all());
        $phase->save();

        Flash::warning('La '.$phase->name.' ha sido actualizado!');
        return redirect()->route('admin.phases.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $phase = Phase::find($id);
        $phase->delete();

        Flash::error('La '.$phase->name.' ha sido eliminado');
        return redirect()->route('admin.phases.index');
    }
}
