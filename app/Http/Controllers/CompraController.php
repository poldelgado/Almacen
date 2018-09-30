<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Compra;
use App\Producto;
use App\Proveedor;
use App\Tipo;
use App\Linea_compra;
use App\User;
use Illuminate\Support\Facades\Auth;

class CompraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $tipos     = Tipo::all()->pluck('show','id');
        $productos = Producto::all()->pluck('full','id');
        $proveedor = Proveedor::find($id);
         return view('admin.compra.create')
         ->with('proveedor',$proveedor)
         ->with('productos',$productos)
         ->with('tipos',$tipos);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        //dd($user->id);
        $compra = new Compra($request->all());
        $compra->fecha= \Carbon\Carbon::parse($compra->fecha)->format('Y-m-d');
        $compra->monto = 0 ;
        $compra->user_id = $user->id; 
        $proveedor = Proveedor::find($request->idp);
        $proveedor->compras()->save($compra);
        foreach ($request->productos as $idx=> $producto){
            $lc = new Linea_compra();
            $prod = Producto::find($producto);
            $lc->cantidad = $request->cantidad[$idx];
            $lc->subTotal = $prod->precio_costo*$request->cantidad[$idx];
            $lc->producto_id = $prod->id;
            $lc->compra_id = $compra->id;
            $lc->save();
        }
        foreach($compra->lineaCompra as $l){
            $compra->monto = $compra->monto + $l->subTotal;        
            $compra->proveedor_id = $proveedor->id;   
            $compra->lineaCompra()->save($l);
            }
            $compra->save();
            flash("Se creo la Compra del Proveeddor: " . $compra->proveedor->nombre. " correctamente!")->success();
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
        $producto = Producto::all()->pluck('full','id');
        $tipo = Tipo::all()->pluck('show','id');
        $compra = Compra::find($id);
        return view('admin.compra.edit')
        ->with('producto',$producto)
        ->with('compra',$compra)
        ->with('tipo',$tipo);
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
        //dd($request->all());
       $user = Auth::user();
       $compra = Compra::find($id);
       $compra->fecha = \Carbon\Carbon::parse($request->fecha)->format('Y-m-d');
       $compra->monto = 0 ;
       $compra->user_id = $user->id;
       foreach ($request->productos as $idx=> $producto){
        $prod = Producto::find($producto);
        $lc = Linea_compra::find($compra->lineaCompra[$idx]); 
        $lc[0]->subTotal = $prod->precio_costo*$request->cantidad[$idx];
        $lc[0]->producto_id = $prod->id;
        $lc[0]->compra_id = $compra->id;
        $compra->lineaCompra()->save($lc[0]);
        $compra->monto = $compra->monto + $lc[0]->subTotal;
        $compra->save();
       }
       flash("Se edito la Compra a de Proveedor: " . $compra->proveedor->nombre. " correctamente!")->success();
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
        $compra=Compra::find($id);
        $compra->forceDelete();
        flash("Se elimino Compra de  " . $compra->proveedor->nombre . " correctamente!")->error();
        return redirect(route('proveedor.index'));
    }
}