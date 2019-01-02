<?php session_start(); ?>
<?php error_reporting(0);?> 
<h1>My Cart</h1>

<?php include 'connect.php'; ?>
<?php

$data ='
         <table class="table table-striped table-dark">
           <thead>
             <tr>
               <th scope="col">Product</th>
               <th scope="col">Price</th>
               <th scope="col">Quantity</th>
               <th scope="col">Sub-total</th>
             </tr>
           </thead>
           <tbody>
  ';



$grand_total = 0;
foreach($_SESSION['cart'] as $id=> $quantity) {
   $sql = "SELECT * FROM items where id = '$id' ";
             $result = mysqli_query($conn, $sql);
               if(mysqli_num_rows($result) > 0){
                   while($row = mysqli_fetch_assoc($result)){
                     $name = $row["name"];
                     $description = $row["description"];
                     $price = $row["price"];
                     //$_SESSION["price"] = $price;

                       //For computing the sub total and grand total
                       $subTotal = $quantity * $price;
                       $_SESSION["subTotal"] = $subTotal;
                       $grand_total += $subTotal;
                       $_SESSION["grand_total"] = $grand_total;

                       $data .=
                         "<tr>
                             <td><img src='$row[img_path]' width='25%' height='25%'></td>
                             <td id='price$id'> $price</td>
                             <td><input type='number' class ='form-control' value = '$quantity' id='quantity$id'  min='1' size='5' onchange=changeNoItems($id)></td>
                             <td class='sub-total' id='subTotal$id'>". number_format ("$subTotal",2)  ."</td>
                             <td><button class='btn bg-dark text-light' onclick=removeFromCart($id)>Remove</button></td>
                         </tr>";
                   }
               }
}
if(isset($_SESSION['email'])){
  $data .="</tbody></table>
             <hr>
             <h3 align='right'>Total: &#x20B1; <span id='grandTotal'>". number_format ("$grand_total",2) ."</span><br><a href='checkout.php'><button class='btn btn-success btn-dark'>Check Out</button></a></h3>
             <hr>";
}else{
  $data .="</tbody></table>
             <hr>
             <h3 align='right'>Total: &#x20B1; <span id='grandTotal'>". number_format ("$grand_total",2) ."</span><br><a data-toggle='modal' data-target='#exampleModalCenter'><button class='btn btn-success btn-dark'>Check Out</button></a></h3>
             <hr>";
}  

// <a class='nav-link px-5' data-toggle='modal' data-target='#exampleModalCenter' href=''><i class='fas fa-user'></i> Login</a>
  echo $data;


?>