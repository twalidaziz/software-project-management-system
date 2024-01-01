<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ProgressReport;

class CreateProgressReportsSeeder extends Seeder {
    /**
     * Run the database seeds.
     */
    public function run(): void {
        $progressReports = [
            [
                'status'=>'AHEAD OF SCHEDULE',
                'remarks'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis ut cursus neque. Nunc rutrum ultrices suscipit. In tincidunt, velit at iaculis tincidunt, ligula ipsum congue justo, quis posuere nunc et.',
                'project_id' => 1
            ],
            [
                'status'=>'ON SCHEDULE',
                'remarks'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis ut cursus neque. Nunc rutrum ultrices suscipit. In tincidunt, velit at iaculis tincidunt, ligula ipsum congue justo, quis posuere nunc et.',
                'project_id' => 2
            ],
        ];
        // foreach item in the $progressReports array (above), create progress report
        foreach ($progressReports as $key => $pr) {
            ProgressReport::create($pr);
        }
    }
}
