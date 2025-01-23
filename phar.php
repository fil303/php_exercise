#!/usr/bin/php -d phar.readonly=off
<?php 
// ini_set('phar.readonly',"off");
// print(ini_get('phar.readonly'));die();
echo "from phar.php";

$phar = new Phar(__DIR__."/testt.phar");

// var_dump($phar);