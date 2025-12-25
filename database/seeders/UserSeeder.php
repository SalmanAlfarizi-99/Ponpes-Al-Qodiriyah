<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        $superAdmin = Role::where('slug', 'super-admin')->first();
        $admin = Role::where('slug', 'admin')->first();
        $teacher = Role::where('slug', 'teacher')->first();
        $student = Role::where('slug', 'student')->first();

        $users = [
            [
                'name' => 'Super Admin',
                'email' => 'superadmin@ponpes.sch.id',
                'password' => Hash::make('password'),
                'role_id' => $superAdmin ? $superAdmin->id : null,
                'status' => 'active',
            ],
            [
                'name' => 'Administrator',
                'email' => 'admin@ponpes.sch.id',
                'password' => Hash::make('password'),
                'role_id' => $admin ? $admin->id : null,
                'status' => 'active',
            ],
            [
                'name' => 'Ustadz Ahmad',
                'email' => 'ustadz@ponpes.sch.id',
                'password' => Hash::make('password'),
                'role_id' => $teacher ? $teacher->id : null,
                'status' => 'active',
            ],
            [
                'name' => 'Muhammad Santri',
                'email' => 'santri@ponpes.sch.id',
                'password' => Hash::make('password'),
                'role_id' => $student ? $student->id : null,
                'status' => 'active',
            ],
        ];

        foreach ($users as $user) {
            User::updateOrCreate(
                ['email' => $user['email']],
                $user
            );
        }
    }
}

