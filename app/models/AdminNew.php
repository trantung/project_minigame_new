<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Database\Eloquent\SoftDeletingTrait;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

class AdminNew extends Eloquent implements SluggableInterface
{
	use SoftDeletingTrait;
	use SluggableTrait;
    protected $table = 'news';
    protected $fillable = ['type_new_id', 'title', 'description',
    	'image_url', 'start_date', 'slug', 'count_view', 'position', 'weight_number', 'sapo',
        'status','user_id', 'index', 'is_hot', 'role_id',
        'type', 'author', 'author_money', 'sapo_text'];
    protected $dates = ['deleted_at'];

    protected $sluggable = array(
        'build_from' => 'title',
        'save_to'    => 'slug',
    );

    public function typeNew()
    {
    	return $this->belongsTo('TypeNew', 'type_new_id', 'id');
    }
}