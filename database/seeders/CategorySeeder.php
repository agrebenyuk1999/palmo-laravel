<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            ['name' => 'Работа'],
            ['name' => 'Финансы'],
            ['name' => 'Здоровье'],
            ['name' => 'Бытовые дела'],
            ['name' => 'Спорт'],
            ['name' => 'Другое'],
        ]);
    }
}
