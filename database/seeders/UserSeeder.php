<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert(array(
            array(
                'name'          => 'Admin 1',
                'user_name'     => 'admin1',
                'password'      => md5('admin1'),
                'created_by'    => 1,
                'updated_by'    => 1
            ),
            array(
                'name'          => 'Admin 2',
                'user_name'     => 'admin2',
                'password'      => md5('admin2'),
                'created_by'    => 2,
                'updated_by'    => 2
            )
        ));
    }
}
