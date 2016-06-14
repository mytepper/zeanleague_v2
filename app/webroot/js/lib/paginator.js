define(function () {
    function controllerBase(container) {
		var deleteElement = container.closest(container).find('a.delete');
		deleteElement.click(function(e){
			console.log(e);
			e.preventDefault();
		});
	}
    return controllerBase;
});
