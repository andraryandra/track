@extends('layouts.dashboard')


@section('admin')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Create New Role</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('dashboard.roles.index') }}"> Back</a>
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


    {!! Form::open(['route' => 'dashboard.roles.store', 'method' => 'POST']) !!}

    <div class="my-3">
        <div class="card">
            <div class="card-body">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <label for="name" class="my-3 fw-bold">Name:</label>
                        {!! Form::text('name', null, ['placeholder' => 'Name Roles', 'class' => 'form-control']) !!}
                    </div>
                </div>
                <hr>
                <div class="row my-4">
                    <div class="col-md-4">
                        <div class="card mb-3 shadow-sm">
                            <div class="card-body">
                                <div class="card-title d-flex align-items-center">
                                    <h5 class="mb-0">Menu Role</h5>
                                </div>
                                <hr />
                                <div class="form-group">
                                    @foreach ($permission as $value)
                                        @if (strpos($value->name, 'role-') === 0)
                                            <div class="form-check my-2">
                                                <label>{{ Form::checkbox('permission[]', $value->id, false, ['class' => 'form-check-input']) }}
                                                    <span class="mx-2">{{ $value->name }}</span>
                                                </label>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card mb-3 shadow-sm">
                            <div class="card-body">
                                <div class="card-title d-flex align-items-center">
                                    <h5 class="mb-0">Menu Users</h5>
                                </div>
                                <hr />
                                <div class="form-group">
                                    @foreach ($permission as $value)
                                        @if (strpos($value->name, 'users-') === 0)
                                            <div class="form-check my-2">
                                                <label>{{ Form::checkbox('permission[]', $value->id, false, ['class' => 'form-check-input']) }}
                                                    <span class="mx-2">{{ $value->name }}</span>
                                                </label>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card mb-3 shadow-sm">
                            <div class="card-body">
                                <div class="card-title d-flex align-items-center">
                                    <h5 class="mb-0">Menu Category</h5>
                                </div>
                                <hr />
                                <div class="form-group">
                                    @foreach ($permission as $value)
                                        @if (strpos($value->name, 'category-') === 0)
                                            <div class="form-check my-2">
                                                <label>{{ Form::checkbox('permission[]', $value->id, false, ['class' => 'form-check-input']) }}
                                                    <span class="mx-2">{{ $value->name }}</span>
                                                </label>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card mb-3 shadow-sm">
                            <div class="card-body">
                                <div class="card-title d-flex align-items-center">
                                    <h5 class="mb-0">Menu Survey</h5>
                                </div>
                                <hr />
                                <div class="form-group">
                                    @foreach ($permission as $value)
                                        @if (strpos($value->name, 'survey-') === 0)
                                            <div class="form-check my-2">
                                                <label>{{ Form::checkbox('permission[]', $value->id, false, ['class' => 'form-check-input']) }}
                                                    <span class="mx-2">{{ $value->name }}</span>
                                                </label>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <hr>
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-action btn-primary col-md-2 my-3 shadow"
                        title="Simpan">Submit</button>
                </div>
            </div>
        </div>


    </div>
    {!! Form::close() !!}

@endsection
