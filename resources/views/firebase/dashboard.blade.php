@extends('layouts.app')

@section('content')

<!DOCTYPE html>
<html>
<head>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
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

  table, th, td {
  border: 1px solid black;
  background-color: #c9c8d1;
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
              <i class="fa fa-bar-chart"></i> Daily Gas Analysis</div>
            <div class="card-body">
              <div class="row">
                <div class="col-sm-8 my-auto">
                  <div id="myBarChart" width="100" height="50">
					{!! $bchart->container() !!}
					{!! $bchart->script() !!}
				  </div>
                </div>
                <div class="col-sm-4 text-center my-auto">
                  <h1>Weekly Analysis</h1>
				          <hr>
                  <div class="h4 mb-0 text-success">
                    {{round($week)}}&ensp;ppm
                  </div>
                  <div class="small text-muted">Last week Analysis</div>
                  <hr>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-bar-chart"></i>Carbon Dioxide and Safety</div>
                <div class="card-body">
                  <p>
                  Carbon dioxide is a non-toxic and non-flammable gas. However, exposure to elevated concentrations can induce
                  a risk to life. Whenever CO2 gas or dry ice is used, produced, shipped, or stored, CO2 concentration can rise 
                  to dangerously high levels. Because CO2 is odorless and colorless, leakages are impossible to detect, meaning
                  proper sensors are needed to help ensure the safety of personnel. 
                  </p>
                  <div style="background-color: #b1c6f5; padding:3%">
                  <p>Effect of Different Levels of CO</p>
                    <table style="width: 100%;">
                      <tr>
                        <td style="background-color: #5f82cc;">Concentration</td>
                        <td style="background-color: #5f82cc;">Effect</td>
                      </tr>
                      <tr>
                        <td>350 - 450 ppm</td>
                        <td>Typical atmospheric concentration</td>
                      </tr>
                      <tr>
                        <td>600 - 800 ppm </td>
                        <td>Acceptable indoor air quality</td>
                      </tr>
                      <tr>
                        <td>1,000 ppm </td>
                        <td>Tolerable indoor air quality</td>
                      </tr>
                      <tr>
                        <td>5,000 ppm </td>
                        <td>Average exposure limit over 8-hour period</td>
                      </tr>
                      <tr>
                        <td>6,000 - 30,000 ppm</td>
                        <td>Concern, short exposure only</td>
                      </tr>

                    </table>
                  </div>
                </div>
            </div>
          </div>
        </div>
        {{-- <div wire:click="refresh" class="card mb-3" style="margin-left:20%;margin-right:25%;margin-top:1%;"> --}}
        <div class="card mb-3" style="margin-left:20%;margin-right:25%;margin-top:1%;">
          <div class="card-header">
             Current Gas Analysis</div>
          <div class="card-body">
              @foreach($currValue as $value)
              @endforeach   
              <strong><div style="text-align: center"><h3>C02 value<br/> {{ round($value) }}&ensp;ppm<br/></h3></div></strong>
              @if($value>6000)
              <div class="alert alert-danger">
                <div class="icon hidden-xs">
                  <i class="fa fa-exclamation-circle"></i>
                </div>
                <strong>Danger</strong>
                <Br /> Concern, short exposure only
              </div>
              @elseif(($value>5000)&&($value<6000))
              <div class="alert alert-warning">
                <div class="icon hidden-xs">
                  <i class="fa fa-exclamation-circle"></i>
                </div>
                <strong>Alert</strong>
                <Br /> Average exposure limit over 8-hour period
              </div>
              @elseif(($value>0)&&($value<5000))
              <div class="alert alert-success">
                <div class="icon hidden-xs">
                  <i class="fa fa-exclamation-circle"></i>
                </div>
                <strong>Good</strong>
                <Br /> Enjoy your outdoor activities.
            </div>
            @endif
            {{-- <svg wire.target="refresh" wire:loading.class="animate-spin"xmlns="http://www.w3.org/2000/svg" width="20"> --}}
          </div>
        </div>
    </div>
  </div>
  
	  
</body>
</html>
@endsection
