define(function (require) {
    var $ = require('jquery'),
		bootstrap = require('../bootstrap_public');
		var url = {
			'getForm': 'predicts/getForm/',
			'submitForm':  'predicts/submitForm/',
			'getPredictsToday': 'predicts/getPredictsToday'
		}

		var module = function() {
			getPredictsToday();

			$('.btn-predict').on('click', function(e){
				var teamsCompetitionId = $(this).attr('data-id');
				if (teamsCompetitionId) {
					$.get(url.getForm + teamsCompetitionId, function(data){
						$('#PredictModal .modal-body').html(data);
						$('#PredictModal').modal('show');
					});
				}
			});

			$('#predict-container').on('click', '.btn-submit-predict', function(e){
			    var params = $('#predict-container form').serialize();
					$.ajax({
						type: 'post',
						url: url.submitForm,
						data: params
					}).fail(function(){
						alert('Ajax send errors. Please reload you browser and try again.');
					}).done(function(objData){
						$('#PredictModal .modal-body').html(objData);
						getPredictsToday();
					});
				return false;
			});
		}

		var getPredictsToday = function() {
			$('#predicts-member-today').html('<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><br>');
			$.get(url.getPredictsToday, function(data){
				$('#predicts-member-today').html(data);
			});
		}
	return module();
});
