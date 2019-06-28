<?php

use Illuminate\Database\Seeder;

class PermissionRoleTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('permission_role')->delete();
        
        \DB::table('permission_role')->insert(array (
            0 => 
            array (
                'id' => 1,
                'permission_id' => 1,
                'role_id' => 1,
            ),
            1 => 
            array (
                'id' => 2,
                'permission_id' => 1,
                'role_id' => 2,
            ),
            2 => 
            array (
                'id' => 3,
                'permission_id' => 2,
                'role_id' => 1,
            ),
            3 => 
            array (
                'id' => 4,
                'permission_id' => 2,
                'role_id' => 2,
            ),
            4 => 
            array (
                'id' => 5,
                'permission_id' => 3,
                'role_id' => 1,
            ),
            5 => 
            array (
                'id' => 6,
                'permission_id' => 3,
                'role_id' => 2,
            ),
            6 => 
            array (
                'id' => 7,
                'permission_id' => 3,
                'role_id' => 3,
            ),
            7 => 
            array (
                'id' => 8,
                'permission_id' => 4,
                'role_id' => 1,
            ),
            8 => 
            array (
                'id' => 9,
                'permission_id' => 4,
                'role_id' => 2,
            ),
            9 => 
            array (
                'id' => 10,
                'permission_id' => 4,
                'role_id' => 3,
            ),
            10 => 
            array (
                'id' => 11,
                'permission_id' => 5,
                'role_id' => 1,
            ),
            11 => 
            array (
                'id' => 12,
                'permission_id' => 5,
                'role_id' => 2,
            ),
            12 => 
            array (
                'id' => 13,
                'permission_id' => 5,
                'role_id' => 3,
            ),
            13 => 
            array (
                'id' => 14,
                'permission_id' => 6,
                'role_id' => 1,
            ),
            14 => 
            array (
                'id' => 15,
                'permission_id' => 6,
                'role_id' => 2,
            ),
            15 => 
            array (
                'id' => 16,
                'permission_id' => 7,
                'role_id' => 1,
            ),
            16 => 
            array (
                'id' => 17,
                'permission_id' => 7,
                'role_id' => 2,
            ),
            17 => 
            array (
                'id' => 18,
                'permission_id' => 7,
                'role_id' => 3,
            ),
            18 => 
            array (
                'id' => 19,
                'permission_id' => 8,
                'role_id' => 1,
            ),
            19 => 
            array (
                'id' => 20,
                'permission_id' => 8,
                'role_id' => 2,
            ),
            20 => 
            array (
                'id' => 21,
                'permission_id' => 8,
                'role_id' => 3,
            ),
            21 => 
            array (
                'id' => 22,
                'permission_id' => 9,
                'role_id' => 1,
            ),
            22 => 
            array (
                'id' => 23,
                'permission_id' => 9,
                'role_id' => 2,
            ),
            23 => 
            array (
                'id' => 24,
                'permission_id' => 9,
                'role_id' => 3,
            ),
            24 => 
            array (
                'id' => 25,
                'permission_id' => 10,
                'role_id' => 1,
            ),
            25 => 
            array (
                'id' => 26,
                'permission_id' => 10,
                'role_id' => 2,
            ),
            26 => 
            array (
                'id' => 27,
                'permission_id' => 10,
                'role_id' => 3,
            ),
            27 => 
            array (
                'id' => 28,
                'permission_id' => 11,
                'role_id' => 1,
            ),
            28 => 
            array (
                'id' => 29,
                'permission_id' => 11,
                'role_id' => 2,
            ),
            29 => 
            array (
                'id' => 30,
                'permission_id' => 11,
                'role_id' => 3,
            ),
            30 => 
            array (
                'id' => 31,
                'permission_id' => 12,
                'role_id' => 1,
            ),
            31 => 
            array (
                'id' => 32,
                'permission_id' => 12,
                'role_id' => 2,
            ),
            32 => 
            array (
                'id' => 33,
                'permission_id' => 12,
                'role_id' => 3,
            ),
            33 => 
            array (
                'id' => 34,
                'permission_id' => 13,
                'role_id' => 1,
            ),
            34 => 
            array (
                'id' => 35,
                'permission_id' => 13,
                'role_id' => 2,
            ),
            35 => 
            array (
                'id' => 36,
                'permission_id' => 13,
                'role_id' => 3,
            ),
            36 => 
            array (
                'id' => 37,
                'permission_id' => 14,
                'role_id' => 1,
            ),
            37 => 
            array (
                'id' => 38,
                'permission_id' => 14,
                'role_id' => 2,
            ),
            38 => 
            array (
                'id' => 39,
                'permission_id' => 14,
                'role_id' => 3,
            ),
            39 => 
            array (
                'id' => 40,
                'permission_id' => 15,
                'role_id' => 1,
            ),
            40 => 
            array (
                'id' => 41,
                'permission_id' => 15,
                'role_id' => 2,
            ),
            41 => 
            array (
                'id' => 42,
                'permission_id' => 15,
                'role_id' => 3,
            ),
            42 => 
            array (
                'id' => 43,
                'permission_id' => 16,
                'role_id' => 1,
            ),
            43 => 
            array (
                'id' => 44,
                'permission_id' => 16,
                'role_id' => 2,
            ),
            44 => 
            array (
                'id' => 45,
                'permission_id' => 16,
                'role_id' => 3,
            ),
            45 => 
            array (
                'id' => 46,
                'permission_id' => 17,
                'role_id' => 1,
            ),
            46 => 
            array (
                'id' => 47,
                'permission_id' => 17,
                'role_id' => 2,
            ),
            47 => 
            array (
                'id' => 48,
                'permission_id' => 17,
                'role_id' => 3,
            ),
        ));
        
        
    }
}