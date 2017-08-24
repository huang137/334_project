<html>
<head>
    
    <script src="https://www.gstatic.com/charts/loader.js"></script>
		
    <?php 
      require_once 'header.php';
            
      $result = SQLQuery("SELECT COUNT(*) AS cnt, genre FROM books GROUP BY genre;");
      $rows = $result->num_rows;
      for ($j = 0 ; $j < $rows ; ++$j){
        $result->data_seek($j);
        $row = $result->fetch_array(MYSQLI_NUM);  
        $num[$j] = $row[0];
      }
    ?>
    
    <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);
        
        function drawChart() {
          var data = google.visualization.arrayToDataTable([
              ['', '']
              <?php
                  echo " ,['Biography', $num[0]], ['Classics', $num[1]], ['Contemporary', $num[2]], ['fantasy', $num[3]], ['Mystery', $num[4]], ['Romance', $num[5]]";
                  
              ?>
            ]);
            
          var options = {'width':550, 'height':400};
          var chart = new google.visualization.PieChart(document.getElementById('piechart'));
          chart.draw(data, options);
        }
    </script>
</head>
<body>

<div id="piechart"></div>
    
</body>
</html>