<?php

    function connexion(){
        try{
            return new PDO(
                "mysql:host=127.0.0.1:3306;dbname=argonautes",
                "root",
                "",
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
                ]
            );
        }
        catch(PDOException $error) {
            echo "<mark>",$error,"</mark>";
        }
        return $pdo;
    }

    function findAll() {
        $pdo = connexion();
        $stmt = $pdo->query ("SELECT * 
                            FROM name
                            ");  
        return $stmt->fetchAll();
    }

    function insertName($name) {
        $pdo = connexion();
        $stmt = $pdo->prepare ("INSERT INTO name (name)
                                VALUES (:name);
                            ");
        $stmt->bindParam(":name", $name, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    function countName(){
        $pdo = connexion();
        $stmt = $pdo->prepare ("SELECT COUNT(id) AS nbName
                                FROM name
                            ");
        $stmt->execute();
        return $stmt->fetch();
    }
?>