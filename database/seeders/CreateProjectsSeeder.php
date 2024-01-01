<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;

class CreateProjectsSeeder extends Seeder {
    /**
     * Run the database seeds.
     */
    public function run(): void {
        $projects = [
            [
                'name' => 'Student Ledger Balance System',
                'start_date' => Carbon::create('2024', '01', '02'),
                'end_date' => Carbon::create('2024', '06', '02'),
                'platform' => 'Web',
                'methodology' => 'Waterfall',
                'deployment' => 'On-premise',
                'bu_id' => 1
            ],
            [
                'name' => 'E-Discussion Room Booking System',
                'start_date' => Carbon::create('2024', '02', '05'),
                'end_date' => Carbon::create('2024', '07', '05'),
                'platform' => 'Mobile',
                'methodology' => 'Agile',
                'deployment' => 'On-premise',
                'bu_id' => 2,
            ],
            [
                'name' => 'Subject Registration System',
                'start_date' => Carbon::create('2024', '01', '02'),
                'end_date' => Carbon::create('2024', '06', '02'),
                'platform' => 'Web',
                'methodology' => 'Prototyping',
                'deployment' => 'On-premise',
                'bu_id' => 3,
            ],
        ];
        // foreach item in the $projects array (above), create projects
        foreach ($projects as $key => $project) {
            Project::create($project);
        }
    }
}
