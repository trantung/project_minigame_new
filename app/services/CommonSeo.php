<?php
use Carbon\Carbon;
class CommonSeo
{
	public function createSeo($input, $modelName, $modelId)
	{
		$input['model_name'] = $modelName;
		$input['model_id'] = $modelId;
		$id = AdminSeo::create($input)->id;
		return $id;
	}

	public function updateSeo($input, $modelName, $modelId)
	{
		$seo = AdminSeo::where('model_name', $modelName)
						->where('model_id', $modelId)->first();
		if (!$seo) {
			dd('error modelName or modelId');
		}
		AdminSeo::find($seo->id)->update($input);
	}

}