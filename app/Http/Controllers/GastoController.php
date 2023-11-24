<?php

namespace App\Http\Controllers;

use App\Models\gasto;
use Illuminate\Http\Request;

class GastoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $gastos = gasto::all();
        return view('gasto.index', compact('gastos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $gastos = new gasto();
        $gastos->id_gst = 0; /*AUTO GENERADO*/
        $gastos->codigo_gst = $request->codigo_gst; /*$request->input*/
        $gastos->fecha_gst = $request->fecha_gst;
        $gastos->valorTotalSinIva_gst = $request->valorTotalSinIva_gst;
        $gastos->ivaTotal_gst = $request->ivaTotal_gst;
        $gastos->lugar_gst = $request->lugar_gst;
        $gastos->descripcion_gst = $request->descripcion_gst;        
        $gastos->valorTotalConIva_gst = $request->valorTotalSinIva_gst + 
                ($request->valorTotalSinIva_gst * $request->ivaTotal_gst / 100);
        
        $gastos->nombreUsuario_gst = auth()->user()->name;
        $gastos->id_usr_gst = auth()->user()->id;

        $gastos->save();

        return redirect()->route('home.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(gasto $gasto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        //        
        $gastos = Gasto::find($id);
        $gastos->codigo_gst = $request->input('codigo_gst');
        $gastos->fecha_gst = $request->input('fecha_gst');
        $gastos->valorTotalSinIva_gst = $request->input('valorTotalSinIva_gst');
        $gastos->ivaTotal_gst = $request->input('ivaTotal_gst');
        $gastos->lugar_gst = $request->input('lugar_gst');
        $gastos->descripcion_gst = $request->input('descripcion_gst');        
        $gastos->valorTotalConIva_gst = $request->input('valorTotalSinIva_gst') + 
                ($request->input('valorTotalSinIva_gst') * $request->input('ivaTotal_gst') / 100);
        
        $gastos->nombreUsuario_gst = auth()->user()->name;
        $gastos->id_usr_gst = auth()->user()->id;

        $gastos->update();
        /*return redirect()->route('home.index');*/        
        return redirect()->back();        

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $gastos = Gasto::find($id); 
        $gastos->delete();
        /*return redirect()->route('home.index');        */
        return redirect()->back();        
    }
}
