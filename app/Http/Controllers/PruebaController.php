<?php

namespace Cinema\Http\Controllers;

use Cinema\Http\Controllers\Controller;

class PruebaController extends Controller
{
    
    /**
     * Create a new controller instance.
     *
     * @return Response
     */
    public function index()
    {
        return "Desde Controller";
    }

    public function nombre($nombre)
    {
        return "Mi nombre es: ".$nombre;
    }
}
