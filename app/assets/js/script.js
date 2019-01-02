

// script for add to cart
  $("button#addToCart").on("click", function(){
  //get the product id
  let productId = $(this).attr("data-id");
  let quantity = $("#quantity" + productId).val();

  console.log("Product Id:" + productId);
  console.log("Quantity Id:" + quantity);

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

  $("#login").click(()=>{

    let email_login = $("#email_login").val();
    let password_login = $("#password_login").val();

    if(email_login == "" || password_login == ""){
      $("#login_msg").css("color", "red");
      $("#login_msg").html("No such thing as a ghost, right?");
    }else{
      $.post("../controllers/con_login.php", {
      email_login:email_login, password_login:password_login},
      function(data){
        if(data == "Maybe it's me, not you?"){
          $("#login_msg").css("color", "red");
          $("#login_msg").html(data);
          //document.location = 'index.php'; 
        }else{
          $("#login_msg").css("color", "green");
          $("#login_msg").html(data);
          document.location = 'cart.php'; 
        }
      
      })
      
      

    }


    
  })

  







  
