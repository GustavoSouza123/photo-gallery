<?php
    require '../config/config.php';    

    // logout
    if(isset($_GET['logout'])) {
        unset($_SESSION['gallery-username']);
        unset($_SESSION['gallery-password']);
    }

    // login verification
    if(isset($_POST['login'])) {
        if($_POST['username'] != '' && $_POST['password'] != '') {
            $_SESSION['gallery-username'] = $_POST['username'];
            $_SESSION['gallery-password'] = $_POST['password'];
        }
    }

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
        if($sql->rowCount() > 0) {
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
    <link href="style.css" rel="stylesheet" /> <!-- main css file -->
</head>
<body>
    <?php
        if(!isset($_SESSION['gallery-username']) || !isset($_SESSION['gallery-password']) || $_SESSION['gallery-username'] != 'admin' || $_SESSION['gallery-password'] != '1234') {
    ?>

    <header>
        <h1>Login</h1>
    </header>

    <div class="login">
        <form method="post" action="">
            <input type="text" name="username" placeholder="username" />
            <input type="password" name="password" placeholder="password" />
            <input type="submit" name="login" value="Login" />
        </form>
    </div>

    <?php } else { ?>

    <header>
        <h1>Admin Panel</h1>
    </header>

    <div class="admin-panel">
        <?= $photos ?>
        <div class="add-photo">
            <label for="photo">+</label>
            <input type="file" name="photo" id="photo" accept=".jpg, .jpeg, .png" />
        </div>
        <div class="links">
            <a href="../">Back to photo gallery</a>
            <a href="?logout">Logout</a>
        </div>
    </div>

    <?php } ?>

    <footer>
        © 2023 Gustavo Souza
    </footer>

    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script> <!-- jQuery API -->
    <script src="script.js"></script> <!-- main script file -->
</body>
</html>
