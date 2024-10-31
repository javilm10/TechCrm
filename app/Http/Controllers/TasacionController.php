<?php

namespace App\Http\Controllers;

use App\Models\Tasacion;
use App\Models\HistorialTasacion;
use App\Notifications\EstadoTasacionActualizado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TasacionController extends Controller
{
   

    public function index()
    {
        $tasaciones = Tasacion::all();
        return view('tasaciones.index', compact('tasaciones'));
    }

    public function create()
    {
        return view('tasaciones.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'cliente_nombre' => 'required|string|max:255',
            'cliente_contacto' => 'required|string|max:255',
            'direccion' => 'required|string|max:255',
            'precio' => 'nullable|numeric',
            'comentarios' => 'nullable|string'
        ]);
    
        $tasacion = Tasacion::create($request->all());
    
        // Verifica si el usuario está autenticado
        if (Auth::check()) {
            HistorialTasacion::create([
                'tasacion_id' => $tasacion->id,
                'estado' => 'Solicitado',
                'user_id' => Auth::id(),
            ]);
        } else {
            // Manejo de error si el usuario no está autenticado
            return redirect()->route('tasaciones.index')->with('error', 'Se requiere autenticación para crear un historial.');
        }
    
        return redirect()->route('tasaciones.show', $tasacion->id);
    }
    

    public function show(Tasacion $tasacion)
    {
        return view('tasaciones.show', compact('tasacion'));
    }

    public function edit(Tasacion $tasacion)
    {
        
        return view('tasaciones.edit', compact('tasacion'));
    }
    

    public function update(Request $request, Tasacion $tasacion)
    {
        $request->validate([
            'cliente_nombre' => 'required|string|max:255',
            'cliente_contacto' => 'required|string|max:255',
            'direccion' => 'required|string|max:255',
            'precio' => 'nullable|numeric',
            'comentarios' => 'nullable|string',
            // Incluye cualquier otro campo que necesites validar
        ]);
    
        // Actualiza la tasación
        $tasacion->update($request->all());
    
        return redirect()->route('tasaciones.show', $tasacion->id)->with('success', 'Tasación actualizada exitosamente.');
    }

    public function destroy(Tasacion $tasacion)
    {
        $tasacion->delete();
        return redirect()->route('tasaciones.index')->with('success', 'Tasación eliminada exitosamente.');
    }

    public function updateEstado(Request $request, Tasacion $tasacion)
    {
        $request->validate([
            'estado' => 'required|in:Solicitado,En proceso,Tasación completada,Rechazado',
        ]);

        $tasacion->update(['estado' => $request->estado]);

        HistorialTasacion::create([
            'tasacion_id' => $tasacion->id,
            'estado' => $request->estado,
            'user_id' => Auth::id(),
        ]);

        // Notificar al cliente aquí
        $tasacion->cliente->notify(new EstadoTasacionActualizado($tasacion));

        return back();
    }
}
