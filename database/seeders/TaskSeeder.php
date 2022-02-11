<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categoryIds = DB::table('categories')->pluck('id')->toArray();

        for ($i = 0; $i <= 9; $i++) {
            DB::table('tasks')->insert([
                'name' => Str::random(10),
                'description' => Str::random(30),
                'category_id' => $categoryIds[array_rand($categoryIds)],
                'created_at' => Carbon::parse(),
            ]);
        }
    }
}
