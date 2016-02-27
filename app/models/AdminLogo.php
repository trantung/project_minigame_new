<?php
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class AdminLogo extends Eloquent
{
    protected $table = 'logos';
    protected $fillable = ['text_link'];
    protected $dates = ['deleted_at'];
}
