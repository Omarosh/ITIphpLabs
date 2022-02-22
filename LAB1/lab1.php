<html>

<head>
  <title> contact form </title>
  <style>
    .error {
      color: red;
    }

    .thanks {
      color: green;
    }


    .container {
      width: fit-content;
      height: fit-content;
      padding: 5px;
      padding-left: 15px;
      padding-right: 15px;
      background-color: beige;
      border-style: double;
    }

    .row {
      margin-top: 15px;
      margin-left: 5px;
      margin-right: 5px;
    }

    button {
      color: darkgreen;
      padding: 5px;
      font-size: 20px;
      width: fit-content;
      position: relative;
      left: 35%;
      margin-bottom: 15px;
    }

    label {
      font-size: 18px;
    }

    input {
      width: 150px;
    }
  </style>

</head>


<?php
// define variables and set to empty values
$nameErr = $emailErr = $messageErr = "";
$name = $email = $message = "";
$thanks = "";
$check = 0;


if ($_SERVER["REQUEST_METHOD"] == "POST")
{
  if (isset($_POST['submit']))
  {
    $name = convert_input($_POST["name"]);
    $email = convert_input($_POST["email"]);
    $message = convert_input($_POST["message"]);
    if (empty($name))
    {
      $nameErr = "Name is required";
      $check = 1;
    }
    else
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


    if (empty($email))
    {
      $emailErr = "Email is required";
      $check = 1;
    }
    else
    {
      $email = convert_input($email);
      if (!filter_var($email, FILTER_VALIDATE_EMAIL))
      {
        $emailErr = "Invalid email format";
        $check = 1;
      }
    }

    if (empty($message))
    {
      $messageErr = "Empty Message";
      $check = 1;
    }
    else
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
    if ($check == 0)
    {
      $thanks = "Thank You";
    }
    else
    {
      $thanks = "";
    }
  }
}

function convert_input($data)
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
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