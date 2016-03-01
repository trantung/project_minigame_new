<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class NewSlide extends Eloquent
{
	use SoftDeletingTrait;
    protected $table = 'new_slides';
    protected $fillable = ['weight_number', 'status', 'sapo', 'image_url', 'new_id'];
    protected $dates = ['deleted_at'];
    
}