<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\BusinessUnit;
use App\Models\User;
use App\Models\Project;
use App\Models\ProgressReport;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void {
        $users = [
            [
                'name' => 'Admin',           // 1
                'email' => 'admin@uniten.edu.my',
                'password' => bcrypt('password'),
                'user_level' => 0,
            ],
            [
                'name' => 'John Marston',    // 2
                'email' => 'jmarston@uniten.edu.my',
                'password' => bcrypt('password'),
                'user_level' => 1,
            ],
            [
                'name'=>'Solomon Reed',     // 3
                'email'=>'sreed@uniten.edu.my',
                'password'=> bcrypt('password'),
                'user_level' => 2
            ],
            [
                'name'=>'Nathan Drake',     // 4
                'email'=>'ndrake@uniten.edu.my',
                'password'=> bcrypt('password'),
                'user_level' => 2
            ],
            [
                'name'=>'Niko Bellic',      // 5
                'email'=>'nbellic@uniten.edu.my',
                'password'=> bcrypt('password'),
                'user_level' => 2,
            ],
            [
                'name'=>'Edward Kenway',    // 6
                'email'=>'ekenway@uniten.edu.my',
                'password'=> bcrypt('password'),
                'user_level' => 2
            ],
            [
                'name'=>'Cole Phelps',      // 7
                'email'=>'cphelps@uniten.edu.my',
                'password'=> bcrypt('password'),
                'user_level' => 2
            ],
            [
                'name'=>'Isaac Clarke',     // 8
                'email'=>'iclarke@uniten.edu.my',
                'password'=> bcrypt('password'),
                'user_level' => 2
            ],
            [
                'name'=>'Joel Miller',      // 9
                'email'=>'jmiller@uniten.edu.my',
                'password'=> bcrypt('password'),
                'user_level' => 2
            ],
            [
                'name'=>'Aiden Caldwell',   // 10
                'email'=>'acaldwell@uniten.edu.my',
                'password'=> bcrypt('password'),
                'user_level' => 2
            ],
            [
                'name'=>'Gary Sanderson',   // 11
                'email'=>'gsanderson@uniten.edu.my',
                'password'=> bcrypt('password'),
                'user_level' => 3
            ],
            [
                'name'=>'Sam Fisher',       // 12
                'email'=>'sfisher@uniten.edu.my',
                'password'=> bcrypt('password'),
                'user_level' => 3
            ],
            [
                'name'=>'Leon Kennedy',     // 13
                'email'=>'lkennedy@uniten.edu.my',
                'password'=> bcrypt('password'),
                'user_level' => 3
            ],
        ];
        // foreach item in the $users array (above), create user
        foreach ($users as $key => $user) {
            User::create($user);
        }
        
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

        $projects = [
            [
                'name' => 'Student Ledger Balance System',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis ut cursus neque. Nunc rutrum ultrices suscipit. In tincidunt, velit at iaculis tincidunt, ligula ipsum congue justo, quis posuere nunc et.',
                'start_date' => Carbon::create('2024', '01', '02'),
                'end_date' => Carbon::create('2024', '06', '02'),
                'platform' => 'Web',
                'methodology' => 'Waterfall',
                'deployment' => 'On-premise',
                'bu_id' => 1
            ],
            [
                'name' => 'E-Discussion Room Booking System',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis ut cursus neque. Nunc rutrum ultrices suscipit. In tincidunt, velit at iaculis tincidunt, ligula ipsum congue justo, quis posuere nunc et.',
                'start_date' => Carbon::create('2024', '02', '05'),
                'end_date' => Carbon::create('2024', '07', '05'),
                'platform' => 'Mobile',
                'methodology' => 'Agile',
                'deployment' => 'Cloud',
                'bu_id' => 2,
            ],
            [
                'name' => 'Subject Registration System',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis ut cursus neque. Nunc rutrum ultrices suscipit. In tincidunt, velit at iaculis tincidunt, ligula ipsum congue justo, quis posuere nunc et.',
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

        $projectUser = [
            [
                'user_id'=> 2,
                'project_id' => 1,
                'lead_developer' => false,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'user_id' => 3,
                'project_id' => 1,
                'lead_developer' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'user_id' => 6,
                'project_id' => 1,
                'lead_developer' => false,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'user_id' => 7,
                'project_id' => 1,
                'lead_developer' => false,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'user_id' => 11,
                'project_id' => 1,
                'lead_developer' => false,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'user_id' => 2,
                'project_id' => 2,
                'lead_developer' => false,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'user_id' => 4,
                'project_id' => 2,
                'lead_developer' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'user_id' => 8,
                'project_id' => 2,
                'lead_developer' => false,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'user_id' => 9,
                'project_id' => 2,
                'lead_developer' => false,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'user_id' => 12,
                'project_id' => 2,
                'lead_developer' => false,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'user_id' => 2,
                'project_id' => 3,
                'lead_developer' => false,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'user_id' => 5,
                'project_id' => 3,
                'lead_developer' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'user_id' => 8,
                'project_id' => 3,
                'lead_developer' => false,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'user_id' => 9,
                'project_id' => 3,
                'lead_developer' => false,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'user_id' => 10,
                'project_id' => 3,
                'lead_developer' => false,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'user_id' => 13,
                'project_id' => 3,
                'lead_developer' => false,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        ];

        DB::table('project_user')->insert($projectUser);

        $progressReports = [
            [
                'status'=>'AHEAD OF SCHEDULE',
                'remarks'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis ut cursus neque. Nunc rutrum ultrices suscipit. In tincidunt, velit at iaculis tincidunt, ligula ipsum congue justo, quis posuere nunc et.',
                'project_id' => 1
            ],
            [
                'status'=>'DELAYED',
                'remarks'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis ut cursus neque. Nunc rutrum ultrices suscipit. In tincidunt, velit at iaculis tincidunt, ligula ipsum congue justo, quis posuere nunc et.',
                'project_id' => 2
            ],
            [
                'status'=>'ON SCHEDULE',
                'remarks'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis ut cursus neque. Nunc rutrum ultrices suscipit. In tincidunt, velit at iaculis tincidunt, ligula ipsum congue justo, quis posuere nunc et.',
                'project_id' => 3
            ],
        ];
        // foreach item in the $progressReports array (above), create progress report
        foreach ($progressReports as $key => $pr) {
            ProgressReport::create($pr);
        }
    }
}
