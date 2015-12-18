<?php
class SiteMap
{
	public static function getTypeUrlSiteMap()
	{
		return Type::all();
	}
	public static function getGameUrlSiteMap($typeSlug)
	{
		$type = Type::findBySlug($typeSlug);
		$typeId = $type->id;
		$games = Game::where('type_main', $typeId)->get();
		return $games;
	}
}