<?php
include("connection.php");
if (isset($_POST["submit"])) {
  $pid = $_POST['pid'];
  $product_name = $_POST['product_name'];
  $product_price = $_POST['product_price'];
  $product_image = $_POST['product_image'];
  $product_quantity = 1;

  $select_cart = mysqli_query($con, "SELECT * FROM `cart` WHERE P_name = '$product_name'");

  if (mysqli_num_rows($select_cart) > 0) {
    $message[] = 'product already added to cart';
  } else {
    $insert_product = mysqli_query($con, "INSERT INTO `cart`(pid, P_name, price, quantity,P_img) VALUES('$pid', '$product_name', '$product_price',  '$product_quantity','$product_image')");
    $message[] = 'product added to cart succesfully';
  }
}
?>


<html lang="en">

<head>

  <style>
    * {
      margin: 0;
      padding: 0;
    }

    html {
      scroll-behavior: smooth;
    }

    body {
      background-color: #ffffff;
      font-family: Times New Roman, serif;
    }

    .home {
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      padding-top: 3vh;
      padding-bottom: 5vh;
      width: 100%;
      color: #000000;
      min-height: 50vh;
      background-color: rgba(204, 204, 204, 0.638);
    }

    .wrapper {
      width: 330px;
      height: 420px;
      display: flex;
      background: white;
      margin: auto;
      position: relative;
      overflow: hidden;
      border-radius: 10px 10px 10px 10px;
      box-shadow: 0;
      transform: scale(0.95);
      transition: box-shadow 0.5s, transform 0.5s;
    }

    .wrapper:hover {
      transform: scale(1);
      box-shadow: 5px 20px 30px rgba(0, 0, 0, 0.2);
    }

    .wrapper .inside {
      z-index: 9;
      background: #8a878d;
      width: 140px;
      height: 140px;
      position: absolute;
      top: -70px;
      right: -70px;
      border-radius: 0px 0px 200px 200px;
      transition: all 0.7s, border-radius 2s, top 1s;
      overflow: hidden;
    }

    .wrapper .inside .icon {
      position: absolute;
      right: 85px;
      top: 85px;
      color: rgb(255, 255, 255);
      opacity: 1;
    }

    .wrapper .inside:hover {
      width: 100%;
      right: 0;
      top: 0;
      border-radius: 0;
      height: 80%;
      border-bottom: 1px solid;
      border-color: #ffffff;
    }

    .wrapper .inside:hover .icon {
      opacity: 0;
      right: 15px;
      top: 15px;
    }

    .wrapper .inside:hover .contents {
      opacity: 1;
      transform: scale(1);
      transform: translateY(0);
    }

    .wrapper .inside .contents {
      text-align: center;
      font-size: 22px;
      line-height: 5vh;
      padding: 5%;
      opacity: 0;
      transform: scale(0.5);
      transform: translateY(-200%);
      transition: opacity 0.2s, transform 0.8s;
    }

    .wrapper .container {
      width: 100%;
      height: 100%;
    }

    .wrapper img {
      height: 100%;
      width: 100%;
    }

    .wrapper .container .top {
      height: 80%;
      width: 100%;
    }

    .wrapper .container .bottom {
      width: 200%;
      height: 20%;
      transition: transform 0.5s;
    }

    .wrapper .container .bottom.clicked {
      transform: translateX(-50%);
    }

    .wrapper .container .bottom .left {
      height: 100%;
      width: 50%;
      background: #8a878d;
      position: relative;
      float: left;
    }

    .wrapper .container .bottom .left .details {
      font-size: 20px;
      padding: 15px;
      float: left;
      width: calc(70% - 40px);
    }

    .wrapper .container .bottom .left .buy {
      float: right;
      width: calc(30% - 2px);
      height: 100%;
      background-color: #8a878d;
      transition: 0.5s;
      border-left: 1px solid;
      border-color: #ffffff;
    }

    .buy button {
      background-color: #8a878d;
      border: none;
      width: 100%;
      color: white;
    }

    .buy button:hover {
      background: #666666;
    }

    .wrapper .container .bottom .left .buy i {
      font-size: 30px;
      padding: 30px;
      color: black;
      /* transition: transform 0.5s; */
    }

    .wrapper .container .bottom .right {
      width: 50%;
      background: #8a878d;
      color: black;
      float: right;
      height: 200%;
      overflow: hidden;
      font-size: 20px;
    }

    .wrapper .container .bottom .right .details {
      padding: 25px;
    }
  </style>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tech Zone</title>

  <script src="https://kit.fontawesome.com/06d164d474.js" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12/lib/typed.min.js"></script>


</head>

<body>

  <!-- navbar start -->
  <script>
    $(function () {
      $("#nav-placeholder").load("nav.php");
    });
  </script>
  <div id="nav-placeholder"></div>
  <!-- navbar end -->

  <!-- explore start -->
  <script>
    $(function () {
      $("#explore-placeholder").load("explore.php");
    });
  </script>
  <div id="explore-placeholder"></div>
  <!-- explore end -->


  <div class="home">

    <?php
    include("connection.php");
    $sql = "select * from product ;";
    $r = mysqli_query($con, $sql);
    $rcheck = mysqli_num_rows($r);

    if ($rcheck > 0) {
      while ($row = mysqli_fetch_assoc($r)) {

        $id = $row['P_id'];
        $image = $row['P_img'];
        $name = $row['P_name'];
        $decr = $row['Description'];
        $price = $row['Price'];

        echo "<div class='wrapper'>
            <div class='container'>
            <form action='index.php' method='post'>
                <div class='top'><img src='pimg/$image'></div>
                <input type='hidden' name='product_image' value='" . $image . "'> 
                <div class='bottom bt" . $id . "'>
                    <div class='left'>
                        <div class='details'>
                            <h4>" . $name . "</h4>
                            <input type='hidden' name='product_name' value='" . $name . "'> 
                            <input type='hidden' name='pid' value='" . $id . "'> 
                            <p>" . $price . "৳</p>
                            <input type='hidden' name='product_price' value='" . $price . "'> 
                        </div>
                        <div class='buy b" . $id . "'><button id='cartbtn' type='submit' name='submit' value='$id'> <i class='fa-solid fa-cart-plus'></i></button></div>
                    </div>
                    <div class='right'>
                        <div class='details'>
                            <h3>Added to your cart</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class='inside'>
                <div class='icon'><i class='fa-solid fa-circle-info'></i></div>
                <div class='contents'>
                " . $decr . "
                </div>
            </div>
            </form>
        </div>
    ";

      }
    }
    echo "
    </div>
    ";
    ?>


    <!-- footer start -->
    <script>
      $(function () {
        $("#footer-placeholder").load("footer.php");
      });
    </script>
    <div id="footer-placeholder"></div>
    <!-- footer end -->

  </div>

</body>

</html>