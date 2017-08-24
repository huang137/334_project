<?php // Example 26-2: header.php
  session_start();

  echo "<!DOCTYPE html>\n<html><head>";

  require_once 'prep.php';

  $userstr = ' (Guest)';

  if (isset($_SESSION['user']))
  {
    $user     = $_SESSION['user'];
    $loggedinC = TRUE;
    $userstr  = " ($user)";
  }
  else if (isset($_SESSION['userA']))
  {
    $user     = $_SESSION['userA'];
    $loggedinA = TRUE;
    $userstr  = " ($user)";
  }
  else $loggedin = FALSE;

  echo "<title>$appname$userstr</title><link rel='stylesheet' " .
       "href='../css/styles.css' type='text/css'>"                     .
       "</head><body><center><canvas id='logo' width='624' "    .
       "height='96'>$appname</canvas></center>"             .
       "<div class='appname'>$appname$userstr</div>"            .
       "<script src='../js/javascript.js'></script>";

  if ($loggedinC)  //Logged in as a regular user
  {
    echo "<br ><ul class='menu'>" .
         "<li><a href='index.php?view=$user'>Home</a></li>" .
         "<li><a href='search1.php'>Search</a></li>"         .
         "<li><a href='record.php'>My records</a></li>"       .
         "<li><a href='logout.php'>Log out</a></li></ul><br>";
  }
  else if ($loggedinA)  //Logged in as an administrator
  {
    echo "<br ><ul class='menu'>" .
         "<li><a href='index.php?view=$user'>Home</a></li>" .
         "<li><a href='search1.php'>Search</a></li>"         .
         "<li><a href='trend.php'>Trends</a></li>"    .
         "<li><a href='fee.php'>Late fees</a></li>"    .
         "<li><a href='logout.php'>Log out</a></li></ul><br>";
  }
  else
  {
    echo ("<br><ul class='menu'>" .
          "<li><a href='index.php'>Home</a></li>"                .
          "<li><a href='signup.php'>Sign up</a></li>"            .
          "<li><a href='search1.php'>search</a></li>"            .
          "<li><a href='login.php'>Log in</a></li>"            .
          "<li><a href='admin.php'>Admin</a></li></ul><br>");
  }
?>