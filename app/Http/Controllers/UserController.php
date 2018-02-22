<?php

namespace Kat33\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Kat33\Business;
use Kat33\User;
use Illuminate\Support\Facades\Redirect;
use Kat33\Vehicle;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->level == 1){
            $vehicles = Vehicle::pluck('patent','id');
            $users = User::paginate(10);
        }
        if(Auth::user()->level == 2){
            $vehicles = Vehicle::pluck('patent','id');
            $users = User::where('business_id','=',Auth::user()->business_id)->paginate(10);
        }

        return view('users.index',compact('users','vehicles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->level == 1) {

            $businesses = Business::pluck('name', 'id');
        }
        if(Auth::user()->level == 2) {

            $businesses = Business::where('id','=',Auth::user()->business_id)->pluck('name', 'id');
        }
        return view('users.create',compact('businesses'));
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
            'email' => 'required|unique:users|max:50',
            'name' => 'required',
            'level' => 'required',
            'password' => 'required',
            'business_id' => 'required',
        ]);

        $user = new User([
            'email' => $request->get('email'),
            'name' => $request->get('name'),
            'password' => bcrypt($request->get('password')),
            'level' => $request->get('level'),
            'business_id' => $request->get('business_id'),
        ]);

        $user->save();
        Session::flash('message', 'agregar');
        return redirect('/users');
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
        $user = User::find($id);
        return view('users.edit', compact('user'));
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
            'level' => 'required',
        ]);

        $user = User::find($id);
        $user->name = $request->name;
        $user->level = $request->level;
        $user->save();
        Session::flash('message', 'editar');
        return Redirect::to('users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        Session::flash('message','eliminar');
        return Redirect::to('users');
    }
    public function reset($id)
    {
        $user = User::find($id);
        return view('users.reset',compact('user'));
    }
    public function resetPassword(Request $request, $id)
    {
        $this->validate($request, [
            'password' => 'required',
        ]);
        $user = User::find($id);
        $user->password = bcrypt($request->password);
        $user->save();
        Session::flash('message','editar');
        return Redirect::to('users');
    }
}
