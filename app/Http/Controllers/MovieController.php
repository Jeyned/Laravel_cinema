<?php

namespace Cinema\Http\Controllers;

use Illuminate\Http\Request;
use Cinema\Http\Requests;
use Cinema\Http\Controllers\Controller;
use Cinema\Genre;
use Cinema\Movie;
use Session;
use Redirect;


class MovieController extends Controller
{
    public function __construct(){
        $this->middleware('welcome');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movies = Movie::Movies();
        return view('pelicula.index',compact('movies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $genres = Genre::pluck('genre', 'id');
        return view('pelicula.create',compact('genres'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Movie::create($request->all());
        Session::flash('message','Pelicula Creada Correctamente');
        return Redirect::to('/pelicula');
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
        $genres = Genre::pluck('genre', 'id');
        $movie = Movie::find($id);
        return view('pelicula.edit',['movie'=>$movie,'genres'=>$genres]);
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
        $movies = Movie::find($id);
        $movies->fill($request->all());
        $movies->save();
        Session::flash('message','Pelicula Editada Correctamente');
        return Redirect::to('/pelicula');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $movie = Movie::find($id);
        $movie->delete();
        \Storage::delete($movie->path);
        Session::flash('message','Pelicula Eliminada Correctamente');
        return Redirect::to('/pelicula');
    }
}
