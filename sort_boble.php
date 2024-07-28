<?php
function bubble_sort(&$array, $order = 1) // 1 = asc 2 = desc
{
    $array_index = count($array) - 1;

    if(!($array_index-- >= 1)){
        echo "Array not have sufficent values";
        die();
    }

    foreach(range(0,$array_index) as $loop){

        $selected_index = 0;
        $swap_from      = 0;
        $swap_to        = 0;

        foreach(range(0,$array_index) as $index){
            if(!isset($array[$index])) continue;

            $first_value = $array[$selected_index++];
            $next_value  = $array[$selected_index];

            if($first_value == $next_value) continue;
            $logic = $order == 1 
                   ? $first_value > $next_value   // ascending sort logic
                   : $first_value < $next_value ; // descending sort login

    
            if(!$logic) continue; // ignore if already sorted
            if( $logic) {
                $swap_to   = $next_value;
                $swap_from = $first_value;
                $array[--$selected_index] = $swap_to;
                $array[++$selected_index] = $swap_from;
            }
        }
    }
}
$array  = [];

foreach(range(0,10) as $index) $array[$index] = rand(1, 100000);


$start = microtime(true);
bubble_sort($array, 1);
// sort($array);
$end   = microtime(true);

echo json_encode($array);
echo $end - $start;
