<?php
namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(15)->create();

        // User::factory()->create([
        //     'firstname' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            RoleTableSeeder::class,
            PermissionTableSeeder::class,
            AssignPermissionToRolesSeeder::class,

        ]);

        // $this->call(ArticleSeeder::class);
        // $this->call(AuthorSeeder::class);
        // $this->call(CategorySeeder::class);
    }
}
