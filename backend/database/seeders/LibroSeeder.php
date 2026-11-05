<?php

namespace Database\Seeders;

use App\Models\Libro;
use Illuminate\Database\Seeder;

class LibroSeeder extends Seeder
{
    public function run(): void
    {
        $libros = [
            ['titulo' => 'Cien años de soledad',            'autor' => 'Gabriel García Márquez', 'genero' => 'Realismo mágico', 'anio_publicacion' => 1967],
            ['titulo' => 'Don Quijote de la Mancha',        'autor' => 'Miguel de Cervantes',    'genero' => 'Novela',          'anio_publicacion' => 1605],
            ['titulo' => 'Pedro Páramo',                    'autor' => 'Juan Rulfo',             'genero' => 'Novela',          'anio_publicacion' => 1955],
        ];

        foreach ($libros as $libro) {
            Libro::updateOrCreate(['titulo' => $libro['titulo']], $libro);
        }
    }
}
