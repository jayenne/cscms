$('#blockModal').on('shown.bs.modal', function (event) {
		
    // LFM FILEMANAGER
	var domain = "/blockmanager";
	$('[data-lfm="files"]').filemanager('files', {prefix: domain});
	
});