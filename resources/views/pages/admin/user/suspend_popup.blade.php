<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	<h4 class="modal-title" id="suspendUserModalLabel">Susped User: {{$user->id}}</h4>
</div>
<div class="modal-body">
	<form id="suspendForm" action="{{route('action.popup',[$user->id,'suspendUserAction'])}}" method="post">
		{{ csrf_field() }}
		<div class="form-group">
			<label for="date-range" class="control-label">Suspend Date Range</label>
			<input class="form-control input-daterange-datepicker" type="text" name="daterange" value="01/01/2015 - 01/31/2015" />
		</div>
		<div class="form-group">
			<label for="reason" class="control-label">Reasons:</label>
			{{ Form::select('suspension_reason[]', SuspensionType::getArray(), null, ['class'=>'select2 m-b-10 select2-multiple', 'id' => 'reason', 'multiple' => true, 'required']) }}
		</div>
	</form>
</div>
<div class="modal-footer">
	<button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
	@if($user->status==1)
	<form action="{{route('action.popup',[$user->id,'cancelSuspendUserAction'])}}" method="post">
		{{ csrf_field() }}
		<button type="submit" class="btn btn-danger waves-effect waves-light">Cancel Suspend</button>
	</form>
	@endif
	<button type="button" id="saveSuspendButton" class="btn btn-danger waves-effect waves-light">Save changes</button>
</div>

<script type="text/javascript">
	$('#saveSuspendButton').click(function(){
		$('#suspendForm').submit();
	});
</script>
<script type="text/javascript">
      $(".select2").select2({
        placeholder: 'Pick a reason'
      });
  </script>
  <script type="text/javascript">
      // Daterange picker
        $('.input-daterange-datepicker').daterangepicker({
            buttonClasses: ['btn', 'btn-sm']
            , applyClass: 'btn-danger'
            , cancelClass: 'btn-inverse'
        });
  </script>