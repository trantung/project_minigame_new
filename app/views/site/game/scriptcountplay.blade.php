<script type="text/javascript">
	function countplaymobile()
	{
		$.ajax(
		{
			type:'post',
			url: '{{ url("/count-play") }}',
			data: {
				'id': {{ $id }}
			},
			success: function(data){
				window.location = '{{ $url }}';
			},
		});
	}
</script>