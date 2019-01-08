<?php include "../partials/header.php";?>
<?php include "../partials/navbar.php";?>

<div class="container-fluid wallpaper3 py-5">
  <div class="container opacity">
  	<div class="row">
  		<div class="col-lg-1 col-md-1"></div>
  		<div class="col-lg-7 col-md-7">
        <?php if(isset($_SESSION['email'])){
          
          echo "<strong>404 Page not found</strong>";

        }else{
          echo "
            <div class='card'>
              <div class='card-header bg-dark text-white'>Admin Login</div>
              <div class='card-body'>         
                  <form action='../controllers/admin_con.php' method='POST'>
                    <div class='form-group'>
                      <label>Username</label>
                      <input type='text' class='form-control' name='admin_un'>
                    </div>            
                    <div class='form-group'>
                      <label>Password</label>
                      <input type='password' class='form-control' name='admin_pw'>
                    </div>
                    <input type='submit' class='btn btn-outline-dark' value='LOG-IN'>
                  </form>             
              </div>      
            </div>
          ";
        }

        ?>
  			
  		</div>
  	</div>
  </div>
</div>


<?php include "../partials/footer.php";?>