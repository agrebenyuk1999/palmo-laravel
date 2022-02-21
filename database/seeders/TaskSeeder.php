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
        for ($i = 0; $i <= 9; $i++) {
            DB::table('tasks')->insert([
                'name' => Str::random(10),
                'description' => Str::random(30),
                'created_at' => Carbon::parse(),
            ]);
        }

        $tasks = DB::table('tasks')->get();
        $categoryIds = DB::table('categories')->pluck('id')->toArray();

        foreach ($tasks as $task) {
            for ($i = 0; $i <= rand(0, 2); $i++) {
                DB::table('category_task')->insert([
                    'task_id' => $task->id,
                    'category_id' => $categoryIds[array_rand($categoryIds)]
                ]);
            }
        }
    }
}
