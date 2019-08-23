 <!doctype html>
<html lang="en">
 <head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SDED Dashboard</title>

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800|Montserrat:300,400,700" rel="stylesheet">

  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    

  <!-- Custom fonts for this template-->
  <link href="{{url('/')}}/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="{{url('/')}}/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="{{url('/')}}/css/sb-admin.css" rel="stylesheet">

  <script type="text/javascript">
    var analytics = <?php echo $sex; ?>

      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart()
      {
        var data = google.visualization.arrayToDataTable(analytics);
        var options = {
          title: 'Percentage SEX of Unitel'
        };

        var chart = new google.visualization.PieChart(document.getElementById('myPieChart'));

        chart.draw(data, options);
      }
  </script>

</head>

<body id="page-top">
{{-- {{$sex}} --}}
 @include('partial.navbar')

  <div id="wrapper">

   @include('partial.sidebar')

    <div id="content-wrapper">

      <div class="container-fluid">

 <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">ພະນັກງານພາຍໃນບໍລິສັດ</li>
        </ol>

        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-chart-area"></i>
            Unitel Chart</div>
          <div class="card-body">
            <div id="myPieChart" width="100%" height="50%"></div>
          </div>
          <div class="card-footer small text-muted">Updated on {{ date('Y-m-d H:i:s') }} PM</div>

        </div>



      </div>
      <!-- /.container-fluid -->

     @include('partial.footer')

</body>

</html>