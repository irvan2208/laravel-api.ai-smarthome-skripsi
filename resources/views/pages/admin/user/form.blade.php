@extends('layouts.adminLayouts')
@section('page_header','Create User')
@section('breadcrumblv2')
	<li>User</li>
	<li class="active">Create</li>
@endsection
@section('content')
<!-- .row -->
<div class="row">
    <div class="col-sm-12">
        <div class="white-box p-l-20 p-r-20">
            <div class="row">
                <div class="col-md-12">
                {!! Form::model($model, [
                        'url' => $route,
                        'method' => $method,
                        'id' => 'remarkForm',
                        'class' => 'form-material form-horizontal'
                    ]) !!}
                        <div class="form-group">
                            <label for="name" class="col-md-12">Name</label>
                            <div class="col-md-12">
                              {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Name']) }}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-md-12">Email</label>
                            <div class="col-md-12">
                              {{ Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'User Email']) }}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-md-12">Role</label>
                            <div class="col-md-12">
                              {{ Form::select('role', Role::pluck('display_name', 'id'), $model ? $model->roles->first()->id : null, ['class' => 'form-control']) }}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password" class="col-md-12">Password</label>
                            <div class="col-md-12">
                              {{ Form::password('password', ['class' => 'form-control', 'placeholder' => 'User Password']) }}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password_confirmationpassword_confirmation" class="col-md-12">Confirm Password</label>
                            <div class="col-md-12">
                              {{ Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => 'Confirm Password']) }}
                            </div>
                        </div>
                        <div class="form-group text-right">
                          <button class="btn btn-primary" type="submit">Submit</button>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection