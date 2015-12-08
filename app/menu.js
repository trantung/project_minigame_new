<script type="text/javascript" src="http://minigame.de/assets/js/jquery-2.1.4.min.js"></script>
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