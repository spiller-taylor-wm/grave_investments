<?php
require_once('test.php');
$error = false;
$success = false;

if(@$_POST['addUser']){
    /**
     * New user was submitted. Make sure name and email are present!
     */

    if(!$_POST['date'])
    {
        $error .= '<p>Date is a required field!</p>';
    }

    if(!$_POST['time'])
    {
        $error .= '<p>Time is a required field!</p>';
    }

    if(!$_POST['firstName'])
    {
        $error .= '<p>First name is a required field!</p>';
    }

    if(!$_POST['lastName'])
    {
        $error .= '<p>Last name is a required field!</p>';
    }

    if(!$_POST['burial'])
    {
        $error .= '<p>Burial/cremation is a required field!</p>';
    }

    if($_POST['burial'] && $_POST['lastName'] && $_POST['firstName'] && $_POST['date'])
    {
        /**
         * If we're here...all is well. Process the insert
         */
        $stmt = $dbh->prepare('INSERT INTO Schedule (date, time, firstName, lastName, religion, contactInfo, burial, music, specific_requests, gender) VALUES (:date, :time, :firstName, :lastName, :religion, :contactInfo, :burial, :music, :specific_requests, :gender)');
        $result = $stmt->execute(
            array(
                'date'=>$_POST['date'],
                'time'=>$_POST['time'],
                'firstName'=>$_POST['firstName'],
                'lastName'=>$_POST['lastName'],
                'religion'=>$_POST['religion'],
                'contactInfo'=>$_POST['contactInfo'],
                'burial'=>$_POST['burial'],
                'music'=>$_POST['music'],
                'specific_requests'=>$_POST['specific_requests'],
                'gender'=>$_POST['gender']
            )
        );

        if($result)
        {
            $success = "User " . $_POST['firstName'] . " was successfully saved.";
        }
        else
        {
            $success = "There was an error saving " . $_POST['firstName'];
        }
    }

}

/**
 * We'll always want to pull the users to show them in the table
 */
$stmt = $dbh->prepare('SELECT * FROM Schedule');
$stmt->execute();
$users = $stmt->fetchAll();

?>

<!DOCTYPE html>
<html lang="en">
    <head>

        <style>
            table
            {
                table-layout: fixed;
                width: 1150px;
                border-collapse: collapse;
                border-spacing: 0;
            }
        </style>
        <meta charset="UTF-8">
        <title>Grave Investments</title>
        <script src="jquery-2.1.4.min.js"></script>
        <link rel="stylesheet" type="text/css" href="css/style.css"/>
        <link rel="stylesheet" type="text/css" href="css/navbar.css"/>
        <link rel="shortcut icon" type="image/x-icon" href="pics/favico.ico" />

        <!-- Bootstrap Links -->
        <script rel="script" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>

        <!-- Registration Links -->
        <link rel="stylesheet" type="text/css" href="css/registration.css"/>
        <script rel="script" type="text/javascript" src="js/registration.js"></script>
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
        <link href='http://fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet' type='text/css'>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.13.1/jquery.validate.min.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

    </head>

    <body>
        <header>
            <img alt="Grave Investments" src="pics/logo.png">
        </header>

        <!-- NEW NAVIGATION BAR
            http://cssmenumaker.com/menu/animated-responsive-drop-down-menu
            -->
        <div style="z-index: 10" id='cssmenu'>
            <ul>
                <li><a href='index.php'><span>Home</span></a></li>
                <li><a href='#'><span>Shop</span></a>
                    <ul>
                        <li class='has-sub'><a href='caskets.php'><span>Caskets</span></a></li>
                        <li class='has-sub'><a href='urns.php'><span>Urns</span></a></li>
                        <li class='has-sub'><a href='flower.php'><span>Flowers</span></a></li>
                    </ul>
                </li>
                <li class='active'><a href='schedule.php'><span>Schedule</span></a></li>
                <li class='last'><a href="sign_in.php"><span>Sign In</span></a></li>
            </ul>
        </div>
        <!-- END OF NAVIGATION BAR -->

        <div id="content">
            <br>
            <center>
                <form name="addUser" method = "post">
                    Date:<br>
                    <input type="date" name="date">
                    <br>
                    Time:<br>
                    <input type="time" name="time">
                    <br>
                    First name:<br>
                    <input type="text" name="firstName">
                    <br>
                    Last name:<br>
                    <input type="text" name="lastName">
                    <br>
                    Religion:<br>
                    <input type="text" name="religion">
                    <br>
                    Contact Info of Church:<br>
                    <input type="text" name="contactInfo">
                    <br>
                    Burial/Cremation:<br>
                    <input type="text" name="burial">
                    <br>
                    Music/Hymns:<br>
                    <input type="text" name="music">
                    <br>
                    Specific Requests:<br>
                    <input type="text" name="specific_requests">
                    <br>
                    Gender:<br>
                    <input type="text" name="gender">
                    <br>
                    <br>
                    <button type="submit" name="addUser" value="1"> Submit </button>
                </form><br>
            </center>

            <div class="error">
                <?php
                if($error){
                    echo $error;
                    echo '<br /><br />';
                }
                ?>
            </div>


            <div class="success">
                <?php
                if($success){
                    echo $success;
                    echo '<br /><br />';
                }
                ?>
            </div>

            <?php
            if($users && count($users)){
                ?>
                <table align="center">
                    <thead>
                    <tr>
                        <th>Date</th>
                        <td>Time</td>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Religion</th>
                        <th>Contact Info</th>
                        <th>Burial</th>
                        <th>Music</th>
                        <th>Specific Requests</th>
                        <th>Gender</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach($users as $user){
                        ?>
                        <tr>
                            <td><?php echo $user['date']?></td>
                            <td><?php echo $user['time']?></td>
                            <td><?php echo $user['firstName']?></td>
                            <td><?php echo $user['lastName']?></td>
                            <td><?php echo $user['religion']?></td>
                            <td><?php echo $user['contactInfo']?></td>
                            <td><?php echo $user['burial']?></td>
                            <td><?php echo $user['music']?></td>
                            <td><?php echo $user['specific_requests']?></td>
                            <td><?php echo $user['gender']?></td>
                        </tr>
                        <?php
                    }
                    ?>
                    </tbody>
                </table>
                <?php
            }else{
                echo "There are no users in this system.";
            }
            ?>

        </div>
        <div id="footer">
            <p style="padding-top: 12px; padding-bottom: 5px">Tyler Cantrell, Juan Chavez, Aiden Navarro, Taylor Spiller [2015]</p>
        </div>
    </body>
</html>