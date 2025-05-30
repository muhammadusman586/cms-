<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AssignPermissionToRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    
        $superAdmin=Role::findByName('Super Admin');
        $admin=Role::findByName('Admin');
        $user=Role::findByName('User');
        $tenant=Role::findByName('tenant');


        $allPermissions=Permission::all();

        $superAdmin->syncPermissions($allPermissions);


          $adminPermissions = [
            'create article',
            'view article',
            'update article',
            'delete article',
            'create category',
            'view category',
        ];


        $admin->syncPermissions($adminPermissions);



        $userPermission=[
            'view article'
        ];
        
        $user->syncPermissions($userPermission);
  
        
        $tenantPermission=[
            'view article'
        ];
    
        $tenant->syncPermissions($tenantPermission);
    }
}
