<?php

namespace Cinema\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use Redirect;
use Cinema\Http\Requests;
use Cinema\Http\Requests\LoginRequest;

class LogController extends Controller
{
    public function store(LoginRequest $request){
    	if(Auth::attempt(['email' => $request['email'], 'password' => $request['password']])){
    		return Redirect::to('admin');
    	}
    	Session::flash('message-error','Los datos son Incorrectos');
    	return Redirect::to('/');
    }
	public function logout(){
    	Auth::logout();
    	return Redirect::to('/');
    }

}
