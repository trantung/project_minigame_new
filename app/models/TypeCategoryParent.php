<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class TypeCategoryParent extends Eloquent
{
	use SoftDeletingTrait;
    protected $table = 'type_categories';
    protected $fillable = ['name', 'status', 'position', 'description', 'weight_number'];
    protected $dates = ['deleted_at'];

    public function typerelations()
    {
        return $this->hasMany('GameRelation', 'type_category_id', 'id');
    }
    public function games()
    {
        return $this->belongsToMany('Game', 'game_type_categories', 'type_category_id', 'game_id');
    }
}