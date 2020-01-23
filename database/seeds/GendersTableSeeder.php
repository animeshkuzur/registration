<?php

use Illuminate\Database\Seeder;
use App\Gender;

class GendersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data =	[
        	['type' => 'Male'],
        	['type' => 'Female'],
        	['type' => 'Transgender']
        ];
        Gender::insert($data);
    }
}
