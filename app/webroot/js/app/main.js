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

		 /**deleted Item for admin**/
		 $('body.admin').on('click', 'table a.delete', function(e){
			 var currentTarget = $(this);
			 var url = $(this).attr('href');
				bootbox.dialog({
					message: "I am a custom dialog",
					title: "Custom title",
					buttons: {
						danger: {
							label: "ลบข้อมูล!",
							className: "btn-danger",
							callback: function() {
								$.getJSON(url, function(data){
									bootbox.alert(data.json.message);
									if (data.status) {
										currentTarget.closest('tr').remove();
									}
								});
							}
						},
						success: {
							label: "ยกเลิก",
							className: "btn-default"
						},
					}
				});
			 e.preventDefault();
		 });
	 }

	 return moduleGobal();
});
