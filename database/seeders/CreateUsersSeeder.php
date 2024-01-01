<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /* 
        admin: user_level = 0,
        manager: user_level = 1,
        lead developer: user_evel = 2,
        developer: user_level = 3,
        PIC (Person In Charge): user_level = 4
        */
        $users = [
            [
                'name'=>'Admin',
                'email'=>'admin@uniten.edu.my',
                'password'=> bcrypt('password'),
                'user_level' => 0
            ],
            [
                'name'=>'John Marston',
                'email'=>'jmarston@uniten.edu.my',
                'password'=> bcrypt('password'),
                'user_level' => 1
            ],
            [
                'name'=>'Leon Kennedy',
                'email'=>'lkennedy@uniten.edu.my',
                'password'=> bcrypt('password'),
                'user_level' => 1
            ],
            [
                'name'=>'Solomon Reed',
                'email'=>'sreed@uniten.edu.my',
                'password'=> bcrypt('password'),
                'user_level' => 2
            ],
            [
                'name'=>'Nathan Drake',
                'email'=>'ndrake@uniten.edu.my',
                'password'=> bcrypt('password'),
                'user_level' => 3
            ],
            [
                'name'=>'Niko Bellic',
                'email'=>'nbellic@uniten.edu.my',
                'password'=> bcrypt('password'),
                'user_level' => 3
            ],
            [
                'name'=>'Edward Kenway',
                'email'=>'ekenway@uniten.edu.my',
                'password'=> bcrypt('password'),
                'user_level' => 3
            ],
            [
                'name'=>'Cole Phelps',
                'email'=>'cphelps@uniten.edu.my',
                'password'=> bcrypt('password'),
                'user_level' => 3
            ],
            [
                'name'=>'Isaac Clarke',
                'email'=>'iclarke@uniten.edu.my',
                'password'=> bcrypt('password'),
                'user_level' => 3
            ],
            [
                'name'=>'Joel Miller',
                'email'=>'jmiller@uniten.edu.my',
                'password'=> bcrypt('password'),
                'user_level' => 3
            ],
            [
                'name'=>'Aiden Caldwell',
                'email'=>'acaldwell@uniten.edu.my',
                'password'=> bcrypt('password'),
                'user_level' => 4
            ],
            [
                'name'=>'Gary Sanderson',
                'email'=>'gsanderson@uniten.edu.my',
                'password'=> bcrypt('password'),
                'user_level' => 4
            ],
            [
                'name'=>'Sam Fisher',
                'email'=>'sfisher@uniten.edu.my',
                'password'=> bcrypt('password'),
                'user_level' => 4
            ],
        ];
        // foreach item in the $users array (above), create user
        foreach ($users as $key => $user) {
            User::create($user);
        }
    }
}
