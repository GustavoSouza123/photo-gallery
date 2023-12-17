<?php
    try {
        $pdo = new PDO('mysql:host='.HOST, USERNAME, PASSWORD);
        $sql = "CREATE DATABASE IF NOT EXISTS `".DATABASE."`;
                USE ".DATABASE.";        
                CREATE TABLE IF NOT EXISTS `photos` (
                    id INT NOT NULL AUTO_INCREMENT,
                    photo VARCHAR(255) NOT NULL,
                    creation_date DATETIME NOT NULL,
                    PRIMARY KEY (id)
                );";
        $pdo->exec($sql);
    } catch(PDOException $e) {
        echo $e->getMessage();
    }
?>
