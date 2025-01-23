<?php

require_once(__DIR__."/testt.phar");

$a = new Test();
$a->test();
$b = new MyAttribute();
$b->hey();
echo "i am from index";