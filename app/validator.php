<?php
Validator::extend('unique_delete', function($attribute, $value, $parameters)
{
	if (Admin::where('username', $value)->first()) {
		return false;
	}
	return true;
});

Validator::extend('not_empty', function($attribute, $value, $parameters)
{
	if (!empty($value[0])) {
		return true;
	}
	return false;
});



