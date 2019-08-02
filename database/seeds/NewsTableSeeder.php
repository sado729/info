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
                'view_count' => 5,
                'type' => '1',
                'status' => '1',
                'order' => 1,
                'created_at' => '2019-06-28 15:05:30',
                'updated_at' => '2019-07-01 16:34:57',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'view_count' => 4,
                'type' => '1',
                'status' => '1',
                'order' => 2,
                'created_at' => '2019-06-28 15:09:53',
                'updated_at' => '2019-07-01 10:35:45',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'view_count' => 7,
                'type' => '1',
                'status' => '1',
                'order' => 3,
                'created_at' => '2019-06-28 15:10:33',
                'updated_at' => '2019-07-01 16:34:53',
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'view_count' => 7,
                'type' => '1',
                'status' => '1',
                'order' => 4,
                'created_at' => '2019-06-28 15:12:10',
                'updated_at' => '2019-07-23 17:36:58',
                'deleted_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'view_count' => 6,
                'type' => '1',
                'status' => '1',
                'order' => 5,
                'created_at' => '2019-06-28 15:13:29',
                'updated_at' => '2019-07-23 17:36:47',
                'deleted_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'view_count' => 6,
                'type' => '2',
                'status' => '1',
                'order' => 6,
                'created_at' => '2019-07-01 10:28:56',
                'updated_at' => '2019-07-23 17:36:50',
                'deleted_at' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'view_count' => 5,
                'type' => '3',
                'status' => '1',
                'order' => 7,
                'created_at' => '2019-07-04 10:29:56',
                'updated_at' => '2019-07-23 17:36:55',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}