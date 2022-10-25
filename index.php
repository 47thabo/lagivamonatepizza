<?php require_once('./php/component.php');?>

<?php include 'php/_dbconnect.php';?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Lagiva Monate Pizza</title>

    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css"
        integrity="sha384-jLKHWM3JRmfMU0A5x5AkjWkw/EYfGUAGagvnfryNV3F9VqM98XiIH7VBGVoxVSc7" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="./css/style.css">
</head>

<body>

    <?php include 'php/navbar.php';?>

    <div class="banner-spacer"></div>

    <section class="section1">
        <div class="b-image">
            <img src="images/logo/original.png" alt="">
        </div>
        <div class="b-text">
            <div>
                <!--h1>Vision</h1-->
                <p>Good things come to those who chase, as we say hands to hands, the smarter you eat, one bite puts
                    your heart, soul, mind, into your smallest units that will be your secret of success.</p>
            </div>
        </div>
    </section>

    <div class="white-cont">

        <div class="col-lg-4 text-center h-menu-heading bg-light my-3"
            style="margin:auto;border-top: 2px groove black;border-bottom: 2px groove black;">
            <h2 class="text-center"><span id="catTitle">Menu</span></h2>
        </div>
        <div class="container main-cont">

            <div class="row text-center py-5">
                <?php
                    $sql = "SELECT * FROM `categories`"; 
                    $result = mysqli_query($conn, $sql);
                    while($row = mysqli_fetch_assoc($result)){
                    $id = $row['categorieId'];
                     $cat = $row['categorieName'];
                    //$descr = $row['categorieDesc'];
                    $descr = ""; //empty for now?
                    $desc = substr($descr, 0, 40);
                    component($cat, $id, $desc);
                    }
                ?>
            </div>
        </div>
    </div>
    <?php include 'php/footer.php';?>

    <div class="copy-right">
        <p>&COPY Lagiva Monate Pizza, 2022. All Rights Reserved.</p>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
    </script>
</body>

</html>