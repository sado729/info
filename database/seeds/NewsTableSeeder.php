<?php

use Illuminate\Database\Seeder;

class NewsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('news')->delete();
        
        \DB::table('news')->insert(array (
            0 => 
            array (
                'id' => 1,
                'image' => 'personel-devam-kontrol-sistemi-123215.jpg',
                'view_count' => 0,
                'status' => '1',
                'order' => 1,
                'created_at' => '2018-09-24 08:44:37',
                'updated_at' => '2018-09-24 08:47:36',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}