<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\BusinessUnit;

class CreateBusinessUnitsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $businessUnits = [
            [
                'name'=>'Finance & Procurement Department'
            ],
            [
                'name'=>'Information Resource Centre (IRC)'
            ],
            [
                'name'=>'Registrar Office'
            ],
        ];
        // foreach item in the $businessUnits array (above), create business unit
        foreach ($businessUnits as $key => $bu) {
            BusinessUnit::create($bu);
        }
    }
}
