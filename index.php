<?php require 'config/config.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Photo Gallery</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css" /> <!-- fancybox css file -->
    <link href="assets/css/style.css" rel="stylesheet" /> <!-- main css file -->
</head>
<body>
    <header>
        <div class="content">
            <h1>My Photo Gallery</h1>
            <div class="admin"><a href="admin/">Admin</a></div>
        </div>
    </header>

    <main>
        <section>
            <div class="gallery"></div>
        </section>
    </main>

    <footer>
        © 2023 Gustavo Souza
    </footer>

    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script> <!-- jQuery API -->
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script> <!-- fancybox js file -->
    <script src="assets/js/script.js"></script> <!-- main script file -->
</body>
</html>
