<?php
// Declare all possible char
$alpha   = range('a', 'z');
$Alpha   = range('A', 'Z');
$number  = range(0, 9);
$special = ['.','@','#','$','%','^','&','*','(',')','-','_','+','=',',','<','>',';',':','~','"',"'",'/','\\','!'];


$passwordCreationLength = 1;
$matchPassword = "b";
$generatedPassword = "";
$passwordLoopIndexRecord = [];

$alphaCount   = count($alpha)   - 1;
$AlphaCount   = count($Alpha)   - 1;
$numberCount  = count($number)  - 1;
$specialCount = count($special) - 1;


for($loop = 0; $loop < ($passwordCreationLength ?? $loop + 1); $loop++){
    sleep(1);
    echo "hello $loop";

    if(empty($passwordLoopIndexRecord)) $passwordLoopIndexRecord[] = 0;
    if(!$generatedPassword) $generatedPassword = $alpha[0];

    foreach($alpha as $alphaIndex => $alphaValue){
        
    }

    $generatedPassword[$loop] = $alpha[0];
    $passwordLoopIndexRecord[] = 0;
}