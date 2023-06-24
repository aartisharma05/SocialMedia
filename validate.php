<?php

session_start();
header("Content-Type: application/json");
require "../Database.php";


$array = [];

if (isset($_POST['username'])) {
    $database = new Database();
    $db = $database->getConnection();
    
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $db->prepare("select * from signupinfo where username = :data");
    $stmt->bindParam(':data', $username);
    $stmt->execute();
    $user = $stmt->fetchAll();
    
    $valid=false;
    if (count($user) > 0) {
        
          $user_pass =  $user[0]['password'];

        if (md5($password) != $user_pass) {
            array_push($array, "Invalid password");
        } else {
            $valid=true;
            if(isset($_SESSION)){
                session_destroy();
            }
            session_start();
            $_SESSION['login_user'] = $username;
            $_SESSION['login_user_id'] = $user[0]['id'];
            // header("location: dashboard.php");
        }
        // die();

    } else if($valid==false) {
        array_push($array, "Username does not exist!, create account first");
    }
}
echo(json_encode($array));

?>