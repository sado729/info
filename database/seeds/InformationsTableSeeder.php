<?php

use Illuminate\Database\Seeder;

class InformationsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('informations')->delete();
        
        \DB::table('informations')->insert(array (
            0 => 
            array (
                'id' => 1,
                'facebook' => NULL,
                'twitter' => NULL,
                'youtube' => NULL,
                'google' => NULL,
                'linkedin' => NULL,
                'instagram' => NULL,
                'pinterest' => NULL,
                'about' => NULL,
                'address' => NULL,
                'email' => 'info@telefoncu.az',
                'phone' => '0553100000',
            ),
        ));
        
        
    }
}