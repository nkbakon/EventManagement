<?php

session_start();

$db = mysqli_connect('localhost', 'root', '', 'event management');

if(isset($_POST['update'])) {

  $id = $_POST['update_userid'];
  $email = $_POST ['email'];
  $systype = $_POST ['systype'];
  $status = $_POST ['status'];

    $query = "SELECT * FROM system WHERE email='$email'";
    $query_run = mysqli_query($db, $query);

    if($query_run){
        foreach($query_run as $row)
        {
        $emailcheck = $row ['id'];
        }
    }
    else
    {

    }
    
    if($emailcheck != $id){
        $_SESSION['message'] = "That email already using in the system!";
        $_SESSION['msg_type'] = "danger";
        header('Location: ' . $_SERVER['HTTP_REFERER']);	
    }

    else{
        $query = "UPDATE system SET email='$email', systype='$systype', status='$status' WHERE id='$id'";
        $results = mysqli_query($db, $query);

        $_SESSION['message'] = "Record has been updated!";
        $_SESSION['msg_type'] = "warning";

        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
          
      
}

if(isset($_POST['delete'])){
  $id = $_POST['delete_userid'];

  $query = "DELETE FROM system WHERE id='$id'";
  $results = mysqli_query($db, $query);

  $_SESSION['message'] = "Record has been deleted!";
  $_SESSION['msg_type'] = "danger";

  header('Location: ' . $_SERVER['HTTP_REFERER']);

}

if(isset($_POST['changeusername'])) {

    $id = $_POST['update_userid'];
  
    $username = $_POST ['username'];

    $sql_u = "SELECT * FROM system WHERE username='$username'";
    $res_u = mysqli_query($db, $sql_u);
  
    if (mysqli_num_rows($res_u) > 0) {
        $_SESSION['message'] = "Username already taken!";
        $_SESSION['msg_type'] = "danger";
        header('Location: ' . $_SERVER['HTTP_REFERER']);	
    }
    else {
        $query = "UPDATE system SET username='$username' WHERE id='$id'";
        $results = mysqli_query($db, $query);
  
            $_SESSION['message'] = "Username has been updated!";
            $_SESSION['msg_type'] = "warning";
  
            header('Location: ' . $_SERVER['HTTP_REFERER']);
    }            
        
}

if(isset($_POST['changepassword'])) {

    $id = $_POST['update_passid'];
  
    $currentpass = md5 ($_POST['currentpass']);
    $newpass = $_POST ['newpass'];
    $confirmpass = $_POST ['confirmpass'];
    $password = md5($newpass);

    $sql_p = "SELECT * FROM system WHERE id='$id' and password='$currentpass'";
    $res_p = mysqli_query($db, $sql_p);
  
    if (mysqli_num_rows($res_p) > 0) {
        $query = "UPDATE system SET password='$password' WHERE id='$id'";
        $results = mysqli_query($db, $query);
  
            $_SESSION['message'] = "Password has been updated!";
            $_SESSION['msg_type'] = "warning";
  
            header('Location: ' . $_SERVER['HTTP_REFERER']);	
    }
    else {
        $_SESSION['message'] = "Invalid Current Password!";
        $_SESSION['msg_type'] = "danger";
        header('Location: ' . $_SERVER['HTTP_REFERER']);        
    }            
        
}

?>
