@extends('layouts.app')

@section('content')

<!DOCTYPE html>
<html>
<head>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<script>
	 var h = new Array(24).fill(1);
	 for(var hour=0;hour<24;hour++){
		var jam="hour".hour;
		<?php foreach($data as $hour){ ?>;
			var a=<?php echo json_encode($hour->id());?>;
 			if(jam==a){
				 h[hour]=<?php echo json_encode($hour->id()->snapshot()['CO2']);?>;
			 }
		<?php } ?>;
	 }	
	window.onload = function() {
	var chart = new CanvasJS.Chart("myAreaChart", { 
		animationEnabled: true,
		title: {
			text: "Hourly Average CO2 Monitoring"
		},
		axisX: {
			title: "Time"
		},
		axisY: {
			title: "Carbon Dioxide",
			suffix: "ppm",
			includeZero: true
		},
		// ($deviceKey as $devices)
		data: [{
			type: "line",
			name: "CPU Utilization",
			connectNullData: true,
			//nullDataLineDashType: "solid",
			// xValueType: "dateTime",
			// xValueFormatString: "DD MMM hh:mm TT",
			yValueFormatString: "#,##0.##\"%\"",
			dataPoints: [
				{ label:"12.00A.M", y: h[0] },
				{ label:"1.00A.M", y:  h[1]},
				{ label:"2.00A.M", y:  h[2] },
				{ label:"3.00A.M", y:  h[3] },
				{ label:"4.00A.M", y:  h[4] },
				{ label:"5.00A.M", y:  h[5] },
				{ label:"6.00A.M", y:  h[6] },
				{ label:"7.00A.M", y:  h[7] },
				{ label:"8.00A.M", y:  h[8] },
				{ label:"9.00A.M", y:  h[9] },
				{ label:"10.00A.M", y: h[10] }, // Null Data
				{ label:"11.00A.M", y: h[11] },
				{ label:"12.00P.M", y: h[12] },
				{ label:"1.00P.M", y:  h[13] },
				{ label:"2.00P.M", y:  h[14] },
				{ label:"3.00P.M", y:  h[15] },
				{ label:"4.00P.M", y:  h[16] },
				{ label:"5.00P.M", y:  h[17] },
				{ label:"6.00P.M", y:  h[18] },
				{ label:"7.00P.M", y:  h[19] },
				{ label:"8.00P.M", y:  h[20] },
				{ label:"9.00P.M", y:  h[21] },
				{ label:"10.00P.M", y: h[22] },
				{ label:"11.00P.M", y: h[23] }
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
          <i class="fa fa-area-chart"></i> HOURLY GAS MONITORING</div>
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
                  <div class="h4 mb-0 text-primary"></div>
                  <div class="small text-muted">HOURLY</div>
                  <hr>
                  {{-- <div class="h4 mb-0 text-warning"> {{ $data->snapshot()['CO2']}}</div> --}}
				  <div class="h4 mb-0 text-warning"></div>
                  <div class="small text-muted">DAILY</div>
				  <hr>
                  <div class="h4 mb-0 text-success"></div>
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