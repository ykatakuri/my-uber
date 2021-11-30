<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('clients')->insert(
            array(
            array(
            'name' => 'John Doe',
            'address' => '2 rue de Lespinet, Toulouse',
            'phone' => '+330605040302',
            ),
            )
            );

    }
}
