<script type="text/javascript">
	function countdownload()
	{
		$.ajax(
		{
			type:'post',
			url: '/count-download',
			data: {
				'id': {{ $id }}
			},
			success: function(data){
				window.location = '{{ $url }}';
			},
		});
	}
</script>