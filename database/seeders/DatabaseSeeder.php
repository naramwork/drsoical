<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        if (count(Role::all()) == 0) {
            $admin = Role::create(['name' => 'admin']);
            $editor = Role::create(['name' => 'editor']);
            $superAdmin = Role::create(['name' => 'superAdmin']);
            $edit = Permission::create(['name' => 'edit']);
            $observe = Permission::create(['name' => 'observe']);
            $control = Permission::create(['name' => 'control']);

            $superAdmin->givePermissionTo([$edit, $observe, $control]);
            $admin->givePermissionTo([$edit, $observe]);
            $editor->givePermissionTo([$edit]);
        }
    }
}
