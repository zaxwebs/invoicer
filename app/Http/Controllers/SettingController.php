<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingController extends Controller
{
	//
	public function edit()
	{
		return view('settings.edit');
	}
}
