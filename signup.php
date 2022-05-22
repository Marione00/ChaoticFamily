<html>
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="signupstyle.css"> 
        <meta http-equiv="content-type" content="text/html charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Choose your Weapon!</title>
    </head>
    <body>
        <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
            <div class="container-lg">
                <div class="card login-card">
                <div class="row no-gutters">
                    <div class="col-md-5">
                       <!-- <img src="..." alt="login" class="login-img"> -->
                    </div>
                    <div class="col-md-7">
                        <div class="card-body">
                            <div class="brand-wrapper">
                                <img src="logo.svg" alt="logo" class="logo">
                            </div>
                            <p class="login-description primary-text">Login into the lore</p>
                            <?php
					            if (isset($_GET['error'])) {
			                         if ($_GET["error"] == "emptyfields") {
			                        	echo '<p>Please fill in all fields!</p>';
			                         }
			                         else if ($_GET["error"] == "invaliduidmail") {
			                        	echo '<p>Invalid username and e-mail!</p>';
			                         }
			                         else if ($_GET["error"] == "invaliduid") {
			                        	echo '<p>Invalid username</p>';
			                         }
			                         else if ($_GET["error"] == "invalidmail") {
			                        	echo '<p>Invalid e-mail!</p>';
			                         }
			                         else if ($_GET["error"] == "passwordcheck") {
			                        	echo '<p>Your passwords do not match!</p>';
			                         }
			                         else if ($_GET["error"] == "usertaken") {
			                        	echo '<p>Username is already taken!</p>';
			                         }
			                         else if ($_GET["error"] == "emailtaken") {
			                        	echo '<p>Email is already taken!</p>';
			                         }
			                    }

			                    else if (isset($_GET['signup']) && $_GET["signup"] == "success") {
				                    echo '<p class="signupsuccess">Signup succesfull!</p>';
                                }
					        ?>
                            <form action="includes/signup.inc.php" method="POST">
                                <div class="form-group">
                                    <label for="nickname" class="sr-only">Nickname</label>
                                    <input type="text" name="nickname" id="nickname" class="form-control" placeholder="Nickname or email">
                                </div>
                                <div class="form-group">
                                    <label for="email" class="sr-only">Email</label>
                                    <input type="email" name="email" id="email" class="form-control" placeholder="example@yourdomain.dnd">
                                </div>
                                <div class="form-group">
                                    <label for="password" class="sr-only">password</label>
                                    <input type="password" name="password" id="password" class="form-control" placeholder="********">
                                </div>
                                <div class="form-group">
                                    <label for="pwd-repeat" class="sr-only">password</label>
                                    <input type="password" name="pwd-repeat" id="pwd-repeat" class="form-control" placeholder="********">
                                </div>
                                <input name="signup" id="signup" class="btn btn-block login-btn mb-4" type="submit" value="signup">
                            </form>
                            <nav class="login-card-footer-nav">
                                <a href="#"> Terms of use </a>
                                <a href="#"> Privay policy </a></nav>
                        </div>
                    </div>
                </div>      
                </div>
                
            </div>
        </main>
    </body>
</html>