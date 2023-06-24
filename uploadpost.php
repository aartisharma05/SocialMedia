<?php 
session_start();

include '../Database.php';

$database=new Database();
$db=$database->getConnection();
print_r($_SESSION);
$target_dir = "posts";

if($_FILES['fileToUpload']['name']!=''){

// //    #   Check if directory exists, create if it does not

  if(!is_dir($target_dir )){
        mkdir($target_dir);
    }
    $path_of_file_to_save = $target_dir . '/' . basename($_FILES["fileToUpload"]["name"]);
    
    print_r($_FILES);
     
      move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $path_of_file_to_save);

   
     }

       $var1=false;
       $var2=false;
       $content=$_POST['post_title'];//text

       $str="INSERT INTO post (`user_id`";
       $str1 =" values (:u_id";
       if($content!='')
       {
           $var1=true;
            $str=$str.",`content`";
            $str1=$str1.",:c";
       }
       if($_FILES['fileToUpload']['name']!='')
       {
        $var2=true;
        $str=$str.",`image`";
        $str1=$str1.",:i";
       }
       $str=$str.")";
       $str1=$str1.")";

       $final=$str.$str1;
       print_r($final);
       //$date = date("d M,Y");


       if($content!='' || $_FILES['fileToUpload']['name']!='')
       {
           $stmt = $db->prepare($final);
           $stmt->bindParam(':u_id', $_SESSION['login_user_id']);
           if($var1)
           $stmt->bindParam(':c', $content);
           if($var2)
           $stmt->bindParam(':i', $path_of_file_to_save);
           $stmt->execute();
           $profile=$stmt->fetchAll();
                if ($stmt->rowCount() == 1) {
                    echo("Updated");
                    header("Location:post.php");
                }
                else
                {
                    echo("ERROR");
                }

       }






?>