<?php
session_start();
if ($_SESSION['admin_login_status'] != "loged in" and !isset($_SESSION['user_id']))
  header("Location:../index.php");

if (isset($_GET['sign']) and $_GET['sign'] == "out") {
  $_SESSION['admin_login_status'] = "loged out";
  unset($_SESSION['user_id']);
  header("Location:../index.php");
}
?>

<!DOCTYPE html>
<html>

<head>

  <style>
    * {
      margin: 0;
      padding: 0;
    }

    body {
      font-family: 'Times New Roman', Times, serif;
      color: rgb(0, 0, 0);
      background-image: none;
      background-size: cover;
    }

    .main {
      display: flex;
      align-items: center;
      justify-content: center;
      min-height: 95vh;
      background: rgba(51, 43, 43, 0.3);
    }

    .box {
      display: inline-block;
      text-align: center;
      width: 550px;
      height: 450px;
      backdrop-filter: blur(10px);
      box-shadow: 0 0 30px rgb(0, 0, 0);
      border-radius: 10px;
      margin-top: 10vh;
    }

    .box h1 {
      padding-top: 6px;
      margin-bottom: 5px;
    }

    .input {
      text-align: center;
      background-color: transparent;
      border-radius: 10px;
      margin-top: 10px;
      border: 1px solid;
      width: 70%;
      height: 30px;
    }

    ::-webkit-input-placeholder {
      text-align: center;
      color: rgb(0, 0, 0);
    }

    .submit {
      width: 70%;
      height: 40px;
      border: none;
      margin: 3% 0 3% 0;
      border-radius: 10px;
      background-color: rgba(0, 0, 0, 0.658);
      color: rgba(255, 255, 255, 0.737);
    }

    .submit:hover {
      background-color: rgba(246, 241, 241, 0.305);
      color: rgb(0, 0, 0);
      box-shadow: 0 0 30px rgb(0, 0, 0);
    }

    .successful {
      color: green;
      text-align: center;
      margin-top: 0px;
    }

    .error {
      color: red;
      text-align: center;
      margin-top: 0px;
    }
  </style>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Product Upload</title>
  <script src="https://kit.fontawesome.com/06d164d474.js" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
</head>

<body>

  <!-- navbar start -->
  <script>
    $(function () {
      $("#nav-placeholder").load("nav3.php");
    });
  </script>
  <div id="nav-placeholder"></div>
  <!-- navbar end -->


  <div class="main">
    <div class="box">

      <h1>Product Upload</h1>

      <form action="upload.php" method="post" enctype="multipart/form-data">

        <input type="text" class="input" id="pid" name="pid" placeholder="Product ID" required>

        <input type="text" class="input" id="name" name="pname" placeholder="Product name" required>

        <input type="text" class="input" id="decr" name="decr" placeholder="Description" required>

        <input type="number" class="input" id="price" name="price" placeholder="Price" required>

        <input type="text" class="input" id="brand" name="brand" placeholder="Brand" required>

        <input type="text" class="input" id="cat" name="catagory" placeholder="Catagory" required>

        <input type="file" class="input" id="image" name="image" required>

        <input type="submit" class="submit" value="Submit" name="submit">

      </form>

      <?php
      include("../connection.php");
      if (isset($_POST['submit'])) {
        $pid = $_POST['pid'];
        $pname = $_POST['pname'];
        $decr = $_POST['decr'];
        $price = $_POST['price'];
        $brand = $_POST['brand'];
        $catagory = $_POST['catagory'];

        //image upload code
        $ext = explode(".", $_FILES['image']['name']);
        $c = count($ext);
        $ext = $ext[$c - 1];
        $date = date("D:M:Y");
        $time = date("h:i:s");
        $image_name = md5($date . $time . $pid);
        $image = $image_name . "." . $ext;

        $query = "INSERT INTO product VALUES ('$pid', '$pname', '$decr', '$price', '$brand', '$catagory', '$image')";
        try {
          if (mysqli_query($con, $query)) {
            echo "<div class='successful'><p>Successfully inserted!</p></div>";

            if ($image != null) {
              move_uploaded_file($_FILES['image']['tmp_name'], "../pimg/$image");
            }
          } else {
            throw new Exception(mysqli_error($con));
          }
        } catch (Exception $e) {
          if ($e->getCode() == 1062) {
            echo "<div class='error'><p>Duplicate Product Id Entry</p></div>";
          }
        }
      }
      ?>

    </div>
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