<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Users</title>

    <link href="./include/style.css" rel="stylesheet">

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
        <a class="nav-link text-light" href="./user.php">
          <i class="fa fa-user-o"></i>
          Users
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-dark" href="./chat.php">
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
        <a class="nav-link text-dark" href="./chat.php">
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



<!-- edit user modal -->
<div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
      
        <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
        
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>      
      <form action="userconn.php" method="POST">
        <div class="modal-body">
          <input type="hidden" name="update_userid" id="update_userid">
          <div class="form-group">
            <label>Username</label>
            <input type="text" name="username" id="username" class="form-control" disabled>                              
          </div><br>
          <div class="form-group">
            <label>Email Address</label>
            <input type="text" name="email" id="email" class="form-control" placeholder="Enter Email" required>                              
          </div><br>
          <div class="form-group">
            <label for="systype" class="font-weight-bold">Account Type</label>
            <select name="systype" id="systype" class="form-control" required>
              <option selected disabled>Select account type from here</option>
              <option value="Admin">Admin</option>
              <option value="User">User</option>
            </select>                                        
          </div><br>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="status" class="font-weight-bold">Account Status</label>
              <select name="status" id="status" class="form-control" required>
                <option selected disabled>Select status from here</option>
                <option value="Active">Active</option>
                <option value="Disabled">Disabled</option>
              </select>
            </div>
          </div>           
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary rounded-pill" data-bs-dismiss="modal" style="width: 80px;">Close</button>
          <button type="submit" name="update" class="btn btn-primary rounded-pill" style="width: 80px;">Update</button>                               
        </div>
      </form>
    </div>    
  </div>
</div>
<!-- end of edit user modal -->

<!-- View Modal -->
<div class="modal fade" id="view" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">View User</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
        <form>
          <div class="modal-body">
            <ol>
              <li>User ID : <span id="viewid"></span></li><br>
              <li>Username : <span id="viewusername"></span></li><br>
              <li>Email Address : <span id="viewemail"></span></li><br>
              <li>Account Type : <span id="viewtype"></span></li><br>
              <li>Status : <span id="viewstatus"></span></li><br>
              <li>Registered Date : <span id="viewregdate"></span></li><br>
            </ol>
          </div>          
        </form>      
    </div>
  </div>
</div>


<!-- Delete Modal -->
<div class="modal fade" id="delete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete User</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="userconn.php" method="POST">
            <div class="modal-body">
                <input type="hidden" name="delete_userid" id="delete_userid">
            
                Do you want to delete this data?              
            
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary rounded-pill" data-bs-dismiss="modal" style="width: 80px;">No</button>
                <button type="submit" name="delete" class="btn btn-danger rounded-pill" style="width: 80px;">Yes</button>
            </div>
     </form>
    </div>    
  </div>
</div>



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
  <h5 class="font-rubik text-center">User Management</h5>
  <div class="container">
      <div class="card">
        <div class="card-body bg-white shadow">          
          <div style="width: 250px;">
            <label class="form-label"><i class="fa fa-search"></i> Search</label>
            <input type="text" id="usersearch" class="form-control" placeholder="Type here to search">              
          </div>
          <h5 class="font-rubik text-center">Users</h5>

          <?php
            $connection = mysqli_connect("localhost","root","");
            $db = mysqli_select_db($connection,'event management');

            $limit = 10;  
            if (isset($_GET["page"])) {
              $page  = $_GET["page"]; 
            } 
            else{ 
              $page=1;
            };  
            $start_from = ($page-1) * $limit;

            $query = "SELECT * FROM system LIMIT $start_from, $limit";
            $query_run = mysqli_query($connection, $query);
          ?>

          <table class="table table-light table-hover table-bordered">
              <thead>
                <tr>
                  <th>User ID</th>
                  <th>Username</th>
                  <th>Email</th>
                  <th>Account Type</th>
                  <th>Status</th>
                  <th class="text-end">ACTIONS</th>
                </tr>
              </thead>
                <?php

                    if($query_run){
                        foreach($query_run as $row)
                        {
                ?> 
            <tbody id="usertable">
              <tr>
                <td><?php echo $row ['id'];?></td>
                <td><?php echo $row ['username'];?></td>
                <td><?php echo $row ['email'];?></td>
                <td><?php echo $row ['systype'];?></td>
                <td><?php echo $row ['status'];?></td>
                <td style="display:none;"><?php echo $row ['regdate'];?></td>
                <td class="text-end">
                  <button title="see more" class="btn btn-secondary rounded-pill viewuserbtn" data-bs-toggle="modal" data-bs-target="#view" style="width: 40px;"><i class="fa fa-info"></i></button>                  
                  <button title="edit" class="btn btn-success rounded-pill edituserbtn" data-bs-toggle="modal" data-bs-target="#edit" style="width: 40px;"><i class="fa fa-pencil-square-o"></i></button>
                  <button title="delete" class="btn btn-danger rounded-pill deleteuserbtn" data-bs-toggle="modal" data-bs-target="#delete" style="width: 40px;"><i class="fa fa-trash-o"></i></button>                  
                </td>
              </tr>
            
            </tbody>
            <?php
                    }
               }
               else
               {
                  echo "NO record found";
                }

            ?>
          </table>
          <?php  

            $result_db = mysqli_query($connection,"SELECT COUNT(id) FROM system"); 
            $row_db = mysqli_fetch_row($result_db);  
            $total_records = $row_db[0];  
            $total_pages = ceil($total_records / $limit); 
            
            $pagLink = "<ul class='pagination'>";  
            for ($i=1; $i<=$total_pages; $i++) {
                          $pagLink .= "<li class='page-item'><a class='page-link' href='user.php?page=".$i."'>".$i."</a></li>";	
            }
            echo $pagLink . "</ul>";  
          ?>
        </div>
      </div>
  </div>
</div>

<!-- Bootstrap Javascript-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous"></script>  

<script>
$(document).ready(function(){
  $("#usersearch").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#usertable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>


<script>

$(document).ready(function(){
    $('.edituserbtn').on('click', function(){
        

        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function() {
            return $(this).text();      

        }).get();

        console.log(data);

        $('#update_userid').val(data[0]);
        $('#username').val(data[1]);
        $('#email').val(data[2]);
        $('#systype').val(data[3]);
        $('#status').val(data[4]);
    });
});

</script>

<script>

$(document).ready(function(){
    $('.viewuserbtn').on('click', function(){
        

        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function() {
            return $(this).text();      

        }).get();

        console.log(data);
        
        document.getElementById('viewid').innerHTML = data[0];
        document.getElementById('viewusername').innerHTML = data[1];
        document.getElementById('viewemail').innerHTML = data[2];
        document.getElementById('viewtype').innerHTML = data[3];
        document.getElementById('viewstatus').innerHTML = data[4];
        document.getElementById('viewregdate').innerHTML = data[5];
    });
});

</script>

<script>

$(document).ready(function(){
    $('.deleteuserbtn').on('click', function(){
        

        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function() {
            return $(this).text();      

        }).get();

        console.log(data);

        $('#delete_userid').val(data[0]);
    });
});

</script>

</body>
</html>