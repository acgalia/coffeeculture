<!-- Navigation -->
<?php session_start();?>
<?php error_reporting(0);?>
   
  <!-- <img class="logo" src="assets/images/logo.jpg"> -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
  <a class="navbar-brand" href="index.php"><img class="logo" src="../assets/images/logodark.png"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

<!-- echo "<a href='../controllers/logout.php'>Logout</a>"; -->
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav m-auto nav-tabs">
      <!-- <li class="nav-item">
        <a class="nav-link" href="index.php">Home</a>
      </li> -->
      <li class="nav-item px-5">
        <a class="nav-link" href="catalog.php"><i class="fas fa-archive"></i> Catalog <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <?php
        // $id = $_POST["productId"];
        // $quantity = $_POST["quantity"];

        //update the items for session cart variable

        // $_SESSION["cart"][$id] = $quantity;
        // $_SESSION["item_count"] = array_sum($_SESSION["cart"]); 
        if (isset($_SESSION['email'])){
          echo "
          <li class='nav-item dropdown px-5'>
            <a class='nav-link dropdown-toggle' href='' id='navbarDropdown' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'><i class='fas fa-user'></i> 
              Hi ". $_SESSION['firstname'] ."
            </a>
            <div class='dropdown-menu' aria-labelledby='navbarDropdown'>
              <a class='dropdown-item' href='#'>Wishlist</a>
              <a class='dropdown-item' href='account.php'>My Account</a>
              <a class='dropdown-item' href='transaction.php'>Transaction History</a>
              <div class='dropdown-divider'></div>
              <a class='dropdown-item' href='../controllers/logout.php'>Logout</a>
            </div>
          </li>
          <li>
            <a class='nav-link px-5 glyphicon glyphicon-shopping cart' href='cart.php'><i class='fab fa-opencart'></i> Cart <span class = 'badge badge-primary'>". $_SESSION['item_count']."</span></a>
          </li>
          ";
        }else{
          echo "
          <a class='nav-link px-5' data-toggle='modal' data-target='#exampleModalCenter' href=''><i class='fas fa-user'></i> Login</a>
          </li>
          <li class='nav-item'>
            <a class='nav-link px-5 glyphicon glyphicon-shopping cart' href='cart.php'><i class='fab fa-opencart'></i> Cart <span class = 'badge badge-primary'>". $_SESSION['item_count']."</span></a>
          </li>
          ";
        }
        ?>
       <!--  <a class='nav-link px-5' href='cart.php'><i class='fab fa-opencart'></i> Cart</a>
        </li>  -->    
    </ul>

    <!-- <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form> -->
  </div>
</nav> 

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Login</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <!-- form for login -->
        <form method="post" action="">
          <div class="modal-body">           
            <input type="text" id="email_login" placeholder="Email">
            <input type="password" id="password_login" placeholder="Password">
            <p id="login_msg"></p>           
          </div>
          <div class="modal-footer">
            <div><a href="register.php">Not yet registered?</a></div>
            <input id="login" type="button" class="btn btn-secondary" value="Enter">
          </div>
        </form>      
    </div>
  </div>
</div>

<script type="text/javascript">
  

</script>




      