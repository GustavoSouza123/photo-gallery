<?php
    require '../config/config.php';    
    
    try {
        $sql = $pdo->prepare("SELECT * FROM `photos`");
        $sql->execute();
        if($sql->rowCount() > 1) {
            // echo '<pre>';
            // print_r($sql->fetchAll(PDO::FETCH_ASSOC));
            // echo '</pre>';
            $rows = $sql->fetchAll(PDO::FETCH_ASSOC);
            $photos = '';
            foreach($rows as $key => $value) {
                $photos .= '<div class="photo"><div class="column">id</div>:'.$value['id'].'; <div class="column">photo</div>:'.$value['photo'].'; <div class="column">creation_date</div>:'.$value['creation_date'].'</div>';
            }
        } else {
            $photos = 'No uploaded photos';
        }
    } catch(PDOException $e) {
        echo $e->getMessage();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Photo Gallery</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css" /> <!-- fancybox css file -->
    <link href="style.css" rel="stylesheet" /> <!-- main css file -->
</head>
<body>
    <div class="admin-panel">
        <?= $photos ?>
    </div>

    <footer>
        © 2023 Gustavo Souza
    </footer>

    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script> <!-- jQuery API -->
    <script src="script.js"></script> <!-- main script file -->
</body>
</html>
