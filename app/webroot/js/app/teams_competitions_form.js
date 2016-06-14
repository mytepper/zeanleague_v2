define(function (require) {
    var $ = require('jquery'),
		select2 = require('../select2');

		var module = function() {
			$('select').select2();
		}
		return module();
});
