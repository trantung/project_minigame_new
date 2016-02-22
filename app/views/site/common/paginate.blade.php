<div class="row">
	<div class="col-xs-12 right">
		<ul class="pagination">
    		{{ with(new Paginate($input))->render() }}
    	</ul>
	</div>
</div>
