<?php

    class FilmModel {
        private $conn;
        public function __construct($connection) {
            $this->conn = $connection;
        }

        public function getFilms($query = null) {
            $url = 'https://swapi.py4e.com/api/films/';
            // Inicializar cURL
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

            $response = curl_exec($ch);

            if ($response === false) {
                echo 'cURL Error: ' . curl_error($ch);
                curl_close($ch);
                return [];
            }
            
            $data = json_decode($response, true);

            if (isset($data['results'])) {
                $films = $data['results'];
    
                if ($query) {
                    $films = array_filter($films, function ($film) use ($query) {
                        return stripos($film['title'], $query) !== false;
                    });
                }
    
                return $films;
            }
            
            return [];
        }
     
        public function saveLog(){

            // $param_save('');

            // return $var_teste;

        }
    }
