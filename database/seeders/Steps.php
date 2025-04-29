<?php

namespace Database\Seeders;

use App\Models\Step;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Steps extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Step::create([
            'name'=>'На доработке'
        ]);
        Step::create([
            'name'=>'На шаге 2'
        ]);
        Step::create([
            'name'=>'На шаге 3'
        ]);
        Step::create([
            'name'=>'Завершён'
        ]);
        Step::create([
            'name'=>'Завершён и подключён'
        ]);
        Step::create([
            'name'=>'Аннулирован'
        ]);
    }
}
