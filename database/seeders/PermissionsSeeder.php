<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached rolse and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();
        $user = \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'nismoxn@gmail.com',
            'phone' => '+998881211600',
            'password' => bcrypt('672331222'),
        ]);
        // create permissions
        Permission::create(['name' => 'mange users']);
        Permission::create(['name' => 'mange menu']);
        Permission::create(['name' => 'view orders']);
        Permission::create(['name' => 'confirm orders']);
        Permission::create(['name' => 'prepare food']);
        Permission::create(['name' => 'change delivery status']);
        Permission::create(['name' => 'handle payments']);

        // create roles and assign existing permissions
        // admin gets all permissions via Gate::before rule; see AppServiceProvider or check https://spatie.be/docs/laravel-permission/v6/basic-usage/new-app
        $admin = Role::create(['name' => 'admin']);
        $cashier = Role::create(['name' => 'cashier']);
        $cashier->givePermissionTo('view orders', 'confirm orders', 'handle payments');
        $chef = Role::create(['name' => 'chef']);
        $chef->givePermissionTo('view orders', 'prepare food', 'mange menu');
        $delivery_person = Role::create(['name' => 'delivery_person']);
        $delivery_person->givePermissionTo('view orders', 'change delivery status');

        $user->assignRole($admin);
    }
}
