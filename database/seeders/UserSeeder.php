<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            [
                'name' => 'Jann Kevin Tina',
                'email' => 'jannkevin.tina@maagap.com',
                'password' => Hash::make('jannkevin.tina'),
                'agent_id' => 1,
            ],
            [
                'name' => 'Jinno Carlo Villanueva',
                'email' => 'jinno.villanueva@maagap.com',
                'password' => Hash::make('jinno.villanueva'),
                'agent_id' => 1,
            ],
            [
                'name' => 'John Patrick Bendana',
                'email' => 'pat.bendana@maagap.com',
                'password' => Hash::make('pat.bendana'),
                'agent_id' => 1,
            ],
            [
                'name' => 'Michael De Leon',
                'email' => 'michael.deleon@maagap.com',
                'password' => Hash::make('michael.deleon'),
                'agent_id' => 1,
            ],
            [
                'name' => 'Takeshi Otake',
                'email' => 'takeshi.otake@maagap.com',
                'password' => Hash::make('takeshi.otake'),
                'agent_id' => 1,
            ],
        ];

        foreach ($users as $userData) {
            User::create($userData);
        }
    }
} 