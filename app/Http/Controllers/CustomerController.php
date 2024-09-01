<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class CustomerController extends Controller
{
	use AuthorizesRequests;

	public function index()
	{
		$customers = Auth::user()->customers()->latest()->simplePaginate(18)->withQueryString();
		return view('customers.index', compact('customers'));
	}

	public function create()
	{
		return view('customers.create');
	}

	public function show(Customer $customer)
	{
		$this->authorize('view', $customer);
		$invoices = $customer->invoices()->latest()->simplePaginate(10);
		return view('customers.show', compact('customer', 'invoices'));
	}

	public function store(Request $request)
	{
		$validated = $request->validate([
			'name' => 'required|string|max:255',
			'email' => 'required|string|email|max:255|unique:customers',
			'phone' => 'nullable|string|max:15',
			'address' => 'nullable|string|max:255',
			'image' => 'nullable|image|max:2048',
		]);

		$validated['user_id'] = Auth::id();

		if ($request->hasFile('image')) {
			$file = $request->file('image');
			$path = $file->store('uploads', 'public');
			$validated['image'] = $path;
		}

		$customer = Customer::create($validated);

		return redirect()->route('customers.edit', $customer)->with('alert', alertify('Customer created successfully!'));
	}

	public function edit(Customer $customer)
	{
		$this->authorize('update', $customer);

		return view('customers.edit', compact('customer'));
	}

	public function update(Request $request, Customer $customer)
	{
		$this->authorize('update', $customer);

		$validated = $request->validate([
			'name' => 'required|string|max:255',
			'email' => 'required|string|email|max:255|unique:customers,email,' . $customer->id,
			'phone' => 'nullable|string|max:15',
			'address' => 'nullable|string|max:255',
			'image' => 'nullable|image|max:2048',
		]);

		if ($request->hasFile('image')) {
			$file = $request->file('image');
			$path = $file->store('uploads', 'public');
			$validated['image'] = $path;

			if ($customer->image) {
				Storage::disk('public')->delete($customer->image);
			}
		}

		$customer->update($validated);

		return redirect()->route('customers.edit', $customer)->with('alert', alertify('All set! Everything is up to date.'));
	}
}
