<?php

namespace Database\Seeders;

use App\Models\Gender;
use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Service::create([
            'name' => 'Outpatient'
        ]);
        Service::create([
            'name' => 'Inpatient'
        ]);
        Gender::create([
            'name' => 'Male'
        ]);
        Gender::create([
            'name' => 'Female'
        ]);
    }
}
