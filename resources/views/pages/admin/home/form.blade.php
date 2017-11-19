@extends('layouts.adminLayouts')
@section('page_header','Create Home')
@section('breadcrumblv2')
	<li>Home</li>
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
                            <label for="user_id" class="col-md-12">Owner</label>
                            <div class="col-md-12">
                              {{ Form::select('user_id',Users::pluck('name','id'), $model ? $model->user_id : null, ['class' => 'form-control']) }}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="address" class="col-md-12">Address</label>
                            <div class="col-md-12">
                              {{ Form::text('address', null, ['class' => 'form-control', 'placeholder' => 'Address']) }}
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