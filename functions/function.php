<?php

function calcKol($kolUkupno, $kolProc)
{

    $rez = ($kolUkupno * $kolProc / 100);

    return round($rez, 2);
};

function calcProc($procUkupno, $procKol)
{
    $rez = ($procKol * 100) / $procUkupno;
    return round($rez, 2);
};
