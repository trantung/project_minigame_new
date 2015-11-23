<script>
	function toggle(source) {
		checkboxes = document.getElementsByName('game_id[]');
		for(var i=0, n=checkboxes.length;i<n;i++) {
			checkboxes[i].checked = source.checked;
		}
	}

	function updateWeightNumber()
	{

		var values1 = $('input[name^="weight_number"]').map(function () {
		  	return this.value + ',';
		}).get();

		var values2 = $('input:checkbox:checked.game_id').map(function () {
		  	return this.value + ',';
		}).get();

		$.ajax(
		{
			type:'post',
			url: '/admin/games/updateWeightNumber',
			data:{
				'game_id': values1,
				'weight_number': values2
			},
			success: function(data)
			{
				$('#testAjax').html(data);
			}
		});

	}
</script>