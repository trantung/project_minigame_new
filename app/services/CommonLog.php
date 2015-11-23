<?php
use Carbon\Carbon;
class CommonLog
{
	public static function insertHistory($model_name, $model_id)
	{
		$input = array();
		$input['model_name'] = $model_name;
		$input['model_id'] = $model_id;
		$input['last_time'] = $model_name::find($model_id)->created_at;
		$input['device'] = getDevice();
		$input['last_ip'] = getIpAddress();
		$history_id = CommonNormal::create($input, 'history');
		return $history_id;
	}

	public static function updateHistory($model_name, $model_id)
	{
		$id = AdminHistory::where(array('model_name' => $model_name, 'model_id' => $model_id))->first()->id;
		$input = array();
		$input['model_name'] = $model_name;
		$input['model_id'] = $model_id;
		$input['last_time'] = Carbon::now();
		$input['device'] = getDevice();
		$input['last_ip'] = getIpAddress();
		CommonNormal::update($id, $input, 'AdminHistory');
		return $id;
	}

	public static function insertLogEdit($model_name, $model_id, $history_id, $action)
	{
		$input = array();
		$input['history_id'] = $history_id;
		$input['editor_id'] = Auth::admin()->get()->id;
		$input['editor_name'] = Auth::admin()->get()->username;
		$input['editor_time'] = $model_name::find($model_id)->created_at;
		$input['editor_ip'] = getIpAddress();
		$input['action'] = $action;
		CommonNormal::create($input, 'log_edit');
	}

}