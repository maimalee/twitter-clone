<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       User::query()->create([
           'first_name' => 'Anas',
           'last_name' => 'Abdussalam',
           'username' => 'Maimalee@admin',
           'email' => 'anas@tweet.admin',
           'role' => 'admin',
           'password' => Hash::make(1234),
       ]);
       User::query()->create([
           'first_name' => 'Ahmad',
           'last_name' => 'Kwaro',
           'username' => 'ahmad@user',
           'email' => 'ahmad@tweet.user',
           'role' => 'user',
           'password' => Hash::make(1234),
       ]);
       User::query()->create([
           'first_name' => 'ykb',
           'last_name' => 'kwaro',
           'username' => 'ykb@user',
           'email' => 'ykb@tweet.user',
           'role' => 'user',
           'password' => Hash::make(1234),
       ]);
       User::query()->create([
           'first_name' => 'Anas',
           'last_name' => 'Abdussalam',
           'username' => 'Maimalee@user',
           'email' => 'anas@tweet.user',
           'role' => 'user',
           'password' => Hash::make(1234),
       ]);

       User::factory(16)->create();

    }
}
