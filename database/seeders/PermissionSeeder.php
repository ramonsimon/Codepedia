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
        Permission::create(['name' => 'ask questions']);
        Permission::create(['name' => 'edit account']);
        Permission::create(['name' => 'vote']);

        // create roles and assign existing permissions
        $role1 = Role::create(['name' => 'pending']);
        $role2 = Role::create(['name' => 'verified']);
        $role3 = Role::create(['name' => 'user']);
        $role4 = Role::create(['name' => 'admin']);

        $role3->givePermissionTo('ask questions');
        $role4->givePermissionTo('ask questions');
        $role3->givePermissionTo('edit account');
        $role4->givePermissionTo('edit account');
        $role3->givePermissionTo('vote');
        $role4->givePermissionTo('vote');
        // gets all permissions via Gate::before rule; see AuthServiceProvider

        // create demo users
        $user = User::factory()->create([
            'name' => 'Stefan',
            'last_name' => 'Hoekstra',
            'email' => 'stefan.hoekstra02@gmail.com',
            'password' => '$2a$12$VarfVkgCqUH0dQ/dgABcnu368QddcGtbxnE8t7KHBE4hGNSb9aY8G',
        ]);
        $user->assignRole($role4);

        $user = User::factory()->create([
            'name' => 'Ramon',
            'last_name' => 'Visser',
            'email' => 'ramonsimon8@gmail.com',
            'password' => '$2a$12$p5SAIglgniLFlOMxOp3HBuNhTILeobK5ONMH8bOj55mQTsT0duC/u',
        ]);
        $user->assignRole($role4);

        $user = User::factory()->create([
            'name' => 'Quelly',
            'last_name' => 'Steuper',
            'email' => 'q.steuper@gmail.com',
            'password' => '$2a$12$TAgZLf7PxDJQsVYqcgTep.cK7xiR9NIIiGxkQAJ47/AbOjwCsvvqK',
        ]);
        $user->assignRole($role4);

        $user = User::factory()->create([
            'name' => 'pending',
            'last_name' => 'codepedia',
            'email' => 'pending@codepedia.nl',
            'password' => '$2a$12$TAgZLf7PxDJQsVYqcgTep.cK7xiR9NIIiGxkQAJ47/AbOjwCsvvqK',
        ]);
        $user->assignRole($role1);

        $user = User::factory()->create([
            'name' => 'verified',
            'last_name' => 'codepedia',
            'email' => 'verified@codepedia.nl',
            'password' => '$2a$12$TAgZLf7PxDJQsVYqcgTep.cK7xiR9NIIiGxkQAJ47/AbOjwCsvvqK',
        ]);
        $user->assignRole($role2);

        $user = User::factory()->create([
            'name' => 'user',
            'last_name' => 'codepedia',
            'email' => 'user@codepedia.nl',
            'password' => '$2a$12$TAgZLf7PxDJQsVYqcgTep.cK7xiR9NIIiGxkQAJ47/AbOjwCsvvqK',
        ]);
        $user->assignRole($role3);

        $user = User::factory()->create([
            'name' => 'Admin',
            'last_name' => 'codepedia',
            'email' => 'docent@codepedia.nl',
            'password' => '$2a$12$TAgZLf7PxDJQsVYqcgTep.cK7xiR9NIIiGxkQAJ47/AbOjwCsvvqK',
        ]);
        $user->assignRole($role4);


    }
}
