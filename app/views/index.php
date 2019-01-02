<?php include "../partials/header.php";?>
<?php include "../partials/navbar.php";?>
<?php include "../partials/carousel.php";?>

<div class="container">
<h1 class="text-center">Featured Items</h1>
 <div class="row">
    <?php 
      require "../controllers/connect.php";
      $sql = "SELECT * FROM items LIMIT 4";
      $result = mysqli_query($conn,$sql);

      if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
          echo"
            <div class='col-md-3 mb-3'>
              <div class='card h-100 shadow-lg mb-5 bg-white rounded'>
                <div class='card-header bg-dark text-light'><h6><a href='../views/product.php?name=$row[name]'><span class='item_name'>$row[name]</span></a></div> 
                <div class='card-body p-5'>
                  <img class='card-img-top' src='$row[img_path]' alt='$row[name]'>           
                </div>
                <div class='card-footer'>
                  <div class='row'>
                    <h6 class='col-sm-12 text-right'>₱ $row[price]</h6>              
                    <input class='mb-2 col-sm-12' type='number' min='1' value='1' id='quantity$row[id]'>             
                    <button class='btn btn-block btn-secondary' id='addToCart' data-id='$row[id]'><i class='fas fa-cart-plus'></i> Add to cart</button>
                  </div>
                </div>
              </div>
            </div>
          ";
        }
      }
    ?>
  </div> 

 
<!-- <button class='btn btn-block btn-secondary'><i class='far fa-heart'></i> Add to wishlist</button> -->
</div>
<?php include "../partials/footer.php";?>

<script type="text/javascript">
  // script for add to cart
  $("button#addToCart").on("click", function(){
  //get the product id
  let productId = $(this).attr("data-id");
  let quantity = $("#quantity" + productId).val();

  // console.log("Product Id:" + productId);
  // console.log("Quantity Id:" + quantity);

  $.ajax({
    url: "../controllers/addToCart.php",
    method: "POST",
    data:
      {
        productId: productId,
        quantity: quantity
      },
    dataType:"text",
      success:function(data){
        $("a[href='cart.php']").html(data);
      }
  })
})

  //$(document).ready(()=>{

  

//});

  
</script>