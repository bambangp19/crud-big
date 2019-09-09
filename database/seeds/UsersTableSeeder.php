<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = \App\Role::where('name','Admin')->first();
        $user = new \App\User();
        $user->name="Admin";
        $user->email="admin@gmail.com";
        $user->password= bcrypt('secret');
        $user->random_pass= "secret";
        $user->role_id=$role->id;
        $user->save();
    }
}
