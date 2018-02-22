<?php

namespace Kat33\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Kat33\Kat33;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Kat33\Route;

class RouteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $routes = Route::where('business_id',Auth::user()->business_id)->paginate(10);
        return view('routes.index',compact('routes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('routes.create');
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
            'identification' => 'required|unique:routes|max:20',
            'start' => 'required|max:200',
            'end' => 'required|max:300',
            'observation' => 'required|max:300',
            'pic' => 'image',
        ]);

        $route = new Route([
            'identification' => $request->get('identification'),
            'start' => $request->get('start'),
            'end' => $request->get('end'),
            'observation' => $request->get('observation'),
            'business_id' => Auth::user()->business_id,
        ]);
        $route->save();

        if($request->hasFile('pic')){
            $ext = $request->file('pic')->clientExtension();
            $route->pic = $request->file('pic')->storeAs('public/routes', $route->id.".".$ext);
        }

        $route->save();
        Session::flash('message', 'agregar');
        return redirect('/routes');
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
        $route = Route::find($id);
        return view('routes.edit', compact('route'));
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
            'identification' => 'required|unique:routes|max:20',
            'start' => 'required|max:200',
            'end' => 'required|max:300',
            'observation' => 'required|max:300',
            'pic' => 'image',
        ]);

        $route = Route::find($id);
        $route->identification = $request->identification;
        $route->start = $request->start;
        $route->end = $request->end;
        $route->observation = $request->observation;
        if($request->hasFile('pic')){
            $ext = $request->file('pic')->clientExtension();
            $route->pic = $request->file('pic')->storeAs('public/routes', $route->id.".".$ext);
        }
        $route->save();
        Session::flash('message', 'editar');
        return Redirect::to('routes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $route = Route::find($id);
        $route->delete();
        Session::flash('message','eliminar');
        return Redirect::to('routes');


    }
}
