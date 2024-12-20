<form id="form_delete" method="POST" action="">
    {!! csrf_field() !!}
	{{ method_field('DELETE') }}
</form>

<div class="modal" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header"></div>
      <div class="modal-body"></div>
      <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">@lang('admin.btn_cancel')</button>
			<button id="submit" type="button" class="btn btn-success success">@lang('admin.btn_confirm')</button>
      </div>
    </div>
  </div>
</div>
