<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Sadiq Məmmədov',
                'slug' => 'sadiq-memmedov',
                'email' => 'sadiqmemmedov93@mail.ru',
                'password' => bcrypt('sadokolik1!Q'),
                'status' => '1',
                'remember_token' => 'dRSCFFniFeBSoCPfyhoWB9Zg7VChILapvzjOdK82QPRhZr3C7zMcswmL66Zx',
                'created_at' => '2018-06-13 13:41:36',
                'updated_at' => '2019-01-31 16:26:17',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}