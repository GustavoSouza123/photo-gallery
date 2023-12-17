<?php
    require '../config/config.php';
    $data = [];

    $sql = $pdo->prepare("SELECT * FROM `photos`");
    $sql->execute();
    if($sql->rowCount() > 0) {
        $data['photos'] = $sql->fetchAll(PDO::FETCH_ASSOC);
        $data['success'] = true;
    } else {
        $data['error'] = 'No uploaded photos';
    }

    die(json_encode($data));
?>
