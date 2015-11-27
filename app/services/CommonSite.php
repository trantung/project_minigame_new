<?php
class CommonSite
{
	public static function isLogin()
    {
        if (Auth::user()->check()) {
            return true;
        }else{
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
            $ad = Advertise::where(array('position' => $position, 'status' => ENABLED))->first();
            return $ad;
        }
        // Content
        else {
            //check Common models
            $common_model = CommonModel::where(array('model_name' => $modelName, 'model_id' => $modelId))->first();
            if ($common_model) {
                $common_model_id = $common_model->id;
                if($advertisement_id = AdvertisePosition::where(array('common_model_id' => $common_model_id, 'status' => ENABLED))->first()) {
                    $advertisement_id = AdvertisePosition::where(array('common_model_id' => $common_model_id, 'status' => ENABLED))->first()->advertisement_id;
                    $ad = Advertise::find($advertisement_id);
                    return $ad;
                }
                return null;
            }
            else {
                return null;
            }
        }
    }

}