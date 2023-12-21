<?php
    session_start();
    date_default_timezone_set('America/Sao_Paulo');

    /* database connection */ 
    define('HOST', 'localhost');
    define('USERNAME', 'root');
    define('PASSWORD', '');
    define('DATABASE', 'photo_gallery');

    require 'connection.php';
?>
