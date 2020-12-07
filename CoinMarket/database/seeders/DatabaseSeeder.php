<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Hash;

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
        DB::table('users')->insert([
            'name'     => 'Shashank',
            'email'    => 'shashank@codershood.info',
            'password' => Hash::make('shashank'),
            'mobile'=>'098765432',
            'verified'=>0
        ]);
    }
}
