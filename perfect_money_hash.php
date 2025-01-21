<?php

$alternate_passphrase = strtoupper(md5("wJ2SJyw5y5p8M1MNzpBUgQXuM"));
echo $alternate_passphrase . "\n";

$passphrase = strtoupper("wJ2SJyw5y5p8M1MNzpBUgQXuM");
$string = "BC1727240049:U40830470:0.01:USD:622084009:U21673351:$alternate_passphrase:1727237222";

$hash = strtoupper(md5($string));
echo $hash;



