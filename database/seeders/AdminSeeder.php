<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\Models\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user=User::create([
            'name'=>'admin',
            'username'=>'admin',
            'email'=> 'admin@gmail.com',
            'password'=> 'password',
        ]);

        $user->assignRole('admin');
        // $role->givePermissionTo('showing user');
        // $role->hasPermissionTo('showing user');
    }
}
