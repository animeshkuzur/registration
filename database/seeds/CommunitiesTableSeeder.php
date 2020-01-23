<?php

use Illuminate\Database\Seeder;
use App\Community;

class CommunitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data =	[
        	['type' => 'General'],
        	['type' => 'EWS'],
        	['type' => 'OBC'],
        	['type' => 'SC'],
        	['type' => 'ST']
        ];
        Community::insert($data);
    }
}
