<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Score extends Eloquent
{
	use SoftDeletingTrait;
    protected $table = 'scores';
    protected $fillable = ['user_id', 'game_id', 'gname', 'score'];
    protected $dates = ['deleted_at'];

}