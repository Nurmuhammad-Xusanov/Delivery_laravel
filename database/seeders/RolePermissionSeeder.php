<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
     
        $permissions = [
            'create-post',
            'edit-posts',
            'delete-posts',
            'view-posts',
        ];

      
        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission, 'guard_name' => 'web']);
        }


        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $editorRole = Role::firstOrCreate(['name' => 'editor']);


        $adminRole->syncPermissions($permissions); 
        $editorRole->syncPermissions(['create-post', 'edit-posts', 'view-posts']); 
    }
}
