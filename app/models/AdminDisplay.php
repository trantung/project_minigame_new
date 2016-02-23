<?php
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class AdminDisplay extends Eloquent
{
    protected $table = 'displays';
    protected $fillable = ['model_id', 'model_name', 'weight_number'];
    protected $dates = ['deleted_at'];
}
