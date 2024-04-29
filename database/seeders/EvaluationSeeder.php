<?php

namespace Database\Seeders;

use App\Models\Evaluation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EvaluationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Evaluation::create([
            'evaluation_date' => date('Y-m-d H:i:s'),
            'team_id' => 1,
            'user_id' => 1
        ]);
        Evaluation::create([
            'evaluation_date' => date('Y-m-d H:i:s'),
            'team_id' => 1,
            'user_id' => 2
        ]);
        Evaluation::create([
            'evaluation_date' => date('Y-m-d H:i:s'),
            'team_id' => 1,
            'user_id' => 3
        ]);
        Evaluation::create([
            'evaluation_date' => date('Y-m-d H:i:s'),
            'team_id' => 1,
            'user_id' => 4
        ]);

        Evaluation::create([
            'evaluation_date' => date('Y-m-d H:i:s'),
            'team_id' => 2,
            'user_id' => 1
        ]);
        Evaluation::create([
            'evaluation_date' => date('Y-m-d H:i:s'),
            'team_id' => 2,
            'user_id' => 2
        ]);
        Evaluation::create([
            'evaluation_date' => date('Y-m-d H:i:s'),
            'team_id' => 2,
            'user_id' => 3
        ]);
        Evaluation::create([
            'evaluation_date' => date('Y-m-d H:i:s'),
            'team_id' => 2,
            'user_id' => 4
        ]);

        Evaluation::create([
            'evaluation_date' => date('Y-m-d H:i:s'),
            'team_id' => 3,
            'user_id' => 1
        ]);
        Evaluation::create([
            'evaluation_date' => date('Y-m-d H:i:s'),
            'team_id' => 3,
            'user_id' => 2
        ]);
        Evaluation::create([
            'evaluation_date' => date('Y-m-d H:i:s'),
            'team_id' => 3,
            'user_id' => 3
        ]);
        Evaluation::create([
            'evaluation_date' => date('Y-m-d H:i:s'),
            'team_id' => 3,
            'user_id' => 4
        ]);

        Evaluation::create([
            'evaluation_date' => date('Y-m-d H:i:s'),
            'team_id' => 4,
            'user_id' => 1
        ]);
        Evaluation::create([
            'evaluation_date' => date('Y-m-d H:i:s'),
            'team_id' => 4,
            'user_id' => 2
        ]);
        Evaluation::create([
            'evaluation_date' => date('Y-m-d H:i:s'),
            'team_id' => 4,
            'user_id' => 3
        ]);
        Evaluation::create([
            'evaluation_date' => date('Y-m-d H:i:s'),
            'team_id' => 4,
            'user_id' => 4
        ]);

        $evaluations = Evaluation::all();

        foreach ($evaluations as $evaluation) {
            $items = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
            $scores = [];

            foreach ($items as $item) {
                $scores[] = [
                    'item_id' => $item,
                    'score' => mt_rand(0, 10), // Genera un número aleatorio entre 0 y 10
                ];
            }

            $evaluation->items()->attach($scores);
        }
    }
}
