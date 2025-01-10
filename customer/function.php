<?php
include('../connection.php');


// Orderline To Approve

if (isset($_POST["approve"])) {
  $sql = "SELECT * FROM `orderline` WHERE O_id='" . $_POST["orid"] . "'";
  $result = $con->query($sql);
  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      $username = $row["username"];
      $oid = $_POST["orid"];
      $pid = $row["p_id"];
      $pname = $row["P_name"];
      $quantity = $row["quantity"];
      $price = $row["price"];
      $insert_product = mysqli_query($con, "INSERT INTO customerorder (username, O_id, p_id, P_name, quantity, price, approval) VALUES('$username', '$oid', '$pid', '$pname', '$quantity', '$price','1')");
    }
  }
  $delete_query = "DELETE FROM orderline WHERE O_id='" . $_POST["orid"] . "'";
  if ($con->query($delete_query) === TRUE) {
    header("Location: orderline.php");
  } else {
    echo "not deleted";
  }
}


// Orderline To Decline

if (isset($_POST["decline"])) {
  $sql = "SELECT * FROM `orderline` WHERE O_id='" . $_POST["orid"] . "'";
  $result = $con->query($sql);
  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      $username = $row["username"];
      $oid = $_POST["orid"];
      $pid = $row["p_id"];
      $pname = $row["P_name"];
      $quantity = $row["quantity"];
      $price = $row["price"];
      $insert_product = mysqli_query($con, "INSERT INTO customerorder (username, O_id, p_id, P_name, quantity, price, approval) VALUES('$username', '$oid', '$pid', '$pname', '$quantity', '$price','0')");
    }
  }
  $delete_query = "DELETE FROM orderline WHERE O_id='" . $_POST["orid"] . "'";
  if ($con->query($delete_query) === TRUE) {
    header("Location: orderline.php");
  } else {
    echo "not deleted";
  }
}


// Delete From Customerorder

if (isset($_POST["delete"])) {
  $delete_query = "DELETE FROM customerorder WHERE O_id='" . $_POST["orid"] . "'";
  if ($con->query($delete_query) === TRUE) {
    header("Location: dashboard.php");
  } else {
    echo "not deleted";
  }
}


// Delete From pending

if (isset($_POST["pendelete"])) {
  $delete_query = "DELETE FROM orderline WHERE O_id='" . $_POST["orid"] . "'";
  if ($con->query($delete_query) === TRUE) {
    header("Location: dashboard.php");
  } else {
    echo "not deleted";
  }
}

$con->close();
?>