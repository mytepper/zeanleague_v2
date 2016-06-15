define(function (require) {
    var $ = require('jquery'),
		bootstrap = require('../bootstrap_public');
		var module = function() {
			$('.btn-predict').on('click', function(e){
				var teamsCompetitionId = $(this).attr('data-id');
				if (teamsCompetitionId) {
					$.get('predicts/getForm/' + teamsCompetitionId, function(data){
						$('#PredictModal .modal-body').html(data);
						$('#PredictModal').show();
					});
				}
			});
		}
	return module();
});
