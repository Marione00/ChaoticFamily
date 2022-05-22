    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="cardsstyle.css">
        <meta http-equiv="content-type" content="text/html charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>

<?php 

    if(isset($_SESSION['userId'])){
        require 'includes/db.inc.php'; 
        $id= $_SESSION['userId'];
            echo '
                <section id="search-section">
                    <div class="container-fluid">
                        <div class="container-fluid text-center pt-3 outbox">
                            <div class="row">
                                <div class="col-lg-8 col-md-10 col-sm-11 mx-auto">
                                    <form action="index.php" method="POST" class="order-1 d-flex flex-sm-row flex-column align-items-center">
                                        <input type="text" minlength="2" name="search-hero" class="border-0 form-control h-100 mt-2 mt-sm-0">
                                        <button type="submit" name="search-submit-hero" class="btn btn-primary mr-sm-1 mt-4 mt-sm-0 mx-auto flex-fill">Search</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>';
                
                    if(isset($_POST["search-submit-hero"])){
                        
                        $search = $_POST["search-hero"];
                        $id= $_SESSION['userId'];
                        $sql="SELECT * FROM characters WHERE fullName LIKE '%$search%' AND idUser = $id ;";
                
                        $result = mysqli_query($conn,$sql);
                        $resultCheck = mysqli_num_rows($result);
                        
                        if($resultCheck > 0){
                            while($row = mysqli_fetch_assoc($result)){
                            echo '
                            <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
                                <div class="container">
                            <div class="card-deck">
                                <div class="card " style="width: 18rem;">
                                    <div class="row no-gutters feature-image">
                                        <img class="card-img-top imagehero" src=includes/upload/'.$row["imageCharacter"].' alt="Card image cap">
                                    </div>
                                <div class="card-body">
                                    <h5 class="card-title">'.$row["fullName"].'</h5>
                                    <p class="card-text">'.$row["lore"].'</p>    
                                </div>
                                <a href="loreChanger.php?id='.$row["idCharacter"].'&name='.$row["fullName"].'&img='.$row["imageCharacter"].'&game='.$row["game"].'&lore='.$row["lore"].'" class="heroesCheck btn btn-primary">Modify</a>
                            </div>';
                            }
                        }
                    };
                    echo '</div>
                    </main>';
    };
                
    
    
?>

