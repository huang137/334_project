<?php 
  require_once 'header.php';
  echo "<form method='post' action='record.php'>$error";

$result = SQLQuery("SELECT Books, DateDue FROM Borrow
        WHERE UserName LIKE '$user'");

if ($result->num_rows == 0)
{
	echo "None found.";
}
else
{
	$rows = $result->num_rows;
	echo <<<_END
	  <table>
	  <thead>
	  <tr>  
		<th>Title</th>     
		<th>DateDue</th>        
	  </tr>
	  </thead>
_END;

	for ($j = 0 ; $j < $rows ; ++$j)
	{
		$result->data_seek($j);
		$row = $result->fetch_array(MYSQLI_NUM);

		echo <<<_END
		<tr>     
		  <td>$row[0]</td>     
		  <td>$row[1]</td> 
		</tr>
_END;
        }
        echo "</table>";
}



  

?>

