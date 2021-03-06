<?php require_once "../partials/header.php";?>
<?php require_once "../partials/navbar.php";?>
<?php require_once "../partials/carousel.php";?>

<div class="container-fluid wallpaper4 py-5">
  <div class="container">
  <h1 class="text-center">Featured Items</h1>
   <div class="row">
      <?php 
        require_once "../controllers/connect.php";
        $sql = "SELECT * FROM items LIMIT 4";
        $result = mysqli_query($conn,$sql);

        if(mysqli_num_rows($result) > 0){
          while($row = mysqli_fetch_assoc($result)){
            echo"
              <a style='text-decoration: none' href='../views/product.php?name=$row[name]'>
                <div class='col-md-3 mb-3'>
                  <div class='card h-100 shadow-lg bg-white rounded'>
                    <div class='card-header bg-dark item_name text-center'><h6><span><strong>$row[name]</strong></span></h6></div>
                    <div class='card-body p-5'>
                      <img class='card-img-top' src='$row[img_path]' alt='$row[name]'>           
                    </div>
              </a>
                  <div class='card-footer'>
                    <div class='row'>
                      <h6 class='col-sm-12 text-right'>₱ $row[price]</h6>              
                      <input class='mb-2 col-sm-12' type='number' min='1' value='1' id='quantity$row[id]' oninput='this.value = Math.abs(this.value)'>             
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
</div>
<?php require_once "../partials/footer.php";?>

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