<?php

namespace Hackathon\LevelC;

class RotationString
{
    /**
     * @TODO ! BAM
     *
     * @param $s1
     * @param $s2
     *
     * @return bool|int
     */
    public static function isRotation($s1, $s2)
    {
        for ($i = 0; $i < strlen($s1); ++$i)
        {
            if ($s1 === $s2)
                return true;
            else
                $s1 = substr($s1, 1) . substr($s1, 0, 1);
        }
        return false;
    }

    public static function isSubString($s1, $s2)
    {
        $pos = strpos($s1, $s2);

        return $pos;
    }
}
