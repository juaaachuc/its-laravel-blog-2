<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\Hash;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $adminRole = Role::create(['name' => 'admin']);
        $writeRole = Role::create(['name' => 'writer']);
        
        $createPostPermission = Permission::create(['name' => 'create posts']);
        $editPostPermission = Permission::create(['name' => 'update posts']);
        $deletePostPermission = Permission::create(['name' => 'delete posts']);
        $publishPostPermission = Permission::create(['name' => 'publish posts']);

        $adminRole->givePermissionTo($createPostPermission);
        $adminRole->givePermissionTo($editPostPermission);
        $adminRole->givePermissionTo($deletePostPermission);
        $adminRole->givePermissionTo($publishPostPermission);

        $writeRole->givePermissionTo($createPostPermission);
        $writeRole->givePermissionTo($editPostPermission);

        User::factory()->create([
            'name' => 'Juan Chuc',
            'email' => 'juaachuc@uacam.mx',
            'password' => Hash::make('pepitoconejo'),
        ])->assignRole('admin');

        User::factory(10)->create()->each(function ($user) {
            $user->assignRole('writer');
        });

        Post::factory(500)->create();        
    }
}
