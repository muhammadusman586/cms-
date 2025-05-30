<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles=[
           'Super Admin',
           'Admin',
           'User',
           'tenant'
           
        ];

        foreach($roles as $role){
             Role::findOrCreate($role);
        }
    }
}
