<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::insert(
            [['role'=>'user'],
            ['role'=>'admin'],
            ['role'=>'cleaner'],
            ['role'=>'service personal'],]
        );
    }
}
