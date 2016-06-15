define(function (require) {
    var $ = require('jquery'),
		bootstrap = require('../bootstrap_public');
		var form = $('#PredictModal form#PredictGetFormForm');
		var module = function() {
			$('.btn-predict').on('click', function(e){
				var teamsCompetitionId = $(this).attr('data-id');
				if (teamsCompetitionId) {
					$.get('predicts/getForm/' + teamsCompetitionId, function(data){
						$('#PredictModal .modal-body').html(data);
						$('#PredictModal').modal('show');
					});
				}
			});

			$('#PredictModal form#PredictGetFormForm').submit(function(e){
			    //var params = form.serialize();
				//console.log(params);

				return false;
			});
		}
	return module();
});
