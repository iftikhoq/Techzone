<?php
session_start();
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
      background-image: url(https://images.unsplash.com/photo-1515895309288-a3815ab7cf81?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NTh8fGJhY2tncm91bmR8ZW58MHx8MHx8fDA%3D&auto=format&fit=crop&w=500&q=60);
      background-size: cover;
    }

    .box {
      margin-top: 8vh;
      display: inline-block;
      text-align: center;
      width: 450px;
      height: 330px;
      backdrop-filter: blur(10px);
      box-shadow: 0 0 30px rgb(0, 0, 0);
      border-radius: 10px;
    }

    .box h1 {
      padding-top: 30px;
      margin-bottom: 15px;
    }

    .input {
      text-align: center;
      background-color: transparent;
      border-radius: 10px;
      margin-top: 10px;
      border: 1px solid;
      width: 70%;
      height: 35px;
    }

    ::-webkit-input-placeholder {
      text-align: center;
      color: rgb(0, 0, 0);
    }

    .submit {
      width: 70%;
      height: 40px;
      border: none;
      margin: 5% 0 3% 0;
      border-radius: 10px;
      background-color: rgba(0, 0, 0, 0.658);
      color: rgba(255, 255, 255, 0.737);
    }

    .submit:hover {
      background-color: rgba(246, 241, 241, 0.305);
      color: rgb(0, 0, 0);
      box-shadow: 0 0 30px rgb(0, 0, 0);
    }

    .box p {
      margin-bottom: 6px;
    }

    .box a {
      color: black;
      text-decoration: none;
      font-weight: 600;
    }

    .box a:hover {
      font-weight: 600;
      font-size: 21px;
    }

    .error {
      color: red;
      text-align: center;
      margin-top: 10px;
    }
  </style>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Login</title>
  <script src="https://kit.fontawesome.com/06d164d474.js" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
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


  <div class="main">
    <div class="box">

      <h1>Login Form</h1>

      <form action="login.php" method="post">

        <input type="text" class="input" id="username" name="username" placeholder="Username" required>

        <input type="password" class="input" id="pass" name="pass" placeholder="Password" required>

        <input type="submit" class="submit" value="login" name="login">

        <p>Don't have an account? <a href="SignUp.php">SignUp</a></p>

        <?php
        include("connection.php");
        if (isset($_POST['login'])) {
          $username = $_POST['username'];
          $pass = $_POST['pass'];

          $sql1 = "select username,password from customer where username='$username' and password='$pass'";
          $sql2 = "select username,password from admin where username='$username' and password='$pass'";

          $cus = mysqli_query($con, $sql1);
          $ad = mysqli_query($con, $sql2);

          if (mysqli_num_rows($ad) == 1) {
            $_SESSION['user_id'] = $username;
            $_SESSION['admin_login_status'] = "loged in";
            header("Location:Admin/admin.php");

          } else if (mysqli_num_rows($cus) > 0) {
            $_SESSION['user_id'] = $username;
            $_SESSION['customer_login_status'] = "loged in";
            header("Location:customer/home.php");
          } else {
            echo "<div class='error'><p>Invalid Username or Password</p></div>";
          }
        }
        ?>

      </form>
    </div>
  </div>


  <!-- footer start -->
  <script>
    $(function () {
      $("#footer-placeholder").load("footer.php");
    });
  </script>
  <div id="footer-placeholder"></div>
  <!-- footer end -->

</body>

</html>