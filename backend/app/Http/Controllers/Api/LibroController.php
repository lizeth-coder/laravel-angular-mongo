<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Libro;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class LibroController extends Controller
{
    /**
     * GET /api/libros — lista todos los libros.
     */
    public function index(): JsonResponse
    {
        return response()->json(Libro::all(), 200);
    }

    /**
     * POST /api/libros — crea un libro.
     */
    public function store(Request $request): JsonResponse
    {
        $datos = $request->validate([
            'titulo'           => 'required|string|max:255',
            'autor'            => 'required|string|max:255',
            'genero'           => 'nullable|string|max:255',
            'anio_publicacion' => 'nullable|integer|min:0|max:' . (date('Y') + 1),
        ]);

        $libro = Libro::create($datos);

        return response()->json($libro, 201);
    }

    /**
     * GET /api/libros/{id} — muestra un libro.
     */
    public function show(string $id): JsonResponse
    {
        return response()->json(Libro::findOrFail($id), 200);
    }

    /**
     * PUT|PATCH /api/libros/{id} — actualiza un libro.
     */
    public function update(Request $request, string $id): JsonResponse
    {
        $libro = Libro::findOrFail($id);

        $datos = $request->validate([
            'titulo'           => 'sometimes|required|string|max:255',
            'autor'            => 'sometimes|required|string|max:255',
            'genero'           => 'nullable|string|max:255',
            'anio_publicacion' => 'nullable|integer|min:0|max:' . (date('Y') + 1),
        ]);

        $libro->update($datos);

        return response()->json($libro, 200);
    }

    /**
     * DELETE /api/libros/{id} — elimina un libro.
     */
    public function destroy(string $id): JsonResponse
    {
        Libro::findOrFail($id)->delete();

        return response()->json(null, 204);
    }
}
