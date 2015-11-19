<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Game extends Eloquent
{
	use SoftDeletingTrait;
    protected $table = 'games';
    protected $fillable = ['parent_id', 'name', 'description',
	    'image_url', 'link_url', 'count_view', 'count_play',
	    'count_vote', 'count_download', 'vote_average',
	     'weight_number', 'score_status', 'start_date', 'status',
         'support_detail', 'gname', 'link_download',
         'link_upload_game', 'slide_id'];
    protected $dates = ['deleted_at'];

    public function votes()
    {
        return $this->hasMany('Vote', 'game_id', 'id');
    }

    public function gamerelations()
    {
        return $this->hasMany('GameRelation', 'game_id', 'id');
    }

    public function categoryparents()
    {
        return $this->belongsToMany('CategoryParent', 'game_category_parents', 'game_id', 'category_parent_id');
    }

    public function gametypes()
    {
        return $this->hasMany('GameType', 'game_id', 'id');
    }

    public function types()
    {
        return $this->belongsToMany('Type', 'game_types', 'game_id', 'type_id');
    }

}