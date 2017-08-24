<?php 
  require_once 'header.php';
  echo "<div class='main'><h3>Please enter your details to log in</h3>";
  $error = $userA = $pass = "";

  if (isset($_POST['userA']))
  {
    $userA = $_POST['userA'];
    $pass = $_POST['pass'];
    
    if ($userA == "" || $pass == "")
        $error = "Not all fields were entered<br>";
    else
    {
      $result = SQLQuery("SELECT UserName, Password FROM Admins
        WHERE UserName='$userA' AND Password='$pass'");

      if ($result->num_rows == 0)
      {
        $error = "<span class='error'>Username/Password
                  invalid</span><br><br>";
      }
      else
      {
        $_SESSION['userA'] = $userA;
        $_SESSION['pass'] = $pass;
        die("You are now logged in. Please <a href='index.php?view=$user'>" .
            "click here</a> to continue.<br><br>");
      }
    }
  }

  echo <<<_END
    <form method='post' action='admin.php'>$error
    <span class='fieldname'>Username</span><input type='text'
      maxlength='16' name='userA' value='$userA'><br>
    <span class='fieldname'>Password</span><input type='password'
      maxlength='16' name='pass' value='$pass'>
_END;
?>

    <br>
    <span class='fieldname'>&nbsp;</span>
    <input type='submit' value='Login'>
    </form><br></div>
  </body>
</html>
