<?php

session_start();

$db = mysqli_connect('localhost', 'root', '', 'event management');

if (isset($_POST['save'])) {
    $place = $_POST ['place'];
    $date = $_POST ['date'];
    $time = $_POST ['time'];
    $nop = $_POST ['nop'];
    $description = $_POST ['description'];
    $addby = $_POST ['addby'];

    $query = "INSERT INTO event (place, date, time, nop, description, addby) 
        VALUES ('$place','$date','$time','$nop', '$description', '$addby')";
    $results = mysqli_query($db, $query);
    $_SESSION['message'] = "Record has been saved!";
    $_SESSION['msg_type'] = "success";
    header('Location: ' . $_SERVER['HTTP_REFERER']);
  	
}


if(isset($_POST['update'])) {

    $id = $_POST['update_eventid'];
    $place = $_POST ['place'];
    $date = $_POST ['date'];
    $time = $_POST ['time'];
    $nop = $_POST ['nop'];
    $description = $_POST ['description'];

    $query = "UPDATE event SET place='$place', date='$date', time='$time', nop='$nop', description='$description' WHERE id='$id'";
    $results = mysqli_query($db, $query);

    $_SESSION['message'] = "Record has been updated!";
    $_SESSION['msg_type'] = "warning";

    header('Location: ' . $_SERVER['HTTP_REFERER']);
    
          
      
}

if(isset($_POST['delete'])){
  $id = $_POST['delete_eventid'];

  $query = "DELETE FROM event WHERE id='$id'";
  $results = mysqli_query($db, $query);

  $_SESSION['message'] = "Record has been deleted!";
  $_SESSION['msg_type'] = "danger";

  header('Location: ' . $_SERVER['HTTP_REFERER']);

}

?>
