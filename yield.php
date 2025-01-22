<?php
// yield in function make Generator
 function getValue(){
    yield [155];
    yield [155];
 }

 /**
  * @var Generator $b
  */
 $b = getValue();

if($b->next()) echo "next";

 var_dump($b->current());