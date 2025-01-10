<?php
session_start();
if ($_SESSION['customer_login_status'] != "loged in" and !isset($_SESSION['user_id']))
   header("Location:../login.php");

if (isset($_GET['sign']) and $_GET['sign'] == "out") {
   $_SESSION['customer_login_status'] = "loged out";
   unset($_SESSION['user_id']);
   header("Location:../index.php");
}
?>

<?php
include("../connection.php");
function generateRandomString($length = 10)
{
   $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
   $randomString = substr(str_shuffle($characters), 0, $length);

   return $randomString;
}

if (isset($_POST['chkbtn'])) {
   $select_cart = mysqli_query($con, "SELECT * FROM cart");
   if (mysqli_num_rows($select_cart) > 0) {
      $oid = generateRandomString(5);
      while ($fetch_cart = mysqli_fetch_assoc($select_cart)) {
         $username = $_SESSION['user_id'];
         $pid = $fetch_cart['pid'];
         $pname = $fetch_cart['P_name'];
         $price = $fetch_cart['Price'];
         $quantity = $fetch_cart['quantity'];
         $insertorder = mysqli_query($con, "INSERT INTO orderline(username, O_id, p_id, p_name, quantity, price) VALUES('$username','$oid','$pid', '$pname', '$quantity', '$price')");
         mysqli_query($con, "DELETE FROM `cart`");
      }
   }
}

if (isset($_POST['update_update_btn'])) {
   $update_value = $_POST['update_quantity'];
   $update_id = $_POST['update_quantity_id'];
   $update_quantity_query = mysqli_query($con, "UPDATE `cart` SET quantity = '$update_value' WHERE P_name = '$update_id'");
   if ($update_quantity_query) {
      header('location:cart.php');
   }
   ;
}
;

if (isset($_GET['remove'])) {
   $remove_id = $_GET['remove'];
   mysqli_query($con, "DELETE FROM `cart` WHERE P_name = '$remove_id'");
   header('location:cart.php');
}
;

