<?php
if (!function_exists('alertify')) {
	function alertify($message, $type = 'success')
	{
		return compact('message', 'type');
	}
}
