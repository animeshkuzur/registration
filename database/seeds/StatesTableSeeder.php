<?php

use Illuminate\Database\Seeder;
use App\State;

class StatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data =	[
        	['name' => 'Andaman & Nicobar Island'],
        	['name' => 'Andhra Pradesh'],
        	['name' => 'Arunachal Pradesh'],
        	['name' => 'Assam'],
        	['name' => 'Bihar'],
        	['name' => 'Chandigarh'],
        	['name' => 'Chhattisgarh'],
        	['name' => 'Dadra & Nagar Haveli'],
        	['name' => 'Daman & Diu'],
        	['name' => 'Delhi'],
        	['name' => 'Goa'],
        	['name' => 'Gujarat'],
        	['name' => 'Haryana'],
        	['name' => 'Himachal Pradesh'],
        	['name' => 'Jammu & Kashmir'],
        	['name' => 'Jharkhand'],
        	['name' => 'Karnataka'],
        	['name' => 'Kerala'],
        	['name' => 'Lakshadweep'],
        	['name' => 'Madhya Pradesh'],
        	['name' => 'Maharashtra'],
        	['name' => 'Manipur'],
        	['name' => 'Meghalaya'],
        	['name' => 'Mizoram'],
        	['name' => 'Nagaland'],
        	['name' => 'Odisha'],
        	['name' => 'Others'],
        	['name' => 'Puducherry'],
        	['name' => 'Punjab'],
        	['name' => 'Rajasthan'],
        	['name' => 'Sikkim'],
        	['name' => 'Tamil Nadu'],
        	['name' => 'Telangana'],
        	['name' => 'Tripura'],
        	['name' => 'Uttar Pardesh'],
        	['name' => 'Uttrakhand'],
        	['name' => 'West Bengal']
        ];
        State::insert($data);
    }
}
