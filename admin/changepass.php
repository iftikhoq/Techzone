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
      background: rgba(51, 43, 43, 0.3);
    }

    .box {
      display: inline-block;
      text-align: center;
      width: 550px;
      height: 350px;
      backdrop-filter: blur(10px);
      box-shadow: 0 0 30px rgb(0, 0, 0);
      border-radius: 10px;
      margin-top: 10vh;
    }

    .box h1 {
      padding-top: 20px;
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
      ;
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
      margin-top: 0px;
    }

    .error {
      color: red;
      text-align: center;
      margin-top: 0px;
    }
  </style>

  <title>Change Password</title>
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

      <h1>Change Your Password</h1>

      <form action="changepass.php" method="post">

        <input type="password" class="input" id="pass" name="opass" placeholder="Old password" required>

        <input type="password" class="input" id="pass" name="npass" placeholder="New Password" required>

        <input type="password" class="input" id="pass" name="cpass" placeholder="Confirm Password" required>

        <input type="submit" class="submit" value="Change Password" name="submit">

      </form>

      <?php
      if (isset($_POST['submit'])) {
        include("../connection.php");
        $username = $_SESSION['user_id'];
        $opass = $_POST['opass'];
        $npass = $_POST['npass'];
        $cpass = $_POST['cpass'];
        if ($npass == $cpass) {
          $sql = "select password from admin where password='$opass' and username='$username'";
          $r = mysqli_query($con, $sql);
          if (mysqli_num_rows($r) > 0) {
            $sql1 = "update admin set password='$npass' where username='$username'";
            if (mysqli_query($con, $sql1)) {
              echo "<div class='successful'><p>Password Changed Successfully!</p></div>";
            }
          } else {
            echo "<div class='error'><p>Wrong Old Password</p></div>";
          }
        } else {
          echo "<div class='error'><p>New Password Doesn't Match</p></div>";
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