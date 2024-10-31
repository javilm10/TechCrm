<?php

namespace App\Http\Controllers;

use App\Models\HistorialTasacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Asegúrate de importar Auth

class HistorialTasacionController extends Controller
{
    public function index()
    {
        $historialTasaciones = HistorialTasacion::with('tasacion')->get();
        return view('historial.index', compact('historialTasaciones'));
    }

    public function store(Request $request)
    {
        // Validar la entrada
        $request->validate([
            'tasacion_id' => 'required|exists:tasaciones,id',
            'estado' => 'required|in:Solicitado,En proceso,Tasación completada,Rechazado',
        ]);

        // Asegúrate de que el usuario esté autenticado
        $userId = Auth::id(); // Obtener el ID del usuario autenticado

        // Crear el historial de tasación
        HistorialTasacion::create([
            'tasacion_id' => $request->tasacion_id,
            'estado' => $request->estado,
            'user_id' => $userId, // Aquí asignas el ID del usuario
        ]);

        // Redirigir o retornar una respuesta adecuada
        return redirect()->route('historial.index')->with('success', 'Historial de tasación creado exitosamente.');
    }
}
