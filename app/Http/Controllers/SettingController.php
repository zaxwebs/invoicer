<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
	//
	public function edit()
	{
		$settings = Setting::first();
		return view('settings.edit', compact('settings'));
	}

	public function update(Request $request)
	{
	}
}
