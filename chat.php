<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chats</title>

    <link href="./include/style.css" rel="stylesheet">
    <link href="./include/chat.css" rel="stylesheet">

    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <!-- font-awesome icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    
</head>
<body>


<!-- Header -->
<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
  <div class="container-fluid justify-content-end">
    <div class="font-size-14">
      <div class="dropdown">
          <a href="#" data-bs-toggle="tooltip" data-bs-placement="right">
          </a>
          <a href="#" class="d-flex align-items-center text-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="./assets/user.png" alt="" width="32" height="32" class="rounded-circle me-2">
            <strong class="font-rubik">Account</strong>
          </a>
          <ul class="dropdown-menu dropdown-menu-light text-small shadow bg-light font-rubik" aria-labelledby="dropdownUser1">  
            <li><a class="dropdown-item" href="./system.php" name="logout">Sign out</a></li>
          </ul>
      </div>
    </div>
  </div>
</nav>

    <?php 
    include('./systemconn.php');

    if (Admin()) {   
    
    ?>
<!-- Admin's Dashboard -->
<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block sidebar collapse vh-100 sidenav bg-color">
  <div>
    <a class="navbar-brand" href="./dashboard.php"><img src="./assets/logo.png" width="100" height="50"></a>    
    <ul class="nav flex-column font-baloo" style="font-size: 18px;">
      <li class="nav-item">
        <a class="nav-link active text-dark" aria-current="page" href="./dashboard.php">
          <i class="fa fa-tachometer"></i>
          Dashboard
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-dark" href="./event.php">
          <i class="fa fa-calendar-o"></i>
          Events
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-dark" href="./user.php">
          <i class="fa fa-user-o"></i>
          Users
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-light" href="./chat.php">
          <i class="fa fa-commenting-o"></i>
          Chats
        </a>
      </li>
    </ul>
  </div>
</nav>

      <?php }

      else{
      }

      ?>
      <?php 

      if (User())  { 

      ?>
<!-- User's Dashboard -->  
<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block sidebar collapse vh-100 sidenav bg-color">
  <div>
    <a class="navbar-brand" href="./dashboard.php"><img src="./assets/logo.png" width="100" height="50"></a>    
    <ul class="nav flex-column font-baloo" style="font-size: 18px;">
      <li class="nav-item">
        <a class="nav-link active text-dark" aria-current="page" href="./dashboard.php">
          <i class="fa fa-tachometer"></i>
          Dashboard
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-dark" href="./event.php">
          <i class="fa fa-calendar-o"></i>
          Events
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-light" href="./chat.php">
          <i class="fa fa-commenting-o"></i>
          Chats
        </a>
      </li>
    </ul>
  </div>
</nav>

      <?php

      }
      else {

      }

      ?>

<div class="main">
  <?php
    if(isset($_SESSION['message'])): ?>
    <div class="alert alert-<?=$_SESSION['msg_type']?>">
        <?php
        echo $_SESSION['message'];
        unset($_SESSION['message']);
        ?>
    </div>
    <?php endif ?>
    <div class="container">
<h3 class=" text-center">Chats</h3>
<div class="messaging">
      <div class="inbox_msg">
        <div class="inbox_people">
          <div class="headind_srch">
            <div class="recent_heading">
              <h4>Users</h4>
            </div>
            <div class="srch_bar">
              <div class="stylish-input-group">
                <input type="text" id="usersearch" class="form-control" placeholder="Type here to search">                
              </div>
            </div>
          </div>
          <form action="chat.php" method="POST">
          <input type="text" name="userid" id="userid" class="form-control" hidden>
          <div class="inbox_chat">
            <?php
            $connection = mysqli_connect("localhost","root","");
            $db = mysqli_select_db($connection,'event management');
            $id= $_SESSION['user']['id'];
            $query = "SELECT * FROM system WHERE id!='$id'";
            $query_run = mysqli_query($connection, $query);          

            if($query_run){
                foreach($query_run as $row)
                {
            ?> 
            <div class="chat_list">
              <div class="chat_people">
                <div id="getid" class="chat_ib">
                  <h5 hidden><?php echo $row ['id'];?></h5>
                  <h5 id="userhere"><strong><i class="fa fa-hashtag"></i><?php echo $row ['id'];?></strong>&nbsp;<?php echo $row ['username'];?><span><button type='submit' title='chat' class='btn btn-primary rounded-pill chatbtn' name='chat' style='width: 50px;'><i class='fa fa-comments-o'></i></button></span></h5>
                </div>
              </div>
            </div>
            <?php
                    }
               }
               else
               {
                  echo "NO record found";
                }

            ?>
          </div>
          </form>
        </div>
        <div class="mesgs">
          <div class="msg_history" id="refresh">
          <?php
            $connection = mysqli_connect("localhost","root","");
            $db = mysqli_select_db($connection,'event management');

            if(isset($_POST['chat'])){
              unset($_SESSION['userid']);
              $sender = $_POST['userid'];
              if($sender == ""){
                $sender = 0;
              }           
              else{                
                $_SESSION['useridsearch'] = $sender;
              }                    
            }
            else if(isset($_SESSION['userid'])){
              unset($_SESSION['useridsearch']);
              $sender = $_SESSION['userid'];
            }
            else if(isset($_SESSION['useridsearch'])){
              $sender = $_SESSION['useridsearch'];
            }
            else{
              $sender = 0;
            }  
            $me= $_SESSION['user']['id'];
            $query = "SELECT * FROM chat WHERE (touser='$me' AND fromuser='$sender') OR (touser='$sender' AND fromuser='$me') ORDER BY id DESC";
            $query_run = mysqli_query($connection, $query);          

            if($query_run){
                foreach($query_run as $row)
                {
                  if($row ['touser']=="$me"){
            ?>             
                  <div class="incoming_msg">
                    <div class="received_msg">
                      <div class="received_withd_msg">
                        <p><?php echo $row ['message'];?></p>
                      </div>
                    </div>
                  </div><br>
                  <?php
                  }
                  else {
                  ?>
                  <div class="outgoing_msg">
                    <div class="sent_msg">
                      <p><?php echo $row ['message'];?></p>
                    </div>
                  </div><br>                  
            <?php
                  }
                    }
               }
               else
               {
                  echo "NO record found";
                }
            
            ?>
          </div>
          <div class="type_msg">
            <div class="input_msg_write">
              <form action="chatconn.php" method="POST">
                <input type="text" name="sender" value="<?php echo $_SESSION['user']['id'];?>" class="form-control" hidden>
                <input type="text" name="receiver" value="<?php echo $sender;?>" class="form-control" hidden>
                <input type="text" class="write_msg" name="message" placeholder="Type a message" />
                <button class="msg_send_btn" type="submit" name="send"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
              </form>
            </div>
          </div>
        </div>
      </div>       
    </div></div>
 
</div>

<!-- Bootstrap Javascript-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous"></script>  

<script>
$(document).ready(function(){
  $("#usersearch").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#userhere h5").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>

<script> 
$(document).ready(function(){
setInterval(function(){
      $("#refresh").load(window.location.href + " #refresh" );
}, 3000);
});
</script>

<script>

$(document).ready(function(){
    $('.chatbtn').on('click', function(){
        

        $div = $(this).closest('#getid');

        var data = $div.children("h5").map(function() {
            return $(this).text();      

        }).get();

        console.log(data);

        $('#userid').val(data[0]);
    });
});

</script>

</body>
</html>