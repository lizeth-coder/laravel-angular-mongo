<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;
use MongoDB\Laravel\Schema\Blueprint;

return new class extends Migration
{
    protected $connection = 'mongodb';

    /**
     * Crea la colección "libros" (y con ella la BD "biblioteca" si no existe).
     */
    public function up(): void
    {
        Schema::connection('mongodb')->create('libros', function (Blueprint $collection) {
            $collection->index('titulo');
            $collection->index('autor');
        });
    }

    public function down(): void
    {
        Schema::connection('mongodb')->dropIfExists('libros');
    }
};
