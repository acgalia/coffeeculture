<?php include "../partials/header.php";?>
<?php include "../partials/navbar.php";?>


<!-- button categories  -->
<div class='container mt-5 bg-dark'>
  <!-- BUTTON CATEGORIES NOT COMMENT OUT FOR NOW -->
<!--   <div class="row">
    <div class="col-lg-12">
      
    
      <?php 
            require "../controllers/connect.php";
            $sql = "SELECT * FROM categories";
            $result = mysqli_query($conn,$sql);

            if(mysqli_num_rows($result) > 0){
              while($row = mysqli_fetch_assoc($result)){
                echo"

   
                                     
                  <button type='button' class='w-25 btn btn-lg btn-secondary' onclick='showCategories($row[id])'>$row[c_name]</button>
                                    
                ";
              }
            }
          ?>
      </div>
    
  </div> -->

  
  <div class="row my-4 py-4">
    <div class="col-lg-9"></div>
    <div class="col-lg-3">
    <div class='btn-group'>
      <button class='btn btn-secondary btn-sm dropdown-toggle bg-dark' type='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>Categories
      </button> 
      <div class='dropdown-menu bg-dark'>
<!--       <a class='dropdown-item' href='#'>All</a>
      <a class='dropdown-item' href='#'>New Items</a>
          <div class="dropdown-divider"></div>  -->        
          <?php 
            require "../controllers/connect.php";
            $sql = "SELECT * FROM categories";
            $result = mysqli_query($conn,$sql);

            if(mysqli_num_rows($result) > 0){
              while($row = mysqli_fetch_assoc($result)){
                echo"                                  
                  <a href='#' class='dropdown-item' onclick='showCategories($row[id])'>$row[c_name]</a>                 
                ";
              }
            }
          ?>


        
        </div> <!-- end dropdown menu -->       
      </div>
      
    </div>
    <!-- search bar of catalog -->
    <div class="col-lg-3" >
      <div class="input-group">
        <input id="search" type="text" class="form-control" placeholder="Search">
        <!-- <div class="input-group-append">
          <button class="btn btn-outline-secondary" type="button" id="button-addon2"><i class="fas fa-search"></i></button>
        </div> -->
      </div>
    </div>
    <div class="col-lg-6"></div>
    
    <!-- sort by price button -->
    <div class="col-lg-3" >
      <select class="custom-select" id="price">
        <option selected="#" disabled>Sort by Price</option>
        <hr>
        <option value="DESC">Highest to Lowest</option>
        <option value="ASC">Lowest to Highest</option>
      </select> 
    </div>
  </div>

<!-- pagination -->
  <!-- <nav aria-label="Page navigation example">
  <ul class="pagination justify-content-center">
    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
    <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item"><a class="page-link" href="#">Next</a></li>
  </ul>
</nav> -->

  <!-- output -->
  <div class="row" id="products"> 
    <?php 
      require "../controllers/connect.php";
      $sql = "SELECT * FROM items";
      $result = mysqli_query($conn,$sql);

      if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
          echo"

            <div class='col-md-3 mb-3'>
              <div class='card h-100 shadow-lg mb-5 bg-white rounded'>
                  <div class='card-header bg-dark text-light'> <a class ='item_link' href='../views/product.php?name=$row[name]'><h6>$row[name]</a></div>               
                  <div class='card-body p-5'>
                    <img class='card-img-top' src='$row[img_path]' alt='$row[name]'>           
                  </div>               
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
</div> <!-- end container -->

   <!-- Footer -->
<?php include "../partials/footer.php" ;?>

<!-- script for sort categories -->
<script type="text/javascript">
  function showCategories(categoryId){
    // alert(categoryId);
    $.ajax({
      url:"../controllers/show_items.php",
      method:"POST",
      data:{
        categoryId:categoryId
      },
      dataType:"text",
      success: function(data){
        $("#products").html(data);
      }
    })
  }

  // $(showCategories).click(function(){
  //   let categoryId = $(this).val();
  //   console.log(categoryId);

  //   //AJAX request
  //   $.post("../controllers/search.php", {categoryId:categoryId}, function(data){
  //     $("#products").html(data);
  //   })
  // });



//script for search items
   $("#search").keyup(function(){
    let word = $(this).val();
    console.log(word);

    //AJAX request
    $.post("../controllers/search.php", {word:word}, function(data){
      $("#products").html(data);
    })
  });

//script for sort price
  $("#price").change(function(){
    let price = $(this).val();
    console.log(price);

    //AJAX request
    $.post("../controllers/sort_price.php", {price:price}, function(data){
      $("#products").html(data);
    })
  });

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
</script>


<!-- <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script> -->