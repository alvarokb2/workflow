<?php

use Illuminate\Database\Seeder;
use Workflow\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::new_user('123', '123@123.123', '123123');
        User::new_user('qwe', 'qwe@qwe.qwe', 'qweqwe');
    }
}
