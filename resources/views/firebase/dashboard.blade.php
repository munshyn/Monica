@extends('layouts.app')

@section('content')

<head>
  <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
  <script>
    window.onload = function() {
    
    var chart = new CanvasJS.Chart("myAreaChart", {
      animationEnabled: true,
      title: {
        text: "Hourly Average CPU Utilization"
      },
      axisX: {
        title: "Time"
      },
      axisY: {
        title: "Percentage",
        suffix: "%",
        includeZero: true
      },
      data: [{
        type: "line",
        name: "CPU Utilization",
        connectNullData: true,
        //nullDataLineDashType: "solid",
        xValueType: "dateTime",
        xValueFormatString: "DD MMM hh:mm TT",
        yValueFormatString: "#,##0.##\"%\"",
        dataPoints: [
          { x: 15 010 48 67 3000, y: 23.594 },
          { x: 1501052273000, y: 40.896 },
          { x: 1501055873000, y: 56.625 },
          { x: 1501059473000, y: 26.003 },
          { x: 1501063073000, y: 20.376 },
          { x: 1501066673000, y: 19.774 },
          { x: 1501070273000, y: 23.508 },
          { x: 1501073873000, y: 18.577 },
          { x: 1501077473000, y: 15.918 },
          { x: 1501081073000, y: null }, // Null Data
          { x: 1501084673000, y: 10.314 },
          { x: 1501088273000, y: 10.574 },
          { x: 1501091873000, y: 14.422 },
          { x: 1501095473000, y: 18.576 },
          { x: 1501099073000, y: 22.342 },
          { x: 1501102673000, y: 22.836 },
          { x: 1501106273000, y: 23.220 },
          { x: 1501109873000, y: 23.594 },
          { x: 1501113473000, y: 24.596 },
          { x: 1501117073000, y: 31.947 },
          { x: 1501120673000, y: 31.142 }
        ]
      }]
    });
    chart.render();
    
    }
    </script>
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <div class="content-wrapper">
    <div class="container-fluid"> 
      <!-- Area Chart Example-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-area-chart"></i> Area Chart Example</div>
        <div class="card-body">
          <div id="myAreaChart" width="100%" height="30"></div>
          <!-- <canvas id="myAreaChart" width="100%" height="30">
          </canvas> -->
        </div>
      </div>
      <div class="row">
        <div class="col-lg-8">
          <!-- Example Bar Chart Card-->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fa fa-bar-chart"></i> Bar Chart Example</div>
            <div class="card-body">
              <div class="row">
                <div class="col-sm-8 my-auto">
                  <canvas id="myBarChart" width="100" height="50"></canvas>
                </div>
                <div class="col-sm-4 text-center my-auto">
                  <div class="h4 mb-0 text-primary">$34,693</div>
                  <div class="small text-muted">YTD Revenue</div>
                  <hr>
                  <div class="h4 mb-0 text-warning">$18,474</div>
                  <div class="small text-muted">YTD Expenses</div>
                  <hr>
                  <div class="h4 mb-0 text-success">$16,219</div>
                  <div class="small text-muted">YTD Margin</div>
                </div>
              </div>
            </div>
          </div>
          <!-- /Card Columns-->
        </div>
        <div class="col-lg-4">
          <!-- Example Pie Chart Card-->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fa fa-pie-chart"></i> Pie Chart Example</div>
            <div class="card-body">
              <canvas id="myPieChart" width="100%" height="100"></canvas>
            </div>
          </div>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Data Table Example</div>
        <div class="card-body">
          
          </div>
        </div>
      </div>
    </div>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="login.html">Logout</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
    @endsection