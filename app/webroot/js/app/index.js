define(function (require) {
    var $ = require('jquery'),
		bootstrap = require('../bootstrap_public');
		var module = function() {
			$('#carousel').carousel();
		}
		return module();
});
