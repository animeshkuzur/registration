<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(CommunitiesTableSeeder::class);
        $this->call(DocumentTypesTableSeeder::class);
        $this->call(ExamCentresTableSeeder::class);
        $this->call(GendersTableSeeder::class);
        $this->call(MaritalStatusesTableSeeder::class);
        $this->call(NationalitiesTableSeeder::class);
        $this->call(ReligionsTableSeeder::class);
        $this->call(StatesTableSeeder::class);
        $this->call(OccupationTableSeeder::class);
    }
}
