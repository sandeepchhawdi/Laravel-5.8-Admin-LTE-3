<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'create videos']);
        Permission::create(['name' => 'update videos']);
        Permission::create(['name' => 'view videos']);
        Permission::create(['name' => 'delete videos']);
        
        Permission::create(['name' => 'create users']);
        Permission::create(['name' => 'update users']);
        Permission::create(['name' => 'view users']);
        Permission::create(['name' => 'delete users']);
        
        $role = Role::create(['name' => 'admin']);
        $role->givePermissionTo(Permission::all());
        
        Role::create(['name' => 'moderator'])
                ->givePermissionTo([
                    'view videos',
                    'create videos',
                    'update videos',
                    'view users',
                    'create users',
                    'update users'
                ]);

        Role::create(['name' => 'user'])
                ->givePermissionTo([
                    'view videos',
                    'view users'
                ]);
    }
}
