<script>
	function getFormGameOffline() {
		parentId = $('select[name=parent_id]').val();
		if (parentId == {{ GAMEOFFLINE }}) {
	        $('.blockDisabled').prop('disabled', 'disabled');
	        $('.blockDisabled').hide();
	        $('#checkUpload').show();
	    	$('#checkLinkDownload').show();
	    	$('.link_download').show();
	        if ($('#checkUpload').is(':checked')) {
	        	$('#checkUpload').prop('disabled', 'disabled');
	        	$('#link_upload_game').prop('disabled', false);
	        	$('#checkLinkDownload').prop('disabled', false);
	        } else {
	        	$('#checkUpload').prop('disabled', false);
	        	$('#link_upload_game').prop('disabled', 'disabled');
	        	$('#checkLinkDownload').prop('disabled', 'disabled');
	        	$('#link_download').prop('disabled', false);
	        }
	    }
	    else {
	    	$('.blockDisabled').prop('disabled', false);
	    	$('.blockDisabled').show();
	    	$('#checkUpload').hide();
	    	$('#checkLinkDownload').hide();
	    	$('.link_download').hide();
	    	$('#checkUpload').attr('checked', 'checked');
	    	$('#checkUpload').prop('disabled', 'disabled');
	    	$('#link_upload_game').prop('disabled', false);
	    	$('#checkLinkDownload').prop('disabled', 'disabled');
	    	$('#link_download').prop('disabled', 'disabled');
	    	$('#link_upload_game').val('');
	    	$('#link_download').val('');
	    }
	}

	$(function () {
		getFormGameOffline();
		
    });

	function checkUploadAction() {
		if ($('#checkUpload').is(':checked')) {
			$('#checkUpload').prop('disabled', 'disabled');
			$('#link_upload_game').prop('disabled', false);
			$('#link_download').prop('disabled', 'disabled');
			$('#link_download').val('');
			$('#checkLinkDownload').attr('checked', false);
			$('#checkLinkDownload').prop('disabled', false);
		} else {
			$('#checkUpload').prop('disabled', false);
			$('#link_upload_game').prop('disabled', 'disabled');
			$('#link_download').prop('disabled', false);
			$('#checkLinkDownload').attr('checked', 'checked');
		}
	}

	function checkLinkDownloadAction() {
		if ($('#checkLinkDownload').is(':checked')) {
			$('#checkLinkDownload').prop('disabled', 'disabled');
			$('#link_upload_game').prop('disabled', 'disabled');
			$('#link_upload_game').val('');
			$('#link_download').prop('disabled', false);
			$('#checkUpload').attr('checked', false);
			$('#checkUpload').prop('disabled', false);
		} else {
			$('#checkLinkDownload').prop('disabled', false);
			$('#link_upload_game').prop('disabled', false);
			$('#link_download').prop('disabled', 'disabled');
			$('#checkUpload').attr('checked', 'checked');
		}
	}

	function disabledTypeMain() {
		$('input:radio[name^="type_main"]').click(function(){
			return false;
		})
	}

	function checkType(id) {
		if ($('#type_main_'+id).is(':checked')) {
			alert('Không thể bỏ chọn thể loại chính');
			$('#type_id_'+id).prop("checked", true);
			exit();
		}
		return;
	}

	function checkTypeMain(id) {
		if ($('#type_main_'+id).is(':checked')) {
			if($('#type_id_'+id).is(':checked')) {
				return;
			} else {
				alert('Thể loại chưa được chọn');
				$('input[name=type_main]').attr('checked',false);
				exit();
			}
		}
		return;
	}

</script>