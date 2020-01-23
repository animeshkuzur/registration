<?php

use Illuminate\Database\Seeder;
use App\MaritalStatus;

class MaritalStatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data =	[
        	['type' => 'Unmarried'],
        	['type' => 'Married'],
        	['type' => 'Widow-Widower'],
        	['type' => 'Divorcee']
        ];
        MaritalStatus::insert($data);
    }
}
