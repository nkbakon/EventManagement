<?php

session_start();

$db = mysqli_connect('localhost', 'root', '', 'event management');

if (isset($_POST['create'])) {
    $username = $_POST ['username'];
    $email = $_POST ['email'];
    $password = $_POST ['password'];
    $cmpassword = $_POST ['cmpassword'];
    $status = $_POST ['status'];
    $regdate = $_POST ['regdate'];
    $password = md5($password);

    $query = "SELECT * FROM system WHERE username='$username'";
    $query_run = mysqli_query($db, $query);

    if($query_run){
      foreach($query_run as $row)
      {
        $usernamecheck = $row ['username'];
        }
    }
    else
    {

    }

    $query = "SELECT * FROM system WHERE email='$email'";
    $query_run = mysqli_query($db, $query);

    if($query_run){
      foreach($query_run as $row)
      {
        $emailcheck = $row ['email'];
        }
    }
    else
    {

    } 	

  	if ($usernamecheck == $username) {
      $_SESSION['message'] = "Username Already Taken!";
      $_SESSION['msg_type'] = "danger";
      header('Location: ' . $_SERVER['HTTP_REFERER']);	
  	}
    else if($emailcheck == $email){
      $_SESSION['message'] = "That email already using in the system!";
      $_SESSION['msg_type'] = "danger";
      header('Location: ' . $_SERVER['HTTP_REFERER']);	
    }
    else{
      $query = "INSERT INTO system (username, email, password, status, systype, regdate) 
          VALUES ('$username','$email','$password','Active', 'User', '$regdate')";
      $results = mysqli_query($db, $query);
      $_SESSION['message'] = "Account Created!";
      $_SESSION['msg_type'] = "success";
      header('Location: ' . $_SERVER['HTTP_REFERER']);
  	}
}

if (isset($_POST['login_btn'])) {

	$username = $_POST['username'];
	$password = md5 ($_POST['password']);
		

		$query = "SELECT * FROM system WHERE username='$username' AND password='$password'";
		$results = mysqli_query($db, $query);

		if (mysqli_num_rows($results) == 1) {
			$logged_in_user = mysqli_fetch_assoc($results);

			if ($logged_in_user['status'] == 'Disabled'){
				$_SESSION['message'] = "Deactivated Account!";

				header("location: system.php");
			}
			else{
            
				if ($logged_in_user['systype'] == 'Admin') {

					$_SESSION['user'] = $logged_in_user;
					header('location: dashboard.php');

				}
				else if ($logged_in_user['systype'] == 'User'){
					$_SESSION['user'] = $logged_in_user;

					header('location: dashboard.php');
				}
			}
		}
		else {
			$_SESSION['message'] = "Invalid Username or Password";

			header("location: system.php");
		}		
}

function Admin()
{
	if (isset($_SESSION['user']) && $_SESSION['user']['systype'] == 'Admin' ) {
		return true;
	}else {
		return false;
	}
}

function User()
{
	if (isset($_SESSION['user']) && $_SESSION['user']['systype'] == 'User' ) {
		return true;
	}else {
		return false;
	}
}



?>
