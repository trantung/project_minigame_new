<?php
use Carbon\Carbon;
class CommonSeo
{
	public static function createSeo($input, $modelName, $modelId)
	{
		$input['model_name'] = $modelName;
		$input['model_id'] = $modelId;
		$id = AdminSeo::create($input)->id;
		return $id;
	}

	public static function updateSeo($input, $modelName, $modelId)
	{
		$seo = AdminSeo::where('model_name', $modelName)
						->where('model_id', $modelId)->first();
		if (!$seo) {
			$id = self:: createSeo($input, $modelName, $modelId);
			return $id;
		}
		AdminSeo::find($seo->id)->update($input);
	}
	/**
	*uploadImage Upload image
	*/
	
	public static function uploadImage($input, $path, $imageUrl)
	{
		$destinationPath = public_path().'/'.$path;
		if(Input::hasFile($imageUrl)){
			$file = Input::file($imageUrl);
			$filename = $file->getClientOriginalName();
			$uploadSuccess = $file->move($destinationPath, $filename);
			return $filename;
		}
	}

}