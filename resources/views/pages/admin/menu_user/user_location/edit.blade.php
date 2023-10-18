@extends('layouts.dashboard')


@section('admin')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Lokasi User - ({{ $lokasi->user->name }})</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary my-3" href="{{ route('dashboard.user_location.index') }}">Back</a>
            </div>
        </div>
    </div>


    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {!! Form::model($lokasi, ['method' => 'PUT', 'route' => ['dashboard.user_location.update', $lokasi->id]]) !!}
    <div class="card">
        <div class="card-body">
            <div class="card-title d-flex align-items-center">
                <h5 class="mb-0">User Location</h5>
            </div>
            <hr />
            <div class="row mb-3">
                <label for="user_id" class="col-sm-2 col-form-label">Nama</label>
                <input type="hidden" class="form-control" name="user_id" type="text" id="user_id"
                    value="{{ $lokasi->user_id }}">
                <div class="col-sm-10">
                    <select class="form-control" name="user_id" type="text" id="user_id" disabled>
                        @foreach ($users as $user)
                            <option value="{{ $user->user_id }}">
                                {{ $user->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <label for="latitude" class="col-sm-2 col-form-label">Latitude</label>
                <div class="col-sm-10">
                    <input class="form-control" name="latitude" type="text" id="latitude"
                        value="{{ $lokasi->latitude }}" placeholder="Masukan latitude" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="longitude" class="col-sm-2 col-form-label">Longitude</label>
                <div class="col-sm-10">
                    <input class="form-control" name="longitude" type="text" id="longitude"
                        value="{{ $lokasi->longitude }}" placeholder="Masukan longitude" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="address" class="col-sm-2 col-form-label">Alamat</label>
                <div class="col-sm-10">
                    <textarea class="form-control" name="address" id="address" placeholder="Masukkan Alamat" required>{{ $lokasi->address }}</textarea>
                </div>
            </div>
            <div class="row text-center">
                <div class="">
                    <button type="submit" class="btn btn-primary px-5">Simpan</button>
                </div>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
@endsection
