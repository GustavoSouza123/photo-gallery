<?php
    require '../config/config.php';
    $data = [];

    $uploadDir = '../assets/photos/';
    $image = $uploadDir.basename($_FILES['photo']['name']);
    $imageTmpName = $_FILES['photo']['tmp_name'];
    $creationDate = date("Y-m-d H:i:s");

    if(move_uploaded_file($imageTmpName, $image)) {
        $data['success'] = true;
    } else {
        $data['success'] = false;
        $data['error'] = 'There was an error uploading the photo';
    }

    if($data['success']) {
        try {
            $sql = $pdo->prepare("INSERT INTO `photos` VALUES (null, ?, ?)");    
            $sql->execute(array($image, $creationDate));
        } catch(PDOException $e) {
            $data['success'] = false;
            $data['error'] = $e->getMessage();
        }
    }

    die(json_encode($data));
?>
