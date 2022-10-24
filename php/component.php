<?php
function component($cat, $id, $desc){
    $element = "
    
    <div class=\"col-lg-3 col-md-4 col-sm-6 col-sm6 col-6 my-4\">
        <a href=\"viewPizzaList.php?catid=$id\">
            <div class=\"menu-card\" style=\"width: 14rem;\">
                <img src=\"img/card-$id.jpg\" class=\"card-img-top\" alt=\"image for this category\" width=\"249px\" height=\"210px\">
                <div class=\"card-body\">
                    <h5 class=\"card-title h-card-title font-weight-bold\"><a href=\"viewPizzaList.php?catid= $id\"> $cat</a></h5>
                    <p class=\"card-text\">$desc</p>
                </div>
            </div>     
        </a>       
    </div>
    ";
    echo $element;
}

?>