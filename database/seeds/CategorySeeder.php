<?php

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
            'name' => 'riffle',
        ]);
        DB::table('categories')->insert([
            'name' => 'sniper',
        ]);
        DB::table('categories')->insert([
            'name' => 'pistol',
        ]);
        DB::table('categories')->insert([
            'name' => 'smg',
        ]);
        DB::table('categories')->insert([
            'name' => 'shotgun',
        ]);
    }
}
