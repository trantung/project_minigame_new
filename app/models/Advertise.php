<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Advertise extends Eloquent
{
	use SoftDeletingTrait;
    protected $table = 'advertisements';
    protected $fillable = ['image_url', 'image_link'];
    protected $dates = ['deleted_at'];

}