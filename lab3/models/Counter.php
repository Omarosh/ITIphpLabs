<?php

class Counter
{
    public static function getCount()
    {

        $visits = file_get_contents("visits.txt");
        return intval($visits);
    }

    public static function addVisit()
    {
        $new_count = self::getCount() + 1;
        $fp = fopen("visits.txt", "w");
        fwrite($fp, $new_count);
        fclose($fp);
    }
}
