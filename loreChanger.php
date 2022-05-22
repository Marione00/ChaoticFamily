<html>
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="charactercreatorstyle.css">
        <meta http-equiv="content-type" content="text/html charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>History' Changer</title>
    </head>
    <?php
    $id = $_GET['id']; 
    $name = $_GET['name']; 
    $img = $_GET['img'];
    $game = $_GET['game'];
    $lore = $_GET['lore'];
   ?>
    <body>
        <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
            <div class="container-lg">
                <div class="card login-card">
                <div class="row no-gutters">
                    <div class="col-md-3 feature_image">
                       <img class="rounded card-img-top mx-auto d-block login-img" id="output" src="includes/upload/<?php echo $img ?>"/>
                    </div>
                    <div class="col-md-7">
                        <div class="card-body">
                            <p class="login-description primary-text">Modify your hero</p>
                            <form action="includes/#.inc.php" method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                <select name="elenco" class="dropdown dropdown-toggle" id="dropelenco" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <div class="dropdown-menu" aria-labelledby="dropelenco">
                                        <option class="dropdown-item" value="1"<?php if($game==1){echo 'selected=selected';}?>>D&D</option>
                                        <option class="dropdown-item" value="2"<?php if($game==2){echo 'selected=selected';}?>>Souls&Blood</option>
                                        <option class="dropdown-item" value="3"<?php if($game==3){echo 'selected=selected';}?>>HouseHold</option>
                                        <option class="dropdown-item" value="4"<?php if($game==4){echo 'selected=selected';}?>>Pathfinder</option>
                                        <option class="dropdown-item" value="5"<?php if($game==5){echo 'selected=selected';}?>>Vampire maquerade</option>
                                        <option class="dropdown-item" value="6"<?php if($game==6){echo 'selected=selected';}?>>Starfinder</option>
                                        <option class="dropdown-item" value="7"<?php if($game==7){echo 'selected=selected';}?>>shadow of the Demon Lord</option>
                                        <option class="dropdown-item" value="8"<?php if($game==8){echo 'selected=selected';}?>>Legends of five rings</option>
                                    </div>
                                </select>
                                </div>
                                
                                <div class="form-group">
                                    <label for="heroName" class="sr-only">Hero's Name</label>
                                    <input type="text" name="heroName" id="nickname" class="form-control" placeholder="Hero's name" value="<?php echo $name; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="herolore" class="sr-only">Hero's lore</label>
                                    <textarea name="heroLore" id="heroLore" class="form-control" placeholder="Hero's lore"><?php echo $lore ?></textarea>
                                </div>
                                <div class="form-group">
                                    <div class="container-sender">
                                        <input type="file" id="filesender" name="uploadfile" onchange="loadFile(event)">    
                                    </div>
                                </div>
                                 <input name="change" id="changehero" class="btn btn-block login-btn mb-4" type="submit" value="CREATE">
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