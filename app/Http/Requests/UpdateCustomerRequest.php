<?php

namespace App\Http\Requests;

use App\Models\Customer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class UpdateCustomerRequest extends FormRequest
{
	/**
	 * Determine if the user is authorized to make this request.
	 */
	public function authorize(): bool
	{
		$customer = $this->route('customer');

		return Auth::user()->can('update', $customer);
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
	 */
	public function rules()
	{
		$customer = $this->route('customer');

		return [
			'name' => 'required|string|max:255',
			'email' => 'required|string|email|max:255|unique:customers,email,' . $customer->id,
			'phone' => 'nullable|string|max:15',
			'address' => 'nullable|string|max:255',
			'image' => 'nullable|image|max:2048',
		];
	}
}
