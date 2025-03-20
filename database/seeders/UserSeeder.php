<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role = Role::where('slug', 'super-admin')->first();

        $user2 = User::create([
            'name' => 'Kristiyan Kirilov',
            'email' => 'k.vladimirov2004@gmail.com',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('password'),
        ]);

        $user2->roles()->attach($role->id);
    }
}
