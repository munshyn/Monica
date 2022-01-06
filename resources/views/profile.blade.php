@extends('layouts.app')

@section('content')
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
<link href="{{ asset('css/profile.css') }}" rel="stylesheet">

<body>
  <div class="main-content">
    <!-- Header -->
    <div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center">
      <!-- Mask -->
      <!-- <span class="mask bg-gradient-default opacity-8"></span> -->
      <!-- Header container -->
      <div >
        <div style="margin-left:6%">
          <div class="col-lg-7 col-md-10">
            <h1 class="display-2 text-white">Hello {{ Auth::user()->name }}</h1>
            <p class="text-white mt-0 mb-5">This is your profile page. You can see the profile you have made in here and also edit your profile based on your preference</p>
            <a href="edit" class="btn btn-info">Edit profile</a>
            <a href="change-password" class="btn btn-info">Change password</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    
    <div class="container-fluid mt--7">
      <div class="row">
        <div class="col-xl-8 order-xl-1">
          <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">My account</h3>
                </div>
              </div>
            </div>
            <div class="card-body">
              <form>
                <h6 class="heading-small text-muted mb-4">User information</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-username">Username</label>
                      <br>
                        {{ Auth::user()->name }}
                        
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Email address</label>
                      <br>
                        {{ Auth::user()->email }}
                      </div>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
@endsection