<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class AdminNew extends Eloquent
{
	use SoftDeletingTrait;
    protected $table = 'news';
    protected $fillable = ['type_new_id', 'title', 'description',
    	'image_url', 'start_date'];
    protected $dates = ['deleted_at'];

}