<div class="modal fade bs-modal-sm" id="delete_modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
        {{ Form::open([
            'url' => '',
            'method' => 'delete',
            'id' => 'delete_form'
        ]) }}
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Delete Confirmation</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Are you sure want to delete this data?</label>
                    {{ Form::hidden('target_id', null, ['id' => 'target_id', 'class' => 'form-control']) }}
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-danger" type="submit">
                    <i class="fa fa-trash"></i> Delete
                </button>
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
            </div>
        {{ Form::close() }}
        </div>
    </div>
</div>