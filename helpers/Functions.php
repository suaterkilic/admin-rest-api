<?php

ob_start();
session_start();

function partial($partialName)
{
   @require_once 'public/theme/partial/' . $partialName . '.php';
}
function admin_partial($partialName)
{
   @require_once 'public/admin/partial/' . $partialName . '.php';
}

function import_assets($assetsName)
{
	$uri = str_replace($_SERVER['REQUEST_URI'], dirname($_SERVER['SCRIPT_NAME']), $_SERVER['REQUEST_URI']);
	echo '/public/theme/assets/'.$assetsName;
}

function admin_import($name)
{
	$uri = str_replace($_SERVER['REQUEST_URI'], dirname($_SERVER['SCRIPT_NAME']), $_SERVER['REQUEST_URI']);
	echo '/public/admin/assets/'.$name;
}

function url($urlName)
{
	$uri = str_replace($_SERVER['REQUEST_URI'], dirname($_SERVER['SCRIPT_NAME']), $_SERVER['REQUEST_URI']);

	echo '/'.$urlName;
}

function urlSsl($urlName)
{
	$uri = str_replace($_SERVER['REQUEST_URI'], dirname($_SERVER['SCRIPT_NAME']), $_SERVER['REQUEST_URI']);

	echo '/'.$urlName;
}

function urlUpload($urlName)
{
	$uri = str_replace($_SERVER['REQUEST_URI'], dirname($_SERVER['SCRIPT_NAME']), $_SERVER['REQUEST_URI']);

	return 'http://soydan.codlart.com/'.$urlName;
}

function upload($fileName, $randName)
{
	$location = 'storage/uploads/'. $randName;

	if(move_uploaded_file($_FILES[$fileName]['tmp_name'], $location))
	{
		return 1;
	}
}

function randId($length = 10)
{
	$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$charactersLength = strlen($characters);
	$randomString = '';
	for ($i = 0; $i < $length; $i++) {
		$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
	return $randomString;
}
