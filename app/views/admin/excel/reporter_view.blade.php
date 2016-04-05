<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<style>
			
		</style>
	</head>
	<table>
		<thead>
			<tr>
				<th>Username</th>
				<th>Phóng viên</th>
				<th>Bài viết</th>
				<th>Nhuận bút</th>
				<th>Ngày đăng</th>
			</tr>
		</thead>
		<tbody>
			@if($data)
				@foreach($data as $value)
					<tr>
						<td>{{ Admin::find($value->user_id)->username }}</td>
						<td>{{ $value->author }}</td>
						<td>{{ $value->title }}</td>
						<td>{{ $value->author_money }}</td>
						<td>{{ date('d-m-Y H:i:s', strtotime($value->start_date)) }}</td>
					</tr>
				@endforeach
			@endif
		</tbody>
	</table>
    
</html>