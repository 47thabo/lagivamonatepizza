<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css" integrity="sha384-jLKHWM3JRmfMU0A5x5AkjWkw/EYfGUAGagvnfryNV3F9VqM98XiIH7VBGVoxVSc7" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="./css/style.css">
    <title id="title">Category</title>
    <link rel = "icon" href ="img/logo.jpg" type = "image/x-icon">
    <style>
    .jumbotron {
        padding: 2rem 1rem;
    }
    #cont {
        min-height : 570px;
    }
    </style>
</head>
<body>
    <?php include 'php/_dbconnect.php';?>
    <?php require 'php/navbar.php' ?>
    <div class="banner-spacer"></div>

    <div>&nbsp;
        <a href="index.php" class="active text-dark">
        <i class="fas fa-qrcode"></i>
            <span>All Category</span>
        </a>
    </div>

    <?php
        $id = $_GET['catid'];
        $sql = "SELECT * FROM `categories` WHERE categorieId = $id";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($result)){
            $catname = $row['categorieName'];
            $catdesc = $row['categorieDesc'];
        }
    ?>
  
    <!-- Pizza container starts here -->
    <div class="container my-3" id="cont">
        <div class="col-lg-4 text-center bg-light my-3" style="margin:auto;border-top: 2px groove black;border-bottom: 2px groove black;">     
            <h2 class="text-center"><span id="catTitle">Items</span></h2>
        </div>
        <div class="row">
        <!--?php
            $id = $_GET['catid'];
            $sql = "SELECT * FROM `pizza` WHERE pizzaCategorieId = $id";
            $result = mysqli_query($conn, $sql);
            $loggedin = false;
            $noResult = true;
            while($row = mysqli_fetch_assoc($result)){
                $noResult = false;
                $pizzaId = $row['pizzaId'];
                $pizzaName = $row['pizzaName'];
                $pizzaPrice = $row['pizzaPrice'];
                $pizzaDesc = $row['pizzaDesc'];
            
                echo '<div class="col-md-3 col-sm-6  my-2 white-b">
                        <div class="vp-card" style="width: 12rem;">
                            <img src="img/pizza-'.$pizzaId. '.jpg" class="card-img-top" alt="image for this pizza" width="249px" height="70px">
                            <div class="card-body white-b">
                                <h6 class="card-title">' . substr($pizzaName, 0, 20). '</h6>
                                <h6 style="color: #ff0000">Rs. '.$pizzaPrice. '/-</h6>
                                <div class="vp-c-body"></div>
                                <!p class="card-text">' . substr($pizzaDesc, 0, 29). '...</p->   
                                <div class="row justify-content-center">';
                                if($loggedin){
                                    $quaSql = "SELECT `itemQuantity` FROM `viewcart` WHERE pizzaId = '$pizzaId' AND `userId`='$userId'";
                                    $quaresult = mysqli_query($conn, $quaSql);
                                    $quaExistRows = mysqli_num_rows($quaresult);
                                    if($quaExistRows == 0) {
                                        echo '<form action="partials/_manageCart.php" method="POST">
                                              <input type="hidden" name="itemId" value="'.$pizzaId. '">
                                              <button type="submit" name="addToCart" class="btn btn-primary mx-2">Add to Cart</button>';
                                    }else {
                                        echo '<a href="viewCart.php"><button class="btn btn-primary mx-2">Go to Cart</button></a>';
                                    }
                                }
                                else{
                                    echo '<!-button class="btn btn-primary mx-2" data-toggle="modal" data-target="#loginModal">Add to Cart</button->';
                                }
                            echo '</form>                            
                                <a href="viewPizza.php?pizzaid=' . $pizzaId . '" class="mx-2"><button class="btn btn-primary">Quick View</button></a> 
                                </div>
                            </div>
                        </div>
                    </div>';
            }
            if($noResult) {
                echo '<div class="jumbotron jumbotron-fluid">
                    <div class="container">
                        <p class="display-4">Sorry In this category No items available.</p>
                        <p class="lead"> We will update Soon.</p>
                    </div>
                </div> ';
            }
            ?-->

            

        </div>
        <div class="view-piza-container">
                <div class="row">
                    <?php
                    $count = 0;
                    $id = $_GET['catid'];
                    $sql = "SELECT * FROM `pizza` WHERE pizzaCategorieId = $id";
                    $result = mysqli_query($conn, $sql);
                    $loggedin = false;
                    $noResult = true;
                    while($row = mysqli_fetch_assoc($result)){
                        $noResult = false;
                        $pizzaId = $row['pizzaId'];
                        $pizzaName = $row['pizzaName'];
                        $pizzaPrice = $row['pizzaPrice'];
                        $pizzaDesc = $row['pizzaDesc'];
                        $b_price = $row['price_branch'];
                        echo '<div class="vp-card col-12 col-sm-6 col-md-4 col-lg-3 my-4">
                                <a href="viewPizza.php?pizzaid=' . $pizzaId . '" class="mx-2">
                                <div class="vp-s-card  style="width: 200px;">
                                    <img src="img/pizza-'.$pizzaId. '.jpg" alt="" width="200px" height="170px;" >
                                    <div class="vp-s-card-body">
                                        <h5>'.$pizzaName.'</h5>';
                                        if ($b_price == "l")
                                        {
                                            $sql2 = "SELECT * FROM `l_prices` WHERE item_id = $pizzaId";
                                            $result2 = mysqli_query($conn, $sql2);
                                            $row2 = mysqli_fetch_assoc($result2);
                                            $large_price = $row2['large_price'];
                                            echo '<p>Small R'.$pizzaPrice . ' Large R' . $large_price . ' </p>';
                                        }
                                        else 
                                            if ($b_price == "ml")
                                            {
                                                $sql2 = "SELECT * FROM `ml_prices` WHERE item_id = $pizzaId";
                                                $result2 = mysqli_query($conn, $sql2);
                                                $row2 = mysqli_fetch_assoc($result2);
                                                $medium_price = $row2['medium_price'];
                                                $large_price = $row2['large_price'];
                                                echo '<p>Small R'.$pizzaPrice . '  Medium R' . $medium_price . ' <br> Large R' . $large_price . ' </p>';
                                            }
                                            else {

                                                echo '<p>R'.$pizzaPrice . '</p>';
                                            }
                                            echo ' 
                                    </div>
                                </div>
                                </a>
                              </div>';
                        $count++;
                    }
                    ?>
                    
                    
                </div>
            </div>

    </div>


    <?php require 'php/footer.php' ?>

    <div class="copy-right">
                <p>&COPY Lagiva Monate Pizza, 2022. All Rights Reserved.</p>
    </div>
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>   

    <!--script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>         
    <script src="https://unpkg.com/bootstrap-show-password@1.2.1/dist/bootstrap-show-password.min.js"></script-->
    <script> 
        document.getElementById("title").innerHTML = "<?php echo $catname; ?>"; 
        document.getElementById("catTitle").innerHTML = "<?php echo $catname; ?>"; 
    </script> 
</body>
</html>