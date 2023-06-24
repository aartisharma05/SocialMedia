<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" 
integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
 integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" 
crossorigin="anonymous"></script>
<link rel="stylesheet" href="../css/add-post.css" type="text/css">
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



<h1 align="center" >Add Post</h1>
<div class="container1">
<p id="message"></p>
 <!---form--->
 <form action="uploadpost.php" method="post" enctype="multipart/form-data" >
                            <!---enctype we use whr we want to add a file or image input--->
        
                            <div class="form-group" >
                                <label >Text</label><br>
                                <input type="text" name="post_title" class = "form-control" autocomplete="off"
                                placeholder="Whats on you mind?"><br>
                           
                            <div><br>
                          
        
                            <div class="form-group">
                                <label >Post Image</label><br>
                                <input type="file" name="fileToUpload" >
                            </div>
                            
                            <input type="submit" name="submit" class = "btn btn-primary" value="Post"> 
                        </form>  
</div>
































<style>
   .navbar-nav {
            margin-left: auto;
        }
        body{
  overflow-x: hidden;
}
</style>
</body>

</html>