<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('roles')->delete();
        
        \DB::table('roles')->insert(array (
            0 => 
            array (
                'id' => 2,
                'name' => 'admin',
            ),
            1 => 
            array (
                'id' => 1,
                'name' => 'developer',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'editor',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'store',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'user',
            ),
        ));
        
        
    }
}