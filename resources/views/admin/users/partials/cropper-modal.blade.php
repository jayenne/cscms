<div id="cropper-modal" class="modal fade" tabindex="-1" role="dialog">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">@lang('admin.modal_title_crop_avatar')</h4>
			</div>
			<div class="modal-body">
				<div class="image-container">
					<img id="cropper-img" src="">
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-warning rotate-left"><span class="fas fa-undo"></span></button>
				<button type="button" class="btn btn-warning rotate-right"><span class="fas fa-redo"></span></button>
				<button type="button" class="btn btn-warning reset"><span class="fas fa-sync"></span></button>
				<button type="button" class="btn btn-default" data-dismiss="modal">@lang('admin.modal_button_close')</button>
				<button type="button" class="btn btn-primary crop-upload">@lang('admin.modal_button_crop')</button>
			</div>
		</div>
	</div>
</div>