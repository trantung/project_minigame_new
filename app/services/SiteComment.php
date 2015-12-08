<?php 
class SiteComment {

	public static function getCommentGame($game)
	{
    	$inputComment = Comment::where('model_id', $game->id)->where('status', ACTIVE)->orderBy('id', 'desc')->paginate(PAGE_COMMENT);
    	return $inputComment;
	}
}