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
		$seo = self::getIdSeo($modelId, $modelName);
		if (!$seo) {
			$id = self:: createSeo($input, $modelName, $modelId);
			return $id;
		}
		AdminSeo::find($seo->id)->update($input);
	}

	public static function deleteSeo($modelId, $modelName)
	{
		
		$seo = self::getIdSeo($modelId, $modelName);
		AdminSeo::find($seo->id)->delete();
	}

	public static function getIdSeo($modelId, $modelName)
	{
		return $seo = AdminSeo::where('model_name', $modelName)
						->where('model_id', $modelId)->first();
	}
	/**
	*uploadImage Upload image
	*/

	public static function uploadImage($input,$id, $path, $imageUrl, $imageSeo = NULL)
	{
		$destinationPath = public_path().'/'.$path.'/seo'.'/'.$id.'/';
		if(Input::hasFile($imageUrl)){
			$file = Input::file($imageUrl);
			$filename = $file->getClientOriginalName();
			$uploadSuccess = $file->move($destinationPath, $filename);
			return $filename;
		}
		if ($imageSeo) {
			return $imageSeo;
		}
	}

	public static function getImageSeoUrl($modelName, $modelId)
	{
		$inputSeoImage = AdminSeo::where('model_name',$modelName)
									->where('model_id', $modelId)
									->first();
		if ($inputSeoImage->image_url_fb) {
			return $inputSeoImage->image_url_fb;
		}
		return NULL;
	}
}