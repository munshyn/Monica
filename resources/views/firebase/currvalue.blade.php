@yield('currentvalue')

<div class="col-lg-4">
    <div class="card mb-3">
      <div class="card-header">
          <i class="fa fa-bar-chart"></i> Current Gas Analysis</div>
        <div class="card-body">
         @foreach($students as $student)
            {{$student}}
         @endforeach
      </div>
    </div>
  </div>