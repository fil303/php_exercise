<?php


// Failed ,,, it's not work as plan
$a = 5;

function owner(&$pram){
    $tempPram = $pram;
    $pram = 7;
    unset($pram);
    return function()use($tempPram){
        return $tempPram;
    };
}

function _echoa ($value){
    $value = $value();
    echo $value;
}

_echoa(owner($a));
// unset($a);
echo($a);