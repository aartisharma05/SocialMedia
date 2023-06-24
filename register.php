<?php
session_start();

require "../Database.php";


$message = [];

if (isset($_POST['submit'])) {

	$database = new Database();
	$db = $database->getConnection();



    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
	$username = $_POST['username'];
	$email = $_POST['emailid'];
	$mobile = $_POST['numbermobile'];
	$password = $_POST['password'];

	

	$stmt = $db->prepare("select * from signupinfo where username = :data");
	$stmt->bindParam(':data', $username);
	$stmt->execute();
	$users = $stmt->fetchAll();

	if (count($users) > 0) {
		array_push($message, "Username already exists, try diffrent one");
	}




	$stmt = $db->prepare("select * from signupinfo where mobile = :data");
	$stmt->bindParam(':data', $mobile);
	$stmt->execute();
	$users = $stmt->fetchAll();

	if (count($users) > 0) {
		array_push($message, "mobile already registered, try diffrent one");
	}

	$stmt = $db->prepare("select * from signupinfo where email = :data");
	$stmt->bindParam(':data', $email);
	$stmt->execute();
	$users = $stmt->fetchAll();
	if (count($users) > 0) {
		array_push($message, "email already exists, try diffrent one");
	}

    

    $stmt = $db->prepare("select * from signupinfo where password = :data");
	$stmt->bindParam(':data', $password);
	$stmt->execute();
	$users = $stmt->fetchAll();

	


	if (!$message) {

        $enc = md5($password);
        
		$stmt = $db->prepare("INSERT INTO `signupinfo` ( `fname`,`lname`,`username`, `mobile`, `email`, `password`) 
        VALUES (:fnme, :lnme, :uname, :mbl, :emil, :pwd);");
       
        $stmt->bindParam(':fnme', $fname);
        $stmt->bindParam(':lnme', $lname);
        $stmt->bindParam(':uname', $username);
		$stmt->bindParam(':mbl', $mobile);
		$stmt->bindParam(':emil', $email);
		$stmt->bindParam(':pwd', $enc);
		$stmt->execute();

		if ($stmt->rowCount() ==1) {
            // echo("registration success");
            header("Location:login.php");
        }

	}

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.slim.min.js"></script>

<!-- Popper JS -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

<script type="text/javascript" src="../js/register.js" > </script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">

<link rel="stylesheet" href="../css/register.css" type="text/css">


</head>

<body>

    <div class="container">
    <?php
    if ($message) {
        ?>

        <div>
            <style>
                p {
                    color: greenyellow;
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
        <h1 class="text-center">Sign Up</h1>
       
            <form action="" method="post" onsubmit=" return validation()">
            <div class="textfield">
                    <!-- <label>First Name:</label> -->
                    <input type="text" name="fname" id="fname" class="form-control" placeholder="First Name" autocomplete="off">
                    <span id="f_name" class="text-info font-weight-bold"></span>
                </div><br>

                <div class="textfield">
                    <!-- <label>Last Name:</label> -->
                    <input type="text" name="lname" id="lname" class="form-control" placeholder="Last Name" autocomplete="off">
                    <span id="l_name" class="text-info font-weight-bold"></span>
                </div><br>

                <div class="textfield">
                    <!-- <label>Username:</label> -->
                    <input type="text" name="username" id="username" class="form-control" placeholder="Username" autocomplete="off">
                    <span id="usernameid" class="text-info font-weight-bold"></span>
                </div><br>

                <div class="textfield">
                    <!-- <label>Password:</label> -->
                    <input type="password" name="password" id="password" class="form-control" placeholder="Password" autocomplete="off">
                     <span class="eye">
                        <i id="hide1" class="fa fa-eye"></i>
                        <i id="hide2" class="fa fa-eye-slash"></i>
                    <span id="passwords" class="text-info font-weight-bold"></span>
                </div>

                <div class="textfield">
                    <!-- <label>Confirm Password:</label> -->
                    <input type="password" name="passwordconfrm" id="passwordconfrm" class="form-control" placeholder="Confirm Password" autocomplete="off">
                    <span id="confrmpassword" class="text-info font-weight-bold"></span>
                </div><br>

                <div class="textfield">
                    <!-- <label>Mobile Number:</label> -->
                    <input type="text" name="numbermobile" id="numbermobile" class="form-control" placeholder="Mobile Number" autocomplete="off">
                    <span id="mobilenumber" class="text-info font-weight-bold"></span>
                </div><br>

                <div class="textfield">
                    <!-- <label>Email:</label> -->
                    <input type="text" name="emailid" id="emailid" class="form-control" placeholder="Email" autocomplete="off">
                    <span id="emailids" class="text-info font-weight-bold"></span>
                </div><br>
                <div class="textfield">
                    <label>
                   Already have an account?<a href="login.php"> Login <a></label>
                </div> <br><br>
                <input type="submit" name="submit" class="button" onclick="myFunction()">
                <!-- <button onclick="myFunction()">Submit</button> -->
            </form>
        </div>
    
</body>

</html>