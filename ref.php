<?php
$c = 10;
$a = [&$c,10];

foreach(range(0,4) as $v)
{
    $b = $v;
    $a[] = &$b;
    //unset($b);
}
unset($b);
$b = 999;
$c = 100;
echo json_encode($a);