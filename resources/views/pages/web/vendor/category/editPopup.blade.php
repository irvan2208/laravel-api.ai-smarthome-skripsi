<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	<h4 class="modal-title" id="newAdminLabel">Editing {{$category->name}}</h4>
</div>

 {{ Form::open(['url' => route('vendor.update.category', ['restaurant' => $category->id]), 'method' => 'POST', 'class' => 'form-horizontal', 'files' => true]) }}
<div class="modal-body">
    <div class="form-group">
        <label class="control-label col-sm-3">Category Name</label>
        <div class="col-sm-7">
            {{ Form::text('name', $category->name, ['class' => 'form-control']) }}
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-3" for="email">Category Image</label>
        <div class="col-sm-1">
            <img src="{{$category->cover_url}}" height="30px">
        </div>
        <div class="col-sm-6">
            {{ Form::file('cover', ['class' => 'form-control', 'placeholder' => '']) }}
        </div>
    </div>
</div>
<div class="modal-footer">
	<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
	<button type="submit" class="btn btn-primary">Save</button>
</div>
{{ Form::close() }}
