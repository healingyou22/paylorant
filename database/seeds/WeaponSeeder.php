<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WeaponSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('weapons')->insert([
            'name' => 'vandal1',
            'category_id' => '1',
            'image' => 'vandal1.jpg',
        ]);
        DB::table('weapons')->insert([
            'name' => 'vandal2',
            'category_id' => '1',
            'image' => 'vandal2.jpg',
        ]);
        DB::table('weapons')->insert([
            'name' => 'vandal3',
            'category_id' => '1',
            'image' => 'vandal3.jpg',
        ]);
        DB::table('weapons')->insert([
            'name' => 'operator1',
            'category_id' => '2',
            'image' => 'operator1.jpg',
        ]);
        DB::table('weapons')->insert([
            'name' => 'operator2',
            'category_id' => '2',
            'image' => 'operator2.jpg',
        ]);
        DB::table('weapons')->insert([
            'name' => 'operator3',
            'category_id' => '2',
            'image' => 'operator3.jpg',
        ]);
        DB::table('weapons')->insert([
            'name' => 'ghost1',
            'category_id' => '3',
            'image' => 'ghost1.jpg',
        ]);
        DB::table('weapons')->insert([
            'name' => 'ghost2',
            'category_id' => '3',
            'image' => 'ghost2.jpg',
        ]);
        DB::table('weapons')->insert([
            'name' => 'ghost3',
            'category_id' => '3',
            'image' => 'ghost3.jpg',
        ]);
        DB::table('weapons')->insert([
            'name' => 'spectre1',
            'category_id' => '4',
            'image' => 'spectre1.jpg',
        ]);
        DB::table('weapons')->insert([
            'name' => 'spectre2',
            'category_id' => '4',
            'image' => 'spectre2.jpg',
        ]);
        DB::table('weapons')->insert([
            'name' => 'spectre3',
            'category_id' => '4',
            'image' => 'spectre3.jpg',
        ]);
        DB::table('weapons')->insert([
            'name' => 'bucky1',
            'category_id' => '5',
            'image' => 'bucky1.jpg',
        ]);
        DB::table('weapons')->insert([
            'name' => 'bucky2',
            'category_id' => '5',
            'image' => 'bucky2.jpg',
        ]);
        DB::table('weapons')->insert([
            'name' => 'bucky3',
            'category_id' => '5',
            'image' => 'bucky3.jpg',
        ]);
    }
}
