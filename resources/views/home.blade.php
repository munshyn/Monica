<html>
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
    </head>


@extends('layouts.app')
@section('content')
<div class="Cart-Container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="Header">
                    <div class='Heading'>
                        Your Devices
                    </div>
                    <div class='Action'>
                        <a href="{{ url('/addD') }}" class="btn btn-secondary btn-sm">Add Device</a>
                    </div>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />

                    {{-- <div class="container"> --}}

                    @forelse ($deviceKey as $devices)
                        
                    <div class="mt-5">
                        <div class="d-style btn btn-brc-tp border-2 bgc-white btn-outline-blue btn-h-outline-blue btn-a-outline-blue w-100 my-2 py-3 shadow-lg">
                            <div class="row align-items-center">
                                <div class="col-12 col-md-4">
                                    <h4 class="pt-3 text-170 text-600 text-primary-d1 letter-spacing">
                                    {{ $devices->data()['deviceName'] }}
                                    </h4>
                                </div>

                                <ul class="list-unstyled mb-0 col-12 col-md-4 text-dark-l1 text-90 text-left my-4 my-md-0">
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

                                <div class="col-12 col-md-3 text-center">
                                    <a href="{{ url('/dashboard') }}" class="f-n-hover btn btn-info btn-raised px-4 py-25 w-75 text-600">Dashboard</a>
                                </div>
                            </div>

                        </div>
                    </div>

                    @empty
                    <div class="mt-5">
                        <div class="d-style btn btn-brc-tp border-2 bgc-white btn-outline-blue btn-h-outline-blue btn-a-outline-blue w-100 my-2 py-3 shadow-lg">
                            <!-- Basic Plan -->
                            <div class="row align-items-center">
                            <div class="col-12 col-md-4">
                                <h4 class="pt-3 text-170 text-600 text-primary-d1 letter-spacing">
                                No devices found
                                </h4>

                                <div class="text-secondary-d1 text-120">
                                <span class="ml-n15 align-text-bottom">$</span><span class="text-180">10</span> / month
                                </div>
                            </div>

                            <ul class="list-unstyled mb-0 col-12 col-md-4 text-dark-l1 text-90 text-left my-4 my-md-0">
                                <li>
                                <i class="fa fa-check text-success-m2 text-110 mr-2 mt-1"></i>
                                <span>
                                    <span class="text-110">Donec id elit.</span>
                                Fusce dapibus...
                                </span>
                                </li>

                                <li class="mt-25">
                                <i class="fa fa-check text-success-m2 text-110 mr-2 mt-1"></i>
                                <span class="text-110">
                                    Placerat duis
                                </span>
                                </li>

                                <li class="mt-25">
                                <i class="fa fa-times text-danger-m3 text-110 mr-25 mt-1"></i>
                                <span class="text-110">
                                    Tortor mauris
                                </span>
                                </li>
                            </ul>

                            <div class="col-12 col-md-4 text-center">
                                <a href="#" class="f-n-hover btn btn-info btn-raised px-4 py-25 w-75 text-600">Get Started</a>
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
