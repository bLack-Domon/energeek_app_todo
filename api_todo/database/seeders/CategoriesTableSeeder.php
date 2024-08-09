<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = now();
        $data = [
            ['name' => 'Todo', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'InProgress', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Testing', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Done', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Pending', 'created_at' => $now, 'updated_at' => $now],
        ];
        DB::table('categories')->insert($data);
    }
}
