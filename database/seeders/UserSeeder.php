<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'first_name'    => Str::random(10),
            'last_name'     => Str::random(10),
            'username'      => 'student',
            'email'         => 'demo@warwick.ac.uk',
            'password'      => Hash::make('Password1!'),
            'is_staff'      => false,
        ]);
        DB::table('users')->insert([
            'first_name'    => Str::random(10),
            'last_name'     => Str::random(10),
            'username'      => 'marker1',
            'email'         => 'demo1@warwick.ac.uk',
            'password'      => Hash::make('Password1!'),
            'is_staff'      => false,
        ]);
        DB::table('users')->insert([
            'first_name'    => Str::random(10),
            'last_name'     => Str::random(10),
            'username'      => 'marker2',
            'email'         => 'demo2@warwick.ac.uk',
            'password'      => Hash::make('Password1!'),
            'is_staff'      => false,
        ]);
        DB::table('users')->insert([
            'first_name'    => Str::random(10),
            'last_name'     => Str::random(10),
            'username'      => 'marker3',
            'email'         => 'demo3@warwick.ac.uk',
            'password'      => Hash::make('Password1!'),
            'is_staff'      => false,
        ]);
        DB::table('users')->insert([
            'first_name'    => Str::random(10),
            'last_name'     => Str::random(10),
            'username'      => 'marker4',
            'email'         => 'demo4@warwick.ac.uk',
            'password'      => Hash::make('Password1!'),
            'is_staff'      => false,
        ]);
        DB::table('users')->insert([
            'first_name'    => Str::random(10),
            'last_name'     => Str::random(10),
            'username'      => 'marker5',
            'email'         => 'demo5@warwick.ac.uk',
            'password'      => Hash::make('Password1!'),
            'is_staff'      => false,
        ]);
        DB::table('users')->insert([
            'first_name'    => Str::random(10),
            'last_name'     => Str::random(10),
            'username'      => 'marker6',
            'email'         => 'demo6@warwick.ac.uk',
            'password'      => Hash::make('Password1!'),
            'is_staff'      => false,
        ]);
        DB::table('users')->insert([
            'first_name'    => Str::random(10),
            'last_name'     => Str::random(10),
            'username'      => 'marker7',
            'email'         => 'demo7@warwick.ac.uk',
            'password'      => Hash::make('Password1!'),
            'is_staff'      => false,
        ]);
    }
}
