<?php


use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'product-list',
            'product-create',
            'product-edit',
            'product-delete',
            'user-list',
            'user-create',
            'user-edit',
            'user-delete',
        ];

        $role = Role::create(['name' => 'admin']);
        foreach ($permissions as $permission) {
            $permissionCreate = Permission::create(['name' => $permission]);
            $role->givePermissionTo($permissionCreate['name']);
        }

        $users = [
            [
                'name' => '',
                'email' => 'admin@gmail.com'
            ]
        ];

        $admin->assignRole('admin');


    }
}