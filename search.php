<?php
    $mysql = new mysqli('localhost','root','','test');
    if(isset($_POST['search_btn'])){
        $search = $_POST['search'];
        $search_com = $mysql-> query("SELECT * FROM `comments` WHERE `body` LIKE '%$search%'");
    }

    $new = $search_com->fetch_assoc();
    if(strlen($search) < 3){
        echo "Введите больше информации";
    }else{
         print_r (json_encode($new['body']));
    }
    exit();
    $mysql-> close();

?>
