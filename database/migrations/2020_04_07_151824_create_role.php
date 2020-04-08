<?php

use Illuminate\Database\Migrations\Migration;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CreateRole extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $manager = Role::create(['name' => 'manager']);
        $administrator = Role::create(['name' => 'administrator']);
        $permissionCreateEmployer = Permission::create(['name' => 'create employer']);
        $permissionAssignEmployer = Permission::create(['name' => 'assign employer']);
        $permissionDeleteEmployer = Permission::create(['name' => 'delete employer']);
        $permissionViewEmployer = Permission::create(['name' => 'view employer']);
        $administrator->givePermissionTo($permissionCreateEmployer);
        $administrator->givePermissionTo($permissionAssignEmployer);
        $administrator->givePermissionTo($permissionDeleteEmployer);
        $administrator->givePermissionTo($permissionViewEmployer);
        $manager->givePermissionTo($permissionViewEmployer);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Role::findByName('manager')->delete();
        Role::findByName('administrator')->delete();
        Permission::findByName('create employer')->delete();
        Permission::findByName('assign employer')->delete();
        Permission::findByName('delete employer')->delete();
        Permission::findByName('view employer')->delete();
    }
}
