jQuery(document).ready(function($) {
	// Datepicker
	if($('#apb_start_date').length) {
		$(function() {
			var pickerOpts = {
				dateFormat: "yy-mm-dd"
			};
			jQuery("#apb_start_date").datepicker(pickerOpts);
			jQuery("#apb_end_date").datepicker(pickerOpts);
		});
	}

	// Frontend Announcements
	if($('#apollo-bar').length) {
		if($.cookie('apb_active') == 'false') {
			$("#apollo-bar").hide();
		};
		$("#close").click(function() {
			$("#apollo-bar").slideUp("normal");
			$.cookie('apb_active', 'false', { expires: 2, path: '/'});
			return false;
		});
		$("body").prepend($("#apollo-bar"));
		$('#apollo-bar .apb_message').cycle({
			delay: 2000,
			pause: true,
			height: 'auto',
			timeout: 4000,
			fx: 'fade'
		});
	}
});