<?php

session_start();

$db = mysqli_connect('localhost', 'root', '', 'event management');

if (isset($_POST['send'])) {
    $sender = $_POST ['sender'];
    $receiver = $_POST ['receiver'];
    $message = $_POST ['message'];  

    
      $query = "INSERT INTO chat (fromuser, touser, message) 
          VALUES ('$sender','$receiver','$message')";
      $results = mysqli_query($db, $query);
      header('Location: ' . $_SERVER['HTTP_REFERER']);
  	
}


?>
