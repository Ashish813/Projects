<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="index.php">WeCuRiOuS</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="about.php">About</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    Top Categories
                </a>

                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <?php

                    $query="select * from `category` limit 3 ";
                    $resultt=mysqli_query($conn,$query);
                    while($rowww=mysqli_fetch_assoc($resultt)){
                        $categoryidd=$rowww["categoryid"];
                    echo '<a class="dropdown-item" href="threadlist.php?id='.$categoryidd.'">'.$rowww["categoryname"].'</a>';
                    echo '<div class="dropdown-divider"></div>';
                    }               
                    ?>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="contact.php">Contact</a>
            </li>
        </ul>
        <div class="row ml-2">
            <form class="form-inline my-2 my-lg-0" action="search.php" method="get">



                <input class="form-control mr-sm-2" type="search" name="search" placeholder="Search"
                    aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>

            <?php
            session_start();

            if (isset($_SESSION['logged'])) {


                echo '<button class="btn btn-danger ml-2" ><a href="partials/logout.php"  style="text-decoration:none; color:white;"   >Logout</a></button>';
            } else {
                echo '<button class="btn btn-danger ml-2" data-toggle="modal" data-target="#loginmodal">Login</button>
            <button class="btn btn-success ml-1" data-toggle="modal" data-target="#signupmodal">Signup</button>';
            }
            ?>
        </div>


    </div>
</nav>






<?php
include "loginmodal.php";
include "signupmodal.php";

?>