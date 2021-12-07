<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert(
            array(
            array(
            'name' => 'Pizza méditéranéenne',
            'price' => 10,
            ),
            array(
                'name' => 'Tacos',
                'price' => 5,
                ),
                array(
                    'name' => 'Kebab',
                    'price' => 5,
                    ),
            ),
            );
    }
}
