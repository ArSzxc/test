<?php
    $url_posts ='https://jsonplaceholder.typicode.com/posts';
    
    $posts_data = file_get_contents($url_posts);
    $data = json_decode($posts_data);
    
    $mysql = new mysqli('localhost','root','','test');
   
    foreach($data as $value){
        $userId = $value->userId;
        $id = $value->id;
        $title = $value->title;
        $body = $value->body;

    $mysql-> query("INSERT INTO `posts`(`userId`,`id`,`title`,`body`) 
    VALUES('$userId','$id','$title','$body')");
        }

///////////////////////////////////////////////

        $url_comments ='https://jsonplaceholder.typicode.com/comments';
    
        $comments_data = file_get_contents($url_comments);
        $data = json_decode($comments_data);
       
        foreach($data as $value){
            $postId = $value->postId;
            $id = $value->id;
            $name = $value->name;
            $email = $value->email;
            $body = $value->body;
    
        $mysql-> query("INSERT INTO `comments`(`postId`,`id`,`name`,`email`,`body`) 
        VALUES('$postId','$id','$name','$email','$body')");
}
        
    if(!$mysql){
            echo "Connection failed";
        }else{
         echo "<script>console.log('Загружено Х записей и Y комментариев');</script>";
        }
        
        $mysql->close();

?>