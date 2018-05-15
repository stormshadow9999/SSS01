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
                        <h5 class="card-header">Update Profile</h5>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-2"></div>
                                <div class="col-sm-8">
                                    <?php 
                                        // check whether session cookie is set to display below content
                                        if(isset($_COOKIE['session_cookie'])) 
                                        {
                                            //form which will be submit using Synchronizer Token Pattern
                                            echo "
                    						<form action='endpoint.php' method='POST' enctype='multipart/form-data'>
                                                <!-- CSRF Token -->
                                                    <input type='hidden' name='csrf_Token' id='csrf_Token' value=''>   
                                                <!--  -->
                                                <div class='form-group row'>
                                                	<label for='name' class='col-sm-2 col-form-label'>Full Name</label>
                                                <div class='col-sm-10'>
                                                    <input type='text' class='form-control' id='name' name='name' placeholder='Full Name' required>
                                                </div>
                                                </div>
                                              
                                              	<div class='form-group row'>
                                                    <label for='university' class='col-sm-2 col-form-label'>University</label>
                                                <div class='col-sm-10'>
                                                    <input type='text' class='form-control' id='university' name='university' placeholder='University' required>
                                                </div>
                                              	</div>
                    							
                    							<div class='form-group row'>
                                                    <label for='degree' class='col-sm-2 col-form-label'>Degree</label>
                                                <div class='col-sm-10'>
                                                    <input type='text' class='form-control' id='degree' name='degree' placeholder='Degree' required>
                                                </div>
                                              	</div>

                                              	<div class='form-group row'>
                                                    <label for='year' class='col-sm-2 col-form-label'>Year</label>
                                                <div class='col-sm-10'>
                                                    <input type='number' class='form-control' id='year' name='year' placeholder='Year' required>
                                                </div>
                                              	</div>
                                                <button type='submit' class='btn btn-primary' id='submit' name='submit'>Submit</button>
                                           </form>";
                                        }
                                    ?>
                                    <!-- this script send json request to the server and retrive the CSRF token which was saved at the server side when uder logged in -->
                                    <!-- then set the hidden input of the above form called CSARF_token value  -->
            						<script >
            						var request="true";
            						$.ajax({
            						url:"csrf.php",
            						method:"POST",
            						data:{request:request},
            						dataType:"JSON",
            						success:function(data)
            						{
            							document.getElementById("csrf_Token").value=data.token;
            						}

            						})
            						</script>
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