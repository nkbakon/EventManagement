<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>System Events</title>

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
        <a class="nav-link text-light" href="./event.php">
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
        <a class="nav-link text-light" href="./event.php">
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

<!-- add event modal -->
<div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">      
        <h5 class="modal-title" id="exampleModalLabel">Add Event</h5>        
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>      
      <form action="eventconn.php" method="POST">
        <div class="modal-body">
          <div class="form-group">
            <label>Enter Place</label>
            <input type="text" name="place" class="form-control" placeholder="Enter a place" required>                              
          </div><br>
          <div class="form-group">
            <label>Enter Date</label>
            <input type="date" name="date" class="form-control" required>                              
          </div><br>
          <div class="form-group">
            <label>Enter Time</label>
            <input type="time" name="time" class="form-control" required>                              
          </div><br>
          <div class="form-group">
            <label>Enter Number Of Players</label>
            <input type="text" name="nop" class="form-control" placeholder="Enter number of players" required>                              
          </div><br>
          <div class="form-group">
            <label>Enter Description</label>
            <input type="text" name="description" class="form-control" placeholder="Enter description">                              
          </div><br>
          <input type="text" class="form-control" name="addby" value="<?php echo $_SESSION['user']['id']; ?>" hidden>          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary rounded-pill" data-bs-dismiss="modal" style="width: 80px;">Close</button>
          <button type="submit" name="save" class="btn btn-primary rounded-pill" style="width: 80px;">Save</button>                               
        </div>
      </form>
    </div>    
  </div>
</div>
<!-- end of add event modal -->

<!-- edit event modal -->
<div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
      
        <h5 class="modal-title" id="exampleModalLabel">Edit Event</h5>
        
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>      
      <form action="eventconn.php" method="POST">
        <div class="modal-body">
          <input type="hidden" name="update_eventid" id="update_eventid">
          <div class="form-group">
            <label>Place</label>
            <input type="text" name="place" id="place" class="form-control" required>                              
          </div><br>
          <div class="form-group">
            <label>Date</label>
            <input type="text" name="date" id="date" class="form-control" placeholder="Enter date" requird>                              
          </div><br>
          <div class="form-group">
            <label>Time</label>
            <input type="time" name="time" id="time" class="form-control" required>                              
          </div><br>
          <div class="form-group">
            <label>Enter Number Of Players</label>
            <input type="text" name="nop" id="nop" class="form-control" placeholder="Enter number of players" required>                              
          </div><br>
          <div class="form-group">
            <label>Enter Description</label>
            <input type="text" name="description" id="description" class="form-control" placeholder="Enter description">                              
          </div><br>        
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
        <h5 class="modal-title" id="exampleModalLabel">View Event</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
        <form>
          <div class="modal-body">
            <ol>
              <li>Event ID : <span id="viewid"></span></li><br>
              <li>Place : <span id="viewplace"></span></li><br>
              <li>Date : <span id="viewdate"></span></li><br>
              <li>Time : <span id="viewtime"></span></li><br>
              <li>Number Of Players : <span id="viewnop"></span></li><br>
              <li>Description : <span id="viewdescription"></span></li><br>
              <li>User : <span id="viewuser"></span></li><br>
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
        <h5 class="modal-title" id="exampleModalLabel">Delete Event</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="eventconn.php" method="POST">
            <div class="modal-body">
                <input type="hidden" name="delete_eventid" id="delete_eventid">
            
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
  <h5 class="font-rubik text-center">Event Management</h5>
  <div class="container">
      <div class="card">
        <div class="card-body bg-white shadow">
          <div class="row">
            <div class="col-md-12 text-end">
              <button class="btn btn-primary rounded-pill" data-bs-toggle="modal" data-bs-target="#add">Add Event</button>
            </div>
          </div>
          <br>          
          <div style="width: 250px;">
            <label class="form-label"><i class="fa fa-search"></i> Search</label>
            <input type="text" id="eventsearch" class="form-control" placeholder="Type here to search">              
          </div>
          <h5 class="font-rubik text-center">Events</h5>

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

            $query = "SELECT *, E.id, S.username AS User FROM event E INNER JOIN system S ON E.addby = S.id LIMIT $start_from, $limit";
            $query_run = mysqli_query($connection, $query);
          ?>

          <table class="table table-light table-hover table-bordered">
              <thead>
                <tr>
                  <th>Event ID</th>
                  <th>Place</th>
                  <th>Date</th>
                  <th>Time</th>
                  <th>Number Of Players</th>
                  <th>User</th>
                  <th class="text-end">ACTIONS</th>
                </tr>
              </thead>
            <?php

                if($query_run){
                    foreach($query_run as $row)
                    {
            ?> 
            <tbody id="eventtable">
              <tr>
                <td><?php echo $row ['id'];?></td>
                <td><?php echo $row ['place'];?></td>
                <td><?php echo $row ['date'];?></td>
                <td><?php echo $row ['time'];?></td>
                <td><?php echo $row ['nop'];?></td>
                <td style="display:none;"><?php echo $row ['description'];?></td>
                <td><?php echo $row ['User'];?></td>
                <td class="text-end">
                  <button title="see more" class="btn btn-secondary rounded-pill vieweventbtn" data-bs-toggle="modal" data-bs-target="#view" style="width: 40px;"><i class="fa fa-info"></i></button>                  
                  <button title="edit" class="btn btn-success rounded-pill editeventbtn" data-bs-toggle="modal" data-bs-target="#edit" style="width: 40px;"><i class="fa fa-pencil-square-o"></i></button>
                  <button title="delete" class="btn btn-danger rounded-pill deleteeventbtn" data-bs-toggle="modal" data-bs-target="#delete" style="width: 40px;"><i class="fa fa-trash-o"></i></button>                  
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
  $("#eventsearch").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#eventtable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>


<script>

$(document).ready(function(){
    $('.editeventbtn').on('click', function(){
        

        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function() {
            return $(this).text();      

        }).get();

        console.log(data);

        $('#update_eventid').val(data[0]);
        $('#place').val(data[1]);
        $('#date').val(data[2]);
        $('#time').val(data[3]);
        $('#nop').val(data[4]);
        $('#description').val(data[5]);
    });
});

</script>

<script>

$(document).ready(function(){
    $('.vieweventbtn').on('click', function(){
        

        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function() {
            return $(this).text();      

        }).get();

        console.log(data);
        
        document.getElementById('viewid').innerHTML = data[0];
        document.getElementById('viewplace').innerHTML = data[1];
        document.getElementById('viewdate').innerHTML = data[2];
        document.getElementById('viewtime').innerHTML = data[3];
        document.getElementById('viewnop').innerHTML = data[4];
        document.getElementById('viewdescription').innerHTML = data[5];
        document.getElementById('viewuser').innerHTML = data[6];
    });
});

</script>

<script>

$(document).ready(function(){
    $('.deleteeventbtn').on('click', function(){
        

        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function() {
            return $(this).text();      

        }).get();

        console.log(data);

        $('#delete_eventid').val(data[0]);
    });
});

</script>

</body>
</html>