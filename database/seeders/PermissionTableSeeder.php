<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions=[
            'create article',
            'view article',
            'update article',
            'delete article',
            'create tenant',
            'view tenant',
            'create category',
            'view category',
            'edit category',
            'delete category',
            'create author',
            'view author',
            'edit author',
            'delete author',
        ];

        foreach($permissions as $permission){
            Permission::findOrCreate($permission);
        }
    }
}
