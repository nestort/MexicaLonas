<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\InstaladoresRequest;
use App\Instalador;
use Laracasts\Flash\Flash;










class InstaladoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $instaladores=Instalador::orderBy('IdInstalador','ASC')->paginate(5);
        return view('admin.instaladores.index')->with('instaladores',$instaladores);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('admin.instaladores.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InstaladoresRequest $request)
    {
        
        
        $instalador=new Instalador($request->all());
        $instalador->save();
        Flash::success("se ha registrado con exito el instalador ");
        return redirect()->route('admin.Instaladores.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($IdInstalador)
    {



       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $instalador=Instalador::find($id);
        return view('admin.Instaladores.edit')->with('instalador',$instalador);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(InstaladoresRequest $request, $id)
    {
        $instalador=Instalador::find($id);
        $instalador->Nombre = $request->Nombre;
        $instalador->Equipo = $request->Equipo;
        $instalador->Notas =  $request->Notas;
        $instalador->save();
        Flash::error("se ha modificado con exito ".$instalador->Nombre);
        return redirect()->route('admin.Instaladores.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($IdInstalador)
    {
        $instalador=Instalador::find($IdInstalador);
        $instalador->delete();
        Flash::error("El instalador ".$instalador->Nombre." se ha eliminado.");
        return redirect()->route('admin.Instaladores.index');
    }
}
