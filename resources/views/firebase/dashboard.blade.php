@extends('layouts.app')

@section('content')

<!DOCTYPE html>
<html>
<head>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
  /*Pen styling*/
.container {
}

/*alert styling*/
.alert-success {
  border-color: #e6e6e6;
  border-left: 5px solid #00986a;
  background-color: #fff;
  color: #888;
}

.alert-info {
  border-color: #e6e6e6;
  border-left: 5px solid #00b3c8;
  background-color: #fff;
  color: #888;
}

.alert-warning {
  border-color: #e6e6e6;
  border-left: 5px solid #f9af2c;
  background-color: #fff;
  color: #888;
}

.alert-danger {
  border-color: #e6e6e6;
  border-left: 5px solid #c82630;
  background-color: #fff;
  color: #888;
}

@media (min-width: 768px) {
  .alert {
    border-radius: 6px;
    display: table;
    width: 100%;
    padding-left: 78px;
    position: relative;
    padding-right: 60px;
    border: 1px solid #e6e6e6;
  }

  .alert .close {
    color: #888;
    opacity: 1;
    float: none;
    position: absolute;
    right: 18px;
    top: 50%;
    margin-top: -12px;
    font-size: 25px;
  }

  .alert .icon {
    text-align: center;
    width: 58px;
    height: 100%;
    position: absolute;
    top: 0;
    left: 0;
    border: 1px solid #bdbdbd;
    padding-top: 15px;
    border-radius: 6px 0 0 6px;
  }

  .alert .icon i {
    font-size: 20px;
    color: #fff;
    left: 21px;
    margin-top: -10px;
    position: absolute;
    top: 50%;
  }

  .alert .icon img {
    font-size: 20px;
    color: #fff;
    left: 18px;
    margin-top: -10px;
    position: absolute;
    top: 50%;
  }
  /*============ colors ========*/
  .alert.alert-success .icon,
  .alert.alert-success .icon:after {
    border-color: none;
    background: #00986a;
  }

  .alert.alert-info .icon,
  .alert.alert-info .icon:after {
    border-color: none;
    background: #00b3c8;
  }

  .alert.alert-warning .icon,
  .alert.alert-warning .icon:after {
    border: none;
    background: #f9af2c;
  }

  .alert.alert-danger .icon,
  .alert.alert-danger .icon:after {
    border-color: none;
    background: #c82630;
  }
}

</style>

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
          <div class="card ">
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
      <div class="col-lg-4">
        <div class="card mb-3">
          <div class="card-header">
              <i class="fa fa-bar-chart"></i> Current Gas Analysis</div>
            <div class="card-body">
              @foreach($currValue as $value)
              @endforeach
              <div class="container">
                <div class="alert alert-info">
                  <div class="icon hidden-xs">
                    <i class="fa fa-info-circle"></i>
                  </div>
                  <strong><div style="text-align: center"> Gas Info</div>
                    CO2 VALUE LESS THAN<Br/> 
                  CO2 VALUE BETWEEN<Br/> 
                  CO2 VALUE GREATER THAN<Br/></strong>
                  
                </div>
                @if($value>0)

                <div class="alert alert-danger">
                  <div class="icon hidden-xs">
                    <i class="fa fa-ban"></i>
                  </div>
                  <strong><div style="text-align: center"> Gas Information: {{ $value }}<br/>
                  Warning</div></strong>
                  Hey! Be careful of what you're doing over there!
                </div>
                @elseif($value<50000)
                <div class="alert alert-success">
                  <div class="icon hidden-xs">
                    <i class="fa fa-check"></i>
                  </div>
                  <strong>Success</strong>
                  <Br /> Wow! Great job! Whatever you were doing works!
                </div>
                <div class="alert alert-warning">
                  <div class="icon hidden-xs">
                    <i class="fa fa-exclamation-circle"></i>
                  </div>
                  <strong>Danger</strong>
                  <Br /> Oh dear. You just broke the internet.
                </div>
              </div>
              @endif

          </div>
        </div>
      </div>
    </div>
  </div>

  
	  
</body>
</html>
@endsection
