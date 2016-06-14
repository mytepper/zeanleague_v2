define(function (require) {
    var $ = require('jquery'),
		jqueryUiWidget = require('../jquery.ui.widget'),
        jqueryFileupload = require('../jquery.fileupload');
		var module = function() {
			$('#upload-logo').fileupload({
				singleFileUploads: true,
		        dataType: 'json',
				add: function(e, data){
						$('.fileUpload').attr('disable', true);
						$('.fileUpload span').html('Uploading...');
						data.submit();
				},
		        done: function (e, data) {
					if (data._response.jqXHR.responseJSON.json.imageLogo != '') {
						$('.img-thumbnail').attr('src', data._response.jqXHR.responseJSON.json.imageLogo);
						$('.fileUpload').attr('disable', false);
						$('.fileUpload span').html('Upload');
					}
		        }
		    });
		}
		return module();
});
