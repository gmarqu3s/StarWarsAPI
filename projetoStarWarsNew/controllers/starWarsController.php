<?php

    class starWarsController {
        private $conn;
        public function __construct() {
            // require_once 'config/database.php';
            // require_once __DIR__ . '/../config/database.php';
            // global $conn;
            $this->conn = $conn;
        }

        public function showFilmCatalog() {
            require_once 'models/starWarsModel.php';
            $filmModel = new FilmModel($this->conn);
            
            $query = isset($_GET['query']) ? $_GET['query'] : null;
            $films = $filmModel->getFilms($query);

            require_once 'views/listSW.php';
        }

        public function detailsSW() {
            require_once 'models/starWarsModel.php';
        
            if (!isset($_GET['action'])) {
                echo "Action not found.";
                exit;
            }
        
            $id = explode('=', $_GET['action']);
        
            if (!isset($id[2]) || empty($id[2])) {
                echo "Sorry, ID not found.";
                exit;
            } else {
                $filmId = $id[2];
            }
        
            $filmModel = new FilmModel($this->conn);
            $films = $filmModel->getFilms();
            $save_log = $filmModel->saveLog();
        
            if (!$save_log) {
                $erro_log = 'Error saving log.';
            } else {
                $success_log = 'Log saved successfully.';
            }
        
            $film_selected = null;
        
            foreach ($films as $key => $value) {
                if ($value['episode_id'] == $filmId) {
                    $film_selected = $value;
        
                    $film_selected['film_age'] = $this->calculateFilmAge($film_selected['release_date']);

                    if (!empty($film_selected['characters'])) {
                        $film_selected['character_names'] = $this->fetchCharacterNames($film_selected['characters']);
                    }
                }
            }
        
            if ($film_selected === null) {
                echo "Film not found.";
                exit;
            }
        
            require_once 'views/detailsSW.php';
        }
        
        public function saveFilm() {
            $filmModel = new FilmModel($this->conn);
    
            $filmName = "Star Wars: A New Hope";
            $releaseDate = "1977-05-25";
    
            $result = $filmModel->saveLog($filmName, $releaseDate);
            echo $result;
        }

        private function calculateFilmAge($releaseDate) {
            $releaseDate = new DateTime($releaseDate);
            $currentDate = new DateTime();
            $interval = $currentDate->diff($releaseDate);
        
            return "{$interval->y} years, {$interval->m} months, and {$interval->d} days";
        }

        private function fetchCharacterNames($characterUrls) {
            $characterNames = [];
        
            foreach ($characterUrls as $url) {
                $response = file_get_contents($url); // Busca os dados da API
                $characterData = json_decode($response, true);
                if (!empty($characterData['name'])) {
                    $characterNames[] = $characterData['name'];
                }
            }
        
            return $characterNames;
        }

    }
