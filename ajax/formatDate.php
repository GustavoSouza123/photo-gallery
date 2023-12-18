<?php
    $data = [];

    $str = strtotime($_POST['date']); 
    $data['date'] = date('F j, Y', $str);

    die(json_encode($data));
?>
