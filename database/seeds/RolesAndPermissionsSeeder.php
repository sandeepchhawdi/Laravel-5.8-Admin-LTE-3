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
        Permission::create(['name' => 'modify video']);
        Permission::create(['name' => 'list video']);
        Permission::create(['name' => 'view video']);

        // create roles and assign created permissions

        // this can be done as separate statements
        Role::create(['name' => 'admin'])->givePermissionTo(['list video', 'view video', 'modify video']);
        
        // or may be done by chaining
        Role::create(['name' => 'user'])->givePermissionTo(['list video', 'view video']);

        $role = Role::create(['name' => 'super-admin']);
        $role->givePermissionTo(Permission::all());
    }
}
