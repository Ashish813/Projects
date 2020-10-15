<?php   

if($_SERVER["REQUEST_METHOD"]=="POST"){
    include "partials/connection.php";
     $email=$_POST["loginemail"];
     $password=$_POST["loginpassword"];
     
     
     $sqll="select * from `users` where `useremail`='$email' and `userpassword`='$password' ";

      $result=mysqli_query($conn,$sqll);
      $logrow=mysqli_fetch_assoc($result);
      $userid=$logrow["userid"];
      if(mysqli_num_rows($result)==1){
         session_start();
          //setting sessisons for further use
           $_SESSION['logged']= true;
          $_SESSION['usernam']=$email;
          $_SESSION['userid']=$userid;
          $loginmsg="login Succesfully";
          header("location:index.php?loginmsg='$loginmsg'");

      }else{
           $loginmsg="Something went wrong!try again";
            header("location:index.php?loginmsg='$loginmsg'");

      }


    }


    ?>