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


    <div class="container">
        <h1><em> Search result for <?php echo $_GET['search']; ?></em></h1>
        <?php
        $searchdata = $_GET["search"];
        $empty = true;

        $queryy = "select * from `thread` where match(`threadtitle`,`threaddescription`) against ('$searchdata')";
        $data = mysqli_query($conn, $queryy);
        while ($linerow = mysqli_fetch_assoc($data)) {
            $title = $linerow["threadtitle"];
            $desc = $linerow["threaddescription"];
            $id = $linerow["threadid"];
            $empty = false;

            echo  ' 
        <div class="result">
            <h3><a href="thread.php?threadid=' . $id . '">' . $title . '</a></h3>
            <p>' . $desc . '</p>

        </div>';
        }
        if ($empty) {
            echo '<div class="jumbotron">
  <h1 class="display-4">No Result Found</h1>
  <p class="lead">Suggestion below</p>
  <hr class="my-4">
  <ul>
  <li>Make sure that all words are spelled correctly.</li>
<li>Try different keywords.</li>
<li>Try more general keywords.</li>
</ul>

</div>';
        }


        ?>



    </div>







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