<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    public function run()
    {
        $roles = [
            [
                'name' => 'Super Admin',
                'slug' => 'super-admin',
                'description' => 'Full system access with all permissions',
                'permissions' => ['*'],
            ],
            [
                'name' => 'Admin',
                'slug' => 'admin',
                'description' => 'Administrative access to most features',
                'permissions' => [
                    'users.view', 'users.create', 'users.edit', 'users.delete',
                    'santri.view', 'santri.create', 'santri.edit', 'santri.delete',
                    'teachers.view', 'teachers.create', 'teachers.edit', 'teachers.delete',
                    'classes.view', 'classes.create', 'classes.edit', 'classes.delete',
                    'subjects.view', 'subjects.create', 'subjects.edit', 'subjects.delete',
                    'schedules.view', 'schedules.create', 'schedules.edit', 'schedules.delete',
                    'attendance.view', 'attendance.create', 'attendance.edit',
                    'assessments.view', 'assessments.create', 'assessments.edit',
                    'payments.view', 'payments.create', 'payments.edit', 'payments.delete',
                    'announcements.view', 'announcements.create', 'announcements.edit', 'announcements.delete',
                    'reports.view',
                ],
            ],
            [
                'name' => 'Ustadz/Ustadzah',
                'slug' => 'teacher',
                'description' => 'Teacher access for classes and assessments',
                'permissions' => [
                    'santri.view',
                    'classes.view',
                    'schedules.view',
                    'attendance.view', 'attendance.create',
                    'assessments.view', 'assessments.create', 'assessments.edit',
                    'announcements.view',
                ],
            ],
            [
                'name' => 'Santri',
                'slug' => 'student',
                'description' => 'Student access to view own data',
                'permissions' => [
                    'profile.view', 'profile.edit',
                    'schedules.view',
                    'assessments.view',
                    'payments.view',
                    'announcements.view',
                ],
            ],
            [
                'name' => 'Wali Santri',
                'slug' => 'parent',
                'description' => 'Parent/Guardian access to view child data',
                'permissions' => [
                    'profile.view',
                    'santri.view',
                    'attendance.view',
                    'assessments.view',
                    'payments.view',
                    'announcements.view',
                ],
            ],
        ];

        foreach ($roles as $role) {
            Role::updateOrCreate(
                ['slug' => $role['slug']],
                $role
            );
        }
    }
}
