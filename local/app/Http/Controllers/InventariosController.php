<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\InventarioRequest;
use App\Inventario;
use Laracasts\Flash\Flash;
use Session;
class InventariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $inventarios=Inventario::orderBy('IdInventario','ASC')->paginate(5);
        return view('admin.inventarios.index')->with('inventarios',$inventarios);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('admin.inventarios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InventarioRequest $request)
    {   
        $inventario=new Inventario($request->all());
        $inventario->save();
        Flash::success("se ha registrado con exito el ".$inventario->Tipo);
        return redirect()->route('admin.Inventarios.index');
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
        $inventario=Inventario::find($id);
        return view('admin.inventarios.edit')->with('inventario',$inventario);
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
        $inventario=Inventario::find($id);
        $inventario->Tipo = $request->Tipo;
        $inventario->Alto = $request->Alto;
        $inventario->Largo = $request->Largo;
        $inventario->Ancho = $request->Ancho;     
        $inventario->Notas =  $request->Notas;
        
        $inventario->save();
        Flash::error("se ha modificado con exito ".$inventario->Tipo);
        return redirect()->route('admin.Inventarios.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($IdInventario)
    {
        $inventario=Inventario::find($IdInventario);
        $inventario->delete();
        Flash::error("El inventario ".$inventario->Tipo." se ha eliminado.");
        return redirect()->route('admin.Inventarios.index');
    }
}
