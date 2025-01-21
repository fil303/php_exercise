<?php

// $aa = socket_addrinfo_lookup("127.0.0.1");
// var_dump((array)$aa[1]); die(); // return AddressInfo[]|false

$socket = stream_socket_server("tcp://127.0.0.1:8888", $socketErrorCode, $socketErrorMessage);
// die(get_resource_type($socket)); //stream

if(!$socket){
    die("$socketErrorCode :: $socketErrorMessage");
}

$connection = stream_socket_accept($socket);

if(!$connection){
    die("Connection not established!");
}
$data = null; var_dump(stream_get_meta_data($connection));
while($receiveData = fgets($connection)){
    $data = $receiveData;
}

fwrite($connection, 'Got It!!');
stream_socket_sendto($connection, 'received your data');

fclose($connection);
if($data) echo "\n$data\n";
echo "\ndone\n";