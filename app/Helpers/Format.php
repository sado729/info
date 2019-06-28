<?php
/**
 * Created by PhpStorm.
 * User: TexnoBaku
 * Date: 8/30/2018
 * Time: 1:27 AM
 */
namespace App\Helpers;

class Format
{
    /**
     * Format bytes to kb, mb, gb, tb
     *
     * @param  integer $size
     * @param  integer $precision
     * @return integer
     */
    public static function formatBytes($bytes)
    {
        $units = ['b', 'Kb', 'Mb', 'Gb', 'Tb', 'Pb'];

        for ($i = 0; $bytes > 1024; $i++) {
            $bytes /= 1024;
        }

        return round($bytes, 2) . ' ' . $units[$i];
    }
}