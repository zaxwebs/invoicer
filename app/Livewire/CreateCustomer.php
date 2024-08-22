<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Customer;

class CreateCustomer extends Component
{
	public $modal = null;
	public $name;
	public $email;
	public $phone;
	public $address;

	protected $rules = [
		'name' => 'required|string|max:255',
		'email' => 'required|string|email|max:255|unique:customers',
		'phone' => 'nullable|string|max:15',
		'address' => 'nullable|string|max:255',
	];

	public function submit()
	{
		$validatedData = $this->validate();

		$customer = Customer::create($validatedData);

		return redirect()->route('customers.edit', $customer)->with('alert', alertify('Customer created successfully!'));
	}

	public function render()
	{
		return view('livewire.create-customer');
	}
}
