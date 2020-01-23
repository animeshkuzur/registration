<?php

use Illuminate\Database\Seeder;
use App\Occupation;

class OccupationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data =	[
        	['name' => 'Clerk'],
        	['name' => 'Primary School Teacher'],
        	['name' => 'Driver'],
        	['name' => 'Cook']
        ];
        Occupation::insert($data);
    }
}
