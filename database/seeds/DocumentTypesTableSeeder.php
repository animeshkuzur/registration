<?php

use Illuminate\Database\Seeder;
use App\DocumentType;

class DocumentTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data =	[
        	['type' => 'Photo'],
        	['type' => 'Signature'],
        	['type' => '10th Graduation Certificate'],
        	['type' => '12th Graduation Certificate'],
        	['type' => 'Caste Verfication Certificate']
        ];
        DocumentType::insert($data);
    }
}
