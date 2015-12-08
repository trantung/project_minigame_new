// Change domain url
<script type="text/javascript" src="http://minigame.de/assets/js/jquery-2.1.4.min.js"></script>
<script type="text/javascript">
	function sendScore(gname, score)
	{
		var url = 'http://minigame.de';
		$.ajax(
		{
			type:'post',
			url: url + '/score-gname',
			data: {
				'gname': gname,
				'score': score
			},
			success: function(data) {
				if(data) {
					return true;
				} else {
					return false;
				}
			},
		});
	}
</script>