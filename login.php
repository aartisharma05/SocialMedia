
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/brands.min.css"></style>
<link rel="stylesheet" href="../css/login.css" type="text/css">

<!-- jQuery library -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.slim.min.js"></script>

<!-- Popper JS -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>


<script type="text/javascript" src="../js/login.js"> </script>
<script>funciton preventBack(){window.history.forward()};
setTimeout("preventBack()",0);
window.onunload =  function(){null;}

</script>



</head>

<body>
<?php

$message = [];
    if ($message) {
        ?>

        <div>
            <style>
                h3 {
                    color: greenyellow;
                }
            </style>
            <?php
            foreach ($message as $msg) { ?>
                <h3 align="center">
                    <?php echo $msg ?>
                </h3>
                <?php
            }
            ?>
        </div>

        <?php
    } ?>
    <div class="container">

        <h1>Login</h1>
       
        <p id="message"></p>
            <form action="dashboard.php" method="POST" onsubmit="return validation()">
            <div class="textfield">
                    <!-- <label>Username:</label> -->
                    <input type="text" name="username" id="username" class="text-info form-control" placeholder="Username" autocomplete="off"
                    onblur="f1()">
                    <span id="usernameid" class="text-info font-weight-bold"></span>
                </div><br>

                <div class="textfield">
                    <!-- <label>Password:</label> -->
                    <input type="password" name="password" id="password" class="text-info form-control" placeholder="Password" autocomplete="off" onblur="f2()">
                    <i class="far fa-eye" id="togglePassword" style="margin-left: -30px; cursor: pointer;"></i>
                    <span id="passwords" class="text-info font-weight-bold"></span>
                </div><bt>

                <div class="textfield">
                    <label>
                   Don't have an account?<a href="register.php"> Sign up<a></label>
                </div>        
                <br>
                <input type="submit" name="submit" value="login" class="button" >
                
            </form>
        </div>
    </div>
</body>

</html>