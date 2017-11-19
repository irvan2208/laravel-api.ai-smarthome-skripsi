@extends('layouts.vendor-setting')

@section('vendorSetting')
@php
@endphp
@if ($vendor)
{{ Form::open(['url' => route('vendor.update.general', ['vendor' => $vendor]), 'method' => 'POST', 'class' => 'form-horizontal', 'files' => true]) }}
    <div class="form-group">
        <label class="control-label col-sm-3">Logo</label>
        <div class="col-sm-7">
            <input type="file" class="form-control" placeholder="" name="logo">
        </div>
    </div>
    @if ($vendor->logo)
      <div class="form-group">
        <div class="col-sm-7 col-sm-offset-3">
          <img class="img-responsive" style="max-width: 240px;" src="{{ $vendor->logo_url }}">
        </div>
      </div>
    @endif
    <div class="form-group">
        <label class="control-label col-sm-3">Business Name</label>
        <div class="col-sm-7">
            <input type="text" class="form-control" name="name" value="{{ $vendor->name }}">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-3">Business Type</label>
        <div class="col-sm-7">
            <select class="form-control" name="" disabled>
                <option
                value="{{ VendorType::RESTAURANT }}"
                @if($vendor->vendorable instanceof App\Models\Restaurant)
                  selected
                @endif>
                Restaurant</option>
                <option
                value="{{ VendorType::ENTERTAINMENT }}"
                @if($vendor->vendorable instanceof App\Models\Entertainment)
                  selected
                @endif>
                Entertainment</option>
                <option
                value="{{ VendorType::SHOP }}"
                @if($vendor->vendorable instanceof App\Models\Shop)
                  selected
                @endif>
                Shop</option>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-3">Address</label>
        <div class="col-sm-7">
            <input type="text" class="form-control" name="address" value="{{ $vendor->address }}">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-3">Contact Number</label>
        <div class="col-sm-7">
            <input type="text" class="form-control" name="phone" value="{{ $vendor->phone }}">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-3">Website</label>
        <div class="col-sm-7">
            <input type="text" class="form-control" name="website" value="{{ $vendor->website }}">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-3">Price Range</label>
        <div class="col-sm-3">
            {{ Form::select('price_range', [1 => '$', 2 => '$$', 3 => '$$$', 4 => '$$$$', 5 => '$$$$$'], $vendor->price_range, ['class' => 'form-control']) }}
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-3">Home Wallpaper</label>
        <div class="col-sm-7">
            <input type="file" class="form-control" name="home_wallpaper">
        </div>
    </div>
    @if ($vendor->home_wallpaper)
      <div class="form-group">
        <div class="col-sm-7 col-sm-offset-3">
          <img class="img-responsive" style="max-width: 240px;" src="{{ $vendor->wallpaper_url }}">
        </div>
      </div>
    @endif
    <div class="form-group">
        <div class="col-sm-12">
            <button type="submit" class="btn btn-default lqt-btn-form">Save</button>
        </div>
    </div>
{{ Form::close() }}
@else
  <h2 class="text-center"> Your vendor has been deleted by admin, please contact administrator for further information</h2>
@endif
@endsection