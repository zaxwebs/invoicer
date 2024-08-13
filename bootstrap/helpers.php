<?php

use Illuminate\Support\Arr;

if (!function_exists('alertify')) {
	/**
	 * Return a structured array that will hold the alert flash session data.
	 */
	function alertify(string $message, string $type = 'success'): array
	{
		$types = ['success', 'info', 'danger', 'warning'];

		if (Arr::has($types, $type)) {
			throw new InvalidArgumentException("Invalid alert type: $type. Allowed types are: " . implode(', ', $types));
		}

		return compact('message', 'type');
	}
}
