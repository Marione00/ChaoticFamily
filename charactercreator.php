<html>
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="charactercreatorstyle.css">
        <meta http-equiv="content-type" content="text/html charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Lets create!</title>
    </head>
    <body>
        <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
            <div class="container-lg">
                <div class="card login-card">
                <div class="row no-gutters">
                    <div class="col-md-5 feature_image">
                       <img class="rounded card-img-top mx-auto d-block login-img" id="output"/>
                    </div>
                    <div class="col-md-7">
                        <div class="card-body">
                            <p class="login-description primary-text">Create your hero</p>
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
                            <form action="includes/charactercreator.inc.php" method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                <select name="elenco" class="dropdown dropdown-toggle" id="dropelenco" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <div class="dropdown-menu" aria-labelledby="dropelenco">
                                        <option selected class="dropdown-item" value="1">D&D</option>
                                        <option class="dropdown-item" value="2">Souls&Blood</option>
                                        <option class="dropdown-item" value="3">HouseHold</option>
                                        <option class="dropdown-item" value="4">Pathfinder</option>
                                        <option class="dropdown-item" value="5">Vampire maquerade</option>
                                        <option class="dropdown-item" value="6">Starfinder</option>
                                        <option class="dropdown-item" value="7">shadow of the Demon Lord</option>
                                        <option class="dropdown-item" value="8">Legends of five rings</option>
                                    </div>
                                </select>
                                </div>
                                
                                <div class="form-group">
                                    <label for="nickname" class="sr-only">Hero's Name</label>
                                    <input type="text" name="heroName" id="nickname" class="form-control" placeholder="Nickname or email">
                                </div>
                                <div class="form-group">
                                    <label for="email" class="sr-only">Hero's lore</label>
                                    <textarea name="heroLore" id="heroLore" class="form-control" placeholder="Hero's lore" row="4"></textarea>
                                </div>
                                <div class="form-group">
                                    <div class="container-sender">
                                        <input type="file" id="filesender" name="uploadfile" onchange="loadFile(event)">    
                                    </div>
                                </div>
                                 <input name="createhero" id="createhero" class="btn btn-block login-btn mb-4" type="submit" value="CREATE">
                            </form>
                        </div>
                    </div>
                </div>      
                </div>
                
            </div>
        </main>
    </body>
</html>
<script>
  var loadFile = function(event) {
    var reader = new FileReader();
    reader.onload = function(){
      var output = document.getElementById('output');
      output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
  };
</script>