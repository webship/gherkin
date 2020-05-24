(function (Drupal) {
	var gherkin_editor = {
		attach: function attach(element, format) {},
		detach : function detach(element, format, trigger){},
		onChange: function onChange(element, callback) {}
	};
	Drupal.editors.gherkin_editor = gherkin_editor;
})(Drupal);