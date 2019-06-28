<?php

use Illuminate\Database\Seeder;

class NewsTranslationsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('news_translations')->delete();
        
        \DB::table('news_translations')->insert(array (
            0 => 
            array (
                'id' => 1,
                'news_id' => 1,
                'locale' => 'az',
                'slug' => 'personel-devam-kontrol-sistemi',
                'name' => 'Personel Devam Kontrol Sistemi',
                'text' => '<p>G&ouml;zc&uuml;PDKS ve TS-5804 Parmak izi cihazı ile birlikte&nbsp;</p>',
            ),
            1 => 
            array (
                'id' => 2,
                'news_id' => 1,
                'locale' => 'en',
                'slug' => 'personel-devam-kontrol-sistemi',
                'name' => 'Personel Devam Kontrol Sistemi',
                'text' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'news_id' => 1,
                'locale' => 'tr',
                'slug' => 'personel-devam-kontrol-sistemi',
                'name' => 'Personel Devam Kontrol Sistemi',
                'text' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'news_id' => 1,
                'locale' => 'ru',
                'slug' => 'personel-devam-kontrol-sistemi',
                'name' => 'Personel Devam Kontrol Sistemi',
                'text' => NULL,
            ),
        ));
        
        
    }
}