<?php
session_start();

include "../Database.php";
$message = [];

$database = new Database();
$db = $database->getConnection();

if (!isset($_SESSION['login_user'])) {
    header("location: login.php");
}
$name = $_SESSION['login_user'];
$userid = $_SESSION['login_user_id'];
//echo($name);
$stmt = $db->prepare("SELECT * from signupinfo where id=:uid");
$stmt->bindParam(':uid', $userid);
$stmt->execute();
$users=$stmt->fetchAll(); 
// echo "<pre>";
// print_r($users);
  
// echo "</pre>";


if (isset($_POST['submit'])) {

    $target_dir = "image";

   // //    #   Check if directory exists, create if it does not
     if(!is_dir($target_dir )){
           mkdir($target_dir);
       }
       
       //print_r($path_of_file_to_save);
       $fname = $_POST['fname'];
       $lname = $_POST['lname'];      
       $mobile = $_POST['numbermobile'];
       $email = $_POST['emailid'];
       $image = $_FILES['image']['name'];
       
       //check if a new image was uploaded and saved to the database   
       if(isset($_FILES['image']['name']) &&  $_FILES['image']['name'] != ""){
           $path_of_file_to_save = $target_dir . '/' . basename($_FILES["image"]["name"]);
            move_uploaded_file($_FILES["image"]["tmp_name"], $path_of_file_to_save); 
            
            $stmt = $db->prepare("UPDATE signupinfo SET image=:img WHERE id =:uid ");
            $stmt->bindParam(':img', $path_of_file_to_save);
           $stmt->bindParam(':uid', $userid);
           $stmt->execute();
           $profile=$stmt->fetchAll();
           if ($stmt->rowCount() == 1) {
        //     //echo("Updation successful");
            header("Location:update.php");
        }
         else{
         echo("ERROR");
         }
           }
         echo "<pre>";
      //  print_r($_POST);
      //   print_r($_FILES);
          echo "</pre>";
        
    //     //  die();
      $stmt = $db->prepare("UPDATE signupinfo SET fname = :fnme ,lname = :lnme, mobile =:mbl, email =:emil WHERE id =:uid ");
      
       
           $stmt->bindParam(':fnme', $fname);
           $stmt->bindParam(':lnme', $lname);
           $stmt->bindParam(':mbl', $mobile);
           $stmt->bindParam(':emil', $email);
          $stmt->bindParam(':uid', $userid);
          $stmt->execute();
          $profile=$stmt->fetchAll();
          // $stmt->bindParam(':uname', $username);
          //$stmt->bindParam(':pwd', $enc);
         //$stmt->execute();
  
          if ($stmt->rowCount() == 1) {
              //echo("Updation successful");
              header("Location:profile.php");
          }
          else{
              array_push($message,"You have not updated anything");
           }

      
    }


        // $enc_psw=md5($password);
        
        
        
 

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
    <script src="../js/updateprofile.js"></script>
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
      <li class="nav-item">
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
     
    </ul>
  </div>
</nav>
<br>
<?php
if ($message) {
        ?>

        <div>
            <style>
                p {
                    color: red;
                }
            </style>
            <?php
            foreach ($message as $msg) { ?>
                <p align="center">
                    <?php echo $msg ?>
            </p>
                <?php
            }
            ?>
        </div>

        <?php
    } ?>
    <br>
    <div class="d-flex justify-content-center align-items-center vh-100">
            <form class="shadow w-500 p-1" action="update.php" method="post" enctype="multipart/form-data" onsubmit="return validation()">         
            
            <div class="form-group">
                <h4><label>Edit Profile</label></h4>
                <img src=<?php echo $users[0]['image'];?> class="rounded-circle" style="width:95px" align="right"> 
            </div>
            <br><br>
            <div class="form-group">
                    <label>First name:</label>
                    <input type="text" name="fname" id="fname" class="form-control" autocomplete="off" value="<?php echo $users[0]['fname']?>">
                    <span id="f_name" class="text-danger font-weight-bold"></span>
            </div>
            <div class="form-group">
                    <label>Last name:</label>
                    <input type="text" name="lname" id="lname" class="form-control" autocomplete="off" value="<?php echo $users[0]['lname']?>">
                    <span id="l_name" class="text-danger font-weight-bold"></span>
            </div>
            <div class="form-group">
                    <label>Username:</label>
                    <input type="text" name="username" id="username" class="form-control" autocomplete="off" disabled value="<?php echo $users[0]['username']?>">
                    <span id="usernameid" class="text-danger font-weight-bold"></span>
            </div>

            <div class="form-group">
                    <label>Mobile Number:</label>
                    <input type="text" name="numbermobile" id="numbermobile" class="form-control" autocomplete="off" value="<?php echo $users[0]['mobile']?>">
                    <span id="mobilenumber" class="text-danger font-weight-bold"></span>
            </div>

            <div class="form-group">
                    <label>Email:</label>
                    <input type="text" name="emailid" id="emailid" class="form-control" autocomplete="off" value="<?php echo $users[0]['email']?>">
                    <span id="emailids" class="text-danger font-weight-bold"></span>
            </div>


            <div>
                <input type="file" name="image" class="form-control" >               
            </div>
                
                <input type="submit" name="submit" class="btn btn-success" value="Upload" >
    
  
       
            </form>
        
       
    
    </div>

</body>
<style>
    /* div {
        width: 1250px;
       
      } */
    .btn {
        margin-top: 1px;
        width: 100px;

    }

    /* .align-right {
        text-align: right;
        border: 0;
      } */
      <style>
        .centerme{
            margin-left: auto;
            margin-right: auto;
        }
        .tableui{
            border : 4;
            border-style: dashed;
        }
        .navbar-nav {
            margin-left: auto;
        }
        body{
  overflow-x: hidden;
}
    </style>
</style>


</html>