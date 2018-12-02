<?php
@ob_start();

//  DISALLOWS ACCESS TO SESSION COOKIE BY JAVASCRIPT, PREVENTS COOKIES FROM BEING STOLEN BY JAVASCRIPT INJECTION

ini_set('session.cookie_httponly', true);

session_start();

?>
<html>
    <head>
        <title>Counting with the SESSION array</title>
    </head>
    <body>
        <FORM action="session.php" method="GET">
            <INPUT type="submit" name="Count" value="Count">
            <?php

            if ($_SESSION['userip'] !== $_SERVER['REMOTE_ADDR']){
            #if it is not the same, we just remove all session variables
            #this way the attacker will have no session
            session_unset();
            session_destroy();
                } 

            ?>
        </FORM>

    </body>
</html>

<!-- 
    STORED ON SERVER
    SAFER THAN COOKIES
    OFTEN USED TO STORE INFORMATION SHORT TERM
    SESSION VARIABLES EXPIRES WHEN USER CLOSES BROWSER
    OR WHEN YOU USE: 
    session_unset();       (removes session variables)
    OR 
    session_destroy();     (destroys the session)
-->