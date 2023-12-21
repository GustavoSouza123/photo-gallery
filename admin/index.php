<?php
    require '../config/config.php';    

    // deleting row
    if(isset($_GET['delete']) && $_GET['delete'] != null) {
        try {
            $sql = $pdo->prepare("DELETE FROM `photos` WHERE id = ?");
            $sql->execute(array($_GET['delete']));
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    }

    // displaying table `photos` data
    try {
        $sql = $pdo->prepare("SELECT * FROM `photos`");
        $sql->execute();
        if($sql->rowCount() > 1) {
            // echo '<pre>';
            // print_r($sql->fetchAll(PDO::FETCH_ASSOC));
            // echo '</pre>';
            $rows = $sql->fetchAll(PDO::FETCH_ASSOC);
            $photos = '';
            $photos .= '<table>';
            $photos .= '<tr><th>id</th><th>photo</th><th>creation_date</th><th>action</th></tr>';
            foreach($rows as $key => $value) {
                $photos .= '<tr><td>'.$value['id'].'</td><td>'.$value['photo'].'</td><td>'.$value['creation_date'].'</td><td class="delete"><a href="?delete='.$value['id'].'">delete</a></td></tr>';
            }
            $photos .= '</table>';
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
        <a href="../">Back to photo gallery</a>
    </div>

    <footer>
        © 2023 Gustavo Souza
    </footer>

    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script> <!-- jQuery API -->
    <script src="script.js"></script> <!-- main script file -->
</body>
</html>
