<?php
session_start();
$_SESSION["categories"] = "all";
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        html,
        body {}

        .explore {
            display: flex;
            background-color: #757575;
            color: black;
            height: 8vh;
            width: 100%;
            font-weight: bold;
            padding: 12vh 0vh 0vh 0vh;
            border-bottom: 2px solid;
        }

        .explore .left {
            width: 50%;
        }

        .drop,
        input[type=file]::file-selector-button {
            text-align: center;
            background-color: rgb(193, 193, 193);
            margin-left: 50px;
            border-radius: 25px;
            border: 1px solid;
            width: 300px;
            margin-top: 20px;
            height: 25px;
            font-size: 18px;
            font-weight: bold;
        }

        .explore .left li {
            margin-bottom: 5px;
        }


        .explore .right {
            float: right;
            width: 50%;
        }


        .explore .right input {
            background-color: rgb(193, 193, 193);
            color: black;
            font-weight: bold;
            margin-left: 350px;
            margin-top: 20px;
            width: 300px;
            height: 25px;
            border-radius: 25px;
            border: 1px solid;
            text-align: center;
        }

        .explore .right button {
            background-color: #757575;
            color: #ffffff;
            padding: 5px 10px;
            border: none;
            cursor: pointer;
            font-size: 25px;
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div class="explore" id="explore">

        <!-- Dropdown Left align -->
        <div class="left">
            <form id="catbar" method="post" action="category.php">
                <?php
                include('connection.php');
                $sql = "SELECT DISTINCT category FROM product";
                $result = $con->query($sql);

                if ($result->num_rows > 0) {
                    echo "<select class='drop' name='category' onchange='submitForm()'>";
                    echo "<option value='all'>Category</option>";
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row['category'] . "'>" . $row['category'] . "</option>";
                    }
                    echo "</select>";
                } else {
                    echo "0 results";
                }
                ?>

            </form>
        </div>


        <!-- search bar right align -->
        <div class="right">
            <form method="post" action="aftersearch.php">
                <input type="text" placeholder=" Search Product" name="str">
                <button type="submit" name="sub">
                    <i class="fa fa-search">
                    </i>
                </button>
            </form>
        </div>

    </div>

    <script>
        function submitForm() {
            document.getElementById("catbar").submit();
        }
    </script>

</body>

</html>