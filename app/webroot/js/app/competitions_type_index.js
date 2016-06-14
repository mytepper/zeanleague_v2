define(function (require) {
    var $ = require('jquery'),
        paginator = require('../paginator');
		var module = function() {
			paginator($('#team-types-container'));
		}
		return module();
});
