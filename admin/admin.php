<?php
session_start();
if ($_SESSION['admin_login_status'] != "loged in" and !isset($_SESSION['user_id']))
  header("Location:../index.php");

if (isset($_GET['sign']) and $_GET['sign'] == "out") {
  $_SESSION['admin_login_status'] = "loged out";
  unset($_SESSION['user_id']);
  header("Location:../index.php");
}

include('../connection.php');

if (isset($_POST['delete_customer'])) {
  $username = $_POST['username'];

  $delete_query = "DELETE FROM customer WHERE username = '$username'";
  if ($con->query($delete_query) === TRUE) {
    header("Location: admin.php");
  } else {
    echo "Error deleting customer: " . $con->error;
  }
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
      background: white;
    }

    .main {
      display: flex;
      align-items: center;
      justify-content: center;
      min-height: 95vh;
      background: rgba(51, 43, 43, 0.3);
    }

    .box {
      text-align: center;
      width: 800px;
      min-height: 50px;
      backdrop-filter: blur(10px);
      box-shadow: 0 0 30px rgb(0, 0, 0);
      border-radius: 10px;
      margin-top: 10vh;
      margin-bottom: 5vh;
    }

    .box h1 {
      padding-top: 20px;
    }


    /* table css start */
    .table-container {
      width: fit-content;
      height: 100%;
      margin: auto;
      margin-top: 20px;
      padding-bottom: 40px;
    }

    table {
      border-collapse: collapse;
      width: 700px;
    }

    th,
    td {
      border: 1px solid black;
      padding: 8px;
      text-align: center;
    }

    .submit {
      width: 100%;
      height: 20px;
      border: none;
      border-radius: 5px;
      background: transparent;
      color: rgb(60, 38, 38);
    }

    .submit:hover {
      background: transparent;
      color: black;
    }
  </style>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Customer Record</title>
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
      <?php

      include('../connection.php');

      $sql = "SELECT username,email, Phone, Address FROM customer";
      $result = $con->query($sql);
      ?>

      <h1>Customer Record</h1>
      <div class="table-container">
        <table>
          <tr>
            <th>Username</th>
            <th>Email</th>
            <th>Mobile Number</th>
            <th>Address</th>
            <th>Action</th>
          </tr>

          <?php
          if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
              echo "<tr>";
              echo "<td>" . $row["username"] . "</td>";
              echo "<td>" . $row["email"] . "</td>";
              echo "<td>" . $row["Phone"] . "</td>";
              echo "<td>" . $row["Address"] . "</td>";
              echo "<td>";
              echo "<form method='post' action='admin.php'>";
              echo "<input type='hidden' name='username' value='" . $row["username"] . "'>";
              echo "<button type='submit' class='submit' name='delete_customer' value='Delete'>
                  <i class='fa fa-trash' >
                    </i>
                    </button>
                  ";
              echo "</form>";
              echo "</td>";
              echo "</tr>";
            }
          } else {
            echo "0 results";
          }
          $con->close();
          ?>
        </table>
      </div>
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