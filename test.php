<?php
    function storagePath(string $v): void
    {
        $value = $v;
        $size = strlen($v);
        $lastIndex = $v[$size - 1];

        if($lastIndex == "/") {
            /** @var string $value */
            $value = substr_replace($v, "", $size - 1, 1);
        }
        echo $value;
    }
    
    storagePath("profile/");
?>
