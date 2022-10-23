<?php

    require "db-functions.php";

    $nbName = countName();

    if(!empty($_POST['name'])){
        $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_STRING);
        if ($nbName['nbName'] < 50) {
            if ($name) {
            $name = insertName($name);
            }
        }
        
        header("Location: index.php");
    } else header("Location: index.php");
?>