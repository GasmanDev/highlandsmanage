<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;
class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::where('slug', 'manager')->first();
        $viewer = Role::where('slug', 'employee')->first();

        $user1 = User::create([
            'name' => 'Manager', 
            'email' => 'manager@highlands.vn',
            'password' => bcrypt('123456'),
            'sex' => 'Nam',
            'idcard' => '254252134',
            'address' => '02 Nguyễn Đình Chiểu',
        ]);
        $user1->roles()->attach($admin);

        $user2 = User::create([
            'name' => 'Nhân viên 1', 
            'email' => 'employee1@highlands.vn',
            'sex' => 'Nam',
            'idcard' => '254652134',
            'address' => '02 Nguyễn Đình Chiểu',
            'password' => bcrypt('123456')
        ]);
        $user2->roles()->attach($viewer);

        $user3 = User::create([
            'name' => 'Nhân viên 2', 
            'email' => 'employee2@highlands.vn',
            'sex' => 'Nữ',
            'idcard' => '264515151',
            'address' => '02 Nguyễn Đình Chiểu',
            'password' => bcrypt('123456')
        ]);
        $user3->roles()->attach($viewer);
    }
}