if (isset($_GET['delete_all'])) {
   mysqli_query($con, "DELETE FROM `cart`");
   header('location:cart.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>shopping cart</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <script src="https://code.jquery.com/jquery-1.10.2.js"></script>

   <style>
      :root {
         --blue: #2980b9;
         --red: tomato;
         --orange: orange;
         --black: #333;
         --white: #fff;
         --bg-color: #eee;
         --dark-bg: rgba(0, 0, 0, .7);
         --box-shadow: 0 .5rem 1rem rgba(0, 0, 0, .1);
         --border: .1rem solid #999;
      }

      * {
         font-family: 'Times New Roman', Times, serif;
         margin: 0;
         padding: 0;
         box-sizing: border-box;
         outline: none;
         border: none;
         text-decoration: none;
      }

      html {
         overflow-x: hidden;
      }

      .container {
         width: 100%;
         margin: 0 auto;
         min-height: 95vh;
         background-color: white;
      }

      section {
         padding: 2rem;
      }

      .heading {
         padding-top: 10vh;
         text-align: center;
         font-size: 3.5rem;
         text-transform: uppercase;
         color: var(--black);
         margin-bottom: 2rem;
      }

      .btn,
      .option-btn,
      .delete-btn {
         display: block;
         width: 100%;
         text-align: center;
         background-color: var(--blue);
         color: var(--white);
         font-size: 1.7rem;
         padding: 1.2rem 3rem;
         border-radius: .5rem;
         cursor: pointer;
         margin-top: 1rem;
      }

      .btn:hover,
      .option-btn:hover,
      .delete-btn:hover {
         color: white;
         background-color: var(--black);
      }

      .option-btn i,
      .delete-btn i {
         padding-right: .5rem;
      }

      .shopping-cart table {
         text-align: center;
         width: 100%;
      }

      .shopping-cart table thead th {
         padding: 1.5rem;
         font-size: 2rem;
         color: var(--white);
         background-color: var(--black);
      }

      .shopping-cart table tr td {
         border-bottom: var(--border);
         padding: 1.5rem;
         font-size: 2rem;
         color: var(--black);
      }

      .shopping-cart table input[type="number"] {
         border: var(--border);
         padding: 1rem 2rem;
         font-size: 2rem;
         color: var(--black);
         width: 10rem;
      }

      .shopping-cart table input[type="submit"] {
         padding: .5rem 1.5rem;
         cursor: pointer;
         font-size: 2rem;
         background-color: var(--orange);

         color: var(--white);
      }

      .shopping-cart table input[type="submit"]:hover {
         background-color: var(--black);
      }

      .shopping-cart table .table-bottom {
         background-color: var(--bg-color);
      }

      .shopping-cart .checkout-btn {
         text-align: center;
         margin-top: 1rem;
         width: 300px;
         margin: auto;
      }

      .shopping-cart .checkout-btn a {
         display: inline-block;
         width: auto;
      }

      .shopping-cart .checkout-btn a.disabled {
         pointer-events: none;
         opacity: .5;
         user-select: none;
      }

      .popup {
         display: flex;
         justify-content: center;
         align-items: center;
         position: fixed;
         top: 0;
         left: 0;
         width: 100%;
         height: 100%;
         background-color: rgba(0, 0, 0, 0.5);
      }

      .popup-content {
         background-color: white;
         padding: 20px;
         text-align: center;
         border-radius: 10px;
      }

      .popup-content button {
         margin-top: 10px;
         padding: 10px 20px;
         font-size: 16px;
         color: #2980b9;
      }
   </style>

</head>

<body>

   <!-- navbar start -->
   <script>
      $(function () {
         $("#nav-placeholder").load("nav2.php");
      });
   </script>
   <div id="nav-placeholder"></div>
   <!-- navbar end -->


   <div class="container">
      <section class="shopping-cart">
         <h1 class="heading">Shopping Cart</h1>

         <table>

            <thead>
               <th>Image</th>
               <th>Name</th>
               <th>Price</th>
               <th>Quantity</th>
               <th>Total Price</th>
               <th>Action</th>
            </thead>

            <tbody>

               <?php
               $select_cart = mysqli_query($con, "SELECT * FROM `cart`");
               $grand_total = 0;
               if (mysqli_num_rows($select_cart) > 0) {
                  while ($fetch_cart = mysqli_fetch_assoc($select_cart)) {
                     ?>

                     <tr>
                        <td width="10px"><img src="../pimg/<?php echo $fetch_cart['P_img']; ?>" height="100" alt=""></td>
                        <td>
                           <?php echo $fetch_cart['P_name']; ?>
                        </td>
                        <td>
                           <?php echo number_format($fetch_cart['Price']); ?>/-
                        </td>
                        <td>
                           <form action="" method="post" class="quan-form">
                              <input type="hidden" name="update_quantity_id" value="<?php echo $fetch_cart['P_name']; ?>">
                              <input type="number" name="update_quantity" min="1"
                                 value="<?php echo $fetch_cart['quantity']; ?>">

                              <button type="submit" name="update_update_btn"><i class="fa fa-refresh"
                                    aria-hidden="true"></i></button>
                           </form>
                        </td>
                        <td>
                           <?php echo $sub_total = ($fetch_cart['Price'] * $fetch_cart['quantity']); ?>/-
                        </td>
                        <td><a href="cart.php?remove=<?php echo $fetch_cart['P_name']; ?>"
                              onclick="return confirm('remove item from cart?')" class="delete-btn"> <i
                                 class="fas fa-trash"></i></a></td>
                     </tr>
                     <?php
                     $grand_total += $sub_total;
                  }
                  ;
               }
               ;
               ?>
               <tr class="table-bottom">
                  <td><a href="home.php" class="option-btn" style="margin-top: 0;">Continue Shopping</a></td>
                  <td colspan="3">Grand Total</td>
                  <td>
                     <?php echo $grand_total; ?>/-
                  </td>
                  <td><a href="Cart.php?delete_all" onclick="return confirm('are you sure you want to delete all?');"
                        class="delete-btn"> <i class="fas fa-trash"></i>All </a></td>
               </tr>

            </tbody>

         </table>

         <form action="Cart.php" method="post" class="quan-form">
            <div class="checkout-btn">

               <!-- <a href="#" class="btn <?= ($grand_total > 1) ? '' : 'disabled'; ?>">procced to checkout</a> -->

               <button type="checkout" class="btn" onclick="showPopup()" name="chkbtn" id="chkbtn">Checkout</button>
            </div>
         </form>

      </section>
   </div>


   <!-- footer start -->
   <script>
      $(function () {
         $("#footer-placeholder").load("../footer.php");
      });
   </script>
   <div id="footer-placeholder"></div>
   <!-- footer end -->


</body>

</html>