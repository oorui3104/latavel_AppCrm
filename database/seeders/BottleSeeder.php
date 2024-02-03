<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BottleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bottles')->insert([
            [
                'name' => 'アルマンド',
                'price' => 100000,
            ],
            [
                'name' => 'ドンペリ',
                'price' => 50000,
            ],
            [
                'name' => 'モエシャン',
                'price' => 20000,
            ],
        ]);
    }
}
