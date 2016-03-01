<script>

	function toggle(source) {
		checkboxes = document.getElementsByName('game_id[]');
		for(var i=0, n=checkboxes.length;i<n;i++) {
			checkboxes[i].checked = source.checked;
		}
	}

	function updateIndexSelected()
	{
		var check = $('input:checkbox:checked.game_id').val();
		if(check) {
			callUpdateIndexSelected();
		} else {
			alert('Bạn chưa chọn game nào!');
		}
	}

	function callUpdateIndexSelected()
	{
		var values1 = $('input:checkbox:checked.game_id').map(function () {
		  	return this.value;
		}).get();

		$.ajax(
		{
			type:'post',
			url: '{{ url("/admin/games/updateIndexSelected") }}',
			data:{
				'game_id': values1
			},
			success: function(data)
			{
				if(data) {
					window.location.reload();
				}
			}
		});
	}

</script>