<?php
function genRole($roleId) {
	$role = array(
		ADMIN => 'ADMIN',
		EDITOR => 'EDITOR',
		SEO => 'SEO',
	);
	return $role[$roleId];
}

function selectRoleId()
{
	return array(
		'' => '-- Lựa chọn',
		ADMIN => 'ADMIN',
		EDITOR => 'EDITOR',
		SEO => 'SEO',
	);
}

function selectParentCategory()
{
	return array(
		MENU => 'Trên Menu', 
		CONTENT => 'Dưới content',
	);
}

function textPerentCategory($input){
	return array('placeholder' =>$input, 'class' =>'form-control');
}

