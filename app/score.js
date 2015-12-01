<script src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
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
				alert(data);
				if(data) {
					return true;
				} else {
					return false;
				}
			},
		});
	}
</script>