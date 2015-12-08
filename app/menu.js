<script type="text/javascript" src="pt type="text/javascript" src="http://192.168.3.250/Laravel/project_minigame_new/public/assets/js/jquery-2.1.4.min.js"></script>
<script type="text/javascript">
	$(function () {
		getMenu();
	});
	function getMenu()
	{
		var url = 'http://minigame.de';
		$.ajax(
		{
			type:'post',
			url: url + '/import-menu',
			data: {
				'currentUrl': window.location.href,
			},
			success: function(data) {
				$('body').append(data);
			},
		});
	}

</script>
