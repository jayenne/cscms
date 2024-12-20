//

$('.modal').on('shown.bs.modal', function (e) {
			
	// LFM FILEMANAGER
		var domain = "/blockmanager";
		$('[data-lfm="image"]').filemanager('image', {prefix: domain});
});
