<?php

use Illuminate\Database\Seeder;
use App\ExamCentre;

class ExamCentresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data =	[
			['name' => 'Hyderabad'],
			['name' => 'Itanagar'],
			['name' => 'Dispur'],
			['name' => 'Patna'],
			['name' => 'Gaya'],
			['name' => 'Raipur'],
			['name' => 'Chandigarh'],
			['name' => 'Delhi'],
			['name' => 'Gandhinagar'],
			['name' => 'Shimla'],
			['name' => 'Srinagar'],
			['name' => 'Jammu'],
			['name' => 'Ranchi'],
			['name' => 'Bengaluru'],
			['name' => 'Tiruvanntapuram'],
			['name' => 'Bhopal'],
			['name' => 'Mumbai'],
			['name' => 'Imphal'],
			['name' => 'Shillong'],
			['name' => 'Aizawl'],
			['name' => 'Kohima'],
			['name' => 'Bhubaneswar'],
			['name' => 'Jaipur'],
			['name' => 'Gangtok'],
			['name' => 'Chennai'],
			['name' => 'Agartala'],
			['name' => 'Lucknow'],
			['name' => 'Varanashi'],
			['name' => 'Dehradun'],
			['name' => 'Kolkata']
        ];
        ExamCentre::insert($data);
    }
}
