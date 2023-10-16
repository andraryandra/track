@extends('layouts.dashboard')


@section('admin')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Role - ({{ $role['name'] }})</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('dashboard.roles.index') }}"> Back</a>
            </div>
        </div>
    </div>

    <div class="my-3">
        <div class="card">
            <div class="card-body">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <label for="name" class="my-2 fw-bold">Name:</label>
                        {{ Form::text('name', $role['name'], [
                            'placeholder' => 'Name',
                            'class' => 'form-control',
                            'readonly' => 'readonly',
                        ]) }}
                    </div>
                </div>
                <hr>

                <div class="row my-4">
                    <div class="col-md-4">
                        <div class="card mb-3">
                            <div class="card-body shadow-sm">
                                <div class="card-title d-flex align-items-center">
                                    <h5 class="mb-0">Menu Role</h5>
                                </div>
                                <hr />
                                <div class="form-group">
                                    @foreach ($rolePermissions as $permission)
                                        @if (strpos($permission->name, 'users-') === 0)
                                            <div class="form-check my-2">
                                                {{ Form::checkbox('permissions[]', $permission->id, true, ['class' => 'form-check-input', 'id' => 'permission_' . $permission->id, 'disabled' => 'disabled', 'checked' => 'checked']) }}
                                                {{ Form::label('permission_' . $permission->id, $permission->name, ['class' => 'form-check-label']) }}
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-4">
                        <div class="card mb-3">
                            <div class="card-body shadow-sm">
                                <div class="card-title d-flex align-items-center">
                                    <h5 class="mb-0">Menu Users</h5>
                                </div>
                                <hr />
                                <div class="form-group">
                                    @foreach ($rolePermissions as $v)
                                        @if (strpos($v->name, 'users-') === 0)
                                            <div class="form-check my-2">

                                                {{ Form::checkbox('permissions[]', $v->id, true, ['class' => 'form-check-input', 'id' => 'permission_' . $v->id, 'disabled' => 'disabled', 'checked' => 'checked']) }}
                                                {{ Form::label('permission_' . $v->id, $v->name, ['class' => 'form-check-label']) }}
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card mb-3">
                            <div class="card-body shadow-sm">
                                <div class="card-title d-flex align-items-center">
                                    <h5 class="mb-0">Menu Category</h5>
                                </div>
                                <hr />
                                <div class="form-group">
                                    @foreach ($rolePermissions as $v)
                                        @if (strpos($v->name, 'category-') === 0)
                                            <div class="form-check my-2">

                                                {{ Form::checkbox('permissions[]', $v->id, true, ['class' => 'form-check-input', 'id' => 'permission_' . $v->id, 'disabled' => 'disabled', 'checked' => 'checked']) }}
                                                {{ Form::label('permission_' . $v->id, $v->name, ['class' => 'form-check-label']) }}
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card mb-3">
                            <div class="card-body shadow-sm">
                                <div class="card-title d-flex align-items-center">
                                    <h5 class="mb-0">Menu Survey</h5>
                                </div>
                                <hr />
                                <div class="form-group">
                                    @foreach ($rolePermissions as $v)
                                        @if (strpos($v->name, 'survey-') === 0)
                                            <div class="form-check my-2">

                                                {{ Form::checkbox('permissions[]', $v->id, true, ['class' => 'form-check-input', 'id' => 'permission_' . $v->id, 'disabled' => 'disabled', 'checked' => 'checked']) }}
                                                {{ Form::label('permission_' . $v->id, $v->name, ['class' => 'form-check-label']) }}
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
