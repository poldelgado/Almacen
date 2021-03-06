<?php

namespace App\Http\Controllers;
use App\Proveedor;
use App\State;
use App\Province;
use App\Location;
use App\Domicilio;
use App\Compra;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;


class ProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $proveedores = Proveedor::search($request->nombre)->orderBy('id','ASC')->paginate(7);
        return view('admin.proveedor.index')->with('proveedores',$proveedores);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $states = State::pluck('name','id');
        return view('admin.proveedor.create')->with('states',$states);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Guardando el Domicilio del Proveedor
        $domicilio = new Domicilio();
        $domicilio->calle = $request->calle;
        $domicilio->barrio = $request->barrio;
        $domicilio->numero = $request->numero;
        $domicilio->location_id = $request->location;
        $domicilio->location->province_id = $request->province;
        $domicilio->location->province->state_id= $request->state;
        $domicilio->save();
        //Guardando el Proveedor
        $proveedor = new Proveedor();
        $proveedor->nombre=$request->name;
        $proveedor->telefono=$request->telefono;
        $proveedor->domicilio_id = $domicilio->id;
        $proveedor->save();
        flash("Se creo el Proveedor" . $proveedor->nombre . " correctamente!")->important();
        return redirect(route('proveedor.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $proveedor = Proveedor::find($id);
        return view('admin.proveedor.show')->with('proveedor',$proveedor);
    }
    public function view($id)
    {
        $compra = Compra::find($id);
        return view('admin.proveedor.view')->with('compra',$compra);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $proveedor=Proveedor::find($id);
        $states = State::pluck('name','id');
        $provinces = Province::pluck('name','id');
        $locations = Location::pluck('name','id');
        return view('admin.proveedor.edit')->with('proveedor',$proveedor)
        ->with('states',$states)->with('provinces',$provinces)->with('locations',$locations);
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
        $proveedor=Proveedor::find($id);
        $proveedor->fill($request->all());
        $proveedor->save();
        $domicilio = Domicilio::find($request->domicilio);
        $domicilio->calle = $request->calle;
        $domicilio->barrio = $request->barrio;
        $domicilio->numero = $request->numero;
        $domicilio->location_id = $request->location;
        $domicilio->location->province_id = $request->province;
        $domicilio->location->province->state_id= $request->state;
        $domicilio->save();
        flash("Se actualizo el proveedor  " . $proveedor->nombre . " correctamente!")->warning();
        return redirect(route('proveedor.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $proveedor=Proveedor::find($id);
        $proveedor->forceDelete();
       flash("Se elimino el Proveedor " . $proveedor->nombre . " correctamente!")->error();
        return redirect(route('proveedor.index'));
    }

    public function pdf()
    {
        $proveedores = Proveedor::all(); 

        $pdf = PDF::loadView('pdf.proveedores', compact('proveedores'));

        return $pdf->download('Listado de Proveedores.pdf');
    }
}
