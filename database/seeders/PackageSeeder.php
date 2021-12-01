<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('packages')->insert([

            [
                'title' => 'Basic',
                'amount' => 50,
            ],
            
            [
                'title' => 'Standard',
                'amount' => 75,
            ],
            
            [
                'title' => 'Premium',
                'amount' => 125,
            ],

        ]);
    }
}
