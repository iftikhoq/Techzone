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
      margin-top: 15vh;
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
      padding-bottom: 40px;
    }

    table {
      border-collapse: collapse;
      width: 650px;
      margin-top: 20px;
    }

    th,
    td {
      border: 1px solid black;
      padding: 6px;
      text-align: center;
    }

    .submit {
      width: 100%;
      height: 25px;
      font-weight: 600;
      border: 1px solid;
      border-radius: 5px;
      background: rgb(140, 140, 140);
      color: black;
    }

    .submit:hover {
      background: rgb(62, 62, 62);
      color: rgb(220, 220, 220);
    }
  </style>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Orderline</title>
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
      $sql = "SELECT * FROM `orderline`";
      $result = $con->query($sql);
      ?>

      <h1>Orderline</h1>
      <div class="table-container">

        <?php
        $gtotal = 0;
        $pre = 0;
        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            if ($row["O_id"] != $pre) {
              if ($pre != 0) {
                echo "</tr>";
                echo "<tr>";
                echo "<td colspan='2'></td>";
                echo "<td colspan='2'>Grand Total</td>";
                echo "<td colspan='2'>" . $gtotal . "</td>";
                echo "</tr>";
                echo "</table>";
              }
              $gtotal = 0;
              $pre = $row["O_id"];
              echo " <table>
                    <tr>
                    <th colspan='2'>Username: " . $row["username"] . "</th>
                    <th colspan='2'> Order No: " . $pre . "</th>
                    <form action='function.php' method='post'>
                    <input type='hidden' name='orid' value='" . $pre . "'>
                    <th><button type='submit' name='approve' class='submit'>Approve</button></th>
                    </form>
                    <form action='function.php' method='post'>
                    <input type='hidden' name='orid' value='" . $pre . "'>
                    <th><button type='submit' name='decline' class='submit'>Decline</button></th>
                    </form>
                    </tr>
                    <tr>
                    <th>Pid</th>
                    <th>Pname</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th colspan='2'>Total Price</th>
                    </tr>";
            }
            echo "<tr>";
            echo "<td>" . $row["p_id"] . "</td>";
            echo "<td>" . $row["P_name"] . "</td>";
            echo "<td>" . $row["quantity"] . "</td>";
            echo "<td>" . $row["price"] . "</td>";
            echo "<td colspan='2'>" . $row["price"] * $row["quantity"] . "</td>";

            $gtotal += ($row["price"] * $row["quantity"]);
          }
          echo "</tr>";
          echo "<tr>";
          echo "<td colspan='2'></td>";
          echo "<td colspan='2'>Grand Total</td>";
          echo "<td colspan='2'>" . $gtotal . "</td>";
          echo "</tr>";
          echo "</table>";

        }
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