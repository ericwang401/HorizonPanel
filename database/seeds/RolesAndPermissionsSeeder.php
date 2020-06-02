<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // We have to first create the admin privileges because we can't assign NULL to a role, right?

        // Manage roles + roles of users
        Permission::create(['name' => 'view panel']);
        

        // Let's make the role(s) and bind the permission to the role so it has a purpose
        Role::create(['name' => 'superuser'])->givePermissionTo('view panel');

        // End of file! Wow, that is really short... like yours.
    }
}
