#!/usr/bin/php -d phar.readonly=off
<?php 
// ini_set('phar.readonly',"off");
// print(ini_get('phar.readonly'));die();

require_once(__DIR__."/vendor/autoload.php");

echo "from phar.php";

$phar = new Phar(__DIR__."/testt.phar");
$phar->addFile('test.php', 'index.php');
// $phar = $phar->convertToExecutable(Phar::PHAR); 
// $phar->setStub($phar->createDefaultStub("phart.php"));

dd($phar);

// var_dump($phar);