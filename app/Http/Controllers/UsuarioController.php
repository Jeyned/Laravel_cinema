<?php

namespace Cinema\Http\Controllers;

use Illuminate\Http\Request;
use Cinema\User;
use Cinema\Http\Requests\UserCreateRequest;
use Cinema\Http\Requests\UserUpdateRequest;
use Session;
use Redirect;
use Illuminate\Auth\AuthenticationException;

class UsuarioController extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function index(Request $request){
    	$users = User::paginate(10);
        if($request->ajax()){
            return response()->json(view('usuario.users',compact('users'))->render());
        }
    	return view('usuario.index',compact('users'));
    }
    public function create(){
    	return view('usuario.create');
    }

    public function store(UserCreateRequest $request){
    	User::create($request->all());
    	Session::flash('message','Usuario Creado Correctamente');
        return Redirect::to('/usuario');
    }

    public function edit($id){
        $user = User::find($id);
        return view('usuario.edit',['user'=>$user]);
    }

    public function update($id, UserUpdateRequest $request){
        $user = User::find($id);
        $user->fill($request->all());
        $user->save();

        Session::flash('message','Usuario Editado Correctamente');
        return Redirect::to('/usuario');
    }

    public function destroy($id){
        $user = User::find($id);
        $user->delete();
        Session::flash('message','Usuario Eliminado Correctamente');
        return Redirect::to('/usuario');
    }
}
