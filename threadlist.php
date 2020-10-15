<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>Q/A</title>
    <style>
    .qns {
        min-height: 400px;
    }
    </style>
</head>

<body>
    <?php require "partials/connection.php"; ?>
    <?php require "partials/header.php"; ?>

    <?php
    $catid = $_GET["id"];
    $sqlquery = "select * from `category` where `categoryid`='$catid'";
    $resultt = mysqli_query($conn, $sqlquery);

    while ($roww = mysqli_fetch_assoc($resultt)) {


        $cattid = $roww["categoryid"];
        $catname = $roww["categoryname"];
        $catdesc = $roww["categorydescription"];
    }


    ?>
    <?php
    $inserthogya = false;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $threadtitle = $_POST["qtitle"];
        $threaddescription = $_POST["qdescription"];
        $useridfromsession=$_SESSION["userid"];

        $querryy = "insert into `thread`(`threadtitle`,`threaddescription`,`threaduserid`,`threadcatid`) values('$threadtitle','$threaddescription','$useridfromsession','$catid')";
        $insertion = mysqli_query($conn, $querryy);
        $inserthogya = true;
    }


    ?>
    <?php
    if ($inserthogya) {
        echo '<div class="alert alert-success" role="alert">
  <h4 class="alert-heading">Succesfully Submitted!</h4>
  <p>be here in some time interval to check your answer.</p>
  <hr>
  
</div>';
    }


    ?>

    <div class="container">
        <div class="jumbotron my-1">
            <h1 class="display-4">Welcome to <?php echo $catname; ?> forums</h1>
            <p class="lead"><?php echo $catdesc; ?></p>
            <hr class="my-4">
            <p>No Spam / Advertising / Self-promote in the forums.Do not post copyright-infringing material. ...Do not
                post “offensive” posts, links or images. ...Do not cross post questions. ...
                Do not PM users asking for help. ...Remain respectful of other members at all times..</p>
            <a class="btn btn-success btn-lg" href="#" role="button">Learn more</a>
        </div>
        <?php


        if (isset($_SESSION['logged'])) {

            echo '<button class="btn btn-danger my-3" id="butlog" type="button" data-toggle="collapse"
                data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                Discuss here
            </button>';
        }

        echo '</div>';



        if (isset($_SESSION['logged'])) {
            echo '<div class="container collapse " id="collapseExample">
        <h1>Post query here...</h1>
        <form action="threadlist.php?id='.$catid.'" method="post">
        <!--  using php tag you can this also to give catid again to a url php? echo "threadlist.php?id=".$catid."?>
        -->
        <div class="form-group">
            <label for="qtitle">Title</label>
            <input type="text" class="form-control" id="qtitle" name="qtitle" aria-describedby="emailHelp">
            <small id="emailHelp" class="form-text text-muted">Ask Openly no one here to judge anyone</small>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="qdescription" rows="5"></textarea>
        </div>

        <button type="submit" class="btn btn-success">Submit</button>
        </form>
    </div>';
    } else {
    echo '<h3 class="container">Login to start a conversation</h2>'; } ?>



        <div class="container qns">
            <h1>Browse Questions</h1>

            <?php

            $que = "select * from `thread` where `threadcatid`='$catid'";
            $data = mysqli_query($conn, $que);
            $noresult = true;
            while ($roow = mysqli_fetch_assoc($data)) {
                $noresult = false;
                  $userid=$roow["threaduserid"];
                  $sql2="select * from `users` where `userid`='$userid'";
                  $result=mysqli_query($conn,$sql2);
                  $datauser=mysqli_fetch_assoc($result);

                echo '<div class="media">
            <img src="https://source.unsplash.com/50x50/?user,icon" class="mr-3" alt="...">
            <div class="media-body">
                <h5 class="mt-0 mb-0"><a href="thread.php?threadid=' . $roow["threadid"] . '">' . $roow["threadtitle"] . '</a></h5><h6 style="float:right;"> asked by '.$datauser["username"].'</h6><br>
                ' . $roow["threaddescription"] . '
                
            </div>
        </div>';
            }
            if ($noresult) {
                echo "<p class=' badge badge-secondary '>be first to ask</p>";
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