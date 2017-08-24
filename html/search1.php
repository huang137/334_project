<?php 
  require_once 'header.php';

  echo <<<_END
    <form method='post' action='search1.php'>$error
    <input type='text' maxlength='16' name='query' value='$query'>
_END;
?>
    <span class='fieldname'>&nbsp;</span>
    <input type='submit' name = 'search' value='Search'>
    </form><br></div>
</body>
</html>

<?php 
  if (isset($_POST['search']))
  {
    $query = $_POST['query'];
    echo $query;
    $result = SQLQuery("SELECT * FROM books
        WHERE author LIKE '%$query%' OR title like '%$query%'");
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
    <th>Author</th>     
    <th>Year</th> 
    <th>ISBN</th>    
    <th>Genre</th>
    <th>Available</th>     
    <th><input type="checkbox" onClick="check_all(this)"></th>
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
      <td>$row[2]</td>      
      <td>$row[3]</td>  
      <td>$row[4]</td> 
      <td>$row[5]</td>
      <td><input name="checkbox[]" type="checkbox" id="checkbox[]" value="<?php echo $row[3]; ?>"></td>
    </tr> 
_END;
      }
    echo "</table>";
    echo "<input type='submit' name = 'borrow' value='Borrow'>";
    }
}

  if ( isset( $_POST['borrow'] ) ) 
  {
     echo "ok";
  }
?>