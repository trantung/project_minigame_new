<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Advertise extends Eloquent
{
	use SoftDeletingTrait;
    protected $table = 'advertisements';
    protected $fillable = ['image_url', 'image_link', 'position', 
        'status', 'adsense', 'is_mobile', 'weight_number',
        'model_name', 'model_id', 'relate_id', 'type'];
    protected $dates = ['deleted_at'];

    public function advertisePositions()
    {
        return $this->hasMany('AdvertisePosition', 'advertisement_id', 'id');
    }

    public function commonModels()
    {
        return $this->belongsToMany('CommonModel', 'advertise_positions', 'advertisement_id', 'common_model_id');
    }
}	