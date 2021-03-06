<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Grave Investments</title>
        <link rel="stylesheet" type="text/css" href="css/style.css"/>
        <link rel="shortcut icon" type="image/x-icon" href="pics/favico.ico" />

        <!-- Scripts for slider -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
        <script src="js/responsiveslides.min.js"></script>
        
        <!-- Files for menu bar -->
        <script src="js/navbar.js" type="text/javascript"></script>
        <link rel="stylesheet" type="text/css" href="css/navbar.css"/>

        <style>
            td{
                padding-right: 30px;
                text-align: center;
            }
            p, h1{
                padding-left: 20px;
                padding-right: 20px;
            }
        </style>
    </head>
    <body>
        <!-- Top Logo -->
        <header>
            <img alt="Grave Investments" src="pics/logo.png">
        </header>

        <!-- NEW NAVIGATION BAR
        http://cssmenumaker.com/menu/animated-responsive-drop-down-menu
        -->
        <div style="z-index: 10" id='cssmenu'>
            <ul>
                <li class='active'><a href='index.php'><span>Home</span></a></li>
                <li><a href='#'><span>Shop</span></a>
                    <ul>
                        <li class='has-sub'><a href='caskets.php'><span>Caskets</span></a></li>
                        <li class='has-sub'><a href='urns.php'><span>Urns</span></a></li>
                        <li class='has-sub'><a href='flower.php'><span>Flowers</span></a></li>
                    </ul>
                </li>
                <li><a href='schedule.php'><span>Schedule</span></a></li>
                <li class='last'><a href="sign_in.php"><span>Sign In</span></a></li>
            </ul>
        </div>
        <!-- END OF NAVIGATION BAR -->

        <!-- This is where all the content that will change from page to page is added -->
        <div id="content">
            <!-- JQuery Slider [responsiveslides.com] -->
            <div id="slider">
                <ul class="rslides">
                    <li><img src="pics/slider1.jpg" alt="slider1"></li>
                    <li><img src="pics/slider2.jpg" alt="slider2"></li>
                    <li><img src="pics/slider3.jpg" alt="slider3"></li>
                </ul>
            </div>
            <br/><hr/><br/>
            <!-- End of slider -->
            <h1 align="center">Our Mission</h1>
            <p>Here at Grave Investments, our family of staff is here to help make this difficult time as painless as possible. Allow our team of caring individuals to guide you through this process.</p>
            <p>We've made it simple to plan a funeral service or wake all in one place. We have provided ways to order flowers, caskets, and urns. We have provided our own funeral halls for you to reserve at your convenience.</p>

            <br><hr><br>
            <h1 align="center">Our Family</h1>
            <div align="center">
                <table>
                    <tr>
                        <td><img alt="Tyler Cantrell" height="150px" width="150px" class="img-circle" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSfskLFB-5r-2IrBh9Zk8km5nB-t05mhXgdhC94yMwZD1HQu_lQQQ"/></td>
                        <td><img alt="Juan Chavez" height="150px" width="150px" class="img-circle" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSfskLFB-5r-2IrBh9Zk8km5nB-t05mhXgdhC94yMwZD1HQu_lQQQ"/></td>
                        <td><img alt="Aiden Navarro" height="150px" width="150px" class="img-circle" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSfskLFB-5r-2IrBh9Zk8km5nB-t05mhXgdhC94yMwZD1HQu_lQQQ"/></td>
                        <td><img alt="Taylor Spiller" height="150px" width="150px" class="img-circle" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSfskLFB-5r-2IrBh9Zk8km5nB-t05mhXgdhC94yMwZD1HQu_lQQQ"/></td>
                    </tr>
                    <tr>
                        <td><p>Tyler Cantrell</p></td>
                        <td><p>Juan Chavez</p></td>
                        <td><p>Aiden Navarro</p></td>
                        <td><p>Taylor Spiller</p></td>
                    </tr>
                </table>
            </div>
        </div>
        <!-- End of content-->

        <div id="footer">
            <p>Tyler Cantrell, Juan Chavez, Aiden Navarro, Taylor Spiller [2015]</p>
        </div>
        <script>
            $(function() {
                $(".rslides").responsiveSlides(); // Starts slider
            });
        </script>
    </body>
</html>