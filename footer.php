<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/06d164d474.js" crossorigin="anonymous"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        .footer-distributed {
            background: #666;
            box-shadow: 0 1px 1px 0 rgba(0, 0, 0, 0.12);
            box-sizing: border-box;
            width: 100%;
            text-align: left;
            font: bold 16px;
            padding: 55px 50px;
        }

        .footer-distributed .footer-left,
        .footer-distributed .footer-center,
        .footer-distributed .footer-right {
            display: inline-block;
            vertical-align: top;
        }


        /* Footer left */

        .footer-distributed .footer-left {
            width: 40%;
        }

        /* The company logo */
        .footer-distributed h3 {
            color: #ffffff;
            margin: 0;
            font-size: 40px;
        }

        .footer-distributed h3 span {
            color: lightseagreen;
        }

        .footer-distributed .footer-links {
            color: #ffffff;
            margin: 20px 0 12px;
            padding: 0;
        }

        .footer-distributed .footer-links a {
            display: inline-block;
            line-height: 1.8;
            font-weight: 400;
            text-decoration: none;
            color: inherit;
        }

        .footer-distributed .footer-links a:before {
            content: "|";
            font-weight: 300;
            font-size: 20px;
            left: 0;
            color: #fff;
            display: inline-block;
            padding-right: 5px;
        }

        .footer-distributed .footer-links span::after {
            content: "|";
            font-weight: 300;
            font-size: 20px;
            left: 0;
            color: #fff;
            display: inline-block;
            padding-right: 5px;
        }

        .footer-distributed .footer-icons {
            margin-top: 25px;
        }

        .footer-distributed .footer-icons i {
            display: inline-block;
            width: 38px;
            height: 38px;
            cursor: pointer;
            background-color: #33383b;
            border-radius: 10px;

            font-size: 20px;
            color: #ffffff;
            text-align: center;
            line-height: 35px;

            margin-right: 20px;
            margin-bottom: 5px;
        }


        /* Footer Center */

        .footer-distributed .footer-center {
            width: 35%;
        }

        .footer-distributed .footer-center i {
            background-color: #33383b;
            color: #ffffff;
            font-size: 25px;
            width: 38px;
            height: 38px;
            border-radius: 50%;
            text-align: center;
            line-height: 42px;
            margin: 10px 15px;
            vertical-align: middle;
        }

        .footer-distributed .footer-center i.fa-envelope {
            font-size: 17px;
            line-height: 38px;
        }

        .footer-distributed .footer-center p {
            display: inline-block;
            color: #ffffff;
            vertical-align: middle;
            margin: 0;
            font-size: 18px;
        }

        .footer-distributed .footer-center p span {
            display: block;
            font-weight: bold;
            font-size: 20px;
            line-height: 2;
        }

        .footer-distributed .footer-center p a {
            color: white;
            text-decoration: none;
        }

        .footer-distributed .footer-links .link-1:before {
            content: none;
        }


        /* Footer Right */

        .footer-distributed .footer-right {
            width: 20%;
        }

        .footer-distributed .footer-company-about {
            line-height: 20px;
            color: #bcbfc2;
            font-size: 13px;
            font-weight: normal;
            margin: 0;
            text-align: center;
        }

        .footer-distributed .footer-company-about span {
            display: block;
            color: #ffffff;
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .footer-distributed .footer-company-name {
            color: black;
            font-size: 14px;
            font-weight: bold;
            margin-top: 10px;
            text-align: center;
        }


        /*footer to be responsive*/

        @media (max-width: 880px) {
            .footer-distributed {
                font: bold 14px sans-serif;
            }

            .footer-distributed .footer-left,
            .footer-distributed .footer-center,
            .footer-distributed .footer-right {
                display: block;
                width: 100%;
                margin-bottom: 40px;
                text-align: center;
            }

            .footer-distributed .footer-center i {
                margin-left: 0;
            }
        }
    </style>
</head>

<body>

    <footer class="footer-distributed">

        <div class="footer-left">

            <h3>Tech<span>Zone</span></h3>

            <p class="footer-links">
                <a>Home</a>
                <a>Blog</a>
                <a>Pricing</a>
                <a>Faq</a>
                <span></span>
            </p>

            <div class="footer-icons">
                <a><i class="fa fa-facebook"></i></a>
                <a><i class="fa fa-twitter"></i></a>
                <a><i class="fa fa-linkedin"></i></a>
                <a><i class="fa fa-github"></i></a>
            </div>

        </div>

        <div class="footer-center">

            <div>
                <i class="fa fa-map-marker"></i>
                <p><span>Premier University</span> Chittagong</p>
            </div>

            <div>
                <i class="fa fa-phone"></i>
                <p>+8801812233445</p>
            </div>

            <div>
                <i class="fa fa-envelope"></i>
                <p>
                    <a
                        href="https://mail.google.com/mail/u/0/?source=mailto&to=techzoneweb123@gmail.com&fs=1&tf=cm">support@techzone.com</a>
                </p>
            </div>

        </div>

        <div class="footer-right">

            <p class="footer-company-about">
                <span>About the company</span>
                "Welcome to TechZone, your one-stop destination for cutting-edge tech gadgets and accessories.<br>
                Shop with us today and experience the future of technology."
            </p>

            <p class="footer-company-name">TechZone © 2023 | All rights reserved
            </p>

        </div>

    </footer>

</body>

</html>