
<?php
session_start();

//print_r($_SESSION);
$uid = $_SESSION['login_user_id'];


if(isset($_SESSION['login_user_id']) && isset($_SESSION['login_user'])){
  require "../Database.php";

  $database = new Database();
  $db = $database->getConnection();
  
  $stmt = $db->prepare("SELECT * from signupinfo where id=:uid");
  $stmt->bindParam(':uid', $uid);
  $stmt->execute();
  $users=$stmt->fetchAll();

//print_r($users);

}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.slim.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

<!--navbar--->
<nav class="navbar navbar-expand-lg navbar-light bg-info">
  <a class="navbar-brand" href="#">Medme</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item ">
        <a class="nav-link" href="dashboard.php">Home<span class="sr-only">(current)</span></a>
        <!---it will show all posts created by users in the db--->
      </li>
      <li class="nav-item">
        <a class="nav-link" href="profile.php">Profile</a>
        <!---here we will get profile info of user as well as posts created--->
      </li>
      <li class="nav-item">
        <a class="nav-link" href="post.php">Posts</a>
      </li> 
      <form action="logout.php" method="POST" >
           <input type="submit" value="logout" class="navbar-nav btn btn-light"  />
      </form>
    
     
    </ul>
  </div>
</nav>
<br>
        <h4 class="text-center">MY PROFILE</h4>
            <form class="" action="update.php" method="get" align="center">
           <div class="d-flex justify-content-center align-items-center vh-100">
            <div class="shadow w-350 p-3 text-center">
            <div class="form-group">
                    <img src=<?php echo $users[0]['image'];?> class="img-fluid rounded-circle"> 
                </div>
                <div class="form-group">
                    <label>First name:</label>    <?php echo $users[0]['fname'];  ?> 
                </div>
                <div class="form-group">
                    <label>Last name:</label>    <?php echo $users[0]['lname'];  ?> 
                </div>
                <div class="form-group">
                    <label>Username:</label>    <?php echo $users[0]['username'];  ?> 
                </div>
                <div class="form-group">
                    <label>Mobile Number:</label> <?php echo $users[0]['mobile'];  ?> 
                </div>
                <div class="form-group">
                    <label>Email:</label> <?php echo $users[0]['email'];  ?> 
                </div>

                <form action="update.php" method="POST" >
                      <input type="submit" value="Update" name="update" class="btn btn-secondary" />
                </form>
            </div>
          </div>

  </form>


<style>
 .navbar navbar-expand-lg navbar-light bg-info{
  position: fixed;
 }
.navbar-nav {
            margin-left: auto;
            
        }
body{
  overflow-x: hidden;
}
 
    </style>

</body>

</html>