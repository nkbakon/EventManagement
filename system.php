<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>log in or sign up </title>

    <link href="./include/style.css" rel="stylesheet">

    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    
</head>

<!-- Create New Account Modal -->
<div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
      
        <h5 class="modal-title" id="exampleModalLabel">Create New Account</h5>
        
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>      
      <form action="systemconn.php" method="POST">
        <div class="modal-body">                    
          <div class="form-group">
            <label>Enter Username</label>
            <input type="text" name="username" class="form-control" placeholder="Enter Username" required>                              
          </div>
          <br>
          <div class="form-group">
            <label>Enter Email Address</label>
            <input type="text" name="email" class="form-control" placeholder="Enter Email" required>                              
          </div>
          <br>
          <div class="form-group">
            <label>Enter Password</label>
            <input type="password" name="password" id="addpassword" class="form-control" placeholder="Enter Password" required>                    
          </div><br>
          <div class="form-group">
            <label>Confirm Password</label>
            <input type="password" name="cmpassword" id="cmpassword" class="form-control" placeholder="Enter Same Password" required>                    
          </div>
          <span id='passwordcheck'></span>
          <br>
          <input type="date" class="form-control" name="regdate" value="<?php echo date('Y-m-d'); ?>" hidden>               
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="width: 100px;">Close</button>
          <button type="submit" name="create" class="btn btn-success passwordvalid" style="width: 100px;">Sign Up</button>                               
        </div>
      </form>
    </div>    
  </div>
</div>
<!-- End Of Create New Account Modal -->

<body class="bg-color">
<?php session_start();
unset($_SESSION['userid']);
unset($_SESSION['useridsearch']);
?>
    <div class="container vh-100">
        <div class="row justify-content-center h-100">
            <div class="card w-50 my-auto bg-light shadow">
                <div class="card-header text-center text-primary">                    
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#add">Create New Account</button>                                      
                </div>
                <div class="card-body">
                    <?php
                    if(isset($_SESSION['message'])): ?>
                    <div class="alert alert-<?=$_SESSION['msg_type']?>">
                        <?php
                        echo $_SESSION['message'];
                        unset($_SESSION['message']);
                        ?>
                    </div>
                    <?php endif ?>
                    <form action="systemconn.php" method="post">                    
                        <div class="form-group">
                            <label for="user" class="form-label">Username</label>
                            <input type="text" class="form-control" id="user" placeholder="username" name="username" required>
                        </div><br>
                        <div class="form-group">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" placeholder="xxxx" name="password" required>
                        </div><br>
                        <button type="submit" class="btn btn-primary w-100" name="login_btn">Log In</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

<!-- Bootstrap Javascript-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous"></script>

<script>
$('#addpassword, #cmpassword').on('keyup', function () { 
    
  if ($('#addpassword').val() == $('#cmpassword').val()) {
    $('#passwordcheck').html('Passwords Matching').css('color', 'green');
    $(".passwordvalid").attr('disabled', false);
  }
  else if($('#cmpassword').val() == ''){
    $('#passwordcheck').html('');
  }
  else { 
    $('#passwordcheck').html('Passwords Not Matching').css('color', 'red');
    $(".passwordvalid").attr('disabled', true);
  }
  if ($('#addpassword').val() == '' && $('#cmpassword').val() == '') {
    $('#passwordcheck').html('');
  }  
});
</script>
</body>
</html>