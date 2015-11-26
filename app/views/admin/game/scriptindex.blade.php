<script>

	$(document).ready(function() {
	    checkInputNumber();
	});

	function toggle(source) {
		checkboxes = document.getElementsByName('game_id[]');
		for(var i=0, n=checkboxes.length;i<n;i++) {
			checkboxes[i].checked = source.checked;
		}
	}

	function checkInputNumber()
	{
		$('input[name^="weight_number"]').keypress(function(event) {
	        return /\d/.test(String.fromCharCode(event.keyCode));
	    });
	    $('input[name^="count_play"]').keypress(function(event) {
	        return /\d/.test(String.fromCharCode(event.keyCode));
	    });
	}

	function updateIndexData()
	{
		var values1 = $('input:checkbox.game_id').map(function () {
		  	return this.value;
		}).get();

		var values2 = $('input[name^="weight_number"]').map(function () {
		  	return this.value;
		}).get();

		var values3 = $('select[name^="statusGame"]').map(function () {
		  	return this.value;
		}).get();

		var values4 = $('input[name^="count_play"]').map(function () {
		  	return this.value;
		}).get();

		$.ajax(
		{
			type:'post',
			url: '/admin/games/updateIndexData',
			data:{
				'game_id': values1,
				'weight_number': values2,
				'statusGame': values3,
				'count_play': values4
			},
			success: function(data)
			{
				if(data) {
					window.location.reload();
				}
			}
		});
		// window.location.reload();
	}

	function deleteSelected()
	{
		var check = $('input:checkbox:checked.game_id').val();
		if(check) {
			callDeleteSelected();
		} else {
			alert('Bạn chưa chọn game nào!');
		}
	}

	function callDeleteSelected()
	{
		confirm = confirm('Bạn có chắc chắn muốn xóa?')
		if(confirm) {
			var values1 = $('input:checkbox:checked.game_id').map(function () {
			  	return this.value;
			}).get();

			$.ajax(
			{
				type:'post',
				url: '/admin/games/deleteSelected',
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
		} else {
			window.location.reload();
		}
	}

</script>