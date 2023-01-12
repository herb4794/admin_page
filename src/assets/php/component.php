<?php
// this code by using for the  Body of Side Scroll
function productComponent($productName, $productPrice, $description, $productImage, $productId, $discount){

$productComponentElement = 

"

<div class=\"product-card\">
<form action=\"#\" method=\"post\">
<div class=\"product-image\">
  <img src=\"$productImage\" class=\"product-thumb\" alt=\"\">
</div>
<div class=\"product-info\">
  <div class=\"like-share-save\">
    <i class=\"like-icon\"></i>
    <i class=\"share-icon\"></i>
    <i class=\"save-icon\"></i>
  </div>
  <h2 class=\"product-brand\">$productName</h2>
  <p class=\"product-short-description\">$description</p>
  <div class=\"discount-price\">
    <span class=\"actual-price\">$$productPrice</span>
  </div>
  <div class=\"product-price\">
    <span class=\"price\">$$discount</span>
  </div>
  <div class=\"add-to-cart-container\">
    <button class=\"add-to-cart-btn\" type=\"submit\" name=\"add\">
    <input type=\"hidden\" name=\"product_id\" value=\"$productId\"></input>
      <span>Add to Cart</span>
      <div class=\"cart\">
        <svg viewBox=\"0 0 36 26\">
          <polyline points=\"1 2.5 6 2.5 10 18.5 25.5 18.5 28.5 7.5 7.5 7.5\"></polyline>
          <polyline points=\"15 13.5 17 15.5 22 10.5\"></polyline>
        </svg>
      </div>
    </button>
  </div>
</div>
</form>

</div>

";

echo $productComponentElement;

}

// this code by using for the Body of Guess You Like
function productListComponent($productName, $productPrice, $description, $productImage, $productId, $discount){

$productListComponentElement = 
"

<div class=\"product-card col\">
<div class=\"product-image\">
<form action=\"#\" method=\"post\">
  <img src=\"$productImage\" class=\"product-thumb\" alt=\"\">
</div>
<div class=\"product-info\">
  <div class=\"like-share-save\">
    <i class=\"like-icon\"></i>
    <i class=\"share-icon\"></i>
    <i class=\"save-icon\"></i>
  </div>
  <h2 class=\"product-brand\">$productName</h2>
  <p class=\"product-short-description\">$description</p>
  <div class=\"discount-price\">
    <span class=\"actual-price\">$$productPrice</span>
  </div>
  <div class=\"product-price\">
    <span class=\"price\">$$discount</span>
    </div>
    <div class=\"add-to-cart-container\">
    <button  class=\"add-to-cart-btn btn-primary\" type=\"submit\" name=\"add\" >
    <input type=\"hidden\" name=\"product_id\" value=\"$productId\"></input>
    <span >Add to Cart</span>
  <div class=\"cart\">
  <svg name=\"add\" viewBox=\"0 0 36 26\">
  <polyline points=\"1 2.5 6 2.5 10 18.5 25.5 18.5 28.5 7.5 7.5 7.5\"></polyline>
  <polyline points=\"15 13.5 17 15.5 22 10.5\"></polyline>
  </svg>
  </div>
    </button>
  </div>
  </form>
</div>
</div>


";

echo $productListComponentElement;

}

function cartComponent($productName, $discount, $description, $productImage, $productId){

$cartComponentElement = 
"

<form action=\"cart.php?action=remove&id=$productId\" method=\"post\" class=\"cart-items\">
<div class=\"border rounded\">
  <div class=\"row bg-white\">
    <div class=\"col-md-3 pl-0\">
      <img src=$productImage alt=\"Image1\" class=\"img-fluid\">
    </div>
    <div class=\"col-md-6\">
      <h5 class=\"pt-2\">$productName</h5>
      <small class=\"text-secondary\">$description</small>
      <h5 class=\"pt-2\">$$discount</h5>
      <button type=\"submit\" class=\"btn btn-warning\">Save for Later</button>
      <button type=\"submit\" class=\"btn btn-danger mx-2\" name=\"remove\">Remove</button>
    </div>
    <div class=\"col-md-3 py-5\">
      <div>
      </div>
    </div>
  </div>
</div>
</form>

";

echo $cartComponentElement;

}

function addProduct($productName, $discount, $description, $productImage, $productId){
  $addProductElement =
  
  "

  <form action=\"\" method=\"post\" >
  <input>$productName<\input>
  <input> $discount<\input>
  <input>$description<\input>
  <input> $productImage<\input>
  <input>$productId<\input>
  <button href=\"\" class=\"btn btn-primary\" name=\"addProduct\">
  create
  </button>
  </form>
  
  ";
  
  echo  $addProductElement;
}



?>