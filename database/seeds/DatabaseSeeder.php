<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);

        DB::table('permissions')->insert([
            [
                'name' => 'View Dashboard',
                'guard_name' => 'web'
            ],
            [
                'name' => 'View Students',
                'guard_name' => 'web'
            ],
            [
                'name' => 'Create Student',
                'guard_name' => 'web'
            ],
            [
                'name' => 'Edit Student',
                'guard_name' => 'web'
            ],
            [
                'name' => 'Delete Student',
                'guard_name' => 'web'
            ],

            [
                'name' => 'View products',
                'guard_name' => 'web'
            ],
            [
                'name' => 'VCreate product',
                'guard_name' => 'web'
            ],
        ]);
    }
}
