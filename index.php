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
    .container {
        min-height: 400px;
    }
    </style>
</head>

<body>
    <?php require "partials/connection.php"; ?>
    <?php require "partials/header.php"; ?>





    <?php 

      if(isset($_GET["loginmsg"])){
          $message=$_GET["loginmsg"];
            echo '<div class="alert alert-primary my-0" role="alert">
      '.$message.'
</div>';
      }
    


       if(isset($_GET["signup"])){ //agrr value set hogi mtlb kuch hoga to true otherwise false
         $signup=$_GET["signup"];
         $msg=$_GET["msg"];
      
      echo '<div class="alert alert-primary my-0" role="alert">
      '.$msg.'
</div>';
    
       }
    ?>
    <!--slider starts here-->
    <div id="carouselExampleInterval" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active" data-interval="10000">
                <img src="https://source.unsplash.com/2400x700/?coding,microsoft" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item" data-interval="2000">
                <img src="https://source.unsplash.com/2400x700/?coding,apple" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="https://source.unsplash.com/2400x700/?coding,google" class="d-block w-100" alt="...">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleInterval" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleInterval" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <!-- cards iteration here using php and while loop  -->
    <div class="container" style="min-height:600px;">
        <h2 class="text-center  my-2">WeCurious !Are You</h2>
        <div class="row">
            <?php
            $query = "select * from `category`";
            $result = mysqli_query($conn, $query);



            while ($row = mysqli_fetch_assoc($result)) {
                $catid = $row["categoryid"];
                $catname = $row["categoryname"];
                $catdesc = $row["categorydescription"];
                $catdesc = substr($catdesc, 0, 100);
                $catdesc = substr_replace($catdesc, "...", 100, 0);




                echo '  <div class="col-md-4  my-2">
                <div class="card" style="width: 18rem;">
                    <img src="https://source.unsplash.com/500x400/?coding,' . $catname . '" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><a href="threadlist.php?id='.$catid.'">' . $catname . '</a></h5>
                        <p class="card-text">' . $catdesc . '</p>
                        <a href="threadlist.php?id='.$catid.'" class="btn btn-danger">view thread</a>
                    </div>
                </div>
            </div>';
            }
            ?>

        </div>
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