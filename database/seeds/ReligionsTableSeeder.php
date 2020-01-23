<?php

use Illuminate\Database\Seeder;
use App\Religion;

class ReligionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data =	[
        	['type' => 'Hindu'],
        	['type' => 'Muslim'],
        	['type' => 'Christian'],
        	['type' => 'Sikh'],
        	['type' => 'Buddhist'],
        	['type' => 'Zoroastrian'],
        	['type' => 'Jain']
        ];
        Religion::insert($data);
    }
}
