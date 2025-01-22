<?php

    require_once 'controllers/starWarsController.php';

    $controller = new starWarsController();

    $action_format = null;
    if ( isset( $_GET ) && isset( $_GET['action'] ) ){
        $action_format = explode( '=', $_GET['action'] );
    }else{
        $action_format = [];
    }

    if (isset($action_format[0])) {
        $action = $action_format[0];
        if (method_exists($controller, $action)) {
            $controller->$action();
        } else {
            echo "Invalid action: $action";
        }
    } else {
        $controller->showFilmCatalog();
    }
