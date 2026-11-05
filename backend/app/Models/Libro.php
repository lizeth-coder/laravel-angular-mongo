<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

/**
 * @property-read string $id
 * @property string $titulo
 * @property string $autor
 * @property string|null $genero
 * @property int|null $anio_publicacion
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 */
class Libro extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'libros';

    // Campos que se pueden llenar
    protected $fillable = [
        'titulo',
        'autor',
        'genero',
        'anio_publicacion',
    ];

    protected function casts(): array
    {
        return [
            'anio_publicacion' => 'integer',
        ];
    }
}
