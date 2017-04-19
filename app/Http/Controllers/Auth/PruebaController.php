<?php

namespace Cinema\Http\Controllers;

use App\Prueba;
use App\Http\Controllers\Controller;

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
}
