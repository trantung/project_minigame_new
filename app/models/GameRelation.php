<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class GameRelation extends Eloquent
{
	use SoftDeletingTrait;
    protected $table = 'game_type_categories';
    protected $fillable = ['type_category_id', 'game_id'];
    protected $dates = ['deleted_at'];

    public function game() 
    {
        return $this->belongsTo('Game', 'game_id', 'id');
    }

    public function typecategoryparent() 
    {
        return $this->belongsTo('TypeCategoryParent', 'type_category_id', 'id');
    }
}