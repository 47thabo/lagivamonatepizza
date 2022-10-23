<?php
    echo "
    <nav class=\"navbar fixed-top navbar-custo navbar-expand-lg navbar-light\">
        <div class=\"container-fluid\">
            <a class=\"navbar-brand\" href=\"#\">
                <img src=\"./images/logo/horizontal.png\" alt=\"\" width=\"100\" height=\"auto\">
            </a>
            <button class=\"navbar-toggler\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#navbarSupportedContent\" aria-controls=\"navbarSupportedContent\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
                <span class=\"navbar-toggler-icon\"></span>
            </button>
            <div class=\"collapse navbar-collapse justify-content-between\" id=\"navbarSupportedContent\">

            <form class=\"d-flex nav-form ml-auto\">
                <input class=\"form-control nav-form me-2\" type=\"search\" placeholder=\"Search for something...\" aria-label=\"Search\">
                <button class=\"btn nav-form btn-outline-success\" type=\"submit\">Search</button>
            </form>

            <ul class=\"navbar-nav ml-auto mb-2 mb-lg-0\">
                <li class=\"nav-item\">
                    <a class=\"nav-link active\" aria-current=\"page\" href=\"index.php\">Home</a>
                </li>
                <!--li class=\"nav-item\">
                    <a class=\"nav-link\" href=\"#\">Link</a>
                </li-->
                <!--li class=\"nav-item dropdown\">
                    <a class=\"nav-link dropdown-toggle\" href=\"#\" id=\"navbarDropdown\" role=\"button\" data-toggle=\"dropdown\" aria-haspopup=\"true\"  aria-expanded=\"false\">
                        Top Categories
                    </a>
                    <div class=\"dropdown-menu\" aria-labelledby=\"navbarDropdown\">";
                        $sql = "SELECT categorieName, categorieId FROM `categories`"; 
                        $result = mysqli_query($conn, $sql);
                        while($row = mysqli_fetch_assoc($result)){
                        echo '<a class="dropdown-item" href="viewPizzaList.php?catid=' .$row['categorieId']. '">' .$row['categorieName']. '</a>';
                        }
                    echo "</div>
                </li-->

                <li class=\"nav-item\">
                    <a class=\"nav-link\" href=\"https://web.whatsapp.com/send?phone=27745103359&text=I would like to order the following:\">Order</a>
                </li>
                <li class=\"nav-item\">
                    <a class=\"nav-link\" href=\"contact.php\">Contact Us</a>
                </li>

                <!--li class=\"nav-item\">
                <a class=\"nav-link disabled\" href=\"#\" tabindex=\"-1\" aria-disabled=\"true\">Disabled</a>
                </li-->
            </ul>
            
            </div>
        </div>
    </nav>
    "

?>