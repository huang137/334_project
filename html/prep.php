<?php 
    $hn = 'localhost'; //hostname
    $db = 'huang137_library'; //database
    $un = 'huang137_lib'; //username
    $pw = 'test123'; //password
    $appname = "Library";

    $conn = new mysqli($hn, $un, $pw, $db);
    if ($conn->connect_error) die($conn->connect_error);

  function SQLQuery($query)
  {
    global $conn;
    $result = $conn->query($query);
    if (!$result) die($conn->error);
    return $result;
  }

  function destroySession()
  {
    $_SESSION=array();

    if (session_id() != "" || isset($_COOKIE[session_name()]))
      setcookie(session_name(), '', time()-2592000, '/');

    session_destroy();
  }

?>