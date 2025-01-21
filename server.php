<?php

$socket = stream_socket_server("tcp://127.0.0.1:8000", $errno, $errstr);

if (!$socket) {
    die("Could not listen on $ip:$port\n");
}

while (true) {
    $client = stream_socket_accept($socket);
    if ($client === false) {
        echo "Error accepting connection\n";
        continue;
    }

    while ($data = fgets($client)) {

        fwrite($client, $data);
    }

     $response = "Hello, name!"; 
     
     $header = fclose($client);
     header($header);
}

fclose($socket);
