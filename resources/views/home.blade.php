{{-- <html>
    <head>
        <style>

            .Cart-Container{
                width: 70%;
                height: 85%;
                background-color: #ffffff;
                border-radius: 20px;
                box-shadow: 0px 25px 40px #1687d933;
                align-items: center;
                margin-left: 16%;
                }
            .Header{
                margin: auto;
                width: 90%;
                height: 15%;
                display: flex;
                justify-content: space-between;
                align-items: center;
                margin-top: 3%;
                }
            .Heading{
                font-size: 30px;
                font-family: ‘Open Sans’;
                font-weight: 700;
                color: #2F3841;
            }
}

        </style>
    </head> --}}


@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <nav class="navbar navbar-light bg-light">
                        <div class="container-fluid">
                            <span class="navbar-brand mb-0 h1">Your Devices</span>
                          <div class="d-flex">
                            <a href="{{ url('/addD') }}" class="btn btn-secondary btn-md">Add Device</a>
                        </div>
                      </nav>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @forelse ($deviceKey as $devices)
                        
                    <div class="mt-5">
                        <div class="container-fluid d-style my-2 py-3 rounded shadow-lg">
                            <div class="row align-items-center">
                                <div class="col-12 col-md-4 text-center">
                                    <h4 class="pt-3 text-170 text-600 text-primary-d1 letter-spacing">
                                    {{ $devices->data()['deviceName'] }}
                                    </h4>
                                </div>

                                {{-- <div class="col"> --}}
                                    <ul class="list-unstyled mb-0 col-12 col-md-4 text-dark-l1 text-90 text-center my-4 my-md-0">
                                        <li>
                                        {{-- <i class="fa fa-check text-success-m2 text-110 mr-2 mt-1"></i> --}}
                                            <span class="text-110">Status</span>
                                        </li>

                                        <li class="mt-25">
                                        {{-- <i class="fa fa-check text-success-m2 text-110 mr-2 mt-1"></i> --}}
                                        <span class="text-110">
                                            <div class="btn btn-success">Active</div>
                                        </span>
                                        </li>
                                    </ul>
                                {{-- </div> --}}

                                <div class="col-12 col-md-4 text-center">
                                    <form method="POST" action="{{ url('/dashboard') }}">
                                        @csrf
                                        <input id="secret" type="text" class="form-control @error('secret_key') is-invalid @enderror" name="secret" value={{$devices->id()}} hidden>
                                        <button type="submit" class="f-n-hover btn btn-info btn-raised px-4 py-25 w-75 text-600">
                                            {{ __('Dashboard') }}
                                        </button>
                                        {{-- <a href="{{ url('/', ['secret' => $devices->id()]) }}" class=""></a> --}}
                                    </form>
                                </div>
                                
                            </div>

                        </div>
                    </div>

                    @empty
                    <div class="mt-5">
                        <div class="container-fluid d-style my-2 py-3 rounded shadow-lg">
                            <!-- Basic Plan -->
                            <div class="row align-items-center">
                                <div class="col-12 col-md-4 text-center">
                                    <h4 class="pt-3 text-170 text-600 text-primary-d1 letter-spacing">
                                    No devices found
                                    </h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforelse
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
