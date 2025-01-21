<?php

function calculate($dob)
{
    if(!(strtotime($dob) && preg_match('%^\d{4}-\d{2}-\d{2}$%', $dob))){
        return -1;
    }

    $result = 0;

    // [ $y, $m, $d ] = explode("-", $dob);
    // foreach(range(0, strlen($y)) as $num) $result += $y[$num] ?? 0;
    // foreach(range(0, strlen($m)) as $num) $result += $m[$num] ?? 0;
    // foreach(range(0, strlen($d)) as $num) $result += $d[$num] ?? 0;

    $all_digit = str_replace("-","", $dob);
    // foreach(range(0, strlen($all_digit)) as $num) $result += $all_digit[$num] ?? 0;
    return array_sum(str_split($all_digit));
}

echo calculate("1999-11-11");
