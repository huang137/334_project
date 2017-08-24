<?php 
  require_once 'header.php';
  echo "<form method='post' action='fee.php'>$error";

$result = SQLQuery("SELECT UserName, Amount FROM LateFees");

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
		<th>User Name</th>     
		<th>Fee Amount</th>        
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

