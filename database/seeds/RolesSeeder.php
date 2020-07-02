<?php

use Illuminate\Database\Seeder;
use App\Role;
class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::create([
            'name' => 'Quản lý', 
            'slug' => 'manager',
            'permissions' => [
                'product.create' => true,
                'product.update' => true,
                'product.publish' => true,
            ]
        ]);
        $viewer = Role::create([
            'name' => 'Nhân viên', 
            'slug' => 'employee',
            'permissions' => [
                'product.create' => false,
                'product.update' => false,
                'product.publish' => false,
            ]
        ]);
    }
}
