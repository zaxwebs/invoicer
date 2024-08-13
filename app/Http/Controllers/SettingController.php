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
		// Validate the incoming request data
		$validated = $request->validate([
			'name' => 'required|string|max:255',
			'email' => 'required|email|max:255',
			'phone' => 'required|string|max:20',
			'address' => 'required|string',
			'website' => 'nullable|url|max:255',
		]);

		$settings = Setting::first();

		// Update the settings
		$settings->update($validated);

		// Redirect back with a success message
		return redirect()->route('settings.edit')
			->with('alert', alertify('All set! Invoice information is up to date.'));
	}
}
