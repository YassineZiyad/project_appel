<?php

namespace Database\Seeders;

use App\Models\Appliction;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Maklad\Permission\Models\Role;
use Maklad\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
       /* Permission::create(['name' => 'create user']);
        Permission::create(['name' => 'create role']);
        Permission::create(['name' => 'create permission']);
        $role = Role::create(['name' => 'admin']);
        $role->givePermissionTo(Permission::all());
        $User = User::create([
            'name'=>'admin',
            'email' =>'admin@admin',
            'password' => Hash::make('password')
        ]);
        $User->assignRole('admin');*/

        Appliction::create([
            'titre'=> 'test',
            'reference'=> 'for test',
            'description'=> 'test test test test test.',
            'etat'=> 'in test'
        ]);
    }
}
