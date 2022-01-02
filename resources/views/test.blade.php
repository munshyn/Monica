@extends('layouts.app')

@section('content')

<!DOCTYPE html>
<html>
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
		// xValueType: "dateTime",
		// xValueFormatString: "DD MMM hh:mm TT",
		yValueFormatString: "#,##0.##\"%\"",
		dataPoints: [
			{ label:"1.00A.M", y: 22.836 },
			{ label:"2.00A.M", y: 40.896 },
			{ label:"3.00A.M", y: 56.625 },
			{ label:"4.00A.M", y: 26.003 },
			{ label:"5.00A.M", y: 20.376 },
			{ label:"6.00A.M", y: 19.774 },
			{ label:"7.00A.M", y: 23.508 },
			{ label:"8.00A.M", y: 18.577 },
			{ label:"9.00A.M", y: 15.918 },
			{ label:"10.00A.M", y: null }, // Null Data
			{ label:"11.00A.M", y: 10.314 },
			{ label:"12.00P.M", y: 10.574 },
			{ label:"1.00P.M", y: 14.422 },
			{ label:"2.00P.M", y: 18.576 },
			{ label:"3.00P.M", y: 22.342 },
			{ label:"4.00P.M", y: 22.836 },
			{ label:"5.00P.M", y: 23.220 },
			{ label:"6.00P.M", y: 23.594 },
			{ label:"7.00P.M", y: 24.596 },
			{ label:"8.00P.M", y: 31.947 },
			{ label:"9.00P.M", y: 31.142 },
			{ label:"10.00P.M", y: 31.142 },
			{ label:"11.00P.M", y: 31.142 },
			{ label:"12.00A.M", y: 31.142 },
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
      <div class="card mb-3" style="padding-bottom:24%; margin:2%">
        <div class="card-header">
          <i class="fa fa-area-chart"></i> Area Chart Example</div>
        <div class="card-body">
          <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>  
          <div id="myAreaChart" width="100%" height="30"></div>
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
                  <div class="h4 mb-0 text-primary">katmon</div>
                  <div class="small text-muted">HOURLY</div>
                  <hr>
                  <div class="h4 mb-0 text-warning">$18,474</div>
                  <div class="small text-muted">DAILY</div>
                  <hr>
                  <div class="h4 mb-0 text-success">$16,219</div>
                  <div class="small text-muted">WEEKLY</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
@endsection