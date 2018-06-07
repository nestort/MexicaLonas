<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http;
use App\Http\Requests\ClienteRequest;
use App\Cliente;
use Laracasts\Flash\Flash;


class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes=Cliente::orderBy('IdCliente','ASC')->paginate(5);
        return view('admin.clientes.index')->with('clientes',$clientes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $clientes = Cliente::lists('NombreCompleto');
        $nombres = array();
        $nombres['Sin referencia'] = '-----';

        foreach ($clientes as $cliente) {
            $nombres[$cliente] = $cliente;
        }    

        return view("admin.clientes.create",  array("nombres" => $nombres));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClienteRequest $request)
    {
        $cliente=new Cliente($request->all());
    
        $cliente->save();
        Flash::success("se ha registrado con exito el cliente ");
        return redirect()->route('admin.Clientes.index');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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
        $cliente=Cliente::find($id);
        return view('admin.clientes.edit')->with('cliente',$cliente);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ClienteRequest $request, $id)
    {
        $cliente=Cliente::find($id);
        $cliente->NombreCompleto = $request->NombreCompleto;   
        $cliente->Direccion=$request->Direccion;        
        $cliente->Colonia = $request->Colonia;
        $cliente->Ciudad = $request->Ciudad;
        $cliente->RFC = $request->RFC;
        $cliente->TelefonoFijo = $request->TelefonoFijo;
        $cliente->TelefonoMovil = $request->TelefonoMovil;
        $cliente->Email = $request->Email;
        $cliente->NombreContacto = $request->NombreContacto;
        $cliente->TelefonoMovilContacto = $request->TelefonoMovilContacto;
        $cliente->PorcentajeDescuento = $request->PorcentajeDescuento;
        $cliente->Credito = $request->Credito;
        $cliente->Notas = $request->Notas;
        $cliente->save();
        Flash::error("se ha modificado con exito ".$cliente->NombreCompleto);
        return redirect()->route('admin.Clientes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($IdCliente)
    {
        $cliente=Cliente::find($IdCliente);
        $cliente->delete();
        Flash::error("El cliente ".$cliente->NombreCompleto." se ha eliminado.");
        return redirect()->route('admin.Clientes.index');
    }
}
