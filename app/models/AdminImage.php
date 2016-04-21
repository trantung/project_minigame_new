<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class AdminImage extends Eloquent
{
	use SoftDeletingTrait;
    protected $table = 'images';
    protected $fillable = ['slider_id', 'image_url', 'name'];
    protected $dates = ['deleted_at'];

    public function slide()
    {
    	return $this->belongsTo('AdminSlide', 'slider_id', 'id');
    }

    public static function convertImageBase64($path)
    {
    	// $path = 'myfolder/myimage.png';
        if ($path == UPLOAD_GAME_AVATAR . '/') {
            return null;
        }
    	$path = url($path);
    	// dd($path);
		$type = pathinfo($path, PATHINFO_EXTENSION);
		// dd($path);
		$data = file_get_contents($path);
		// dd($data);
		$base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
		// dd($base64_);
		return $base64;
    }
}