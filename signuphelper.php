<?php   

if($_SERVER["REQUEST_METHOD"]=="POST"){
    include "partials/connection.php";
    $signup=false;
   $name=$_POST["name"];
   $email=$_POST["email"];
   $password=$_POST["password"];
   $cpassword=$_POST["cpassword"];

   $existquery="select * from `users` where `useremail`='$email'";
   $result=mysqli_query($conn,$existquery);
   $rows=mysqli_num_rows($result);
   if($rows>0){
         $msg="Email already exist";
           echo "$msg";
           header("location:index.php?signup='$signup'&msg='$msg'");
   }else{
       if($password==$cpassword){
           $insertquery="insert into `users`(`username`,`useremail`,`userpassword`)values('$name','$email','$password')";
           $insert=mysqli_query($conn,$insertquery);
           $signup=true;
           $msg="Succesfully resigtered";
           header("location:index.php?signup='$signup'&msg='$msg'");
           exit();

       }else{
           $msg="password and confirmpassword doesnot match";
           echo "$msg";
            header("location:index.php?signup='$signup'&msg='$msg'");
       }

   }
  

}




?>