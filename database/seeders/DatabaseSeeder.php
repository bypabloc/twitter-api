<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use \App\Models\User;
use \App\Models\Tweet;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $nickname = 'bypabloc';
        $email = 'pacg1991@gmail.com';

        $queryResult = User::where(function($query) {
            $query->where('email', 'pacg1991@gmail.com')
            ->orWhere('nickname', 'bypabloc');
        })
        ->first();
        if (empty($queryResult)) {
            $user = new User;
            $user->name = 'Pablo Contreras';
            $user->nickname = 'bypabloc';
            $user->email = 'pacg1991@gmail.com';
            $user->email_verified_at = now();
            $user->password = Hash::make('123456');
            $user->remember_token = Str::random(10);
            $user->save();
        }

        User::factory(9)->create();
        Tweet::factory(100)->create();
    }
}
