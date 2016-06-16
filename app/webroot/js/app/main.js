define(function (require) {
    var $ = require('jquery'),
		bootstrap = require('../bootstrap_public'),
		bootbox = require('../bootbox.min');
	 var moduleGobal = function() {
		 $('body').on('click', '.btn-predict-remove', function(e){
			var currentClick = $(this);
			var predictId = $(this).attr('data-id');
			bootbox.confirm("ยืนยันการลบ ?", function(result) {
				if (result) {
					$.ajax({
						type: 'post',
						url: 'predicts/deleted',
						data: {'id': predictId},
						dataType: 'json'
					}).fail(function(){
						alert('error ajax request');
					}).done(function(data){
						bootbox.alert(data.json.message);
						if (data.json.status) {
							currentClick.closest('tr').remove();
						}
					});
				}
			});
		 });
	 }

	 return moduleGobal();
});
