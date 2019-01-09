
  <!-- Footer -->
    <footer class="bg-dark text-light">
    <div class="container-fluid p-3">
      <div class="row">
        <div class="col-lg-2"></div>
        <div class="col-lg-4">
          <h5>Here at <span style="color:#ff4f17">Coffee Culture</span></h5>
          <p>It is our mission to provide an avenue for individuals like you and me to experience great coffee and to continue doing so without sacrificing quality, cost and convenience. The specialty coffee industry is growing and we want you to be part of it, not just as a coffee drinker but as one who has become part of the Coffee Culture.
          <?php if (isset($_SESSION['email'])){
            echo "";
          }else{
            echo "
                         <span><a href='items.php'><small>Manage Website</small></a></span></p>
            ";
          }



          ?>
        </div>
        <div class="col-lg-4 text-center">
          <a href="#" class="p-1"><i class="fab fa-facebook"></i></a>
          <a href="#" class="p-1"><i class="fab fa-twitter"></i></a>
          <a href="#" class="p-1"><i class="fab fa-instagram"></i></a>
          <a href="#" class="p-1"><i class="fab fa-snapchat"></i></a>
           <div>
              <p>Legal | Terms of Use | Privacy Policy | Cookie Policy | Support</p>
            </div>
        </div>
       
        <div class="col-lg-12 text-center">
          All rights reserved: Coffee Culture, 3rd Floor Caswynn Building, No. 134 Timog Avenue, Sacred Heart, Diliman, Quezon City, 1103
        </div>
      </div>
    </div>
  </footer>
<!-- style="color:#ff4f17" -->
    <!-- jquery first then popper and bootstrap -->
    <script type="text/javascript" src="../assets/js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="../assets/js/script.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>
    <!-- <script src="../assets/js/bootstrap.bundle.min.js"></script> -->

    <!--script for register validation  -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
    <script>$.validate({lang: 'en'});</script>
    <!--script for register validation  -->

</body>
</html>