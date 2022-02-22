<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html>

<body>

    <?php
    // Set session variables
    $_SESSION["favcolor"] = "green";
    $_SESSION["favanimal"] = "cat";
    echo "Session variables are set.";
    echo "<br/>";
    ?>

    <?php
    // Echo session variables that were set on previous page
    echo "Favorite color is " . $_SESSION["favcolor"] . ".<br>";
    echo "Favorite animal is " . $_SESSION["favanimal"] . ".";
    echo "<br/>";
    ?>

    <?php
    print_r($_SESSION);
    echo "<br/>";
    ?>

    <?php
    // to change a session variable, just overwrite it
    $_SESSION["favcolor"] = "yellow";
    print_r($_SESSION);
    echo "<br/>";
    ?>

    <?php
    // remove all session variables
    session_unset();

    // destroy the session
    session_destroy();
    ?>


</body>

</html>