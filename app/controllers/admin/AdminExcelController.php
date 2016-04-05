<?php 

class AdminExcelController extends AdminController {

	public function exportReporterForm()
	{
		return View::make('admin.excel.reporter');
	}

	public function exportReporterList()
	{
		$input = Input::all();
		$fileName = 'PV-'.date('dmY', strtotime($input['start_date'])).'-'.date('dmY', strtotime($input['end_date']));
		$data = AdminNew::where('start_date', '>=', $input['start_date'] . ' 00:00:00')
					->where('start_date', '<=', $input['end_date'] . ' 23:59:59')
					->where('role_id', REPORTER)
					->orderBy('start_date', 'desc')
					->get();
		if($data) {
			Excel::create($fileName, function($excel) use ($data) {

			    $excel->sheet('New sheet', function($sheet) use ($data) {

			        $sheet->loadView('admin.excel.reporter_view', array('data' => $data));

			    });

			})
			// ->store('xlsx', public_path() . '/excels')
			->export('xlsx');
		    return Redirect::action('AdminExcelController@exportReporterForm')->with('message', 'Đã xuất file');
		} else {
			return Redirect::action('AdminExcelController@exportReporterForm')->with('message', 'Không có dữ liệu');
		}
	}

}
