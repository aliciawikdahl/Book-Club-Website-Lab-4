<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<?php
@ob_start();
session_start();

    $cookie_name = "counter";

if (isset($_COOKIE['counter'])) 
    $count = $_COOKIE['counter'];

else 
    $count = 0;


//create
    $count = $count + 1;
    setcookie('counter', $count, time() + 24 * 3600, '/', 'localhost', false);

?>

<!--setcookie(name, value, expire, path, domain, secure, httponly);
    "/" means cookie is available in entire website
    isset() checks to see if variable is set or not-->

<html>
    <head>
        <title>Counting with a cookie</title>
        <link href="main.css" type="text/css" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" />
    </head>
    <body>
        <FORM action="cookie.php" method="GET">
            <INPUT type="submit" name="Count" value="Count">
            <?php
            echo "count is $count";
            ?>
        </FORM>
    </body>
</html>


<!-- 
    STORED ON WEB-BROWSER
    EASIER FOR HACKERS TO GET A HOLD OF
    EXPIRATION CAN BE SET WHEN YOU SET THE COOKIE
    TO DELETE COOKIE YOU CAN JUST SET AN EXPIRATION DATE IN THE PAST
    ex. setcookie("user", "", time()-3600);
    
-->