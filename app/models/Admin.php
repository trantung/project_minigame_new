<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Admin extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'admins';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');
	protected $fillable = array('email', 'password', 'role_id', 'username');
    protected $dates = ['deleted_at'];

    public static function isAdmin()
    {
    	if(Auth::admin()->get()->role_id == ADMIN){
			return true;
		}
		else{
			return false;
		}
    }
    public function role()
    {
        return $this->belongsTo('Role', 'role_id', 'id');
    }
}
