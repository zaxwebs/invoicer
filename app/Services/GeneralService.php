<?php

namespace App\Services;

class GeneralService
{
	public static function generateRandomUppercaseString($length = 2)
	{
		$characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$randomString = '';

		for ($i = 0; $i < $length; $i++) {
			$randomIndex = rand(0, strlen($characters) - 1);
			$randomString .= $characters[$randomIndex];
		}

		return $randomString;
	}

	public static function generatePaddedNumber($length)
	{
		// Generate a random number with a length of $length - 1
		$number = rand(0, pow(10, $length) - 1);

		// Pad the number with leading zeros to ensure it has exactly $length digits
		return str_pad($number, $length, '0', STR_PAD_LEFT);
	}
}