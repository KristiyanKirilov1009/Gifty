<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create([
            'name' => 'Super Admin',
            'slug' => Str::slug('Super Admin')
        ]);

        Role::create([
            'name' => 'Admin',
            'slug' => Str::slug('Admin')
        ]);

        Role::create([
            'name' => 'User',
            'slug' => Str::slug('User')
        ]);
    }
}
