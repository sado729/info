<?php

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('permissions')->delete();
        
        \DB::table('permissions')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'manage_accounts',
            ),
            1 => 
            array (
                'id' => 10,
                'name' => 'manage_albom',
            ),
            2 => 
            array (
                'id' => 9,
                'name' => 'manage_brand',
            ),
            3 => 
            array (
                'id' => 5,
                'name' => 'manage_category',
            ),
            4 => 
            array (
                'id' => 8,
                'name' => 'manage_certificate',
            ),
            5 => 
            array (
                'id' => 14,
                'name' => 'manage_contact',
            ),
            6 => 
            array (
                'id' => 12,
                'name' => 'manage_faq',
            ),
            7 => 
            array (
                'id' => 13,
                'name' => 'manage_file',
            ),
            8 => 
            array (
                'id' => 3,
                'name' => 'manage_gallery',
            ),
            9 => 
            array (
                'id' => 16,
                'name' => 'manage_logo',
            ),
            10 => 
            array (
                'id' => 6,
                'name' => 'manage_menu',
            ),
            11 => 
            array (
                'id' => 4,
                'name' => 'manage_news',
            ),
            12 => 
            array (
                'id' => 11,
                'name' => 'manage_partner',
            ),
            13 => 
            array (
                'id' => 7,
                'name' => 'manage_product',
            ),
            14 => 
            array (
                'id' => 2,
                'name' => 'manage_settings',
            ),
            15 => 
            array (
                'id' => 15,
                'name' => 'manage_slider',
            ),
            16 => 
            array (
                'id' => 17,
                'name' => 'manage_video',
            ),
        ));
        
        
    }
}