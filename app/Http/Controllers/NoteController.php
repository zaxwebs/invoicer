<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
	public function store(Request $request)
	{
		$validated = $request->validate([
			'invoice_id' => 'required|exists:invoices,id',
			'content' => 'required|string',
		]);

		Note::create($validated);

		return redirect()->back()->with('alert', alertify('Invoice created successfully!'));
	}
}
