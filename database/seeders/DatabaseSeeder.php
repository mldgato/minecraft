<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::create([
            'name' => 'Manuel Lisandro Dardón',
            'email' => 'mdardon@etciberoamerica.com.gt',
            'password' => '12345678'
        ]);
        \App\Models\User::factory(3)->create();
        \App\Models\Team::factory(4)->create();
        \App\Models\Member::factory(10)->create();


        // Llamar a la semilla del ItemSeeder
        $this->call(ItemSeeder::class);
        $this->call(EvaluationSeeder::class);
        
    }
}
