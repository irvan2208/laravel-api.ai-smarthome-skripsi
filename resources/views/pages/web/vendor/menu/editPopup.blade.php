<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	<h4 class="modal-title" id="newAdminLabel">Editing {{$menu->name}}</h4>
</div>

{{ Form::open(['url' => route('vendor.update.menu', ['restaurant' => $menu->id]), 'method' => 'POST', 'class' => 'form-horizontal', 'files' => true]) }}
<div class="modal-body">
    <div class="form-group">
        <label class="control-label col-sm-3">Menu's Name</label>
        <div class="col-sm-7">
            {{ Form::text('name', $menu->name, ['class' => 'form-control']) }}
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-3">Description</label>
        <div class="col-sm-7">
            {{ Form::textarea('description', $menu->description, ['class' => 'form-control', 'rows' => 3]) }}
        </div>
        <div class="col-sm-2">Max 150 Character</div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-3">Price</label>
        <div class="col-sm-2">
            {{ Form::text('price', $menu->price, ['class' => 'form-control']) }}
        </div>
        <label class="control-label col-sm-2">Currency</label>
        <div class="col-sm-3">
            {{ Form::select('currency', CurrencyType::getArray(), $menu->currency, ['class' => 'form-control']) }}
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-3">Category</label>
        <div class="col-sm-3">
            {{ Form::select('restaurant_category_id', $categories, $menu->restaurant_category_id, ['class' => 'form-control']) }}
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-3">Featured</label>
        <div class="col-sm-3">
            {{ Form::select('is_featured', [0 => 'No', 1 => 'Yes'], $menu->is_featured, ['class' => 'form-control']) }}
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-3">Menu's Image</label>
        <div class="col-sm-1">
        	<img src="{{$menu->image_url}}" height="30px">
        </div>
        <div class="col-sm-6">
            {{ Form::file('image', ['class' => 'form-control', 'placeholder' => '']) }}
        </div>
    </div>
</div>
<div class="modal-footer">
	<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
	<button type="submit" class="btn btn-primary">Save</button>
</div>
{{ Form::close() }}
