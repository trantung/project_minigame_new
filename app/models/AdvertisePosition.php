<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class AdvertisePosition extends Eloquent
{
	use SoftDeletingTrait;
    protected $table = 'advertise_positions';
    protected $fillable = ['name', 'common_model_id', 'advertisement_id', 'status'];
    protected $dates = ['deleted_at'];

}