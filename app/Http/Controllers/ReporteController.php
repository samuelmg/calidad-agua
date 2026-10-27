<?php

namespace App\Http\Controllers;

use App\Models\Reporte;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReporteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('reportes.listar-reportes')->with([
            // 'reportes' => Reporte::where('user_id',  Auth::id())
            //                 ->latest()
            //                 ->get(),
            'reportes' => auth()->user()->reportes->sortByDesc('id'), // Auth::user()->reportes,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('reportes.crear-reporte');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->merge(['user_id' => auth()->user()->id]);
        Reporte::create($request->all());

        // $reporte = new Reporte();
        // $reporte->user_id = auth()->user()->id; // Auth::user()->id; Auth::id();
        // $reporte->descripcion = $request->descripcion;
        // $reporte->ubicacion = $request->ubicacion;
        // $reporte->fecha_inicio = $request->fecha_inicio;
        // $reporte->save();

        return redirect()->route('reporte.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Reporte $reporte)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reporte $reporte)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reporte $reporte)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reporte $reporte)
    {
        //
    }
}
