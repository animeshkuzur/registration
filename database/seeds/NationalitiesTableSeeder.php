<?php

use Illuminate\Database\Seeder;
use App\Nationality;

class NationalitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data =	[
        	['type' => 'Indian'],
        	['type' => 'Other']
        ];
        Nationality::insert($data);
    }
}
