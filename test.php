<?php
session_start();

//print_r($_SESSION);
$uid = $_SESSION['login_user_id'];

//connect to the database
if(isset($_SESSION['login_user_id']) && isset($_SESSION['login_user'])){
  require "../Database.php";

  $database = new Database();
  $db = $database->getConnection();
  
  $stmt = $db->prepare("SELECT * from post where user_id=:uid");
  $stmt->bindParam(':uid', $uid);
  $stmt->execute();
  $posts=$stmt->fetchAll();

   //print_r($posts);

}


?>






<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" 
integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
 integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" 
crossorigin="anonymous"></script>
<link rel="stylesheet" href="../css/post.css" type="text/css">
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

<h3 align="center" > My Feed</h3>
<form action="add-post.php" method="POST"  align="right">
           <input type="submit" value="Add Post" class=" btn btn-light"  />
 </form><br>
 <form action="delete-post.php" method="POST"  align="right">
           <input type="submit" value="Delete Post" class=" btn btn-light"  />
 </form>
 <div class = "container">
 <?php foreach($posts as $post) {?>

  <table align="center" border=1>

              <form class="" action="" method="get">
              <tr>
                <td> <div class="form-group">
                    <img src=<?php echo $post['image'];?>> 
                </div>
                </td>
              </tr><br><br>
              <tr>
                <td>
                <div class="form-group" align="center">
                    <?php echo $post['content'];?>
                </div>
                </td>
              </tr>
              </form>
            
 </table>
   
 <br><br>          

<?php } ?>

 </div>
</body>

</html>