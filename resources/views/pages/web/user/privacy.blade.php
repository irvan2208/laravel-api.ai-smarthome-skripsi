@extends('layouts.setting')

@section('settingContent')
<h1 class="lqt-mt0">Privacy Setting</h1>
<br>
{{ Form::open(['url' => route('user.update.privacy', ['user' => $user]), 'method' => 'POST', 'class' => 'form-horizontal']) }}
    <div class="form-group">
        <label class="control-label col-sm-6">Status visibility in vendor's page</label>
        <div class="col-sm-3">
            {{ Form::select('visible', [0 => 'Private', 1 => 'Public'], $user->visible_on_vendor, ['class' => 'form-control']) }}
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-6">Your profile searchable</label>
        <div class="col-sm-3">
            {{ Form::select('searchable', [0 => 'No', 1 => 'Yes'], $user->searchable, ['class' => 'form-control']) }}
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-6">Social media share</label>
        <div class="col-sm-3">
            {{ Form::select('media_shareable', [0 => 'Not Allow', 1 => 'Allow'], $user->media_shareable, ['class' => 'form-control']) }}
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-12">
            <button type="submit" class="btn btn-default lqt-btn-form">Save</button>
        </div>
    </div>
{{ Form::close() }}
@endsection