<!-- SEO PANE -->

<div  id="tabSEO" class="tab-pane slide-left container-fluid" aria-expanded="false">
    
    <div class="form-row">
        
        <div class="col-lg-12">

			<div class="form-group">	    
				<label for="tags" class="col-md-3 control-label">@lang('admin.form_page_tags')</label>
				
				<div class="col-md-9">
					<input class="tagsinput custom-tag-input" type="text" name="tags" value="{{ $page->tagList }}">
				</div>
			</div>
			
			<div class="form-group">	    
				<label for="excerpt" class="col-md-3 control-label">@lang('admin.form_page_excerpt')</label>
				
				<div class="col-md-9">
					<textarea class="form-control" name="excerpt" cols="40" rows="3" id="excerpt">{{$page->excerpt}}</textarea>        
				</div>
			</div>
			
        </div>
        
    </div>
    
</div>

<!-- END: SEO PANE -->