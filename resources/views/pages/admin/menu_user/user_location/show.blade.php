@extends('layouts.dashboard')


@section('admin')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="card">
                <div class="card-body">
                    <div class="pull-left">
                        <h2>Detail Lokasi User</h2>
                    </div>
                    <hr class="bordered">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Name:</strong>
                                {{ $lokasi->user->name }}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Latitude:</strong>
                                {{ $lokasi->latitude }}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Latitude:</strong>
                                {{ $lokasi->longitude }}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Latitude:</strong>
                                {{ $lokasi->address }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('dashboard.user_location.index') }}"> Back</a>
            </div>
        </div>
    </div>
@endsection
