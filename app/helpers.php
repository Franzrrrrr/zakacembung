<?php

use Illuminate\Support\Str;

function generateArcPath($progress)
{
    // Progress dalam derajat dari 0 sampai 180
    $angle = ($progress / 100) * 180;

    // Konversi ke radian
    $radian = deg2rad($angle);

    // Radius lingkaran
    $r = 40;

    // Hitung koordinat akhir dari arc
    $x = 50 + $r * cos(M_PI - $radian);
    $y = 50 - $r * sin(M_PI - $radian);

    $largeArcFlag = $angle > 90 ? 1 : 0;

    return "M 10 50 A 40 40 0 $largeArcFlag 1 $x $y";
}
