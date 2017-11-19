@extends('layouts.vendor-setting')

@section('vendorSetting')
<h1 class="lqt-mt0">Menu <a href="{{ route('vendor.menu.create') }}" type="button" class="btn lqt-btn-form">Add Menu</a></h1>
<br>
<div class="col-md-12">
	<table class="table table-striped table-hover lqt-table-cat" style="width: 100%;" id="restaurant-menu-table">
		<thead>
			<tr>
				<th>Image</th>
				<th>Name</th>
				<th>Price</th>
				<th>Featured</th>
				<th>Category</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
		</tbody>
	</table>
</div>
@endsection

@push('additional-script')
  <script src="{{url('/')}}/plugins/bower_components/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
  <script>
    $(document).ready(function () {
      var dataTable = $('#restaurant-menu-table').DataTable({
        dom: 'rtif',
        orderCellsTop: true,
        responsive: true,
        processing: true,
        serverSide: true,
        ajax: {
            url:  '{{ route('vendor.menu.list', ['restaurant' => $vendor->vendorable]) }}',
            data: function(data) {
                data._token = '{{ csrf_token() }}'
            },
            type: 'POST',
        },
        columns: [
            { data: 'image' , name: 'image'},
            { data: 'menu_name' , name: 'menus.name'},
            { data: 'price' , name: 'price'},
            { data: 'is_featured' , name: 'is_featured'},
            { data: 'category_name' , name: 'restaurant_categories.name'},
            { data: 'action', name: 'action', orderable: false, searchable: false },
        ],
      });
    })
  </script>
@endpush