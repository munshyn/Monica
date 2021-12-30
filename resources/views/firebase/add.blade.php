@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add Device') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ url('/add') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="secret_key" class="col-md-4 col-form-label text-md-right">{{ __('Secret Key') }}</label>

                            <div class="col-md-6">
                                <input id="secret_key" type="text" class="form-control @error('secret_key') is-invalid @enderror" name="secret_key" required autocomplete="secret_key">

                                @error('secret_key')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="device_name" class="col-md-4 col-form-label text-md-right">{{ __('Device Name') }}</label>

                            <div class="col-md-6">
                                <input id="device_name" type="text" class="form-control @error('device_name') is-invalid @enderror" name="device_name" required autocomplete="device_name">

                                @error('device_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Add') }}
                                </button>

                        
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection