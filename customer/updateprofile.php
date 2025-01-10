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

<html>
<header>

  <style>
    * {
      margin: 0;
      padding: 0;
    }

    body {
      font-family: Times New Roman, serif;
      color: rgb(0, 0, 0);
      background-image: none;
      background-size: cover;
    }

    .main {
      display: flex;
      align-items: center;
      justify-content: center;
      min-height: 95vh;
      width: 100%;
      background: rgba(51, 43, 43, 0.3);

    }

    .box {
      display: inline-block;
      text-align: center;
      width: 500px;
      height: 400px;
      backdrop-filter: blur(10px);
      box-shadow: 0 0 30px rgb(0, 0, 0);
      border-radius: 10px;
      margin-top: 10vh;
    }

    .box h1 {
      padding-top: 30px;
      margin-bottom: 15px
    }

    .input,
    .drop,
    input[type=file]::file-selector-button {
      text-align: center;
      background-color: transparent;
      border-radius: 10px;
      border: 1px solid;
      width: 65%;
      margin-top: 8px;
      height: 30px;
    }

    #img-label {

      display: block;
      width: 65%;
      border-radius: 10px;
      border: 1px solid;
      height: 30px;
      margin: 0 0 0 17%;
    }

    option {
      text-align: center;
      background-color: rgba(95, 92, 89, 0.271);
      color: rgb(0, 0, 0);
    }

    #img {
      display: none;
    }

    ::-webkit-input-placeholder {
      text-align: center;
      color: rgb(0, 0, 0);
    }

    .submit {
      width: 60%;
      height: 40px;
      border: none;
      margin: 15 0 10 0px;
      border-radius: 10px;
      background-color: rgba(0, 0, 0, 0.658);
      color: rgba(255, 255, 255, 0.737);
    }

    .submit:hover {
      background-color: rgba(246, 241, 241, 0.305);
      color: rgb(0, 0, 0);
      box-shadow: 0 0 30px rgb(0, 0, 0);
    }

    a {
      color: black;
      text-decoration: none;
      font-weight: 600;
    }

    a:hover {
      font-weight: 600;
      font-size: 21px;
    }

    .successful {
      color: green;
      text-align: center;
      margin-top: 10px;
    }

    .error {
      color: red;
      text-align: center;
      margin-top: 10px;
    }

    @media (max-width: 600px) {
      .box {
        width: 90%;
        height: 470px;
      }
    }
  </style>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update Profile</title>
  <script src="https://kit.fontawesome.com/06d164d474.js" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
</header>

<body>

  <!-- navbar start -->
  <script>
    $(function () {
      $("#nav-placeholder").load("nav2.php");
    });
  </script>
  <div id="nav-placeholder"></div>
  <!-- navbar end -->


  <div class="main">
    <div class="box">

      <form action="updateprofile.php" method="post">

        <h1>Update Your Profile</h1>

        <input type="text" placeholder="Old Username" name="username" class="input" required>
        <input type="text" placeholder="New Username" name="nusername" class="input" required>

        <input type="text" placeholder="Email" name="email" class="input" required>
        <input type="number" placeholder="Phone" name="phone" class="input" required>

        <input type="text" placeholder="Address" name="address" class="input" required>

        <button type="submit" name="submit" class="submit">Update</button>

        <?php
        include("../connection.php");
        if (isset($_POST['submit'])) {
          $username = $_POST['username'];
          $nusername = $_POST['nusername'];
          $email = $_POST['email'];
          $Phone = $_POST['phone'];
          $Address = $_POST['address'];


          $sql = "select username from customer where username='$username'";
          $r = mysqli_query($con, $sql);

          if (mysqli_num_rows($r) > 0) {
            $sql1 = "update customer set username='$nusername', email='$email', Phone='$Phone', Address='$Address' WHERE username='$username'";

            if (mysqli_query($con, $sql1)) {
              $_SESSION['user_id'] = $nusername;
              header("Location:profile.php");
            } else {
              echo "<div class='error'><p>Invalid Username</p></div>";
            }
          } else {
            echo "<div class='error'><p>Wrong Old Username</p></div>";
          }
        }
        ?>

      </form>
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