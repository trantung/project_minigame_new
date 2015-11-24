<script>

	$(document).ready(function() {
	    checkInputWeightNumber();
	});

	function toggle(source) {
		checkboxes = document.getElementsByName('comment_id[]');
		for(var i=0, n=checkboxes.length;i<n;i++) {
			checkboxes[i].checked = source.checked;
		}
	}

	function checkInputWeightNumber()
	{
		$('input[name^="weight_number"]').keypress(function(event) {
	        return /\d/.test(String.fromCharCode(event.keyCode));
	    });
	}

	function updateIndexData()
	{
		var values1 = $('input:checkbox.comment_id').map(function () {
		  	return this.value;
		}).get();

		var values3 = $('select[name^="status"]').map(function () {
		  	return this.value;
		}).get();

		$.ajax(
		{
			type:'post',
			url: '/admin/comment/updateIndexData',
			data:{
				'comment_id': values1,
				'weight_number': values2,
				'statusGame': values3
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
		var check = $('input:checkbox:checked.comment_id').val();
		if(check) {
			callDeleteSelected();
		} else {
			alert('Bạn chưa chọn comment nào!');
		}
	}

	function callDeleteSelected()
	{
		confirm = confirm('Bạn có chắc chắn muốn xóa?')
		if(confirm) {
			var values1 = $('input:checkbox:checked.comment_id').map(function () {
			  	return this.value;
			}).get();

			$.ajax(
			{
				type:'post',
				url: '/admin/comment/deleteSelected',
				data:{
					'comment_id': values1
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