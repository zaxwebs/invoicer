<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class NoteController extends Controller
{
	public function store(Request $request)
	{
		try {
			$validated = $request->validate([
				'invoice_id' => 'required|exists:invoices,id',
				'content' => 'required|string|min:2',
			]);
		} catch (ValidationException $e) {
			return redirect()->back()->with('alert', alertify('Something went wrong!', 'danger'));
		}

		Note::create($validated);

		return redirect()->back()->with('alert', alertify('Invoice created successfully!'));
	}
}
