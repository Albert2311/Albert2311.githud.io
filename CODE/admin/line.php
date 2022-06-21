<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
 <!-- CSS only -->
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<body>
<?php 
include_once("connection3.php"); 
if(isset($_GET['line'])){
  $result = mysqli_query($conn, "SELECT MONTHNAME(created) AS CREATED, sum(quantity) AS SUM FROM `order_detail` GROUP BY MONTH(created)");
}

  foreach($result as $data)
  {
    $month[] = $data['CREATED'];
    $quantity[] = $data['SUM'];
  }

?>
<form action="bar.php?bar" method="POST">
<div class="form-check form-check-inline">
  <button class="btn btn-outline-info" type="submit" name="bar" value="bar">Bar</button>
</div>
</form>
<form action="line.php?line" method="POST">
<div class="form-check form-check-inline">
  <button class="btn btn-outline-info" type="submit" name="line"  value="line">Line</button>
</div>
</form>

<div style="width: 900px;">
  <canvas id="myChart"></canvas>
</div>
 
<script>
  // === include 'setup' then 'config' above ===
  const labels = <?php echo json_encode($month) ?>;
  const data = {
    labels: labels,
    datasets: [{
      label: 'Đã bán',
      data: <?php echo json_encode($quantity) ?>,
      backgroundColor: [
        'rgba(255, 99, 132, 0.2)',
        'rgba(255, 159, 64, 0.2)',
        'rgba(255, 205, 86, 0.2)',
        'rgba(75, 192, 192, 0.2)',
        'rgba(54, 162, 235, 0.2)',
        'rgba(153, 102, 255, 0.2)',
        'rgba(201, 203, 207, 0.2)'
      ],
      borderColor: [
        'rgb(255, 99, 132)',
        'rgb(255, 159, 64)',
        'rgb(255, 205, 86)',
        'rgb(75, 192, 192)',
        'rgb(54, 162, 235)',
        'rgb(153, 102, 255)',
        'rgb(201, 203, 207)'
      ],
      borderWidth: 1,
      tension: 0.1
    }]
  };

  const config = {
    type: 'line',
    data: data,
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    },
  };

  var myChart = new Chart(
    document.getElementById('myChart'),
    config
  );
</script>