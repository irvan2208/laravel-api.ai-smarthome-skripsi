@extends('layouts.vendor-setting')

@section('vendorSetting')
<h1 class="lqt-mt0">Add Menu</h1>
<br>
{{ Form::open(['url' => route('vendor.store.menu', ['restaurant' => $vendor->vendorable]), 'method' => 'POST', 'class' => 'form-horizontal', 'files' => true]) }}
    <div class="form-group">
        <label class="control-label col-sm-3">Menu's Name</label>
        <div class="col-sm-7">
            {{ Form::text('name', null, ['class' => 'form-control']) }}
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-3">Description</label>
        <div class="col-sm-7">
            {{ Form::textarea('description', null, ['class' => 'form-control', 'rows' => 3]) }}
        </div>
        <div class="col-sm-2">Max 150 Character</div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-3">Price</label>
        <div class="col-sm-2">
            {{ Form::text('price', null, ['class' => 'form-control']) }}
        </div>
        <label class="control-label col-sm-2">Currency</label>
        <div class="col-sm-3">
            {{ Form::select('currency', CurrencyType::getArray(), null, ['class' => 'form-control']) }}
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-3">Category</label>
        <div class="col-sm-3">
            {{ Form::select('restaurant_category_id', $categories, null, ['class' => 'form-control']) }}
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-3">Featured</label>
        <div class="col-sm-3">
            {{ Form::select('is_featured', [0 => 'No', 1 => 'Yes'], null, ['class' => 'form-control']) }}
        </div>
    </div>
    {{-- <div class="form-group">
        <label class="control-label col-sm-3">Date From</label>
        <div class="col-sm-2">
            <input type="text" class="form-control datepicker" placeholder="">
        </div>
        <label class="control-label col-sm-2">To</label>
        <div class="col-sm-3">
            <input type="text" class="form-control datepicker" placeholder="">
        </div>
    </div> --}}
    <div class="form-group">
        <label class="control-label col-sm-3">Menu's Image</label>
        <div class="col-sm-7">
            {{ Form::file('image', ['class' => 'form-control', 'placeholder' => '']) }}
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-12">
            <button type="submit" class="btn btn-default lqt-btn-form">Publish</button>
        </div>
    </div>
{{ Form::close() }}
@endsection