@extends('layouts.vendor-setting')

@section('vendorSetting')
<h1 class="lqt-mt0">Category</h1>
<br>
<div class="row">
    <div class="col-md-4">
        {{ Form::open(['url' => route('vendor.store.category', ['restaurant' => $vendor->vendorable]), 'method' => 'POST', 'class' => 'form-horizontal', 'files' => true]) }}
            <div class="form-group">
                <label for="email">New Category</label>
                <input type="text" class="form-control" name="name">
            </div>
            <div class="form-group">
                <label for="email">Category Image</label>
                <input type="file" class="form-control" name="cover">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-default lqt-btn-form">Add Category</button>
            </div>
        {{ Form::close() }}
        <br>
        <h4>Tips*</h4>
        <p>To make your restaurant page beautifully designed, please make sure to upload the category image in this size : 1500 x 500 pixels.</p>
        <p>Choose a less contrast image will also help to make the focus of your categories title stand out.</p>
        <p>Limit your categories to three categories will make the users easy to browse to your menus.</p>
    </div>
    <div class="col-md-8">
      <table class="table table-striped table-hover lqt-table-cat" id="restaurant-category-table">
        <thead>
          <tr>
              <th>Category</th>
              <th>Image</th>
              <th>Action</th>
          </tr>
        </thead>
        <tbody>

        </tbody>
      </table>
    </div>
</div>

@endsection

@push('additional-script')
  <script src="{{url('/')}}/plugins/bower_components/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
  <script>
    $(document).ready(function () {
      var dataTable = $('#restaurant-category-table').DataTable({
        dom: 'rti',
        orderCellsTop: true,
        responsive: true,
        processing: true,
        serverSide: true,
        ajax: {
            url:  '{{ route('vendor.category.list', ['restaurant' => $vendor->vendorable]) }}',
            data: function(data) {
                data._token = '{{ csrf_token() }}'
            },
            type: 'POST',
        },
        columns: [
            { data: 'name' , name: 'name'},
            { data: 'cover' , name: 'cover'},
            { data: 'action', name: 'action', orderable: false, searchable: false },
        ],
      });
    })
  </script>
@endpush