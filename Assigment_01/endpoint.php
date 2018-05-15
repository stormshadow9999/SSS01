<!doctype html>
<html >
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Assigment_01</title>

        <link rel="stylesheet"  href="/Assigment_01/public/css/bootstrap.min.css">
        <script src="/Assigment_01/public/js/jquery-3.3.1.min.js"></script>
   
    </head>
    <body>
        <nav class="navbar navbar-light bg-light">
            <a class="navbar-brand" href="index.php">Assignment 01</a>
            <ul class="nav justify-content-end">
                <?php 
                    if(isset($_COOKIE['session_cookie'])) 
                    {
                        echo "<li class='nav-item'>
                                <a class='nav-link active' href='logout.php'>Logout</a>
                            </li>";
                    }
                ?>
            </ul>
        </nav>
        <div class="container">
            <div class="row" align="center" style="padding-top: 100px;">
                <div class="col-12">           
                    <div class="card">
                        <h5 class="card-header">Profile Details</h5>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-2"></div>
                                <div class="col-sm-8">
            						<?php
                                        //check whether session cookie is set or not
                						if(isset($_COOKIE['session_cookie']))
                						{
                							session_start();
                                            //check whether CSRF token submitted in the post request is the same which save in the server side
                							if ($_POST['csrf_Token'] == $_SESSION['CSRF_Token']) 
                							{
                                                //if CSRF token matched below details will be displayed
                								$fname=$_POST['name'];
                								$university=$_POST['university'];
                								$degree=$_POST['degree'];
                								$year=$_POST['year'];

                								echo "<div class='alert alert-primary' role='alert'>".$fname."</div>";
                								echo "<div class='alert alert-secondary' role='alert'>".$university."</div>";
                								echo "<div class='alert alert-success' role='alert'>".$degree."</div>";
                								echo "<div class='alert alert-info' role='alert'>".$year."</div>";		
                							}
                							else
                							{
                                                //if CSRF tokens aren't matched below error will be displayed
                								echo "<script>alert('WARNING :: CSRF Found !!!')</script>";
                							}
                						}
            						?>
                                </div>
                                <div class="col-sm-2"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <script src="/Assigment_01/public/js/bootstrap.min.js"></script>
        <script src="/Assigment_01/public/js/popper.min.js"></script>
    </body>
</html>