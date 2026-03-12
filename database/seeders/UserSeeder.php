<?php


namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {

        User::query()->delete();

        User::create([
            'name' => 'Admin',
            'email' => 'admin@realhomes.ph',
            'password' => Hash::make('password'), 
            'user_type' => 'Admin',
        ]);

        User::create([
            'name' => 'Mark Dela Cruz',
            'email' => 'mdelacruz@realhomes.ph',
            'password' => Hash::make('password'), 

            'user_type' => 'Admin',


        ]);

        User::create([
            'name' => 'Johna Marie Legaspi',
            'email' => 'johna@realhomes.ph',
            'password' => Hash::make('password'), 
            'user_type' => 'User',
        ]);

        User::create([
            'name' => 'Brian Mendoza',
            'email' => 'brianmendoza@realhomes.ph',
            'password' => Hash::make('password'), 
            'user_type' => 'User',
        ]);

        User::create([
            'name' => 'Miguel Young',
            'email' => 'myoung@realhomes.ph',
            'password' => Hash::make('password'), 
            'user_type' => 'User',
        ]);

        User::create([
            'name' => 'Cindy Rubio',
            'email' => 'cindyrubio@realhomes.ph',
            'password' => Hash::make('password'), 
            'user_type' => 'User',
        ]);

        User::create([
            'name' => 'jOMAR',
            'email' => 'jflorentino@realhomes.ph',
            'password' => Hash::make('password'), 
            'user_type' => 'User',
        ]);
    }
}
