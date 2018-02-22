<?php

namespace Kat33\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Kat33\Kat33;
use Kat33\Vehicle;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /**
        $kat33 = Vehicle::with('kat33')->findOrFail(1);
        dd($kat33->simcard);
         * */
        $vehicles = Vehicle::where('business_id',Auth::user()->business_id)->paginate(10);
        return view('vehicles.index',compact('vehicles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kat33s = Kat33::where('business_id','=',Auth::user()->business_id)->where('status',0)->pluck('imei','id');
        return view('vehicles.create',compact('kat33s'));
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
            'type' => 'required|max:20',
            'patent' => 'required|unique:vehicles|max:20',
            'model' => 'required|max:20',
            'kat33_id' => 'required|integer',
        ]);

        $vehicle = new Vehicle([
            'type' => $request->get('type'),
            'patent' => $request->get('patent'),
            'model' => $request->get('model'),
            'kat33_id' => $request->get('kat33_id'),
            'business_id' => Auth::user()->business_id,
        ]);
        $kat33 = Kat33::find($request->kat33_id);
        $kat33->status = 1;
        $kat33->save();
        $vehicle->save();
        Session::flash('message', 'agregar');
        return redirect('/vehicles');
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
        $vehicle = Vehicle::find($id);
        return view('vehicles.edit', compact('vehicle'));
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
            'model' => 'required',
            'type' => 'required',
        ]);

        $vehicle = Vehicle::find($id);
        $vehicle->type = $request->type;
        $vehicle->model = $request->model;
        $vehicle->save();
        Session::flash('message', 'editar');
        return Redirect::to('vehicles');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vehicle = Vehicle::find($id);
        $vehicle->delete();
        Session::flash('message','eliminar');
        return Redirect::to('vehicles');


    }
}
