<?php

$clientSocket = stream_socket_client("tcp://127.0.0.1:8888", $clientSocketErrorCode, $clientSocketErrorMessage);

// die(get_resource_type($clientSocket)); //stream
if(!$clientSocket){
    die("Error Code : $clientSocketErrorCode :: $clientSocketErrorMessage");
}

fwrite($clientSocket, "hello");
// stream_socket_sendto($clientSocket, 'world!', STREAM_OOB);

$data = null;var_dump(stream_get_meta_data($clientSocket));
if($receiveData = fgets($clientSocket, 32)){
    $data = $receiveData;
}

fclose($clientSocket);
die(var_dump($clientSocket));
if($data) echo "\n$data\n";