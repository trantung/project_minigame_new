<script>

	function toggle(source) {
		checkboxes = document.getElementsByName('news_id[]');
		for(var i=0, n=checkboxes.length;i<n;i++) {
			checkboxes[i].checked = source.checked;
		}
	}

	function updateNewsIndexData()
	{
		var values1 = $('input:checkbox:checked.news_id').map(function () {
		  	return this.value;
		}).get();

		$.ajax(
		{
			type:'post',
			url: '{{ url("/admin/news/updateNewsIndexData") }}',
			data:{
				'news_id': values1
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

	function countLengh() {
	    var x = document.getElementById("fname");
	    var count = x.value.length;
		var div = document.getElementById('divID');
		div.innerHTML = count;
	}

</script>