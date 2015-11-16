<?php
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

