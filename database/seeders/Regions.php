<?php

namespace Database\Seeders;

use App\Models\Region;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Regions extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Region::create([
            'name'=>'Аксу'
        ]);
        Region::create([
            'name'=>'Алаколь'
        ]);
        Region::create([
            'name'=>'Жаркент'
        ]);
        Region::create([
            'name'=>'Карабулак'
        ]);
        Region::create([
            'name'=>'Коксу'
        ]);
        Region::create([
            'name'=>'Сарканд'
        ]);
        Region::create([
            'name'=>'Сарыозек'
        ]);
        Region::create([
            'name'=>'Талдыкорган'
        ]);
        Region::create([
            'name'=>'Текели'
        ]);
        Region::create([
            'name'=>'Уйгентас'
        ]);
        Region::create([
            'name'=>'Уштобе'
        ]);
        Region::create([
            'name'=>'Администратор'
        ]);
    }
}
