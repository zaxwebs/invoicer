<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
	public function index()
	{
		$customers = Customer::all();
		return view('customers.index', compact('customers'));
	}

	public function edit(Customer $customer)
	{
		return view('customers.edit', compact('customer'));
	}

	public function update(Request $request, Customer $customer)
	{
		$validated = $request->validate([
			'name' => 'required|string|max:255',
			'email' => 'required|string|email|max:255|unique:customers,email,' . $customer->id,
			'phone' => 'nullable|string|max:15',
			'address' => 'nullable|string|max:255',
		]);

		$customer->update($validated);

		return redirect()->route('customers.edit', $customer)->with('alert', alertify('All set! Everything is up to date.'));
	}
}
