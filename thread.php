<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>WeCurious</title>
    <style>

    </style>
</head>

<body>
    <?php require "partials/connection.php"; ?>
    <?php require "partials/header.php"; ?>





    <!--slider starts here-->

    <?php
    $tid = $_GET["threadid"];
    $sqlquery = "select * from `thread` where `threadid`='$tid'";
    $resultt = mysqli_query($conn, $sqlquery);
    while ($roww = mysqli_fetch_assoc($resultt)) {


        $threadid = $roww["threadid"];
        $threadtitle = $roww["threadtitle"];
        $threaddescription = $roww["threaddescription"];
        $useriddd=$roww["threaduserid"];
        $resultuser=$sqlqueryuserdata="select * from `users` where `userid`='$useriddd'";
         $userrow=mysqli_query($conn,$resultuser);
         $userdat=mysqli_fetch_assoc($userrow);
          $qnsvalauser=$userdat["username"];
        

    }





    ?>

    <!--insert data into comment table-->
    <?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $comment = $_POST["cdescription"];
          $useridfromsession= $_SESSION["userid"];
        $commenttableinsert="INSERT INTO `comments` ( `commentdesc`, `commentby`, `threadid`) VALUES ( '$comment', '$useridfromsession', '$tid')";
        $datainserted=mysqli_query($conn,$commenttableinsert);
    }

    ?>

    <div class="container">
        <div class="jumbotron my-2">
            <h1 class="display-4"><?php echo $threadtitle; ?> forums</h1>
            <p class="lead"><?php echo $threaddescription; ?></p>
            <hr class="my-4">
            <p>No Spam / Advertising / Self-promote in the forums.Do not post copyright-infringing material. ...Do not
                post “offensive” posts, links or images. ...Do not cross post questions. ...
                Do not PM users asking for help. ...Remain respectful of other members at all times..</p>
            <p><b>posted by <?php echo $qnsvalauser;?></b></p>
        </div>

    </div>
    <div class="container ">
        <?php
    
    if(isset($_SESSION['logged'])){
     echo '
        <h1>Comment here...</h1>
        <form action="thread.php?threadid='.$threadid.'" method="post">
        <!--  using php tag you can this also to give catid again to a url php? echo "threadlist.php?id=".$catid."?>
        -->

        <div class="form-group">

            <textarea class="form-control" id="cdescription" name="cdescription" rows="5"></textarea>
        </div>

        <button type="submit" class="btn btn-success">Submit</button>
        </form>';
        }else{
        echo '<h2>Logged in to Comment here</h2>';
        }

        ?>
        <br>
        <h1>Discuss</h1>
        <?php


        $comquery = "select * from `comments` where `threadid`='$tid'";
        $comdata = mysqli_query($conn, $comquery);
        $noresult = true;
        while ($roow = mysqli_fetch_assoc($comdata)) {
            $noresult = false;
            $userid=$roow["commentby"];
            $sqll="select * from `users` where `userid`='$userid'";
             $resultuser=mysqli_query($conn,$sqll);
             $userdata=mysqli_fetch_assoc($resultuser);
            echo '<div class="media mb-2">
            <img src="https://source.unsplash.com/50x50/?user,icon" class="mr-3" alt="...">
            
            <div class="media-body">
            
               <h5 class="my-0">'.$userdata["username"].' at '.$roow["time"].'</h5>
                ' . $roow["commentdesc"] . '
            </div>
        </div>';
        }
        if ($noresult) {
            echo "<p class=' badge badge-secondary '>try to comment something</p>";
        }
        ?>
    </div>




    <?php require "partials/footer.php"; ?>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
    </script>
</body>

</html>