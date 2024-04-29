<?php

namespace Database\Seeders;

use App\Models\Item;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Item::create([
            'item' => 'Creatividad en el diseño del mundo virtual.',
            'max_score' => 10
        ]);

        Item::create([
            'item' => 'Coherencia entre el problema del mundo real y la solución propuesta en Minecraft.',
            'max_score' => 10
        ]);

        Item::create([
            'item' => 'Claridad en la representación del ODS elegido.',
            'max_score' => 10
        ]);

        Item::create([
            'item' => 'Complejidad y variedad de las soluciones implementadas en el mundo virtual.',
            'max_score' => 10
        ]);

        Item::create([
            'item' => 'Utilización efectiva de las funciones de Minecraft Education Edition.',
            'max_score' => 10
        ]);

        Item::create([
            'item' => 'Originalidad en la implementación de la solución.',
            'max_score' => 10
        ]);

        Item::create([
            'item' => 'Evidencia de pensamiento crítico en la resolución de problemas.',
            'max_score' => 10
        ]);

        Item::create([
            'item' => 'Efectividad en la comunicación de la solución dentro del entorno virtual.',
            'max_score' => 10
        ]);

        Item::create([
            'item' => 'Coordinación espacial demostrada en la construcción del mundo virtual.',
            'max_score' => 10
        ]);

        Item::create([
            'item' => 'Grado de detalle y atención al contexto del problema y la solución.',
            'max_score' => 10
        ]);
    }
}
