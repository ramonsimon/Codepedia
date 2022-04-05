<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionSeeder extends Seeder
{
    /**
     * Create the initial roles and permissions.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
//        Permission::create(['name' => 'edit articles']);
//        Permission::create(['name' => 'delete articles']);
//        Permission::create(['name' => 'publish articles']);
//        Permission::create(['name' => 'unpublish articles']);

        // create roles and assign existing permissions
        $role1 = Role::create(['name' => 'pending']);
        $role2 = Role::create(['name' => 'verified']);
        $role3 = Role::create(['name' => 'user']);
        $role4 = Role::create(['name' => 'admin']);
//        $role2->givePermissionTo('publish articles');
        // gets all permissions via Gate::before rule; see AuthServiceProvider

        // create demo users
        $user = \App\Models\User::factory()->create([
            'name' => 'Stefan',
            'email' => 'stefan.hoekstra02@gmail.com',
            'password' => '$2a$12$VarfVkgCqUH0dQ/dgABcnu368QddcGtbxnE8t7KHBE4hGNSb9aY8G',
        ]);
        $user->assignRole($role4);

        $user = \App\Models\User::factory()->create([
            'name' => 'Ramon',
            'email' => 'ramonsimon8@gmail.com',
            'password' => '$2a$12$p5SAIglgniLFlOMxOp3HBuNhTILeobK5ONMH8bOj55mQTsT0duC/u',
        ]);
        $user->assignRole($role4);

        $user = \App\Models\User::factory()->create([
            'name' => 'Quelly',
            'email' => 'q.steuper@gmail.com',
            'password' => '$2a$12$TAgZLf7PxDJQsVYqcgTep.cK7xiR9NIIiGxkQAJ47/AbOjwCsvvqK',
        ]);
        $user->assignRole($role4);

        $user = \App\Models\User::factory()->create([
            'name' => 'pending',
            'email' => 'pending@codepedia.nl',
            'password' => '$2a$12$TAgZLf7PxDJQsVYqcgTep.cK7xiR9NIIiGxkQAJ47/AbOjwCsvvqK',
        ]);
        $user->assignRole($role1);

        $user = \App\Models\User::factory()->create([
            'name' => 'verified',
            'email' => 'verified@codepedia.nl',
            'password' => '$2a$12$TAgZLf7PxDJQsVYqcgTep.cK7xiR9NIIiGxkQAJ47/AbOjwCsvvqK',
        ]);
        $user->assignRole($role2);

        $user = \App\Models\User::factory()->create([
            'name' => 'user',
            'email' => 'user@codepedia.nl',
            'password' => '$2a$12$TAgZLf7PxDJQsVYqcgTep.cK7xiR9NIIiGxkQAJ47/AbOjwCsvvqK',
        ]);
        $user->assignRole($role3);


    }
}
