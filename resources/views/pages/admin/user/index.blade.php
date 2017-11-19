@extends('layouts.adminLayouts')
@section('page_header','User List')
@section('create-button')
    <a href="{{ route('user.create') }}" class="btn btn-danger pull-right m-l-20 btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light">Create User</a>
@endsection
@section('breadcrumblv2')
	<li class="active">User List</li>
@endsection
@section('content')

<div class="row">
	<div class="col-sm-12">
		<div class="white-box">
            <div class="row">
                <div class="col-3">
                    <div class="form-group">
                        <input type="text" class="form-control" id="search" placeholder="Search..." />
                    </div>
                </div>
            </div>
			<div class="table-responsive">
				<table id="type-table" class="table table-striped">
					<thead>
						<tr>
							<th>Name</th>
              <th>Email</th>
							<th>Action</th>
						</tr>
					</thead>
				</table>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="top: 100px;">
        <div class="modal-content load_modal"></div>
    </div>
</div>
@include('shared.delete-modal')
@endsection
@push('pageRelatedJs')
  <script>
    $(document).ready(function () {

      var dataTable = $('#type-table').DataTable({
        dom: 'lrtip',
        orderCellsTop: true,
        responsive: true,
        processing: true,
        serverSide: true,
        ajax: {
            url:  '{{ route('users.list') }}',
            data: function(data) {
                data._token = '{{ csrf_token() }}'
            },
            type: 'POST',
        },
        columns: [
            { data: 'name' , name: 'name'},
            { data: 'email', name: 'email'},
            { data: 'action', name: 'action', orderable: false, searchable: false },
        ],
      });

      $('#search').on('keyup', function() {
          var value = $(this).val();
          dataTable.search( value ).draw();
      });
    });
  </script>
@endpush