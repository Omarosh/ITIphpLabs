<html>

<head>
    <title> contact form </title>
    <link rel="stylesheet" href="style.css">

</head>


<?php
session_start();
// define variables and set to empty values
$nameErr = $emailErr = $messageErr = "";
$name = $email = $message = "";
$thanks = "";
$check = 0;


if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    if (isset($_POST['submit']))
    {
        // Input is valid;
        $name = convert_input($_POST["name"]);
        $email = convert_input($_POST["email"]);
        $message = convert_input($_POST["message"]);

        // <------ CHeck if any field is empty ------>
        if (empty($name))
        {
            $nameErr = "Name is required";
            $check = 1;
        }
        else
            process_name($name);

        if (empty($email))
        {
            $emailErr = "Email is required";
            $check = 1;
        }
        else
            process_email($email);


        if (empty($message))
        {
            $messageErr = "Empty Message";
            $check = 1;
        }
        else
        {
            process_message($message);
        }

        if ($check == 0) // All validations passed
        {
            $thanks = "Thank You";
            write_logs($name, $email);
        }
        else // Fail case
            $thanks = "";
    }
}


/// <<<<------------ START HELPER FUNCTIONS  -------------->>>>>>>>>

function process_name($name)
{
    $name = convert_input($name);
    if (strlen($name) < 255)
    {
        if (!preg_match("/^[a-zA-Z-' ]*$/", $name))
        {
            $nameErr = "Only letters and white space allowed";
        }
    }
    else
    {
        $nameErr = "Name Should be shorter than 100 characters";
        $check = 1;
    }
}

function process_email($email)
{
    $email = convert_input($email);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        $emailErr = "Invalid email format";
        $check = 1;
    }
}
function process_message($message)
{
    if (strlen($message) < 255)
    {
        $message = convert_input($message);
    }
    else
    {
        $messageErr = "Message Should be shorter than 255 characters";
        $check = 1;
    }
}

function write_logs($name, $email)
{



    if (!isset($_SESSION["is_visited"]))
    {
        //  echo "First Visit, Hiii";
        $_SESSION["is_visited"] = true;
    }
    else
    {
        $_SESSION["counter"] = isset($_SESSION["counter"]) ? $_SESSION["counter"] + 1 : 1;
        echo "You visited the page before " . $_SESSION["counter"] . " times.";
    }


    if (file_exists("log.txt"))
    {
        $fp = fopen("log.txt", "a+");
        $line = date("F d Y h:m a") . ", " . $_SERVER['REMOTE_ADDR'] . ", " . $email . ", " . $name . ", " .  $_SESSION["counter"] . PHP_EOL;
        fwrite($fp, $line);
        fclose($fp);
        $thanks = "Thank You";
    }
    else
    {
        $fp = fopen("log.txt", "w");
        fclose($fp);
    }
}


function convert_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

/// <<<<------------ END HELPER FUNCTIONS  -------------->>>>>>>>>

?>

<body>
    <h3> Contact Form </h3>
    <div id="after_submit">

    </div>
    <form id="contact_form" enctype="multipart/form-data" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <div class="container">
            <div class="row">
                <label class="required" for="name">Your name:</label><br />
                <input id="name" class="input" name="name" type="text" value="<?php echo $name; ?>" size="30" /><br />
                <span class="error"><?php echo '*';
                                    echo $nameErr; ?></span>

            </div>
            <div class="row">
                <label class="required" for="email">Your email:</label><br />
                <input id="email" class="input" name="email" type="text" value="<?php echo $email; ?>" size="30" /><br />
                <span class="error"><?php echo '*';
                                    echo $emailErr; ?></span>

            </div>
            <div class="row">
                <label class="required" for="message">Your message:</label><br />
                <textarea id="message" class="input" name="message" rows="7" cols="30"><?php echo $message; ?></textarea><br />
                <span class="error"><?php echo '*';
                                    echo $messageErr; ?></span>
            </div>

            <div class="row">
                <span class="thanks"><?php echo $thanks; ?></span>
            </div>

            <input id="submit" name="submit" type="submit" value="Send email" />
            <input id="clear" name="clear" type="reset" value="clear form" />
        </div>
    </form>
</body>

</html>