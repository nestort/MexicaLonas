<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\FechaRequest;
use App\Http\Requests\EventosRequest;

use Illuminate\Http\Response;

use App\Eventos;
use App\Costo;
use App\PagoPacial;
use App\Fecha;
use App\Cliente;
use App\Instalador;
use App\Inventario;
use App\Eventos_Inventario;
use DB;
use Session;
use Redirect;

use Laracasts\Flash\Flash;

class EventosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){   
        $Eventos=Eventos::orderBy('IdEvento','DSC')->paginate(15); 
        return view('admin.eventos.index')->with('Eventos',$Eventos);
    }
    
    public function creacionfechas(){
        return view('admin.eventos.creacionfecha');
    }

    public function storefechas(FechaRequest $request){
        
        if($request->FechaInstalacion>($request->FechaEvento)||$request->FechaInstalacion>$request->FechaDesmontado){
           
            if($request->FechaInstalacion>$request->FechaEvento){
               Flash::error("La fecha del evento debe ser mayor o igual a la fecha del montado");
            }
            else{
                Flash::error("La fecha de desmontado debe ser mayor o igual a la fecha del montado");                
            }
            return Redirect::back();
        }
        if($request->FechaEvento>$request->FechaDesmontado||$request->FechaEvento<$request->FechaInstalacion){ if($request->FechaEvento>$request->FechaDesmontado){
               Flash::error("La fecha del evento debe ser menor o igual a la fecha de desmontado");
            }
            else{
                Flash::error("La fecha del evento debe ser mayor o igual a la fecha del montado");
            }
            return Redirect::back();
        }
        if($request->FechaInstalacion==$request->FechaDesmontado and $request->HoraInstalacion>$request->HoraDesmontado){
            Flash::error("En montados y desmontados del mismo dia, la hora de montado debe ser menor a la de desmontado");
            return Redirect::back();
        }

        $fechas=new Fecha($request->all()); 
        $request->session()->put('fechas', $fechas);
        $inventarios=Inventario::orderBy('Tipo','ASC')->get();
            
        $ListadoTotal=array();
        $IdsNoDisponible=array();
        foreach ($inventarios as $inventario) {   
            array_push($ListadoTotal,$inventario->IdInventario );      
        }            

            
        $ide=DB::table('fechas')->select('IdFecha')->
            where(function ($query) use ($request) {
                $query->where('FechaInstalacion', '>=', $request->FechaInstalacion)
                ->orWhere('FechaDesmontado', '>=', $request->FechaInstalacion);
                })->where(function ($query) use ($request){
                $query->where('FechaInstalacion', '<=', $request->FechaDesmontado)
                ->orWhere('FechaDesmontado', '<=', $request->FechaDesmontado);
        })->get();

        foreach ($ide as $id) {
            $IdsEvento=DB::table('eventos')->select('IdEvento')->
            where('IdFecha', '=', $id->IdFecha)->get();
            foreach ($IdsEvento as $key ) {
                $eve=DB::table('eventos_inventario')->select('inventario_id')->
                where('eventos_id', '=', $key->IdEvento)->get();
                foreach ($eve as $ev) {     
                    array_push($IdsNoDisponible,($ev->inventario_id));
                }
            }  
        } 
        $InveDisp=(array_diff($ListadoTotal,$IdsNoDisponible));                
        $request->session()->put('key', $InveDisp);       
        return redirect()->action('EventosController@create');
    }    
        
      
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){    
        $data = Session::all();      
        if(array_key_exists('key', $data)==false || array_key_exists('fechas', $data) ==false){
           return view('admin.eventos.creacionfecha');
        }
        if($data['key']==null){
            Flash::error("No hay inventario diponible para la fecha del ".$data['fechas']->FechaInstalacion." al ". $data['fechas']->FechaDesmontado);
            return view ('admin.eventos.creacionfecha');
        } 
        $as=$data['key'];
        $listado=[];
        foreach ($as as $a ) {
            $inventario=Inventario::find($a);
             $listado[$inventario->IdInventario]=$inventario->Tipo." ( ".$inventario->Alto."X".$inventario->Largo."X".$inventario->Ancho. " )";            
        }

        
        $clientes=Cliente::orderBy('NombreCompleto','ASC')->lists('NombreCompleto','IdCliente');
        $instaladores=Instalador::orderBy('Nombre','ASC')->lists('Nombre','IdInstalador');
               
        return view ('admin.eventos.create')
        ->with('clientes',$clientes)
        ->with('instaladores',$instaladores)
        ->with('listado',$listado);       
          
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EventosRequest $request){    

            $list=$request->listado;
            $eventos=new Eventos($request->all());
            $eventos->IdUsuario=\Auth::User()->id;
            $clientes=Cliente::find($request->IdCliente);       
            $fechas=$request->session()->get('fechas');
            $fechas->save();      
            $costos=new Costo();
            $costos->CostoTotal=$request->CostoTotal;
            $costos->SaldoDeudor=$request->CostoTotal;
            $costos->save();        
            $eventos->costo()->associate($costos);
            $eventos->Fecha()->associate($fechas); 
            $eventos->save();
            $eventos->Inventario()->sync($request->listado);
            $request->session()->forget('key');
            $request->session()->forget('fechas'); 
           return redirect()->route('admin.Eventos.show',$eventos->IdEvento);
        
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($IdEvento){
        $eventos=Eventos::find($IdEvento);
        $fechas=Fecha::find($eventos->IdFecha);
        $costos=Costo::find($eventos->IdCosto);
        $clientes=Cliente::find($eventos->IdCliente);        
        $list=[];

        foreach ($eventos->Inventario as $inve){
            $list[$inve->IdInventario]= $inve->Tipo." ( ".$inve->Alto."X".$inve->Largo."X".$inve->Ancho. " )";
        }

        return view('admin.eventos.resumen')->with('eventos',$eventos)
                                                ->with('fechas',$fechas)
                                                ->with('costos',$costos)
                                                ->with('clientes',$clientes)
                                                ->with('list',$list);  

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $evento=Eventos::find($id);
        $fechas=Fecha::find($evento->IdFecha);
        $costos=Costo::find($evento->IdCosto);
        $fechas->delete();
        $costos->delete();
        $evento->delete();
        Flash::error("El evento ".$evento->TipoEvento." se ha eliminado.");
        return redirect()->route('admin.eventos.index');
    }
    
}
