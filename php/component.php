<?php

function component($productName, $image, $productPrice, $productId){
    $element = "
    
    <div class=\"container mt-4\">
    <form action=\"products.php\" method=\"post\">    
    <div class=\"row col-container product-box\" style=\"background-color:#F8EEE1\">
            <div class=\"col-sm-6 product-column\">
                <img src=$image class=\"card-img-top img-responsive product-image\" alt=\"leaf1\">
            </div>
            <div class=\"col product-column text-column\">
                <h5 class=\"card-title\">$productName</h5>
                <p class=\"card-text\"><strong>€$productPrice/set</strong></p>
                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl
                    ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent
                    luptatum zzril delenit augue duis dolore te feugait nulla facilisi.</p>
                <div class=\"button-holder\">
                    <input type=\"text\" id=\"quantity_button\" name=\"quantity\" class=\"form-control w-25 mr-2\" value=\"1\" />
                    <button type=\"submit\" name=\"add\" class=\"btn btn-primary purchase-button\" id=\"button-purchase\"><i class=\"fa fa-shopping-cart\"></i> Add to cart</button>
                    <input type=\"hidden\" name=\"product_id\" value=$productId>
                </div>
            </div>
        </div>
</form>
</div>
";

echo $element;
}

function showProduct($productName, $image, $productPrice){
    $element ="
    <div class=\"col-sm-4\">
    <div class=\"card\">
        <a href=\"products.php\"><img src=$image class=\"card-img-top img-responsive\" alt=\"leaf1\"></a>
        <div class=\"card-body\">
            <a href=\"products.php\" style=\"text-decoration: none;\">
                <h5 class=\"card-title\">$productName</h5>
            </a>
            <p class=\"card-text\"><strong>€$productPrice/set</strong></p>
        </div>
    </div>
    </div>
    ";

    echo $element; 
}

function cartElement($productimg, $productname, $productprice, $productid, $quantity){
    $element = "
    
    <form action=\"cart.php?action=remove&id=$productid\" method=\"post\" class=\"cart-items\">
                    <div class=\"border rounded\">
                        <div class=\"row bg-white\">
                            <div class=\"col-md-3 pl-0\">
                                <img src=$productimg alt=\"Image1\" id=\"cart-image\" class=\"img-fluid\">
                            </div>
                            <div class=\"col-md-5 mb-2\">
                                <h5 class=\"pt-2\">$productname</h5>
                                <h5 class=\"pt-2\">$$productprice</h5>
                                <button type=\"submit\" class=\"btn btn-sm btn-warning\">Save for Later</button>
                                <button type=\"submit\" class=\"btn btn-sm btn-danger mx-2\" name=\"remove\">Remove</button>
                            </div>
                            <div class=\"col-md-4 py-5\">
                            <h5 class=\"pt-2\">qty $quantity</h5>
                            </div>
                        </div>
                    </div>
                </form>
    
    ";
    echo  $element;
}


