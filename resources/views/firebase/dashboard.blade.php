@extends('layouts.app')

@section('content')

<!DOCTYPE html>
<html>
<head>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>

</head>
<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <div class="content-wrapper">
    <div class="container-fluid">  
      <!-- Area Chart Example-->
      <div class="card mb-3" >
        <div class="card-header">
          <i class="fa fa-area-chart"></i> HOURLY GAS MONITORING</div>
        <div class="card-body">
          <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>  
          <div id="myAreaChart" width="100%" height="30">
              {!! $achart->container() !!}
              {!! $achart->script() !!}
          </div>
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
                  <div id="myBarChart" width="100" height="50">
					{!! $bchart->container() !!}
					{!! $bchart->script() !!}
				  </div>
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
