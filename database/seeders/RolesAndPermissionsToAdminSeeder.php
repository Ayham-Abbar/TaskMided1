<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class RolesAndPermissionsToAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


// إنشاء الصلاحيات
Permission::create(['name' => 'manage users']);
Permission::create(['name' => 'manage projects']);
Permission::create(['name' => 'manage tasks']);
Permission::create(['name' => 'send invitations']);
Permission::create(['name' => 'manage comments']);

// إنشاء الأدوار وتعيين الصلاحيات
$adminRole = Role::create(['name' => 'admin']);
$adminRole->givePermissionTo(['manage users', 'manage projects', 'manage tasks', 'send invitations', 'manage comments']);

$projectManagerRole = Role::create(['name' => 'project manager']);
$projectManagerRole->givePermissionTo(['manage projects', 'manage tasks', 'send invitations', 'manage comments']);

$userRole = Role::create(['name' => 'user']);
$userRole->givePermissionTo(['manage tasks', 'manage comments']);

    }
}
