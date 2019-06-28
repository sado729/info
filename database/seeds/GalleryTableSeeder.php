<?php

use Illuminate\Database\Seeder;

class GalleryTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('gallery')->delete();
        
        \DB::table('gallery')->insert(array (
            0 => 
            array (
                'id' => 2,
                'imageable_id' => 2,
                'imageable_type' => 'App\\Models\\Product',
                'image' => '34851.jpg',
                'status' => '1',
                'created_at' => '2019-02-02 00:02:44',
                'updated_at' => '2019-02-02 00:04:20',
            ),
            1 => 
            array (
                'id' => 3,
                'imageable_id' => 1,
                'imageable_type' => 'App\\Models\\StoreInfo',
                'image' => '38828.jpg',
                'status' => '1',
                'created_at' => '2019-02-02 00:02:44',
                'updated_at' => '2019-02-02 00:03:39',
            ),
            2 => 
            array (
                'id' => 4,
                'imageable_id' => 1,
                'imageable_type' => 'App\\Models\\Product',
                'image' => '672504.jpg',
                'status' => '0',
                'created_at' => '2019-02-02 09:57:06',
                'updated_at' => '2019-02-03 01:32:24',
            ),
            3 => 
            array (
                'id' => 5,
                'imageable_id' => NULL,
                'imageable_type' => NULL,
                'image' => '899598.jpg',
                'status' => '0',
                'created_at' => '2019-02-02 10:05:39',
                'updated_at' => '2019-02-02 10:05:39',
            ),
            4 => 
            array (
                'id' => 7,
                'imageable_id' => 3,
                'imageable_type' => 'App\\Models\\Product',
                'image' => '900228.jpg',
                'status' => '1',
                'created_at' => '2019-02-02 16:56:22',
                'updated_at' => '2019-02-02 16:56:22',
            ),
            5 => 
            array (
                'id' => 8,
                'imageable_id' => NULL,
                'imageable_type' => NULL,
                'image' => '801063.jpg',
                'status' => '0',
                'created_at' => '2019-02-02 23:15:21',
                'updated_at' => '2019-02-02 23:15:21',
            ),
            6 => 
            array (
                'id' => 9,
                'imageable_id' => NULL,
                'imageable_type' => NULL,
                'image' => '486652.jpg',
                'status' => '0',
                'created_at' => '2019-02-02 23:18:14',
                'updated_at' => '2019-02-02 23:18:14',
            ),
            7 => 
            array (
                'id' => 12,
                'imageable_id' => 4,
                'imageable_type' => 'App\\Models\\Product',
                'image' => '130031.jpg',
                'status' => '1',
                'created_at' => '2019-02-03 01:03:53',
                'updated_at' => '2019-02-03 01:03:53',
            ),
            8 => 
            array (
                'id' => 13,
                'imageable_id' => 4,
                'imageable_type' => 'App\\Models\\Product',
                'image' => '728599.jpg',
                'status' => '1',
                'created_at' => '2019-02-03 01:03:53',
                'updated_at' => '2019-02-03 01:03:53',
            ),
            9 => 
            array (
                'id' => 14,
                'imageable_id' => NULL,
                'imageable_type' => NULL,
                'image' => '237041.jpg',
                'status' => '0',
                'created_at' => '2019-02-03 01:19:34',
                'updated_at' => '2019-02-03 01:19:34',
            ),
            10 => 
            array (
                'id' => 15,
                'imageable_id' => NULL,
                'imageable_type' => NULL,
                'image' => '376161.jpg',
                'status' => '0',
                'created_at' => '2019-02-03 01:19:34',
                'updated_at' => '2019-02-03 01:19:34',
            ),
            11 => 
            array (
                'id' => 16,
                'imageable_id' => NULL,
                'imageable_type' => NULL,
                'image' => '167559.jpg',
                'status' => '0',
                'created_at' => '2019-02-03 01:22:10',
                'updated_at' => '2019-02-03 01:22:10',
            ),
            12 => 
            array (
                'id' => 17,
                'imageable_id' => NULL,
                'imageable_type' => NULL,
                'image' => '348597.jpg',
                'status' => '0',
                'created_at' => '2019-02-03 01:24:51',
                'updated_at' => '2019-02-03 01:24:51',
            ),
            13 => 
            array (
                'id' => 19,
                'imageable_id' => 1,
                'imageable_type' => 'App\\Models\\Temp',
                'image' => '15159.jpg',
                'status' => '1',
                'created_at' => '2019-02-03 01:27:11',
                'updated_at' => '2019-02-03 01:27:11',
            ),
            14 => 
            array (
                'id' => 20,
                'imageable_id' => 1,
                'imageable_type' => 'App\\Models\\Temp',
                'image' => '751651.jpg',
                'status' => '1',
                'created_at' => '2019-02-03 01:27:11',
                'updated_at' => '2019-02-03 01:27:11',
            ),
            15 => 
            array (
                'id' => 21,
                'imageable_id' => NULL,
                'imageable_type' => NULL,
                'image' => '106040.jpg',
                'status' => '0',
                'created_at' => '2019-02-03 12:21:55',
                'updated_at' => '2019-02-03 12:21:55',
            ),
            16 => 
            array (
                'id' => 22,
                'imageable_id' => NULL,
                'imageable_type' => NULL,
                'image' => '308596.jpg',
                'status' => '0',
                'created_at' => '2019-02-03 12:21:55',
                'updated_at' => '2019-02-03 12:21:55',
            ),
            17 => 
            array (
                'id' => 23,
                'imageable_id' => NULL,
                'imageable_type' => NULL,
                'image' => '270702.jpg',
                'status' => '0',
                'created_at' => '2019-02-03 12:41:28',
                'updated_at' => '2019-02-03 12:41:28',
            ),
        ));
        
        
    }
}