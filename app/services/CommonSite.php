<?php
class CommonSite
{
	public static function isLogin()
    {
        if (Auth::user()->check()) {
            return true;
        }
        else{
            return false;
        }
    }


    public static function inputRegister()
    {
    	$input = Input::except('_token');
    	$input['status'] = ACTIVE;
    	$input['ip'] = getIpAddress();
    	$input['device'] = getDevice();
    	return $input;
    }

    // get ip & device to update when user login account
    public static function ipDeviceUser()
    {
        $input = array();
        $input['ip'] = getIpAddress();
        $input['device'] = getDevice();
        return $input;
    }

    // get advertise
    public static function getAdvertise($position, $modelName = null, $modelId = null)
    {
        // Header & Footer
        if($modelName == null && $modelId == null) {
            if (Cache::has('ad_'.$position))
            {
                $ad = Cache::get('ad_'.$position);
            } else {
                if($position == AD_NEW) {
                    $ad = Advertise::where(array('position' => $position, 'status' => ENABLED))->get();    
                } else {
                    $ad = Advertise::where(array('position' => $position, 'status' => ENABLED))->first();
                }
                Cache::put('ad_'.$position, $ad, CACHETIME);
            }
            return $ad;
        }
        // Content
        else {
            //check Common models
            if (Cache::has('common_model'.$modelName.$modelId))
            {
                $common_model = Cache::get('common_model'.$modelName.$modelId);
            } else {
                $common_model = CommonModel::where(array('model_name' => $modelName, 'model_id' => $modelId))->first();
                Cache::put('common_model'.$modelName.$modelId, $common_model, CACHETIME);
            }
            if ($common_model) {
                $common_model_id = $common_model->id;
                if (Cache::has('advertisement_id'.$common_model_id))
                {
                    $advertisement_id = Cache::get('advertisement_id'.$common_model_id);
                } else {
                    $advertisement_id = AdvertisePosition::where(array('common_model_id' => $common_model_id, 'status' => ENABLED))->first();
                    Cache::put('advertisement_id'.$common_model_id, $advertisement_id, CACHETIME);
                }
                if($advertisement_id) {
                    if (Cache::has('ad_'.$advertisement_id))
                    {
                        $ad = Cache::get('ad_'.$advertisement_id);
                    } else {
                        $advertisement_id = AdvertisePosition::where(array('common_model_id' => $common_model_id, 'status' => ENABLED))->first()->advertisement_id;
                        $ad = Advertise::find($advertisement_id);
                        Cache::put('ad_'.$advertisement_id, $advertisement_id, CACHETIME);
                    }
                    return $ad;
                }
                return null;
            }
            else {
                return null;
            }
        }
    }

    public static function getRelationModel($id, $relationType) {
        $model = Relation::where('model_name', $relationType)
                        ->where('model_id', $id)
                        ->first();
        if ($model) {
            return $relationType::find($model->relation_id);
        }
        return null;
    }

    public static function getLatestNews()
    {
        if (Cache::has('newsLatest'))
        {
            $news = Cache::get('newsLatest');
        } else {
            $now = Carbon\Carbon::now();
            $news =  AdminNew::where('start_date', '<=', $now)
                ->orderBy('start_date', 'desc')
                ->first();
            Cache::put('newsLatest', $news, CACHETIME);
        }
        if($news) {
            return $news;
        } else {
            return null;
        }
    }

    public static function getMetaSeo($modelName, $modelId = null)
    {
        if(!$modelId) {
            $seoMeta = AdminSeo::where('model_name', $modelName)
                    ->first();
            if(isset($seoMeta)) {
                return $seoMeta;
            } else {
                return null;
            }
        }
        $seoMeta = AdminSeo::where('model_name', $modelName)
                ->where('model_id', $modelId)
                ->first();
        if($seoMeta) {
            $meta = $modelName::find($modelId);
            if($modelName == 'Game') {
                $type = Type::find($meta->type_main);
            }
            if($seoMeta->title_site == '') {
                if($modelName == 'Game') {
                    $seoMeta->title_site = 'Game '.$meta->name.' | Trò Chơi Game '.$type->name;
                } else {
                    $seoMeta->title_site = $meta->name;
                }
            }
            if($seoMeta->description_site == '') {
                if($modelName == 'Game') {
                    $seoMeta->title_site = 'Chơi game '.$meta->name.' hay nhất trên điện thoại máy tính, trò chơi '.$type->name.' '.convert_string_vi_to_en($meta->name).' lưu tính điểm tại Game Kiến Thức';
                } else {
                    $seoMeta->description_site = limit_text(strip_tags($meta->description), TEXTLENGH_DESCRIPTION);
                }
            }
            if($seoMeta->keyword_site == '') {
                if($modelName == 'Game') {
                    $seoMeta->keyword_site = 'chơi game '.$meta->name.', game '.convert_string_vi_to_en($meta->name).', chơi game '.convert_string_vi_to_en($meta->name).', game '.convert_string_vi_to_en($type->name).' 2016';
                } else {
                    $seoMeta->keyword_site = 'Game '.$meta->name.', trò chơi '.$meta->name.', game cho mobile hay nhất tại Game Kiến Thức';
                }
            }
            if($seoMeta->title_fb == '') {
                $seoMeta->title_fb = $meta->name;
            }
            if($seoMeta->description_fb == '') {
                $seoMeta->description_fb = limit_text(strip_tags($meta->description), TEXTLENGH_DESCRIPTION);
            }
            if($seoMeta->image_url_fb == '') {
                $seoMeta->image_url_fb = $meta->image_url;
            }
            return $seoMeta;
        }
        return null;
    }

    public static function uploadImg($path, $folder, $imageUrl, $imageCurrent = NULL)
    {
        $destinationPath = public_path().'/'.$path.'/'.$folder.'/';
        if(Input::hasFile($imageUrl)){
            $file = Input::file($imageUrl);
            $filename = $file->getClientOriginalName();
            $filename = changeFileNameImage($filename);
            $uploadSuccess = $file->move($destinationPath, $filename);
            return $filename;
        }
        if ($imageCurrent) {
            return $imageCurrent;
        }
    }

}