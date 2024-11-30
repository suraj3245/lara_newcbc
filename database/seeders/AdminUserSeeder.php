<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin_role = Role::firstOrCreate(['name' => 'admin']);
       
        $writer_role = Role::firstOrCreate(['name' => 'writer']);

        // Find or create the 'admin' and 'writer' users
        $admin = User::firstOrCreate([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
        ], [
            'password' => bcrypt('password'),
        ]);

        $writer = User::firstOrCreate([
            'name' => 'writer',
            'email' => 'writer@writer.com',
        ], [
            'password' => bcrypt('password'),
        ]);

        $permissions = [
          
            'User Roles-open', 'User Roles-view', 'User Roles-edit', 'User Roles-create', 'User Roles-delete',
            'Sub Users-open', 'Sub Users-view', 'Sub Users-edit', 'Sub Users-create', 'Sub Users-delete',
            'Permissions-open', 'Permissions-view', 'Permissions-edit', 'Permissions-create', 'Permissions-delete',
            
        ];

        foreach ($permissions as $permissionName) {
            $permission = Permission::firstOrCreate(['name' => $permissionName]);
        }

        $admin->assignRole($admin_role);
        $writer->assignRole($writer_role);

        $admin_role->givePermissionTo(Permission::all());
    }
}
