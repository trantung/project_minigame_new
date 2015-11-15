<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Type extends Eloquent
{
	use SoftDeletingTrait;
    protected $table = 'types';
    protected $fillable = ['name', 'description'];
    protected $dates = ['deleted_at'];

    public function games()
    {
        return $this->belongsToMany('Game', 'game_types', 'type_id', 'game_id');
    }

    public function gametypes()
    {
        return $this->hasMany('GameType', 'type_id', 'id');
    }

    public function parenttypes()
    {
        return $this->hasMany('ParentType', 'type_id', 'id');
    }

    public function categoryparents()
    {
        return $this->belongsToMany('CategoryParent', 'parent_types', 'type_id', 'category_parent_id');
    }
}