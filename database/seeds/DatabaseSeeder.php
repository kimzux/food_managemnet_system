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
                'name' => 'Create product',
                'guard_name' => 'web'
            ],
             [
                'name' => 'Edit product',
                'guard_name' => 'web'
            ],
            
              [
                'name' => 'delete product',
                'guard_name' => 'web'
            ],
              [
                'name' => 'View stock',
                'guard_name' => 'web'
            ],
            [
                'name' => 'Create stock',
                'guard_name' => 'web'
            ],
             [
                'name' => 'Stock detail',
                'guard_name' => 'web'
            ],
             [
                'name' => 'Edit stock',
                'guard_name' => 'web'
            ],
              [
                'name' => 'View choose product',
                'guard_name' => 'web'
            ],
              [
                'name' => 'Choose product',
                'guard_name' => 'web'
            ],
             [
                'name' => 'Order details',
                'guard_name' => 'web'
            ],
             [
                'name' => 'View order details',
                'guard_name' => 'web'
            ],
               [
                'name' => 'Invoice',
                'guard_name' => 'web'
            ],
            [
                'name' => 'Create user',
                'guard_name' => 'web'
            ],
            [
                'name' => 'View users',
                'guard_name' => 'web'
            ],
            [
                'name' => 'Deleta User',
                'guard_name' => 'web'
            ],
            [
                'name' => 'Edit user',
                'guard_name' => 'web'
            ],
            [
                'name' => 'Add user role',
                'guard_name' => 'web'
            ],
            [
                'name' => 'View role',
                'guard_name' => 'web'
            ],
            [
                'name' => 'add role',
                'guard_name' => 'web'
            ],
             [
                'name' => 'delete role',
                'guard_name' => 'web'
            ],
             [
                'name' => 'edit role',
                'guard_name' => 'web'
            ],
             [
                'name' => 'delete stock',
                'guard_name' => 'web'
            ],
        ]);
    }
}
