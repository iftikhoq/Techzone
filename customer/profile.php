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

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Profile</title>
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        html,
        body {
            font-family: Times New Roman, serif;
            color: rgb(0, 0, 0);
            background-image: none;
            background-size: cover;
        }

        .profile {
            text-align: center;
            background-color: rgba(51, 43, 43, 0.3);
            color: #000000;
            min-height: 95vh;
            width: 100%;
            font-weight: bold;
        }

        .pro {
            font-size: 40px;
            width: 100%;
            padding: 25vh 0vh 0vh 0vh;
        }

        .hr {
            background-color: #000000;
            border: none;
            height: 4px;
            width: 300px;
            margin: auto;
        }

        .h {
            margin-top: 2vh;
            margin-bottom: 0vh;
        }

        .details {
            margin-bottom: 5vh;
        }

        .submit {
            width: 300px;
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


    <div class="profile">
        <div class="pro">Profile
            <hr class="hr">
        </div>

        <div class="details">

            <?php
            include("../connection.php");
            $user_id = $_SESSION['user_id'];
            $sql = "select username, email, Phone,Address from customer where username='$user_id'";
            $r = mysqli_query($con, $sql);
            $row = mysqli_fetch_assoc($r);

            $name = $row['username'];
            $email = $row['email'];
            $mbl = $row['Phone'];
            $ad = $row['Address'];

            echo "<h2 class='h'>Hello ! I am $name</h2>";
            echo "<h3 class='h'>Email: $email</h3>";
            echo "<h3 class='h'>Mobile No : $mbl</h3>";
            echo "<h3 class='h'>Address : $ad</h3>";
            ?>
        </div>

        <a href="updateprofile.php"><button type="submit" name="submit" class="submit">Update Your
                Profile</button></a>
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