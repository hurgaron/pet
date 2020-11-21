<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PetsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table ('pets') -> insert([
            'name' => 'Number One',
            'address' => '4141',
            'city'  =>  'Orlando',
            'state' =>  'FL',
            'hours' =>  '9:00qm-6:00',
            'latitude'  => 28.452763,
            'longitude' => -81.412228,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);   

        DB::table ('pets') -> insert([
            'name' => 'Number two',
            'address' => '4142',
            'city'  =>  'Orlando',
            'state' =>  'FL',
            'hours' =>  '9:00qm-6:00',
            'latitude'  => 28.473342,
            'longitude' => -81.491581,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]); 

        DB::table ('pets') -> insert([
            'name' => 'Number three',
            'address' => '4143',
            'city'  =>  'Orlando',
            'state' =>  'FL',
            'hours' =>  '9:00qm-6:00',
            'latitude'  => 28.526046,
            'longitude' => -81.396101,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]); 
    }
}
