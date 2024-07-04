<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DefaultUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create roles
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $userRole = Role::firstOrCreate(['name' => 'user']);

          // Check if permissions already exist
        $permissions = [
            'edit',
            'delete',
            'create',
        ];

        foreach ($permissions as $permissionName) {
            Permission::firstOrCreate(['name' => $permissionName]);
        }

        $adminRole->syncPermissions($permissions);

        // Create default user
        $user = User::firstOrCreate([
            'name' => 'Edwin ngila',
            'email' => 'edwinngila54@gmail.com',
            'password' => Hash::make('kyalo074'),
        ]);

        if (!$user->hasRole('admin')) {
            $user->assignRole($adminRole);
        }

        // Assign role to the user
        // $user->assignRole($adminRole);
    }
}
