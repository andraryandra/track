@extends('layouts.dashboard')


@section('admin')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit User - ({{ $user->name }})</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary my-3" href="{{ route('dashboard.userAdmin.index') }}"> Kembali</a>
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

    {!! Form::model($user, ['method' => 'PATCH', 'route' => ['dashboard.userAdmin.update', $user->id]]) !!}
    <div class="card">
        <div class="card-body">
            <div class="border p-4 rounded">
                <ul class="nav nav-tabs nav-primary" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" data-bs-toggle="tab" href="#editProfil" role="tab"
                            aria-selected="true">
                            <div class="d-flex align-items-center">
                                <div class="tab-icon"><i class='bx bx-home font-18 me-1'></i>
                                </div>
                                <div class="tab-title">Edit Profil</div>
                            </div>
                        </a>
                    </li>

                </ul>
                <div class="tab-content py-3">
                    <div class="tab-pane fade show active" id="editProfil" role="tabpanel">
                        <div class="card-title d-flex align-items-center">
                            <h5 class="mb-0">User Admin</h5>
                        </div>
                        <hr />
                        <div class="row mb-3">
                            <label for="inputEnterYourName" class="col-sm-3 col-form-label">Enter Your Name</label>
                            <div class="col-sm-9">
                                {!! Form::text('name', null, [
                                    'placeholder' => 'Name',
                                    'class' => 'form-control',
                                    'placeholder' => 'Masukkan Nama',
                                ]) !!}
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputEmailAddress2" class="col-sm-3 col-form-label">Email Address</label>
                            <div class="col-sm-9">
                                {!! Form::text('email', null, [
                                    'placeholder' => 'Email',
                                    'class' => 'form-control',
                                    'placeholder' => 'Masukkan Email Address',
                                ]) !!}
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="roles" class="col-sm-3 col-form-label">Role</label>
                            <div class="col-sm-9">
                                {!! Form::select('roles[]', $roles, $userRole, ['class' => 'form-control', 'multiple']) !!}
                            </div>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <label class="col-sm-3 col-form-label"></label>
                    <div class="col-sm-9">
                        <button type="submit" class="btn btn-primary px-5">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {!! Form::close() !!}

@endsection
