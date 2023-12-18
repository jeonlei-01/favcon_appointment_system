<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Favio Jasso',
            'email' => 'leenunuyaa@gmail.com',
            'role' =>  'admin',
            'password' => '$2y$10$jQrPXQPbpswOcdi/MhisDuTE/CHhzKEjpOS73Gs/FA0S6IL6oPYly', // password
        ]);
    }
}
