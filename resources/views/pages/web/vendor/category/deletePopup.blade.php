<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	<h4 class="modal-title" id="newAdminLabel">Delete {{$category->name}}?</h4>
</div>
<div class="modal-body">
	<label>Are you sure want to delete this data?</label>
</div>
<div class="modal-footer">
	<button type="button" class="btn btn-default" data-dismiss="modal">No</button>
	{{ Form::open(['url' => ['/restaurant/'.$category->id.'/category/delete'], 'style'=>'float:right', 'method' => 'delete']) }}
	{{ csrf_field() }}
	<button class="btn btn-warning" type="submit">Delete</button>
	{{ Form::close() }}
</div>