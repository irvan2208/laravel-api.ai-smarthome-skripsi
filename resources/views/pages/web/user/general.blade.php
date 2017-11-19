@extends('layouts.setting')

@section('settingContent')
<h1 class="lqt-mt0">General Information</h1>
<br>
{{ Form::open(['url' => route('user.update.profile', ['user' => $user]), 'method' => 'POST', 'class' => 'form-horizontal', 'files' => true]) }}
    <div class="form-group">
        <label class="control-label col-sm-3">First Name</label>
        <div class="col-sm-7">
            <input type="text" class="form-control" placeholder="" value="{{ $user->first_name }}" name="first_name">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-3">Last Name</label>
        <div class="col-sm-7">
            <input type="text" class="form-control" placeholder="" value="{{ $user->last_name }}" name="last_name">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-3">Email</label>
        <div class="col-sm-7">
            <input type="email" class="form-control" placeholder="" value="{{ $user->email }}" name="email">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-3">Password</label>
        <div class="col-sm-2">
            <button type="button" class="btn btn-default lqt-btn-form lqt-btn-edit-password">Edit</button>
        </div>
    </div>
    <div class="lqt-user-edit-password">
        <div class="form-group">
            <label class="control-label col-sm-3">Old Password</label>
            <div class="col-sm-7">
                <input type="password" class="form-control" placeholder="" name="old_password">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-3">New Password</label>
            <div class="col-sm-7">
                <input type="password" class="form-control" placeholder="" name="new_password">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-3">Re-type Password</label>
            <div class="col-sm-7">
                <input type="password" class="form-control" placeholder="" name="new_password_confirmation">
            </div>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-3">Profile Picture</label>
        <div class="col-sm-7">
            <div class="dropdown">
                <img class="lqt-edit-pp" src="{{ $user->profile ? $user->profile->avatar_url : '' }}">
                <button type="button" class="btn btn-default lqt-btn-form lqt-btn-edit-pp dropdown-toggle" data-toggle="dropdown">Edit</button>
                <div class="dropdown-menu lqt-pp-upload">
                    <input type="file" class="form-control" name="avatar">
                </div>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-12">
            <button type="submit" class="btn btn-default lqt-btn-form">Save</button>
        </div>
    </div>
{{ Form::close() }}
@endsection