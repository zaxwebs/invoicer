<?php

namespace App\Http\Controllers;

use App\Models\Settings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingsController extends Controller
{
	//
	public function edit()
	{
		$settings = Settings::first();
		return view('settings.edit', compact('settings'));
	}

	public function update(Request $request)
	{
		$validated = $request->validate([
			'name' => 'required|string|max:255',
			'email' => 'required|email|max:255',
			'phone' => 'required|string|max:20',
			'address' => 'required|string',
			'website' => 'nullable|url|max:255',
			'logo' => 'nullable|image|max:2048',
		]);

		if ($request->hasFile('logo')) {
			$file = $request->file('logo');
			$path = $file->store('uploads', 'public');
			$validated['logo'] = $path;
		}

		$settings = Settings::first();

		if ($settings->image) {
			Storage::disk('public')->delete($settings->image);
		}

		// Update the settings
		$settings->update($validated);

		// Redirect back with a success message
		return redirect()->route('settings.edit')
			->with('alert', alertify('All set! Invoice information is up to date.'));
	}
}
