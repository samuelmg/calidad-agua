<?php

namespace App\Http\Controllers;

use App\Models\Reporte;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class ReporteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('reportes.listar-reportes')->with([
            'reportes' => Reporte::all()->sortByDesc('id'),
            // 'reportes' => auth()->user()->reportes->sortByDesc('id'), // Auth::user()->reportes,
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
        $request->validate([
            'ubicacion' => ['required', 'string', 'max:255', 'min:10',],
            'descripcion' => 'required|string|max:1000|min:50',
            'fecha_inicio' => 'required|date|before_or_equal:today',
        ]);

        $request->merge(['user_id' => auth()->user()->id]);
        Reporte::create($request->all());

        return redirect()->route('reporte.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Reporte $reporte)
    {
        return view('reportes.ver-reporte')->with([
            'reporte' => $reporte,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reporte $reporte)
    {
        Gate::authorize('update', $reporte);

        return view('reportes.editar-reporte')->with([
            'reporte' => $reporte,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reporte $reporte)
    {
        Gate::authorize('update', $reporte);

        $request->validate([
            'ubicacion' => ['required', 'string', 'max:255', 'min:10',],
            'descripcion' => 'required|string|max:1000|min:50',
            'fecha_inicio' => 'required|date|before_or_equal:today',
        ]);

        $reporte->update($request->only(['ubicacion', 'descripcion', 'fecha_inicio']));

        return redirect()->route('reporte.show', $reporte);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reporte $reporte)
    {
        $reporte->delete();

        return redirect()->route('reporte.index');
    }
}
