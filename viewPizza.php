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
    <title id=title>Pizza</title>
    <link rel = "icon" href ="img/logo.jpg" type = "image/x-icon">
    <style>
    #cont {
        min-height : 578px;
    }
    </style>
</head>
<body>
    <?php include 'php/_dbconnect.php';?>
    <?php require 'php/navbar.php' ?>
    <div class="banner-spacer"></div>

    <div class="container my-4" id="cont">
        <div class="row jumbotron">
        <?php
            $pizzaId = $_GET['pizzaid'];
            $userId = 1;
            $loggedin = 1;
            $sql = "SELECT * FROM `pizza` WHERE pizzaId = $pizzaId";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            $pizzaName = $row['pizzaName'];
            $pizzaPrice = $row['pizzaPrice'];
            $pizzaDesc = $row['pizzaDesc'];
            $pizzaCategorieId = $row['pizzaCategorieId'];
        ?>
        <script> document.getElementById("title").innerHTML = "<?php echo $pizzaName; ?>"; </script> 
        <?php
        echo  '<div class="col-md-4">
                <img src="img/pizza-'.$pizzaId. '.jpg" width="249px" height="262px">
            </div>
            <div class="col-md-8 my-4">
                <h3>' . $pizzaName . '</h3>
                <h5 style="color: #ff0000">R'.$pizzaPrice. '</h5>
                <p class="mb-0">' .$pizzaDesc .'</p>';

                if($loggedin){
                    $quaSql = "SELECT `itemQuantity` FROM `viewcart` WHERE pizzaId = '$pizzaId' AND `userId`='$userId'";
                    $quaresult = mysqli_query($conn, $quaSql);
                    $quaExistRows = mysqli_num_rows($quaresult);
                    if($quaExistRows == 0) {
                        echo '<form action="partials/_manageCart.php" method="POST">
                              <input type="hidden" name="itemId" value="'.$pizzaId. '">
                              <button type="submit" name="addToCart" class="btn btn-primary my-2">Add to Cart</button>';
                    }else {
                        echo '<a href="viewCart.php"><button class="btn btn-primary my-2">Go to Cart</button></a>';
                    }
                }
                else{
                    echo '<button class="btn btn-primary my-2" data-toggle="modal" data-target="#loginModal">Add to Cart</button>';
                }
                echo '</form>
                <h6 class="my-1"> View </h6>
                <div class="mx-4">
                    <a href="viewPizzaList.php?catid=' . $pizzaCategorieId . '" class="active text-dark">
                    <i class="fas fa-qrcode"></i>
                        <span>All Pizza</span>
                    </a>
                </div>
                <div class="mx-4">
                    <a href="index.php" class="active text-dark">
                    <i class="fas fa-qrcode"></i>
                        <span>All Category</span>
                    </a>
                </div>
            </div>'
        ?>
        </div>
    </div>

    <?php require 'php/footer.php' ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>   
</body>
</html>