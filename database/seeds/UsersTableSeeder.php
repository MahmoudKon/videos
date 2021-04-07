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
        \App\Models\User::create([
            'name'=> 'admin',
            'email' => 'admin@website.com',
            'password' => bcrypt('123'),
            'group' => 'admin'
        ]);
    }//end of run

}//end of seeder
