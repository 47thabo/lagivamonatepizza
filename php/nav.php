<?php
session_start();
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
  $loggedin= true;
  $userId = $_SESSION['userId'];
  $username = $_SESSION['username'];
}
else{
  $loggedin = false;
  $userId = 0;
}

$sql = "SELECT * FROM `sitedetail`";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

$systemName = $row['systemName'];

echo "
    <nav class=\"navbar sticky-top navbar-expand-lg navbar-light bg-light\">
        <div class=\"container-fluid\">
            <a class=\"navbar-brand\" href=\"index.php\">Navbar</a>
            <button class=\"navbar-toggler\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#navbarSupportedContent\" aria-controls=\"navbarSupportedContent\"  aria-expanded=\"false\" aria-label=\"Toggle navigation\">
                <span class=\"navbar-toggler-icon\"></span>
            </button>
            <div class=\"collapse navbar-collapse\" id=\"navbarSupportedContent\">
                <ul class=\"navbar-nav me-auto mb-2 mb-lg-0\">
                    <li class=\"nav-item\">
                        <a class=\"nav-link active\" aria-current=\"page\" href=\"#\">Home</a>
                    </li>
                    <li class=\"nav-item\">
                        <a class=\"nav-link\" href=\"#\">Link</a>
                    </li>
                    <li class=\"nav-item dropdown\">
                        <a class=\"nav-link dropdown-toggle\" href=\"#\" id=\"navbarDropdown\" role=\"button\" data-bs-toggle=\"dropdown\" aria-expanded=\"false\">
                        Dropdown
                        </a>
                    <ul class=\"dropdown-menu\" aria-labelledby=\"navbarDropdown\">
                        <li><a class=\"dropdown-item\" href=\"#\">Action</a></li>
                        <li><a class=\"dropdown-item\" href=\"#\">Another action</a></li>
                        <li><hr class=\"dropdown-divider\"></li>
                        <li><a class=\"dropdown-item\" href=\"#\">Something else here</a></li>
                    </ul>
                    </li>
                    <li class=\"nav-item\">
                        <a class=\"nav-link\" href=\"about.php\">About Us</a>
                    </li>
                    <li class=\"nav-item\">
                        <a class=\"nav-link\" href=\"contact.php\">Contact Us</a>
                    </li>

                    <li class=\"nav-item\">
                        <a class=\"nav-link disabled\" href=\"#\" tabindex=\"-1\" aria-disabled=\"true\">Disabled</a>
                    </li>
                </ul>
                <form class=\"d-flex\">
                    <input class=\"form-control me-2\" type=\"search\" placeholder=\"Search\" aria-label=\"Search\">
                    <button class=\"btn btn-outline-success\" type=\"submit\">Search</button>
                </form>
                
                <ul class=\"navbar-nav mr-2\">
                    <li class=\"nav-item dropdown\">
                    <a class=\"nav-link dropdown-toggle\" href=\"#\" id=\"navbarDropdown\" role=\"button\" data-toggle=\"dropdown\"> Welcome ' .$username. '</a>
                    <div class=\"dropdown-menu\" aria-labelledby=\"navbarDropdown\">
                        <a class=\"dropdown-item\" href=\"partials/_logout.php\">Logout</a>
                    </div>
                    </li>
                </ul>
                <div class=\"text-center image-size-small position-relative\">
                    <a href=\"viewProfile.php\"><img src=\"img/person-' .$userId. '.jpg\" class=\"rounded-circle\" onError=\"this.src = \'img/profilePic.jpg\'\" style=\"width:40px; height:40px\"></a>
                </div>


            </div>
        </div>
    </nav>
"

?>