<?php

    $conn = new mysqli('db', 'root', 'test', 'star_wars');
    $isConnected = false;

    if ($conn->connect_error) {
        $isConnected = false;
        var_dump('Erro ao conectar ao banco de dados: ' . $conn->connect_error);
    } else {
        $isConnected = true;
        var_dump('Conectado ao banco de dados');
    }
